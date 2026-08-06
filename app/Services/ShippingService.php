<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ShippingService
{
    /**
     * Calculate shipping cost based on destination country, weight, and currency.
     *
     * @param string $destinationCountry E.g. 'Sri Lanka', 'LK', 'US', etc.
     * @param float $totalWeight Weight in grams
     * @param string $currency 'LKR' or 'USD'
     * @param string $city
     * @param string $postalCode
     * @param float $subtotal Subtotal amount
     * @return float Calculated shipping price
     */
    public function calculateShipping(
        string $destinationCountry,
        float $totalWeight = 500,
        string $currency = 'LKR',
        string $city = 'Main City',
        string $postalCode = '00000',
        float $subtotal = 0
    ): float {
        Log::info('Calculating shipping cost', [
            'country' => $destinationCountry,
            'city' => $city,
            'postal_code' => $postalCode,
            'weight' => $totalWeight,
            'currency' => $currency,
            'subtotal' => $subtotal,
        ]);

        $exchangeRate = 300.00; // USD to LKR exchange rate (1 USD = 300 LKR)
        $normalizedCountry = strtolower(trim($destinationCountry));
        $countryCode = strtoupper(trim($destinationCountry));
        if (strlen($countryCode) !== 2) {
            $countryCode = $this->getCountryCode($destinationCountry);
        }

        // Sri Lanka shipping rate & free shipping threshold logic (NEVER call DHL API for Sri Lanka)
        if ($normalizedCountry === 'sri lanka' || $countryCode === 'LK') {
            $baseFee = (float) \App\Models\Setting::get('domestic_shipping_fee', 450.00);
            $freeThreshold = (float) \App\Models\Setting::get('free_shipping_threshold', 45000.00);

            // Free shipping if order subtotal is over or equal to free_shipping_threshold (e.g., 45,000 LKR)
            if ($freeThreshold > 0 && $subtotal >= $freeThreshold) {
                $shippingLKR = 0.00;
            } else {
                $shippingLKR = $baseFee;
            }

            Log::info('Sri Lanka Domestic Shipping Applied (DHL API Bypassed)', [
                'destination' => $destinationCountry,
                'subtotal' => $subtotal,
                'shipping_lkr' => $shippingLKR,
                'free_threshold' => $freeThreshold,
            ]);

            if (strtoupper($currency) === 'USD') {
                return round($shippingLKR / $exchangeRate, 2);
            }
            return $shippingLKR;
        }

        // For international shipments, calculate in USD then convert multiplying by 300
        try {
            $shippingUSD = $this->calculateDHLShipping($destinationCountry, $totalWeight, $city, $postalCode);
        } catch (\Exception $e) {
            Log::error('DHL shipping calculation failed', [
                'country' => $destinationCountry,
                'weight' => $totalWeight,
                'error' => $e->getMessage(),
            ]);

            $shippingUSD = $this->getDefaultInternationalRate($totalWeight / 1000);
        }

        // Convert USD to LKR by multiplying by 300
        if (strtoupper($currency) === 'LKR') {
            return round($shippingUSD * $exchangeRate, 2);
        }

        return $shippingUSD;
    }

    /**
     * DHL SOAP API Calculation
     */
    /**
     * DHL SOAP API Calculation
     */
    private function calculateDHLShipping(string $destinationCountry, float $totalWeight, string $city = 'Main City', string $postalCode = '00000'): float
    {
        $username = config('services.dhl.username');
        $password = config('services.dhl.password');
        $accountNumber = config('services.dhl.account_number');
        $url = config('services.dhl.endpoint', 'https://wsbexpress.dhl.com:443/sndpt/expressRateBook');

        if (!$username || !$password) {
            Log::warning('DHL credentials missing in config. Using default international rate.', [
                'destination' => $destinationCountry,
            ]);
            return $this->getDefaultInternationalRate($totalWeight / 1000);
        }

        $weightKg = round($totalWeight / 1000, 2);
        if ($weightKg < 0.01) $weightKg = 0.01;

        $length = 33;
        $width = 17;
        $height = 9;

        $shipperCity = 'Horana';
        $shipperPostal = '12400';
        $shipperCountry = 'LK';

        $recipientCity = !empty($city) ? $city : 'Main City';
        $recipientPostal = !empty($postalCode) ? $postalCode : '00000';
        $recipientCountry = $this->getCountryCode($destinationCountry);

        $shipTimestamp = now()->addDay()->format('Y-m-d\TH:i:sP');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                  xmlns:rat="http://scxgxtt.phx-dc.dhl.com/euExpressRateBook/RateMsgRequest"
                  xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
   <soapenv:Header>
      <wsse:Security soapenv:mustUnderstand="1">
         <wsse:UsernameToken>
            <wsse:Username>' . $username . '</wsse:Username>
            <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $password . '</wsse:Password>
         </wsse:UsernameToken>
      </wsse:Security>
   </soapenv:Header>
   <soapenv:Body>
      <rat:RateRequest>
         <ClientDetail/>
         <RequestedShipment>
            <DropOffType>REQUEST_COURIER</DropOffType>
            <ServiceType>P</ServiceType>
            <NextBusinessDay>Y</NextBusinessDay>
            <Ship>
               <Shipper>
                  <City>' . $shipperCity . '</City>
                  <StateOrProvinceCode/>
                  <PostalCode>' . $shipperPostal . '</PostalCode>
                  <CountryCode>' . $shipperCountry . '</CountryCode>
               </Shipper>
               <Recipient>
                  <City>' . $recipientCity . '</City>
                  <PostalCode>' . $recipientPostal . '</PostalCode>
                  <StateOrProvinceCode/>
                  <CountryCode>' . $recipientCountry . '</CountryCode>
               </Recipient>
            </Ship>
            <Packages>
               <RequestedPackages number="1">
                  <Weight>
                     <Value>' . $weightKg . '</Value>
                  </Weight>
                  <Dimensions>
                     <Length>' . $length . '</Length>
                     <Width>' . $width . '</Width>
                     <Height>' . $height . '</Height>
                  </Dimensions>
               </RequestedPackages>
            </Packages>
            <ShipTimestamp>' . $shipTimestamp . '</ShipTimestamp>
            <UnitOfMeasurement>SI</UnitOfMeasurement>
            <Content>NON_DOCUMENTS</Content>
            <PaymentInfo>DDU</PaymentInfo>
            <Account>' . $accountNumber . '</Account>
         </RequestedShipment>
      </rat:RateRequest>
   </soapenv:Body>
</soapenv:Envelope>';

        Log::info('DHL SOAP API Request Sending', [
            'url' => $url,
            'username' => $username,
            'account_number' => $accountNumber,
            'destination_country' => $destinationCountry,
            'recipient_country_code' => $recipientCountry,
            'recipient_city' => $recipientCity,
            'recipient_postal' => $recipientPostal,
            'weight_kg' => $weightKg,
            'xml_payload' => $xml,
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: text/xml;charset=UTF-8",
            "SOAPAction: \"\""
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        Log::info('DHL SOAP API Response Received', [
            'http_code' => $httpCode,
            'curl_error' => $error ?: null,
            'raw_response' => $response,
        ]);

        if ($error) {
            Log::error('DHL cURL error during rate calculation', [
                'error' => $error,
                'destination' => $destinationCountry,
            ]);
            return $this->getDefaultInternationalRate($weightKg);
        }

        $amount = null;
        if ($response) {
            if (preg_match('/<TotalNet>.*?<Amount>([\d.]+)<\/Amount>.*?<\/TotalNet>/s', $response, $matches)) {
                $amount = (float) $matches[1];
            } elseif (preg_match('/<ChargeAmount>([\d.]+)<\/ChargeAmount>/s', $response, $matches)) {
                $amount = (float) $matches[1];
            } elseif (preg_match('/<Amount>([\d.]+)<\/Amount>/s', $response, $matches)) {
                $amount = (float) $matches[1];
            }
        }

        if ($amount !== null && $amount > 0) {
            Log::info('DHL Shipping Rate Calculated Successfully', [
                'parsed_amount_usd' => $amount,
                'destination' => $destinationCountry,
            ]);
            return $amount;
        }

        $fallbackUSD = $this->getDefaultInternationalRate($weightKg);
        Log::warning('DHL Shipping Rate Parsing Failed or Returned 0. Using fallback rate.', [
            'parsed_amount_usd' => $amount,
            'fallback_rate_usd' => $fallbackUSD,
            'destination' => $destinationCountry,
        ]);

        return $fallbackUSD;
    }

    /**
     * Map country name to 2-letter ISO code
     */
    private function getCountryCode(string $countryName): string
    {
        $code = strtoupper(trim($countryName));
        if (strlen($code) === 2) {
            return $code;
        }

        try {
            $dbCode = \App\Models\Country::where('name', $countryName)->value('code');
            if ($dbCode && strlen(trim($dbCode)) === 2) {
                return strtoupper(trim($dbCode));
            }
        } catch (\Exception $e) {
            // Ignore DB errors
        }

        $map = [
            'sri lanka' => 'LK',
            'united states' => 'US',
            'united kingdom' => 'GB',
            'australia' => 'AU',
            'canada' => 'CA',
            'india' => 'IN',
            'singapore' => 'SG',
            'united arab emirates' => 'AE',
            'germany' => 'DE',
            'malaysia' => 'MY',
        ];
        return $map[strtolower(trim($countryName))] ?? 'US';
    }

    /**
     * Domestic fixed shipping rate (LKR 450.00)
     */
    private function getDomesticShippingRate(): float
    {
        return 450.00;
    }

    /**
     * Default international rate tiers (in USD)
     */
    private function getDefaultInternationalRate(float $weightKg): float
    {
        if ($weightKg <= 0.5) {
            return 25.00;
        } elseif ($weightKg <= 1) {
            return 35.00;
        } elseif ($weightKg <= 2) {
            return 50.00;
        } elseif ($weightKg <= 5) {
            return 75.00;
        } else {
            return 75.00 + (($weightKg - 5) * 15);
        }
    }
}
