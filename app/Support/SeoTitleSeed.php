<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;

/**
 * Title tags from the SEO audit (SEO_TITLE_TAGS_PLAN.txt).
 *
 * Only empty meta_title fields are filled, so titles edited in admin are never
 * overwritten. Products are matched by slug start + product name because the
 * audit sheet cut many product URLs short.
 */
class SeoTitleSeed
{
    public const CATEGORIES = [
        'fragrance' => "Perfume Sri Lanka – Men's & Women's Fragrances | NBC Shop",
        'gift-sets' => 'Gift Packs Sri Lanka – Skincare & Bath Gift Sets | NBC Shop',
        'bundles' => 'Gift Packs Sri Lanka – Skincare & Bath Gift Sets | NBC Shop', // if not yet renamed
        'skin-care' => 'Skin Care Products Sri Lanka – Serums & Face Wash | NBC Shop',
        'baby-care' => 'Baby Products Sri Lanka – Panda Baby Care Range | NBC Shop',
        'bath-body' => 'Bath & Body Products Sri Lanka – Lotions & Body Wash | NBC',
        'hair-care' => 'Hair Care Products Sri Lanka – Herbal Hair Oil & Shampoo',
        'skin-types' => 'Skin Care by Skin Type Sri Lanka – Dry, Oily & Normal | NBC',
    ];

    public const BRANDS = [
        'panda-baby' => 'Panda Baby Products Sri Lanka – Official Online Store | NBC',
        'natures-secrets' => "Nature's Secrets Products Sri Lanka – Official Store | NBC",
        'champion' => 'Champion Soap & Hand Wash Sri Lanka – Germ Fighting | NBC',
        'iris' => "Iris Perfume Sri Lanka – Women's Fragrances | NBC Shop",
        'chandi-panda' => 'Chandi Panda Herbal Soap for Kids Sri Lanka – Germ Defence',
        'selfie' => 'Selfie Body Spray Sri Lanka – Perfumed Sprays for Her | NBC',
        'sucses' => 'Sucses Perfume for Men Sri Lanka – Emerald, Ruby & Sapphire',
    ];

    public const SUB_CATEGORIES = [
        'soap' => 'Germ Fighting Soap Sri Lanka – Champion Herbal Soaps | NBC',
        'sun-protection' => 'Sunscreen Sri Lanka – SPF 15 & SPF 25 Lotions | NBC Shop',
        'serum' => 'Face Serum Sri Lanka – Niacinamide, Vitamin C & More | NBC',
        'hair-oils-tonics' => "Hair Oil Sri Lanka – Herbal Hair Oils | Nature's Secrets",
        'eye-care' => "Eye Cream Sri Lanka – Under Eye Care | Nature's Secrets",
        'body-scrub' => "Body Scrub Sri Lanka – Sugar Scrubs | Nature's Secrets",
        'hair-gels' => "Hair Gel Sri Lanka – Aloe Vera Hair Gel | Nature's Secrets",
        'facial-scrubs' => 'Face Scrub Sri Lanka – Sandalwood Facial Scrub | NBC Shop',
        'shaving' => "Shaving Cream Sri Lanka – Aloe Vera | Nature's Secrets",
        'creams-lotions' => 'Baby Cream & Baby Lotion Sri Lanka – Panda Baby | NBC Shop',
        'soaps-cleansers' => 'Baby Soap, Baby Wash & Shampoo Sri Lanka – Panda Baby | NBC',
        'body-cleansers' => "Body Wash Sri Lanka – Shower Gels & Oils | Nature's Secrets",
        'body-oils' => 'Body Oil Sri Lanka – Coconut Body & Massage Oils | NBC Shop',
        'for-her' => 'Perfume for Women Sri Lanka – Iris & Selfie Fragrances | NBC',
        'hand-foot-care' => "Hand Cream Sri Lanka – Hand & Foot Care | Nature's Secrets",
        'conditioner' => "Hair Conditioner Sri Lanka – Coconut | Nature's Secrets",
        'facial-cleansers-toners' => 'Face Wash Sri Lanka – Facial Cleansers & Toners | NBC Shop',
        'body-lotions-creams' => "Body Lotion Sri Lanka – Herbal Lotions | Nature's Secrets",
        'body-butters' => 'Body Butter Sri Lanka – Rich Herbal Body Butters | NBC Shop',
        'for-him' => "Perfume for Men Sri Lanka – Sucses Men's Fragrances | NBC",
        'baby-oil' => 'Baby Oil Sri Lanka – Natural Panda Baby Oil | NBC Shop',
        'facial-creams-gels' => "Face Cream Sri Lanka – Creams & Gels | Nature's Secrets",
        'shampoo' => 'Herbal Shampoo Sri Lanka – Anti Dandruff & More | NBC Shop',
        'colognes' => 'Baby Cologne Sri Lanka – Panda Baby Colognes & Sprays | NBC',
        'baby-gifts' => 'Baby Gift Pack Sri Lanka – Newborn Gift Sets | Panda Baby',
        'talc' => 'Baby Talc Sri Lanka – Panda Baby Talc Powder | NBC Shop',
        'nappy-wash' => 'Nappy Wash Sri Lanka – Baby Clothes Detergent | Panda Baby',
        'mature' => 'Anti Aging Skin Care Sri Lanka – Retinol & More | NBC Shop',
        'cotton-buds' => 'Cotton Buds Sri Lanka – Biodegradable Sticks | NBC Shop',
        'acne-prone' => 'Acne Prone Skin Care Sri Lanka – Face Wash & Gels | NBC Shop',
        'dry' => 'Skin Care for Dry Skin Sri Lanka – Creams & Cleansers | NBC',
        'oily' => 'Skin Care for Oily Skin Sri Lanka – Face Wash & Toner | NBC',
        'normal' => 'Skin Care for Normal Skin Sri Lanka – Daily Care | NBC',
    ];

