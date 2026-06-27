<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::updateOrCreate(
            ['slug' => 'profil-perusahaan'],
            [
                'title' => 'Profil Perusahaan Indonesian Cocoa',
                'excerpt' => 'Indonesian Cocoa adalah supplier kakao premium Indonesia yang menekankan kualitas, keberlanjutan, dan hubungan jangka panjang dengan pelanggan global.',
                'content' => '<p>Indonesian Cocoa didirikan untuk mempertemukan petani kakao lokal dengan pasar internasional. Kami fokus pada kualitas biji kakao premium, proses produksi yang bersih, dan pengiriman yang andal.</p><p>Melalui dukungan pada praktik pertanian berkelanjutan dan pelatihan petani, kami menjaga kesinambungan pasokan dan nilai produk untuk pelanggan global.</p>',
                'vision' => 'Menjadi supplier kakao premium Indonesia yang diakui global.',
                'mission' => 'Mendukung petani lokal, menjaga standar kualitas ekspor, dan menyediakan produk kakao yang handal.',
                'is_active' => true,
            ]
        );
    }
}
