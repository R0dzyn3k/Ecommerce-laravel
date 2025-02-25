<?php

namespace Database\Seeders;


use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Nowości w świecie kawy',
                'content' => '
                    <p>Świat kawy nieustannie się zmienia, a producenci wprowadzają nowe technologie, które poprawiają smak i jakość napojów.</p>
                    <h2 class="text-xl font-semibold mt-4">1. Nowe trendy w parzeniu kawy</h2>
                    <p>Eksperci przewidują, że w najbliższym czasie popularność zyskają nowe metody parzenia kawy, takie jak Cold Brew Nitro czy ekspresy ciśnieniowe z AI.</p>
                    <h2 class="text-xl font-semibold mt-4">2. Najlepsze ziarna na 2025 rok</h2>
                    <p>Coraz więcej palarni stawia na kawy specialty, które wyróżniają się unikalnym profilem smakowym.</p>',
                'image' => 'art1.webp',
            ],
            [
                'title' => 'Porady baristyczne',
                'content' => '
                    <p>Jak przygotować idealne espresso? Poznaj wskazówki, które pomogą Ci osiągnąć doskonały smak i aromat kawy.</p>
                    <h2 class="text-xl font-semibold mt-4">1. Wybór odpowiednich ziaren</h2>
                    <p>Najlepsze espresso uzyskasz, używając świeżo mielonych ziaren wysokiej jakości.</p>
                    <h2 class="text-xl font-semibold mt-4">2. Poprawne tamperowanie</h2>
                    <p>Kluczowym krokiem w parzeniu espresso jest równomierne ubicie kawy w kolbie – to wpływa na ekstrakcję.</p>',
                'image' => 'art2.webp',
            ],
            [
                'title' => 'Recenzje produktów',
                'content' => '
                    <p>Testujemy najnowsze akcesoria do kawy. Sprawdź, które urządzenia warto kupić w 2025 roku!</p>
                    <h2 class="text-xl font-semibold mt-4">1. Ekspresy ciśnieniowe</h2>
                    <p>Porównujemy najnowsze modele ekspresów DeLonghi, Jura i Sage.</p>
                    <h2 class="text-xl font-semibold mt-4">2. Alternatywne metody parzenia</h2>
                    <p>Testujemy Hario V60, Chemex i Aeropress – sprawdź, która metoda najlepiej wydobywa aromaty z ziaren.</p>',
                'image' => 'art3.webp',
            ],
        ];

        foreach ($blogs as $blogData) {
            $blog = Blog::create([
                'title' => $blogData['title'],
                'content' => $blogData['content'],
            ]);

            if (File::exists(public_path('images/' . $blogData['image']))) {
                $blog->addMedia(public_path('images/' . $blogData['image']))
                    ->preservingOriginal()
                    ->toMediaCollection('blog_photo');
            }
        }
    }
}