    /**
     * [slug start (a trailing "-" means the sheet cut it short), product name as in the sheet, title]
     */
    public const PRODUCTS = [
        ['niacinamide-ultra-', 'Niacinamide Ultra Glow Serum', "Niacinamide Serum Sri Lanka – Ultra Glow | Nature's Secrets"],
        ['vitamin-c-skin-', 'Vitamin C Skin Radiance Serum With Ascorbyl', "Vitamin C Serum Sri Lanka – Skin Radiance | Nature's Secrets"],
        ['retinol-age-', 'Retinol Age Perfecting Advanced Serum', "Retinol Serum Sri Lanka – Age Perfecting | Nature's Secrets"],
        ['anti-wrinkle-night-', 'Anti-Wrinkle Night Cream', "Anti Wrinkle Night Cream Sri Lanka | Nature's Secrets"],
        ['perfume-hair-', 'Perfume Hair Conditioner', "Perfume Conditioner Sri Lanka – 100ml | Nature's Secrets"],
        ['baby-cologne', 'Baby Cologne', 'Baby Cologne Sri Lanka – Original Fragrance | Panda Baby'],
        ['pomegranate-', 'Pomegranate Moisturizing Body Wash', "Pomegranate Shower Gel Sri Lanka – 380ml | Nature's Secrets"],
        ['natures-secrets-', "Nature's Secrets Calming Coconut Shampoo", "Sulfate Free Shampoo Sri Lanka – Coconut | Nature's Secrets"],
        ['sucses-sapphire', 'SUCSES SAPPHIRE', 'Sucses Sapphire Perfume for Men Sri Lanka – Marine 55ml'],
        ['me-you-perfumed-', 'Me & You- (Perfumed Body Spray)', 'Me & You Perfumed Body Spray Sri Lanka – 80ml | Selfie'],
        ['anti-dandruff-', 'Anti-Dandruff Godapara Shampoo', "Anti Dandruff Shampoo Sri Lanka | Nature's Secrets"],
        ['gotukola-under-eye-', 'Gotukola Under Eye Cream', "Under Eye Cream Sri Lanka – Gotukola 20ml | Nature's Secrets"],
        ['aloe-96-skin-', 'Aloe 96% Skin Soothing Gel', "Aloe Vera Gel Sri Lanka – 96% Pure Aloe | Nature's Secrets"],
        ['baby-cologne-fairys-', "Baby Cologne – Fairy's Touch", "Panda Baby Cologne Fairy's Touch – Baby Cologne Sri Lanka"],
        ['panda-baby-cotton-', 'Panda Baby Cotton Buds - Sticks', 'Cotton Buds Sri Lanka – Biodegradable Sticks | Panda Baby'],
        ['papaya-soft-facial-', 'Papaya Soft Facial Wash', "Papaya Face Wash Sri Lanka – All in One | Nature's Secrets"],
        ['baby-talc', 'Baby Talc', 'Baby Powder Sri Lanka – Panda Baby Talc 100g | Panda Baby'],
        ['brightening-care-', 'Brightening Care Body Lotion - Papaya', "Papaya Body Lotion Sri Lanka – Brighten | Nature's Secrets"],
        ['sucses-ruby', 'SUCSES RUBY', "Sucses Ruby Men's Perfume Sri Lanka – Spicy Citrus 55ml"],
        ['natures-secrets-', "Men's Facial Wash with Mint & Aloe", "Face Wash for Men Sri Lanka – Mint & Aloe | Nature's Secrets"],
        ['panda-baby-lotion-', 'Panda Baby Lotion with Honey & Almond', 'Baby Lotion Honey & Almond Sri Lanka – Soft | Panda Baby'],
        ['vitamin-e-skin-cream', 'Vitamin E Skin Cream', "Vitamin E Cream Sri Lanka – Non-Greasy | Nature's Secrets"],
        ['acne-clear-skin-', 'Acne Clear & Skin Brightening Double Action Gel', "Acne Gel Sri Lanka – Clear & Brighten | Nature's Secrets"],
        ['body-massage-oil-', 'Body Massage Oil Island Spice', "Massage Oil Sri Lanka – Island Spice | Nature's Secrets"],
        ['miracle-foot-care-', 'Miracle Foot Care Cream - Aloe', "Foot Crack Cream Sri Lanka – Miracle Aloe | Nature's Secrets"],
        ['hair-oil-herbal', 'Hair Oil – Herbal', "Herbal Hair Oil Sri Lanka – 8 Herbs 100ml | Nature's Secrets"],
        ['soothing-care-body-', 'Soothing Care Body Lotion - Aloe', "Aloe Vera Body Lotion Sri Lanka – Calm | Nature's Secrets"],
        ['carrot-soft-facial-', 'Carrot Soft Facial Wash', "Carrot Face Wash Sri Lanka – Gentle | Nature's Secrets"],
        ['baby-wash-gotukola-', 'Baby Wash – Gotukola Extract', 'Baby Wash with Gotukola Sri Lanka – Soap Free | Panda Baby'],
        ['lotus-brightening-', 'Lotus Brightening Facial Wash', "Lotus Brightening Face Wash Sri Lanka | Nature's Secrets"],
        ['skin-toner-cucumber', 'Skin Toner - Cucumber', "Cucumber Skin Toner Sri Lanka – 100ml | Nature's Secrets"],
        ['herbal-heritage-face-', 'Herbal Heritage Face Wash - Lotus', "Lotus Face Wash Sri Lanka – Heritage | Nature's Secrets"],
        ['deep-cleansing-milk-', 'Deep Cleansing Milk – Aloe Vera', "Aloe Vera Cleansing Milk Sri Lanka | Nature's Secrets"],
        ['baby-soap-kohomba-', 'Baby Soap - Kohomba Kaha', 'Kohomba Soap for Babies Sri Lanka – Neem & Turmeric'],
        ['panda-baby-', 'Panda Baby Shampoo–Bees Honey', 'Panda Baby Shampoo Bees Honey Sri Lanka – Tear-Gentle'],
        ['nappy-wash', 'Nappy Wash', 'Panda Baby Nappy Wash Sri Lanka – Baby Clothes Detergent'],
        ['chandi-panda-germ-', 'Chandi Panda Germ Fighting Herbal Soap', 'Germ Fighting Herbal Soap for Kids Sri Lanka | Chandi Panda'],
        ['protecting-care-body-', 'Protecting Care - Body Lotion - Avocado', "Avocado Body Lotion Sri Lanka – UV | Nature's Secrets"],
        ['champion-germ-', 'Champion Germ Fighting Soap - Herbal Fresh', 'Antibacterial Soap Sri Lanka – Herbal Fresh | Champion'],
        ['aloera-moisturising-', 'Aloera Moisturising Cream', "Moisturising Cream Sri Lanka – Aloe Vera | Nature's Secrets"],
        ['cucumber-facial-', 'Cucumber Facial Wash', "Cucumber Face Wash Sri Lanka – Oily Skin | Nature's Secrets"],
        ['panda-baby-fairys-', "Panda Baby Fairy's Touch Cologne Spray", "Panda Baby Cologne Spray Fairy's Touch – 80ml Sri Lanka"],
        ['panda-baby-natural-', 'Panda Baby Natural Baby Oil', 'Panda Baby Oil Sri Lanka – Natural Coconut & Almond Oil'],
        ['panda-baby-gift-', 'Panda Baby Gift Pack', 'Panda Baby Gift Pack Sri Lanka – Newborn Baby Gift Set'],
        ['intensive-care-body-', 'Intensive Care Body Lotion - Vitamin E', "Vitamin E Body Lotion Sri Lanka | Nature's Secrets"],
        ['hair-gel-aloe', 'Hair Gel – Aloe', "Aloe Vera Hair Gel Sri Lanka – 50ml | Nature's Secrets"],
        ['panda-baby-sweet-', 'Panda Baby Sweet Floral Cologne Spray', 'Baby Cologne Spray Sweet Floral Sri Lanka | Panda Baby'],
        ['panda-baby-lotion-', 'Panda Baby Lotion with Pomegranate & Olive', 'Panda Baby Lotion Pomegranate & Olive – Sri Lanka 200ml'],
        ['panda-baby-wash-', 'Panda Baby Wash with Sandalwood and Jasmine', 'Panda Baby Wash Sandalwood & Jasmine – Sri Lanka 200ml'],
        ['herbal-heritage-body-', 'Herbal Heritage Body Butter – Avocado & Sesame', "Avocado Body Butter Sri Lanka – 200ml | Nature's Secrets"],
        ['nail-polish-remover', 'Nail Polish Remover', "Nail Polish Remover Sri Lanka – 125ml | Nature's Secrets"],
        ['sun-fun-sunscreen-', 'Sun & Fun Sunscreen Lotion - SPF 25', "Sunscreen Lotion SPF 25 Sri Lanka – 80ml | Nature's Secrets"],
        ['champion-hand-', 'Champion Hand Wash - Delum Red', 'Hand Wash Sri Lanka – Delum Red Pomegranate | Champion'],
        ['peptide-cica-glow-', 'Peptide Cica Glow Under Eye Serum', "Under Eye Serum Sri Lanka – Peptide Cica | Nature's Secrets"],
        ['peppermint-facial-', 'Peppermint Facial Wash', "Peppermint Face Wash for Acne Sri Lanka | Nature's Secrets"],
        ['baby-soap-rathmal', 'Baby Soap – Rathmal', 'Panda Baby Rathmal Soap Sri Lanka – Gentle Herbal Care'],
        ['body-wash-aloe-vera', 'Body Wash – Aloe Vera', "Aloe Vera Body Wash Sri Lanka – 380ml | Nature's Secrets"],
        ['natures-secrets-', 'Calming Coconut Body Wash', "Coconut Body Wash Sri Lanka – Calming | Nature's Secrets"],
        ['shower-oil-petal-', 'Shower Oil – Petal Touch with Lotus & Jasmine', "Lotus & Jasmine Shower Oil Sri Lanka | Nature's Secrets"],
        ['nourishing-care-', 'Nourishing Care Body Lotion - Carrot', "Carrot Body Lotion Sri Lanka – Nourishing | Nature's Secrets"],
        ['herbal-heritage-body-', 'Herbal Heritage Body Butter – Coconut With Lime', "Coconut Body Butter with Lime Sri Lanka | Nature's Secrets"],
        ['natures-secrets-', 'Lemongrass Beeswax Sugar Scrub', "Lemongrass Sugar Scrub Sri Lanka – 175g | Nature's Secrets"],
        ['sleep-pillow-spray', 'Sleep Pillow Spray', "Sleep Pillow Spray Sri Lanka – Lavender | Nature's Secrets"],
        ['sun-fun-daily-', 'Sun & Fun Daily Protection Lotion – SPF 15', "SPF 15 Sunscreen Sri Lanka – Daily Lotion | Nature's Secrets"],
        ['glow-revival-set', 'Glow Revival Set', "Glow Revival Skincare Set Sri Lanka | Nature's Secrets"],
        ['multivitamin-face-', 'Multivitamin Face Cream', "Multivitamin Face Cream Sri Lanka – 50ml | Nature's Secrets"],
        ['turmeric-golden-', 'Turmeric Golden Cream', "Turmeric Cream Sri Lanka – Golden Glow | Nature's Secrets"],
        ['kohomba-kaha-', 'Kohomba-Kaha Brightening Facial Wash', "Kohomba Face Wash Sri Lanka – Neem & Kaha | Nature's Secrets"],
        ['skin-toner-spray-', 'Skin Toner Spray - Cucumber', "Cucumber Toner Spray Sri Lanka – 100ml | Nature's Secrets"],
        ['baby-cologne-floral', 'Baby Cologne – Floral', 'Floral Baby Cologne Sri Lanka – Fresh Flowers | Panda Baby'],
        ['baby-cologne-', "Baby Cologne – Mother's Love", "Baby Cologne Mother's Love Sri Lanka – Gentle | Panda Baby"],
        ['baby-cologne-sweet-', 'Baby Cologne – Sweet Floral', 'Sweet Floral Baby Cologne Sri Lanka – 50ml | Panda Baby'],
        ['panda-baby-cologne-', 'Panda Baby Cologne Happy Smiles', 'Panda Baby Cologne Happy Smiles – Baby Cologne Sri Lanka'],
        ['panda-baby-herbal-', 'Panda Baby Herbal Cologne', 'Herbal Baby Cologne Sri Lanka – Neem & Turmeric | Panda Baby'],
        ['baby-cream-with-', 'Baby Cream With Olive Oil', 'Baby Cream with Olive Oil Sri Lanka – Mild | Panda Baby'],
        ['baby-cream-with-', 'Baby Cream With Rathmal & Venivel', 'Baby Cream with Rathmal & Venivel Sri Lanka | Panda Baby'],
        ['panda-baby-cream-', 'Panda Baby Cream - Aloe Vera', 'Aloe Vera Baby Cream Sri Lanka – Soothing Care | Panda Baby'],
        ['baby-soap-almond-', 'Baby Soap - Almond Milk & Olive', 'Baby Soap Almond Milk & Olive Sri Lanka – 75g | Panda Baby'],
        ['baby-soap-bees-', "Baby Soap - Bee's Honey & Almond", "Baby Soap Bee's Honey & Almond Sri Lanka | Panda Baby"],
        ['baby-soap-delum', 'Baby Soap – Delum', 'Panda Baby Delum Soap Sri Lanka – Pomegranate Care'],
        ['panda-baby-', 'Panda Baby Shampoo with Nelli And Neem', 'Herbal Baby Shampoo Nelli & Neem Sri Lanka | Panda Baby'],
        ['citrus-moisturising-', 'Citrus Moisturising Body Wash', "Citrus Body Wash Sri Lanka – Moisturising | Nature's Secrets"],
        ['shower-oil-sweet-', 'Shower Oil – Sweet Coconut Comfort (sulfate-free)', "Coconut Shower Oil Sri Lanka – 143ml | Nature's Secrets"],
        ['sweet-tangerine-', 'Sweet Tangerine Body Butter', "Tangerine Body Butter Sri Lanka – 200ml | Nature's Secrets"],
        ['coconut-body-', 'Coconut Body Beauty Oil With Lemongrass Oil-Pure', "Lemongrass Body Oil Sri Lanka – Pure Calm | Nature's Secrets"],
        ['coconut-body-', 'Coconut Body Beauty Oil With Turmeric Island', "Turmeric Body Oil Sri Lanka – Coconut | Nature's Secrets"],
        ['forest-touch-hand-', 'Forest Touch Hand Cream Collection', "Hand Cream Gift Set Sri Lanka – Forest | Nature's Secrets"],
        ['hand-cream-forest-', 'Hand Cream - Forest After Rain with Calumba', "Calumba Wood Hand Cream Sri Lanka – 50ml | Nature's Secrets"],
        ['hand-cream-forest-', 'Hand Cream - Forest Calm with Pine Bark', "Pine Bark Hand Cream Sri Lanka – 50ml | Nature's Secrets"],
        ['hand-cream-night-', 'Hand Cream - Night Blooming Jasmine', "Jasmine Hand Cream Sri Lanka – 50ml | Nature's Secrets"],
        ['hand-cream-queen-', 'Hand Cream - Queen of the Night (Kadupul)', "Kadupul Hand Cream Sri Lanka – 50ml | Nature's Secrets"],
        ['champion-germ-', 'Champion Germ Fighting Soap – Cool Mint', 'Champion Soap Cool Mint Sri Lanka – Germ Fighting 90g'],
        ['champion-germ-', 'Champion Germ Fighting Soap – Red Energy', 'Germ Protection Soap Red Energy Sri Lanka | Champion'],
        ['champion-hand-', 'Champion Hand Wash - Mint Fresh', 'Mint Hand Wash Sri Lanka – Germ Killing 200ml | Champion'],
        ['iris-adore', 'IRIS ADORE', 'Iris Adore Perfume for Women Sri Lanka – 50ml Bottle | Iris'],
        ['sweet-blossoms-', 'Sweet Blossoms- (Perfumed Body Spray)', 'Sweet Blossoms Body Spray Sri Lanka – For Her 80ml | Selfie'],
        ['teenage-crush-', 'Teenage Crush- (Perfumed Body Spray)', 'Teenage Crush Body Spray Sri Lanka – For Her 80ml | Selfie'],
        ['sucses-emerald', 'SUCSES EMERALD', 'Sucses Emerald Perfume for Men Sri Lanka – Citrus 55ml'],
        ['glow-repair-duo', 'Glow & Repair Duo', "Glow & Repair Skincare Duo Sri Lanka | Nature's Secrets"],
        ['skin-perfecting-trio', 'Skin Perfecting Trio', "Skin Perfecting Trio Gift Set Sri Lanka | Nature's Secrets"],
        ['ultimate-glow-combo', 'Ultimate Glow Combo', "Ultimate Glow Skincare Combo Sri Lanka | Nature's Secrets"],
        ['majestic-locks-hair-', 'Majestic Locks Hair Care Gift Set', "Hair Care Gift Set Sri Lanka – Majestic | Nature's Secrets"],
        ['paradise-beauty-', 'Paradise Beauty- Bath Collection', "Bath Gift Set Sri Lanka – Paradise Beauty | Nature's Secrets"],
        ['vitamin-c-glow-offer-', 'Vitamin C Glow Offer: Buy 2 Serums & Get a Free', 'Vitamin C Serum Offer Sri Lanka – Buy 2, Free Face Wash'],
        ['perfume-shampoo', 'Perfume Shampoo', "Perfume Shampoo Sri Lanka – Fragrant Hair | Nature's Secrets"],
        ['natures-secrets-', "Nature's Secrets Calming Coconut Conditioner", "Coconut Hair Conditioner Sri Lanka | Nature's Secrets"],
        ['nourishing-hair-oil-', 'Nourishing Hair Oil With Ceylon Green Tea', "Green Tea Hair Oil Sri Lanka – Lustrous | Nature's Secrets"],
        ['herbal-body-hair-oil-', 'Herbal Body & Hair Oil Satin Touch', "Herbal Body & Hair Oil Sri Lanka – Satin | Nature's Secrets"],
        ['platinum-face-lifting-', 'Platinum Face Lifting Cream With Licorice', "Face Lifting Cream Sri Lanka – Licorice | Nature's Secrets"],
        ['aloe-vera-', 'Aloe Vera Moisturising Shaving Cream', "Aloe Vera Shaving Cream Sri Lanka – 100ml | Nature's Secrets"],
        ['deep-cleansing-milk-', 'Deep Cleansing Milk – Cucumber', "Cucumber Cleansing Milk Sri Lanka – 100ml | Nature's Secrets"],
        ['deep-cleansing-milk-', 'Deep Cleansing Milk – Papaya', "Papaya Cleansing Milk Sri Lanka – 100ml | Nature's Secrets"],
        ['scrub-sandun-jar', 'Scrub Sandun - Jar', "Sandalwood Face Scrub Sri Lanka – Sandun | Nature's Secrets"],
    ];

