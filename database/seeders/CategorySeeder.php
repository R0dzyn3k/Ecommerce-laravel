<?php

namespace Database\Seeders;


use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Drippery',
                'description' => 'Drippery to urządzenia do ręcznego zaparzania kawy metodą przelewową, które pozwalają uzyskać pełny smak i aromat kawy.',
                'is_active' => true,
            ],
            [
                'title' => 'AeroPress',
                'description' => 'AeroPress to nowoczesne urządzenie do szybkiego i łatwego parzenia kawy o bogatym smaku i niskiej kwasowości.',
                'is_active' => true,
            ],
            [
                'title' => 'Kawiarki',
                'description' => 'Kawiarki, znane również jako Moka pot, to klasyczne urządzenia do zaparzania kawy w stylu włoskim.',
                'is_active' => true,
            ],
            [
                'title' => 'Chemex',
                'description' => 'Chemex to elegancki zaparzacz do kawy, który pozwala na uzyskanie wyjątkowo czystego smaku naparu dzięki filtrowi papierowemu.',
                'is_active' => true,
            ],
            [
                'title' => 'Ekspresy ciśnieniowe',
                'description' => 'Ekspresy ciśnieniowe pozwalają na przygotowanie espresso i kaw mlecznych o doskonałej jakości.',
                'is_active' => true,
            ],
            [
                'title' => 'Kawy mielone',
                'description' => 'Kawy mielone to wygodne rozwiązanie dla miłośników kawy, którzy chcą cieszyć się smakiem świeżo mielonej kawy bez młynka.',
                'is_active' => true,
            ],
            [
                'title' => 'Kawy ziarniste',
                'description' => 'Kawy ziarniste to najlepszy wybór dla osób ceniących sobie świeżo mieloną kawę i pełnię smaku.',
                'is_active' => true,
            ],
            [
                'title' => 'Akcesoria do kawy',
                'description' => 'Wszystko, czego potrzebujesz do przygotowania i podania kawy – od tamperów po filtry papierowe.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'title' => $category['title'],
                'description' => $category['description'],
                'is_active' => $category['is_active'],
            ]);
        }
    }
}
