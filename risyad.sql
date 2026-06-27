-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for indonesian_cocoa
CREATE DATABASE IF NOT EXISTS `indonesian_cocoa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `indonesian_cocoa`;

-- Dumping data for table indonesian_cocoa.articles: ~2 rows (approximately)
INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `published_at`, `is_published`, `created_at`, `updated_at`) VALUES
	(1, 'Indonesia Jadi Produsen Kakao Terbesar Ketiga Dunia', 'indonesia-produsen-kakao-terbesar-ketiga', 'Indonesia menempati posisi ketiga sebagai produsen kakao terbesar di dunia setelah Pantai Gading dan Ghana, dengan potensi ekspor yang terus meningkat.', '<p>Indonesia telah membuktikan diri sebagai salah satu pemain utama dalam industri kakao global. Dengan luas perkebunan kakao yang mencapai jutaan hektar, negara ini mampu memproduksi ratusan ribu ton biji kakao setiap tahunnya.</p>\n                <p>Kualitas biji kakao Indonesia diakui oleh pasar internasional karena cita rasa yang unik dan kandungan flavonoid yang tinggi. Pemerintah terus mendorong peningkatan kualitas melalui program fermentasi yang lebih baik dan pelatihan bagi petani.</p>\n                <p>Sebagai perusahaan supplier kakao terkemuka, Indonesian Cocoa berkomitmen untuk memperoleh biji kakao dari petani lokal yang menerapkan praktik pertanian berkelanjutan.</p>', 'images/indonesia-produsen-kakao-terbesar-ketiga.webp', 'Tim Indonesian Cocoa', '2026-06-21 08:45:10', 1, '2026-04-25 23:26:56', '2026-06-26 08:45:10'),
	(2, 'Manfaat Cocoa Butter untuk Kesehatan Kulit dan Kosmetik', 'manfaat-cocoa-butter-kulit-kosmetik', 'Cocoa butter mengandung antioksidan tinggi dan asam lemak yang bermanfaat untuk melembapkan kulit, mengurangi stretch mark, dan bahan dasar kosmetik premium.', '<p>Cocoa butter telah digunakan selama berabad-abad sebagai bahan perawatan kulit alami. Kandungan asam lemaknya membantu membentuk lapisan pelindung pada kulit yang menjaga kelembapan.</p>\n                <p>Penelitian menunjukkan bahwa cocoa butter kaya akan polifenol, sejenis antioksidan yang membantu melawan kerusakan akibat radikal bebas. Ini menjadikannya bahan ideal untuk produk anti-aging.</p>\n                <p>Indonesian Cocoa memasok cocoa butter murni dengan standar kosmetik grade yang digunakan oleh berbagai brand kecantikan ternama di dunia.</p>', 'images/manfaat-cocoa-butter-kulit-kosmetik.jpg', 'R&D Department', '2026-06-14 08:45:10', 1, '2026-04-25 23:26:56', '2026-06-26 08:45:10'),
	(3, 'Teknik Fermentasi Biji Kakao untuk Hasil Premium', 'teknik-fermentasi-biji-kakao-premium', 'Fermentasi adalah kunci utama dalam pembentukan flavor kakao. Pelajari teknik fermentasi yang benar untuk menghasilkan biji kakao berkualitas ekspor.', '<p>Proses fermentasi biji kakao memerlukan perhatian khusus terhadap suhu, durasi, dan aerasi. Fermentasi yang optimal biasanya berlangsung selama 5-7 hari dengan suhu 45-50°C.</p>\n                <p>Selama fermentasi, terjadi reaksi biokimia yang mengubah senyawa pahit menjadi senyawa flavor yang kompleks. Biji kakao yang difermentasi dengan baik akan menghasilkan coklat dengan aroma bunga dan buah yang khas.</p>\n                <p>Indonesian Cocoa bekerja sama dengan 500+ petani untuk memastikan setiap biji kakao melalui proses fermentasi standar internasional sebelum diproses lebih lanjut.</p>', 'images/teknik-fermentasi-biji-kakao-premium.jpg', 'Quality Control Team', '2026-06-06 08:45:10', 1, '2026-04-25 23:26:56', '2026-06-26 08:45:10');

-- Dumping data for table indonesian_cocoa.cache: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.cache_locks: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.company_profiles: ~0 rows (approximately)
INSERT INTO `company_profiles` (`id`, `title`, `slug`, `excerpt`, `content`, `vision`, `mission`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Profil Perusahaan Indonesian Cocoa', 'profil-perusahaan', 'Indonesian Cocoa adalah supplier kakao premium Indonesia yang menekankan kualitas, keberlanjutan, dan hubungan jangka panjang dengan pelanggan global.', '<p>Indonesian Cocoa didirikan untuk mempertemukan petani kakao lokal dengan pasar internasional. Kami fokus pada kualitas biji kakao premium, proses produksi yang bersih, dan pengiriman yang andal.</p><p>Melalui dukungan pada praktik pertanian berkelanjutan dan pelatihan petani, kami menjaga kesinambungan pasokan dan nilai produk untuk pelanggan global.</p>', 'Menjadi supplier kakao premium Indonesia yang diakui global.', 'Mendukung petani lokal, menjaga standar kualitas ekspor, dan menyediakan produk kakao yang handal.', NULL, 1, '2026-06-26 08:41:46', '2026-06-26 08:45:10');

-- Dumping data for table indonesian_cocoa.failed_jobs: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.jobs: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.job_batches: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_04_26_054220_create_products_table', 1),
	(5, '2026_04_26_054306_create_articles_table', 1),
	(6, '2026_06_26_000001_create_company_profiles_table', 2);

-- Dumping data for table indonesian_cocoa.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table indonesian_cocoa.products: ~9 rows (approximately)
INSERT INTO `products` (`id`, `name`, `category`, `description`, `specification`, `image`, `is_featured`, `created_at`, `updated_at`) VALUES
	(1, 'Cocoa Powder', 'Cocoa Powder', 'Bubuk kakao premium berkualitas ekspor dengan warna coklat alami, aroma khas, dan tekstur halus. Cocok untuk industri makanan, minuman, dan bakery.', 'Fat Content: 10-12%\nMoisture: Max 5%\nColor: Brown to Dark Brown\npH: 5.0-5.8\nFineness: 99% min through 200 mesh', 'images/cocoa-powder.webp', 1, '2026-04-25 23:26:56', '2026-04-25 23:26:56'),
	(2, 'Cocoa Butter', 'Cocoa Butter', 'Mentega kakao murni hasil pemrosesan biji kakao pilihan Indonesia. Memberikan tekstur lembut dan aroma coklat alami untuk kosmetik dan coklat premium.', 'Free Fatty Acid: Max 1.75%\nIodine Value: 33-42\nMelting Point: 31-35°C\nColor: Pale Yellow to Golden Yellow\nFlavor: Pure Cocoa Aroma', 'images/cocoa-butter.webp', 1, '2026-04-25 23:26:56', '2026-04-25 23:26:56'),
	(3, 'Cocoa Liquor', 'Cocoa Liquor', 'Cocoa liquor atau cocoa mass murni dari biji kakao Indonesia terbaik. Produk dasar utama untuk manufaktur coklat berkualitas tinggi.', 'Cocoa Butter Content: 52-54%\nMoisture: Max 2%\nParticle Size: 20-25 microns\nFlavor: Strong Cocoa\nPackaging: 25kg carton box', 'images/cocoa-liquor.webp', 1, '2026-04-25 23:26:56', '2026-04-25 23:26:56');

-- Dumping data for table indonesian_cocoa.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('4fjqWXI4mlBwvzlmMrE0Wos6gT8ioAagXCtxUKlu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.125.1 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36', 'eyJfdG9rZW4iOiJSV0N6OWRDY0hjZWpWNTFEMkJUZmhVUEtiQmY3NWVVcEZab3JPcUt5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1782484812),
	('gTAMByVM4tC7mqGa1pEiaaV1zvTi5bYAaia3bmOc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJTeWJSdnAxQURKZklaVUxjbXVTcW9vMkNGb1JNWGdjV051SXFuMkpZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pbiIsInJvdXRlIjoiYWRtaW4uZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiYWRtaW5faWQiOjEsImFkbWluX25hbWUiOiJBZG1pbmlzdHJhdG9yIn0=', 1782521710),
	('YiTXrreVw7xDwCJZl4QhRRYbYfXmlgaMSImKL7fQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJpSG1xTzg1dTZnUG44RlZyQUtHdWt6RWNJWFdtMnlvU2FuVk9SNzQwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvYXJ0aWNsZXNcLzJcL2VkaXQiLCJyb3V0ZSI6ImFkbWluLmFydGljbGVzLmVkaXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJhZG1pbl9pZCI6MSwiYWRtaW5fbmFtZSI6IkFkbWluaXN0cmF0b3IifQ==', 1782491191);

-- Dumping data for table indonesian_cocoa.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@example.com', NULL, '$2y$12$MRRhnvslThcnNSL0SeoqC.YBCbrdA7SUYN.v1UDbHlanrKnz/PLWO', NULL, NULL, '2026-06-26 08:45:10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