    /**
     * Fill empty meta titles. Returns a report: ['set' => [...], 'kept' => [...], 'missing' => [...]].
     */
    public static function apply(bool $dryRun = false): array
    {
        return self::fill('meta_title', self::CATEGORIES, self::SUB_CATEGORIES, self::BRANDS, self::PRODUCTS, $dryRun);
    }

    /**
     * Fill one empty column from audit data. Product rows are
     * [slug start, product name as in the sheet, value]; the row order
     * matters (each product is claimed once, in sheet order).
     */
    public static function fill(string $column, array $categories, array $subCategories, array $brands, array $products, bool $dryRun = false): array
    {
        $report = ['set' => [], 'kept' => [], 'missing' => []];

        foreach (['categories' => $categories, 'sub_categories' => $subCategories, 'brands' => $brands] as $table => $values) {
            foreach ($values as $slug => $value) {
                $row = DB::table($table)->where('slug', $slug)->first(['id', $column]);
                if (! $row) {
                    // "bundles" / "gift-sets" are the same category under two possible slugs.
                    if (! in_array($slug, ['bundles', 'gift-sets'], true)) {
                        $report['missing'][] = "{$table}: {$slug}";
                    }
                    continue;
                }
                self::set($table, $column, $row, $value, "{$table}: {$slug}", $dryRun, $report);
            }
        }

        $rows = DB::table('products')->get(['id', 'slug', 'name', $column]);
        $claimed = [];

        foreach ($products as [$slugStart, $name, $value]) {
            $product = self::matchProduct($rows, $slugStart, $name, $claimed);
            if (! $product) {
                $report['missing'][] = "product: {$slugStart} | {$name}";
                continue;
            }
            $claimed[$product->id] = true;
            self::set('products', $column, $product, $value, "product: {$product->slug}", $dryRun, $report);
        }

        return $report;
    }

