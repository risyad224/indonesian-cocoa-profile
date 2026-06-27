<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Cocoa Powder',
                'category' => 'Cocoa Powder',
                'description' => 'Bubuk kakao premium berkualitas ekspor dengan warna coklat alami, aroma khas, dan tekstur halus. Cocok untuk industri makanan, minuman, dan bakery.',
                'specification' => "Fat Content: 10-12%\nMoisture: Max 5%\nColor: Brown to Dark Brown\npH: 5.0-5.8\nFineness: 99% min through 200 mesh",
                'image' => 'images/cocoa-powder.webp',
                'is_featured' => true,
            ],
            [
                'name' => 'Cocoa Butter',
                'category' => 'Cocoa Butter',
                'description' => 'Mentega kakao murni hasil pemrosesan biji kakao pilihan Indonesia. Memberikan tekstur lembut dan aroma coklat alami untuk kosmetik dan coklat premium.',
                'specification' => "Free Fatty Acid: Max 1.75%\nIodine Value: 33-42\nMelting Point: 31-35°C\nColor: Pale Yellow to Golden Yellow\nFlavor: Pure Cocoa Aroma",
                'image' => 'images/cocoa-butter.webp',
                'is_featured' => true,
            ],
            [
                'name' => 'Cocoa Liquor',
                'category' => 'Cocoa Liquor',
                'description' => 'Cocoa liquor atau cocoa mass murni dari biji kakao Indonesia terbaik. Produk dasar utama untuk manufaktur coklat berkualitas tinggi.',
                'specification' => "Cocoa Butter Content: 52-54%\nMoisture: Max 2%\nParticle Size: 20-25 microns\nFlavor: Strong Cocoa\nPackaging: 25kg carton box",
                'image' => 'images/cocoa-liquor.webp',
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}