<footer class="nbc-footer">
    <div class="container">
        <div class="nbc-footer__grid">
            <div class="nbc-footer__column">
                <section class="nbc-footer__group">
                    <h2>General Inquiries</h2>
                    <a href="mailto:info@nbc.lk">info@nbc.lk</a>
                    <p>Vacancy Inquiries* <a href="mailto:hrm@nbc.lk">hrm@nbc.lk</a></p>
                </section>
                <section class="nbc-footer__group">
                    <h2>Customer Care</h2>
                    <a href="tel:+94342261100">+94 342 261 100</a>
                    <a href="tel:+943422533029">+94 342 253 302/9</a>
                    <a href="mailto:customercare@nbc.lk">customercare@nbc.lk</a>
                </section>
                <section class="nbc-footer__group">
                    <h2>Online Order Inquiries</h2>
                    <a href="tel:+94777630419">+94 777 630 419</a>
                </section>
                <section class="nbc-footer__group">
                    <h2>Fax</h2>
                    <p>+94 34 2253300</p>
                </section>
                <section class="nbc-footer__group">
                    <h2>Address</h2>
                    <address>P.O. Box 1, Millewa,<br>Horana,<br>Sri Lanka.</address>
                </section>
            </div>

            <div class="nbc-footer__column">
                <section class="nbc-footer__group">
                    <h2>Partnership Opportunities</h2>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/export">Overseas Distributorship</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/private-label">Private Label</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/hotel-amenities">Hotel Amenities</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/vouchers">Vouchers</a>
                </section>
                <section class="nbc-footer__group">
                    <h2>Showrooms</h2>
                    <p>Nature's Secrets Airport Showroom</p>
                    <address>Shop No. 41D, Departure-transit Area,<br>Bandaranaike International Airport,<br>Katunayake, Sri Lanka.</address>
                    <a href="tel:+94112253344">Tel. +94 11 225 3344</a>
                </section>
                <nav class="nbc-footer__socials" aria-label="Social media">
                    <a href="https://www.facebook.com/NaturesSecretsHC/" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/naturessecretssl/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@naturessecretssl" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.linkedin.com/company/natures-beauty-creations-ltd/" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                </nav>
            </div>

            <div class="nbc-footer__column">
                <section class="nbc-footer__newsletter">
                    <div class="nbc-footer__newsletter-icon"><i class="fa-regular fa-envelope"></i></div>
                    <h2>Join Our Newsletter</h2>
                    <p>Sign up to receive new product updates, exclusive discounts, tips &amp; more.</p>
                    <form action="#" method="post">
                        @csrf
                        <label class="visually-hidden" for="nbcFooterEmail">Email address</label>
                        <input id="nbcFooterEmail" type="email" name="email" placeholder="Enter Your Email" required>
                        <button type="submit" aria-label="Subscribe"><i class="fa-regular fa-paper-plane"></i></button>
                    </form>
                </section>
                <section class="nbc-footer__group nbc-footer__information">
                    <h2>Information</h2>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/contact">Contact Us</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/about/careers">Careers</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/delivery">Delivery</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/copyright-legal">Copyright, Legal</a>
                    <a href="https://palegoldenrod-squirrel-304943.hostingersite.com/privacy-policies">Privacy Policies</a>
                </section>
            </div>
        </div>

        <div class="nbc-footer__commerce">
            <div class="nbc-footer__payments">
                <span><i class="fa-solid fa-shield-check"></i> Secure payments</span>
                <div class="nbc-footer__payment-icons" aria-label="Accepted payment methods">
                    <img src="{{ asset('assets/images/nbc/Payment/visa.png') }}" alt="Visa">
                    <img src="{{ asset('assets/images/nbc/Payment/mastercard.png') }}" alt="Mastercard">
                    <img src="{{ asset('assets/images/nbc/Payment/amex.png') }}" alt="American Express">
                    <img src="{{ asset('assets/images/nbc/Payment/jcb.png') }}" alt="JCB">
                    <img src="{{ asset('assets/images/nbc/Payment/discover.png') }}" alt="Discover">
                    <img src="{{ asset('assets/images/nbc/Payment/diners.png') }}" alt="Diners Club">
                    <img src="{{ asset('assets/images/nbc/Payment/unionpay.png') }}" alt="UnionPay">
                </div>
            </div>
        </div>
    </div>
    <div class="nbc-footer__copyright">
        <p>Copyright &copy; <span class="copyright-year">2026</span> NBC. All Rights Reserved.</p>
    </div>
</footer>
