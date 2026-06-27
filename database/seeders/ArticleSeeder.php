<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Indonesia Jadi Produsen Kakao Terbesar Ketiga Dunia',
                'slug' => 'indonesia-produsen-kakao-terbesar-ketiga',
                'excerpt' => 'Indonesia menempati posisi ketiga sebagai produsen kakao terbesar di dunia setelah Pantai Gading dan Ghana, dengan potensi ekspor yang terus meningkat.',
                'content' => '<p>Indonesia telah membuktikan diri sebagai salah satu pemain utama dalam industri kakao global. Dengan luas perkebunan kakao yang mencapai jutaan hektar, negara ini mampu memproduksi ratusan ribu ton biji kakao setiap tahunnya.</p>
                <p>Kualitas biji kakao Indonesia diakui oleh pasar internasional karena cita rasa yang unik dan kandungan flavonoid yang tinggi. Pemerintah terus mendorong peningkatan kualitas melalui program fermentasi yang lebih baik dan pelatihan bagi petani.</p>
                <p>Sebagai perusahaan supplier kakao terkemuka, Indonesian Cocoa berkomitmen untuk memperoleh biji kakao dari petani lokal yang menerapkan praktik pertanian berkelanjutan.</p>',
                'image' => 'images/indonesia-produsen-kakao-terbesar-ketiga.webp',
                'author' => 'Tim Indonesian Cocoa',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],
            [
                'title' => 'Manfaat Cocoa Butter untuk Kesehatan Kulit dan Kosmetik',
                'slug' => 'manfaat-cocoa-butter-kulit-kosmetik',
                'excerpt' => 'Cocoa butter mengandung antioksidan tinggi dan asam lemak yang bermanfaat untuk melembapkan kulit, mengurangi stretch mark, dan bahan dasar kosmetik premium.',
                'content' => '<p>Cocoa butter telah digunakan selama berabad-abad sebagai bahan perawatan kulit alami. Kandungan asam lemaknya membantu membentuk lapisan pelindung pada kulit yang menjaga kelembapan.</p>
                <p>Penelitian menunjukkan bahwa cocoa butter kaya akan polifenol, sejenis antioksidan yang membantu melawan kerusakan akibat radikal bebas. Ini menjadikannya bahan ideal untuk produk anti-aging.</p>
                <p>Indonesian Cocoa memasok cocoa butter murni dengan standar kosmetik grade yang digunakan oleh berbagai brand kecantikan ternama di dunia.</p>',
                'image' => 'images/manfaat-cocoa-butter-kulit-kosmetik.jpg',
                'author' => 'R&D Department',
                'published_at' => now()->subDays(12),
                'is_published' => true,
            ],
            [
                'title' => 'Teknik Fermentasi Biji Kakao untuk Hasil Premium',
                'slug' => 'teknik-fermentasi-biji-kakao-premium',
                'excerpt' => 'Fermentasi adalah kunci utama dalam pembentukan flavor kakao. Pelajari teknik fermentasi yang benar untuk menghasilkan biji kakao berkualitas ekspor.',
                'content' => '<p>Proses fermentasi biji kakao memerlukan perhatian khusus terhadap suhu, durasi, dan aerasi. Fermentasi yang optimal biasanya berlangsung selama 5-7 hari dengan suhu 45-50°C.</p>
                <p>Selama fermentasi, terjadi reaksi biokimia yang mengubah senyawa pahit menjadi senyawa flavor yang kompleks. Biji kakao yang difermentasi dengan baik akan menghasilkan coklat dengan aroma bunga dan buah yang khas.</p>
                <p>Indonesian Cocoa bekerja sama dengan 500+ petani untuk memastikan setiap biji kakao melalui proses fermentasi standar internasional sebelum diproses lebih lanjut.</p>',
                'image' => 'images/teknik-fermentasi-biji-kakao-premium.jpg',
                'author' => 'Quality Control Team',
                'published_at' => now()->subDays(20),
                'is_published' => true,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}