    private static function set(string $table, string $column, object $row, string $value, string $label, bool $dryRun, array &$report): void
    {
        if (filled($row->{$column})) {
            $report['kept'][] = "{$label} (already set)";
            return;
        }

        if (! $dryRun) {
            DB::table($table)->where('id', $row->id)->update([$column => $value]);
        }
        $report['set'][] = "{$label} -> {$value}";
    }

    /**
     * Exactly one product whose slug fits the (possibly cut) slug and whose
     * name matches the sheet's name; null when none or ambiguous.
     */
    private static function matchProduct($products, string $slugStart, string $name, array $claimed): ?object
    {
        $cut = str_ends_with($slugStart, '-');
        $target = self::normalize($name);

        $bySlug = $products->filter(fn ($p) => ! isset($claimed[$p->id]) && (
            $cut ? str_starts_with((string) $p->slug, $slugStart) : $p->slug === $slugStart
        ));

        // Name must match: equal, or one starts with the other (the sheet cut long names).
        $byName = $bySlug->filter(function ($p) use ($target) {
            $n = self::normalize($p->name);

            return $n !== '' && $target !== '' && (str_starts_with($n, $target) || str_starts_with($target, $n));
        });

        if ($byName->count() === 1) {
            return $byName->first();
        }

        // Exact (uncut) slug with a single hit is safe even if the name was reworded.
        if (! $cut && $bySlug->count() === 1) {
            return $bySlug->first();
        }

        return null;
    }

    private static function normalize(?string $text): string
    {
        $text = html_entity_decode((string) $text, ENT_QUOTES);
        $text = str_replace(['’', '‘'], "'", $text);

        return preg_replace('/[^a-z0-9]+/', '', strtolower($text));
    }
}
