<?php

namespace Database\Seeders;


use App\Models\Brand;
use Illuminate\Database\Seeder;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'title' => 'Bialetti',
                'description' => 'Włoska marka znana z produkcji klasycznych kawiarek Moka Express, które stały się ikoną włoskiej kawy.',
                'is_active' => true,
            ],
            [
                'title' => 'Moka',
                'description' => 'Marka specjalizująca się w produkcji ekspresów ciśnieniowych i kawiarek do domowego użytku.',
                'is_active' => true,
            ],
            [
                'title' => 'Hario',
                'description' => 'Japońska firma produkująca wysokiej jakości sprzęt do parzenia kawy, w tym słynne drippery V60.',
                'is_active' => true,
            ],
            [
                'title' => 'AeroPress',
                'description' => 'Marka, która zrewolucjonizowała świat kawy dzięki swojemu unikalnemu urządzeniu do parzenia.',
                'is_active' => true,
            ],
            [
                'title' => 'Chemex',
                'description' => 'Producent eleganckich szklanych zaparzaczy do kawy, które łączą design z funkcjonalnością.',
                'is_active' => true,
            ],
            [
                'title' => 'Lavazza',
                'description' => 'Jedna z najbardziej rozpoznawalnych marek kawy na świecie, oferująca zarówno ziarna, jak i gotowe mieszanki.',
                'is_active' => true,
            ],
            [
                'title' => 'Illy',
                'description' => 'Luksusowa włoska marka kawy premium, znana z jakości i innowacyjnych technologii parzenia.',
                'is_active' => true,
            ],
            [
                'title' => 'DeLonghi',
                'description' => 'Producent ekspresów ciśnieniowych, młynków i innych urządzeń do przygotowywania kawy.',
                'is_active' => true,
            ],
            [
                'title' => 'Nespresso',
                'description' => 'Marka kapsułkowych ekspresów do kawy, oferująca szeroką gamę smaków i intensywności.',
                'is_active' => true,
            ],
            [
                'title' => 'Jura',
                'description' => 'Szwajcarska firma produkująca ekspresy do kawy najwyższej jakości, znana z nowoczesnego designu.',
                'is_active' => true,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'title' => $brand['title'],
                'description' => $brand['description'],
                'is_active' => $brand['is_active'],
            ]);
        }
    }
}
