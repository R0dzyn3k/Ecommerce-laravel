<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Aeropress GO',
                'description' => 'Przenośny zaparzacz AeroPress GO, idealny na podróże i szybkie parzenie kawy.',
                'ean' => '085276001007',
                'sku' => 'APGO-01',
                'mpn' => 'APGO-001',
                'category_id' => 2,
                'brand_id' => 4,
                'price_gross' => 199.99,
                'discount_price' => null,
                'stock' => 50,
                'image' => 'aeropress-go.webp',
            ],
            [
                'title' => 'Zaparzacz do kawy AeroPress (85R11) - 2023',
                'description' => 'Nowa wersja AeroPress (85R11) - kompaktowy, szybki i wygodny sposób na aromatyczną kawę.',
                'ean' => '085276001021',
                'sku' => 'AP-2023',
                'mpn' => 'AP-85R11',
                'category_id' => 2,
                'brand_id' => 4,
                'price_gross' => 219.99,
                'discount_price' => 199.99,
                'stock' => 40,
                'image' => 'aeropress.webp',
            ],
            [
                'title' => 'Kawiarka Bialetti Moka Express 3 filiżanki - Czerwona',
                'description' => 'Klasyczna włoska kawiarka Bialetti Moka Express w wersji na 3 filiżanki - czerwony kolor.',
                'ean' => '8006363011639',
                'sku' => 'MOKA-3RED',
                'mpn' => 'BIA-3-RED',
                'category_id' => 3,
                'brand_id' => 1,
                'price_gross' => 149.99,
                'discount_price' => 129.99,
                'stock' => 30,
                'image' => 'baretti-red.webp',
            ],
            [
                'title' => 'Kawiarka Bialetti Moka Express 9 filiżanek',
                'description' => 'Duża kawiarka Bialetti Moka Express do przygotowania 9 filiżanek aromatycznej kawy.',
                'ean' => '8006363011769',
                'sku' => 'MOKA-9',
                'mpn' => 'BIA-9',
                'category_id' => 3,
                'brand_id' => 1,
                'price_gross' => 249.99,
                'discount_price' => null,
                'stock' => 20,
                'image' => 'baretti.webp',
            ],
            [
                'title' => 'Hario V60-02 Drip Set',
                'description' => 'Zestaw do ręcznego parzenia kawy metodą przelewową Hario V60-02 - klasyczna jakość.',
                'ean' => '4977642727641',
                'sku' => 'V60-SET',
                'mpn' => 'HARIO-V60',
                'category_id' => 1,
                'brand_id' => 3,
                'price_gross' => 129.99,
                'discount_price' => null,
                'stock' => 35,
                'image' => 'hario-v60.webp',
            ],
            [
                'title' => 'Chemex Classic Coffee Maker - 10 filiżanek',
                'description' => 'Elegancki zaparzacz Chemex Classic Coffee Maker o pojemności na 10 filiżanek kawy.',
                'ean' => '028068001082',
                'sku' => 'CHEMEX-10',
                'mpn' => 'CHEMEX-10CUP',
                'category_id' => 4,
                'brand_id' => 5,
                'price_gross' => 299.99,
                'discount_price' => 279.99,
                'stock' => 15,
                'image' => 'chemex.webp',
            ],
            [
                'title' => 'Ekspres DeLonghi Dedica EC685',
                'description' => 'Ekspres ciśnieniowy DeLonghi Dedica EC685 - profesjonalne espresso w domu.',
                'ean' => '8004399331181',
                'sku' => 'DEDICA-EC685',
                'mpn' => 'DL-EC685',
                'category_id' => 5,
                'brand_id' => 8,
                'price_gross' => 799.99,
                'discount_price' => 749.99,
                'stock' => 25,
                'image' => 'delonghi.webp',
            ],
            [
                'title' => 'Lavazza Qualità Oro - kawa ziarnista 1kg',
                'description' => 'Włoska kawa ziarnista Lavazza Qualità Oro - mieszanka o intensywnym smaku i aromacie.',
                'ean' => '8000070021006',
                'sku' => 'LAVAZZA-ORO',
                'mpn' => 'LAV-1KG-ORO',
                'category_id' => 7,
                'brand_id' => 6,
                'price_gross' => 89.99,
                'discount_price' => null,
                'stock' => 60,
                'image' => 'lavazza.webp',
            ],
            [
                'title' => 'Illy Espresso - kawa mielona 250g',
                'description' => 'Kawa mielona Illy Espresso w puszce - idealna do espresso i kaw mlecznych.',
                'ean' => '8003753911762',
                'sku' => 'ILLY-250G',
                'mpn' => 'ILLY-M-GROUND',
                'category_id' => 6,
                'brand_id' => 7,
                'price_gross' => 34.99,
                'discount_price' => 29.99,
                'stock' => 50,
                'image' => 'Illy.webp',
            ],
            [
                'title' => 'Hario Skerton Plus - młynek do kawy',
                'description' => 'Ręczny młynek do kawy Hario Skerton Plus z ceramicznymi żarnami.',
                'ean' => '4977642707810',
                'sku' => 'HARIO-SKERTON',
                'mpn' => 'SKERTON-PLUS',
                'category_id' => 8,
                'brand_id' => 3,
                'price_gross' => 179.99,
                'discount_price' => 159.99,
                'stock' => 20,
                'image' => 'HarioSkerton.webp',
            ],
            [
                'title' => 'Kawiarka Bialetti Venus 6 filiżanek',
                'description' => 'Elegancka stalowa kawiarka Bialetti Venus, idealna do parzenia 6 filiżanek kawy.',
                'ean' => '8006363028927',
                'sku' => 'BIA-6VENUS',
                'mpn' => 'VENUS-6CUP',
                'category_id' => 3,
                'brand_id' => 1,
                'price_gross' => 169.99,
                'discount_price' => null,
                'stock' => 25,
                'image' => 'baretti-black.webp',
            ],
            [
                'title' => 'Melitta Caffeo Solo - ekspres automatyczny',
                'description' => 'Kompaktowy automatyczny ekspres ciśnieniowy Melitta Caffeo Solo.',
                'ean' => '4006508217503',
                'sku' => 'MELITTA-SOLO',
                'mpn' => 'CAFEO-SOLO',
                'category_id' => 5,
                'brand_id' => 10,
                'price_gross' => 1399.99,
                'discount_price' => 1299.99,
                'stock' => 10,
                'image' => 'Melitta.webp',
            ],
            [
                'title' => 'Kawa mielona Lavazza Crema e Gusto 250g',
                'description' => 'Mocna, aromatyczna kawa mielona Lavazza Crema e Gusto w puszce.',
                'ean' => '8000070021001',
                'sku' => 'LAV-CREMA',
                'mpn' => 'LAV-CG-250G',
                'category_id' => 6,
                'brand_id' => 6,
                'price_gross' => 24.99,
                'discount_price' => null,
                'stock' => 100,
                'image' => 'LavazzaCrema.webp',
            ],
            [
                'title' => 'Kawa ziarnista Illy Espresso 1kg',
                'description' => 'Mieszanka 100% Arabica o bogatym smaku, idealna do espresso i cappuccino.',
                'ean' => '8003753911763',
                'sku' => 'ILLY-1KG',
                'mpn' => 'ILLY-ESP-1KG',
                'category_id' => 7,
                'brand_id' => 7,
                'price_gross' => 99.99,
                'discount_price' => 89.99,
                'stock' => 40,
                'image' => 'IllyEspresso.webp',
            ],
            [
                'title' => 'Zestaw filtrów Chemex (100 szt.)',
                'description' => 'Specjalne papierowe filtry Chemex, które zapewniają klarowność kawy.',
                'ean' => '028068001104',
                'sku' => 'CHEMEX-FILTER',
                'mpn' => 'CH-FILTER-100',
                'category_id' => 8,
                'brand_id' => 5,
                'price_gross' => 49.99,
                'discount_price' => 44.99,
                'stock' => 60,
                'image' => 'Chemex-filtry.webp',
            ],
            [
                'title' => 'Tamper do kawy 58mm - stal nierdzewna',
                'description' => 'Profesjonalny tamper do kawy wykonany ze stali nierdzewnej.',
                'ean' => '5901234567890',
                'sku' => 'TAMPER-58',
                'mpn' => 'TAMP-SS-58',
                'category_id' => 8,
                'brand_id' => 8,
                'price_gross' => 89.99,
                'discount_price' => 79.99,
                'stock' => 30,
                'image' => 'Tamper.webp',
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'ean' => $productData['ean'],
                'sku' => $productData['sku'],
                'mpn' => $productData['mpn'],
                'category_id' => $productData['category_id'],
                'brand_id' => $productData['brand_id'],
                'tax_id' => 4,
                'price_gross' => $productData['price_gross'],
                'discount_price' => $productData['discount_price'],
                'stock' => $productData['stock'],
                'is_active' => true,
            ]);

            if (! isset($productData['image'])) {
                continue;
            }

            if (File::exists(public_path('images/products/' . $productData['image']))) {
                $product->addMedia(public_path('images/products/' . $productData['image']))
                    ->preservingOriginal()
                    ->toMediaCollection('product_photo');
            }
        }
    }
}
