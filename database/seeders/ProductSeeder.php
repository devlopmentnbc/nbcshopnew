<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Brands
        $misumi = Brand::firstOrCreate(['slug' => 'misumi'], ['name' => 'Misumi', 'image' => 'assets/images/brand/brand-01.webp', 'status' => true]);
        $ns = Brand::firstOrCreate(['slug' => 'natures-secret'], ['name' => "Nature's Secret", 'image' => 'assets/images/brand/brand-02.webp', 'status' => true]);
        $champion = Brand::firstOrCreate(['slug' => 'champion'], ['name' => 'Champion', 'image' => 'assets/images/brand/brand-03.webp', 'status' => true]);
        $panda = Brand::firstOrCreate(['slug' => 'panda-baby'], ['name' => 'Panda Baby', 'image' => 'assets/images/brand/brand-04.webp', 'status' => true]);

        // 2. Categories
        $skinCare = Category::firstOrCreate(['slug' => 'skin-care'], ['name' => 'Skin Care', 'image' => 'assets/images/category/category-01.webp', 'status' => true]);
        $hairCare = Category::firstOrCreate(['slug' => 'hair-care'], ['name' => 'Hair Care', 'image' => 'assets/images/category/category-02.webp', 'status' => true]);
        $bathBody = Category::firstOrCreate(['slug' => 'bath-body'], ['name' => 'Bath & Body', 'image' => 'assets/images/category/category-03.webp', 'status' => true]);
        $babyCare = Category::firstOrCreate(['slug' => 'baby-care'], ['name' => 'Baby Care', 'image' => 'assets/images/category/category-04.webp', 'status' => true]);

        // 3. SubCategories
        $faceWash = SubCategory::firstOrCreate(['category_id' => $skinCare->id, 'slug' => 'face-wash'], ['name' => 'Face Wash', 'image' => 'assets/images/category/category-01.webp', 'status' => true]);
        $shampoo = SubCategory::firstOrCreate(['category_id' => $hairCare->id, 'slug' => 'shampoo'], ['name' => 'Shampoo', 'image' => 'assets/images/category/category-02.webp', 'status' => true]);
        $hairOil = SubCategory::firstOrCreate(['category_id' => $hairCare->id, 'slug' => 'hair-oil'], ['name' => 'Hair Oil', 'image' => 'assets/images/category/category-02.webp', 'status' => true]);
        $bodyWash = SubCategory::firstOrCreate(['category_id' => $bathBody->id, 'slug' => 'body-wash'], ['name' => 'Body Wash', 'image' => 'assets/images/category/category-03.webp', 'status' => true]);

        // 4. Products list
        $productsData = [
            [
                'name' => 'Anti-Dandruff Godapara Shampoo',
                'brand_id' => $ns->id,
                'category_id' => $hairCare->id,
                'sub_category_id' => $shampoo->id,
                'sku' => 'NS-HC-001',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/Anti Dandruff.png',
                'short_description' => 'Enriched with natural Godapara extract to effectively eliminate dandruff and nourish scalp.',
                'description' => 'Nature\'s Secret Anti-Dandruff Godapara Shampoo contains 100% natural herbal extracts known for centuries in traditional Ayurveda. Helps treat flaky scalp and maintains soft, healthy hair.',
                'price' => 450.00,
                'sale_price' => 395.00,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Cucumber Facial Wash',
                'brand_id' => $ns->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'NS-SC-002',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/cucumber facial wash.png',
                'short_description' => 'Cooling and refreshing face wash infused with real cucumber extracts for clear, hydrated skin.',
                'description' => 'Deeply cleanses dirt, excess oil, and impurities without stripping natural moisture. Cucumber extracts soothe skin irritation and provide a healthy glow.',
                'price' => 380.00,
                'sale_price' => 340.00,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Herbal Hair Oil',
                'brand_id' => $ns->id,
                'category_id' => $hairCare->id,
                'sub_category_id' => $hairOil->id,
                'sku' => 'NS-HC-003',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/Hair oil 1.png',
                'short_description' => 'Nourishing blend of 10 herbal extracts to strengthen hair roots and prevent hair fall.',
                'description' => 'Formulated with virgin coconut oil, gotukola, amla, and neem. Promotes thick, shiny, and strong hair growth with regular scalp massage.',
                'price' => 620.00,
                'sale_price' => 550.00,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Brightening Orange Facial Wash',
                'brand_id' => $ns->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'NS-SC-004',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/brightening facial wash -orange 1.png',
                'short_description' => 'Vitamin C rich orange facial wash for radiant, glowing, and smooth skin complexion.',
                'description' => 'Gentle exfoliating formula with natural citrus extract. Helps fade dark spots and uneven skin tone while refreshing your skin every morning.',
                'price' => 420.00,
                'sale_price' => 375.00,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Carrot Face Wash',
                'brand_id' => $ns->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'NS-SC-005',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/carrot face wash 1.png',
                'short_description' => 'Rich in Beta-Carotene and antioxidants for skin nourishment and anti-aging care.',
                'description' => 'Carrot extract protects skin against environmental pollutants and keeps it youthfully smooth, hydrated, and glowing.',
                'price' => 390.00,
                'sale_price' => 350.00,
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Niacinamide Glowing Serum',
                'brand_id' => $misumi->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'MS-SC-006',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/nicinamide-1.png',
                'short_description' => '10% Niacinamide + Zinc serum to minimize pores, control sebum, and balance skin tone.',
                'description' => 'Advanced dermatological serum that reduces blemishes, hyperpigmentation, and improves skin elasticity for a crystal-clear complexion.',
                'price' => 1250.00,
                'sale_price' => 1100.00,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Papaya Brightening Face Wash',
                'brand_id' => $ns->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'NS-SC-007',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/papaya face wash 1.png',
                'short_description' => 'Natural Papain enzymes gently exfoliate dead skin cells for smooth, bright skin.',
                'description' => 'Infused with organic papaya fruit extract. Helps smooth out rough skin texture and reveals your natural skin radiance.',
                'price' => 400.00,
                'sale_price' => 360.00,
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Peppermint Cooling Face Wash',
                'brand_id' => $ns->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'NS-SC-008',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/pepermint fce wash 1.png',
                'short_description' => 'Invigorating peppermint extract for oil control and instant skin cooling.',
                'description' => 'Ideal for active lifestyle and humid climate. Purifies pores, prevents acne, and leaves an intense fresh sensation.',
                'price' => 380.00,
                'sale_price' => 330.00,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Honey & Milk Nourishing Shampoo',
                'brand_id' => $ns->id,
                'category_id' => $hairCare->id,
                'sub_category_id' => $shampoo->id,
                'sku' => 'NS-HC-009',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/shampoo honey.png',
                'short_description' => 'Deep moisture shampoo enriched with wild honey and milk protein for dry hair.',
                'description' => 'Restores softness and elasticity to dry, damaged, or chemically treated hair. Protects hair shafts against split ends.',
                'price' => 480.00,
                'sale_price' => 420.00,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Vitamin C Radiance Serum',
                'brand_id' => $misumi->id,
                'category_id' => $skinCare->id,
                'sub_category_id' => $faceWash->id,
                'sku' => 'MS-SC-010',
                'image' => 'admin-assets/images/nbcimages/Brand Pics 2/vitamin c -1.png',
                'short_description' => 'Potent 15% Vitamin C concentrate for brightened tone and collagen support.',
                'description' => 'Formulated with stabilized L-Ascorbic Acid and Ferulic Acid. Fights free radicals, brightens sun spots, and boosts firm, youthful skin.',
                'price' => 1450.00,
                'sale_price' => 1290.00,
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'name' => 'Body Wash - Sakura Blossom',
                'brand_id' => $misumi->id,
                'category_id' => $bathBody->id,
                'sub_category_id' => $bodyWash->id,
                'sku' => 'MS-BB-011',
                'image' => 'uploads/products/1785907134_body-wash-sakura.png',
                'short_description' => 'Hydrating body wash with Japanese Cherry Blossom scent and rich silky lather.',
                'description' => 'Luxurious shower gel that leaves skin feeling soft, delicately scented, and thoroughly clean after every bath.',
                'price' => 680.00,
                'sale_price' => 590.00,
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'name' => 'Body Wash - Green Tea Detox',
                'brand_id' => $misumi->id,
                'category_id' => $bathBody->id,
                'sub_category_id' => $bodyWash->id,
                'sku' => 'MS-BB-012',
                'image' => 'uploads/products/1785907202_body-wash-green-tea.png',
                'short_description' => 'Antioxidant green tea body wash for fresh, healthy skin barrier protection.',
                'description' => 'Gently cleanses and detoxifies skin with natural green tea leaves extract and soothing Aloe Vera.',
                'price' => 680.00,
                'sale_price' => 590.00,
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
        ];

        foreach ($productsData as $data) {
            $slug = Str::slug($data['name']);
            $product = Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'brand_id' => $data['brand_id'],
                    'category_id' => $data['category_id'],
                    'sub_category_id' => $data['sub_category_id'],
                    'sku' => $data['sku'],
                    'image' => $data['image'],
                    'short_description' => $data['short_description'],
                    'description' => $data['description'],
                    'status' => true,
                    'is_best_seller' => $data['is_best_seller'],
                    'is_new_arrival' => $data['is_new_arrival'],
                ]
            );

            // Seed attribute values for pricing
            $attr = Attribute::firstOrCreate(['name' => 'Volume'], ['code' => 'volume']);
            $val = AttributeValue::firstOrCreate(
                ['attribute_id' => $attr->id, 'value' => '250ml']
            );

            $product->attributeValues()->syncWithoutDetaching([
                $val->id => [
                    'price_lkr' => $data['price'],
                    'sale_price_lkr' => $data['sale_price'],
                    'stock' => 50,
                    'sku' => $data['sku'] . '-250ML',
                ]
            ]);
        }
    }
}
