-- --------------------------------------------------------
-- Host:                         E:\laragon\www\desa-karangpucung\database\database.sqlite
-- Server version:               3.39.0
-- Server OS:                    
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for database
CREATE DATABASE IF NOT EXISTS "database";
;

-- Dumping structure for table database.adm_penduduk
CREATE TABLE IF NOT EXISTS "adm_penduduk" ("id" integer primary key autoincrement not null, "penduduk" integer, "kepala_keluarga" integer, "laki_laki" integer, "perempuan" integer, "penduduk_sementara" integer, "mutasi_penduduk" integer, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.adm_penduduk: 0 rows
/*!40000 ALTER TABLE "adm_penduduk" DISABLE KEYS */;
INSERT INTO "adm_penduduk" ("id", "penduduk", "kepala_keluarga", "laki_laki", "perempuan", "penduduk_sementara", "mutasi_penduduk", "created_at", "updated_at") VALUES
	(1, '6971', '2687', '3534', '3437', NULL, NULL, '2025-01-17 12:32:17', '2025-01-17 12:32:17');
/*!40000 ALTER TABLE "adm_penduduk" ENABLE KEYS */;

-- Dumping structure for table database.cache
CREATE TABLE IF NOT EXISTS "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

-- Dumping data for table database.cache: -1 rows
/*!40000 ALTER TABLE "cache" DISABLE KEYS */;
/*!40000 ALTER TABLE "cache" ENABLE KEYS */;

-- Dumping structure for table database.cache_locks
CREATE TABLE IF NOT EXISTS "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));

-- Dumping data for table database.cache_locks: -1 rows
/*!40000 ALTER TABLE "cache_locks" DISABLE KEYS */;
/*!40000 ALTER TABLE "cache_locks" ENABLE KEYS */;

-- Dumping structure for table database.carausels
CREATE TABLE IF NOT EXISTS "carausels" ("id" integer primary key autoincrement not null, "img" varchar not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.carausels: -1 rows
/*!40000 ALTER TABLE "carausels" DISABLE KEYS */;
INSERT INTO "carausels" ("id", "img", "created_at", "updated_at") VALUES
	(1, 'storage/carausel/1736501518_cc7f94b58fedd0c53513c44a24abd1e7.jpg', '2025-01-10 09:31:58', '2025-01-10 09:31:58'),
	(2, 'storage/carausel/1736501527_30076.jpg', '2025-01-10 09:32:07', '2025-01-10 09:32:07'),
	(3, 'storage/carausel/1736501535_3598837.jpg', '2025-01-10 09:32:15', '2025-01-10 09:32:15');
/*!40000 ALTER TABLE "carausels" ENABLE KEYS */;

-- Dumping structure for table database.categories
CREATE TABLE IF NOT EXISTS "categories" ("id" integer primary key autoincrement not null, "name" varchar not null, "slug" varchar not null, "img" varchar, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.categories: -1 rows
/*!40000 ALTER TABLE "categories" DISABLE KEYS */;
/*!40000 ALTER TABLE "categories" ENABLE KEYS */;

-- Dumping structure for table database.failed_jobs
CREATE TABLE IF NOT EXISTS "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" text not null, "queue" text not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);

-- Dumping data for table database.failed_jobs: -1 rows
/*!40000 ALTER TABLE "failed_jobs" DISABLE KEYS */;
/*!40000 ALTER TABLE "failed_jobs" ENABLE KEYS */;

-- Dumping structure for table database.icons
CREATE TABLE IF NOT EXISTS "icons" ("id" integer primary key autoincrement not null, "img" varchar, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.icons: 1 rows
/*!40000 ALTER TABLE "icons" DISABLE KEYS */;
INSERT INTO "icons" ("id", "img", "created_at", "updated_at") VALUES
	(1, 'icon/1737117464_logo-cilacap.png', '2025-01-08 17:19:28', '2025-01-17 12:37:44');
/*!40000 ALTER TABLE "icons" ENABLE KEYS */;

-- Dumping structure for table database.jobs
CREATE TABLE IF NOT EXISTS "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);

-- Dumping data for table database.jobs: -1 rows
/*!40000 ALTER TABLE "jobs" DISABLE KEYS */;
/*!40000 ALTER TABLE "jobs" ENABLE KEYS */;

-- Dumping structure for table database.job_batches
CREATE TABLE IF NOT EXISTS "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));

-- Dumping data for table database.job_batches: -1 rows
/*!40000 ALTER TABLE "job_batches" DISABLE KEYS */;
/*!40000 ALTER TABLE "job_batches" ENABLE KEYS */;

-- Dumping structure for table database.kontak_desa
CREATE TABLE IF NOT EXISTS "kontak_desa" ("id" integer primary key autoincrement not null, "no_telp" varchar not null, "email" varchar not null, "waktu" varchar not null, "alamat" text not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.kontak_desa: -1 rows
/*!40000 ALTER TABLE "kontak_desa" DISABLE KEYS */;
INSERT INTO "kontak_desa" ("id", "no_telp", "email", "waktu", "alamat", "created_at", "updated_at") VALUES
	(1, 'xxxxx', 'admin@admin.com', 'Senin - Kamis (08.00 - 15.00) & Jum''at (08.00 - 11.00)', 'Jl. Pramuka No.09 Dusun Karangpucung', '2025-01-08 22:44:49', '2025-01-08 22:52:09');
/*!40000 ALTER TABLE "kontak_desa" ENABLE KEYS */;

-- Dumping structure for table database.media_sosial
CREATE TABLE IF NOT EXISTS "media_sosial" ("id" integer primary key autoincrement not null, "svg" varchar not null, "name" varchar not null, "url" varchar, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.media_sosial: -1 rows
/*!40000 ALTER TABLE "media_sosial" DISABLE KEYS */;
INSERT INTO "media_sosial" ("id", "svg", "name", "url", "created_at", "updated_at") VALUES
	(1, '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook text-primary" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>', 'Facebook', 'https://www.facebook.com/', '2025-01-09 00:28:46', '2025-01-09 00:28:46'),
	(2, '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram text-danger" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334', 'Instagram', '', '2025-01-09 00:30:00', '2025-01-09 00:30:00'),
	(3, '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter-x text-dark" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z', 'Twitter', '', '2025-01-09 00:32:00', '2025-01-09 00:32:00'),
	(4, '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-youtube text-danger" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z', 'YouTube', '', '2025-01-09 00:34:00', '2025-01-09 00:34:00');
/*!40000 ALTER TABLE "media_sosial" ENABLE KEYS */;

-- Dumping structure for table database.migrations
CREATE TABLE IF NOT EXISTS "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

-- Dumping data for table database.migrations: -1 rows
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO "migrations" ("id", "migration", "batch") VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_01_07_113313_create_posts_table', 1),
	(5, '2025_01_08_160321_create_icons_table', 1),
	(6, '2025_01_08_224100_create_kontak_desa_table', 1),
	(7, '2025_01_09_001901_create_media_sosial_table', 1),
	(8, '2025_01_09_042315_create_carausels_table', 1),
	(9, '2025_01_09_131333_create_sambutans_table', 1),
	(10, '2025_01_10_000555_create_adm_penduduk_table', 1),
	(11, '2025_01_11_145815_create_potensis_table', 1),
	(12, '2025_01_11_145857_create_categories_table', 1);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;

-- Dumping structure for table database.password_reset_tokens
CREATE TABLE IF NOT EXISTS "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));

-- Dumping data for table database.password_reset_tokens: -1 rows
/*!40000 ALTER TABLE "password_reset_tokens" DISABLE KEYS */;
/*!40000 ALTER TABLE "password_reset_tokens" ENABLE KEYS */;

-- Dumping structure for table database.posts
CREATE TABLE IF NOT EXISTS "posts" ("id" integer primary key autoincrement not null, "user_id" integer not null, "title" varchar not null, "slug" varchar not null, "img" varchar, "context" text not null, "views" integer not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade);

-- Dumping data for table database.posts: -1 rows
/*!40000 ALTER TABLE "posts" DISABLE KEYS */;
INSERT INTO "posts" ("id", "user_id", "title", "slug", "img", "context", "views", "created_at", "updated_at") VALUES
	(1, 1, 'Dolore velit reprehenderit asperiores provident dolore dignissimos natus laudantium.', 'dolore-velit-reprehenderit-asperiores-provident-dolore-dignissimos-natus-laudantium', 'https://via.placeholder.com/640x480.png/0066cc?text=in', 'Magni suscipit molestias eius fuga. Nesciunt culpa est quas impedit non. Vel rem dicta molestiae neque quia est.', 983, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(2, 1, 'Eius tempore ut corrupti voluptatem et et deleniti similique.', 'eius-tempore-ut-corrupti-voluptatem-et-et-deleniti-similique', 'https://via.placeholder.com/640x480.png/00aa11?text=vel', 'Totam quo ut odio consectetur dolorem ducimus. Placeat debitis magni recusandae. Enim enim quas quia quasi vel. Ut voluptas dolorem error quam sit in.', 705, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(3, 1, 'Quis autem tempore aut consequatur enim optio non tenetur.', 'quis-autem-tempore-aut-consequatur-enim-optio-non-tenetur', 'https://via.placeholder.com/640x480.png/0000ff?text=eaque', 'Eaque reprehenderit adipisci debitis placeat inventore expedita quia. Hic et eaque dolorem sed neque quia enim. Ullam molestiae et tenetur in.', 23, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(4, 1, 'Alias molestiae maxime tenetur veritatis.', 'alias-molestiae-maxime-tenetur-veritatis', 'https://via.placeholder.com/640x480.png/0044bb?text=et', 'Iste id dolorem possimus nihil voluptatum quia. Aspernatur assumenda nemo ut nostrum. Soluta aut quam nam et architecto dicta vitae.', 801, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(5, 1, 'Molestiae eaque blanditiis omnis fugit.', 'molestiae-eaque-blanditiis-omnis-fugit', 'https://via.placeholder.com/640x480.png/00aa00?text=sit', 'Enim sit quisquam ipsam est consectetur. Voluptas quae temporibus modi animi et. Doloremque voluptatem quia qui repellendus non.', 688, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(6, 1, 'Facere corrupti qui iusto ullam officia illum sapiente.', 'facere-corrupti-qui-iusto-ullam-officia-illum-sapiente', 'https://via.placeholder.com/640x480.png/0066bb?text=veritatis', 'Animi exercitationem rerum illum rerum quae laboriosam. Nulla hic corrupti voluptatem et iure incidunt at. Odit accusamus molestiae doloremque laudantium quam temporibus.', 602, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(7, 1, 'Explicabo saepe doloremque voluptates architecto dolorem veritatis.', 'explicabo-saepe-doloremque-voluptates-architecto-dolorem-veritatis', 'https://via.placeholder.com/640x480.png/003388?text=velit', 'Quam esse dolorem incidunt est excepturi exercitationem. Ex et doloremque dolorem suscipit dolores soluta. Eum maxime ea ut ut dolor quidem. Rerum dolor sed et excepturi maiores fuga totam.', 802, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(8, 1, 'Praesentium commodi dolore possimus ut.', 'praesentium-commodi-dolore-possimus-ut', 'https://via.placeholder.com/640x480.png/00bb00?text=exercitationem', 'Eos et quia saepe quidem dolorem ipsa minima. Necessitatibus ad id laboriosam. Dolor possimus suscipit molestiae ab. Qui quos sit officiis maxime rerum nesciunt similique.', 450, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(9, 1, 'Ipsum dolore veniam cupiditate voluptatem reprehenderit.', 'ipsum-dolore-veniam-cupiditate-voluptatem-reprehenderit', 'https://via.placeholder.com/640x480.png/0022aa?text=quia', 'Adipisci officia nobis magnam error ut occaecati sit. Aspernatur esse quis et aut.', 743, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(10, 1, 'Dolores inventore et quis ipsa.', 'dolores-inventore-et-quis-ipsa', 'https://via.placeholder.com/640x480.png/0099ee?text=quia', 'Dolor accusamus autem mollitia qui qui assumenda quia error. Perferendis ut velit consequatur expedita natus nostrum amet eius. Eos ab laboriosam ut est. Quo quae accusamus amet incidunt odio autem nihil. Voluptas dolores accusantium rerum enim veritatis aspernatur ut.', 885, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(11, 1, 'Repellendus ut hic autem dolor.', 'repellendus-ut-hic-autem-dolor', 'https://via.placeholder.com/640x480.png/00cc66?text=culpa', 'Quia ab et dignissimos velit. Amet hic doloribus sequi dolorem. Provident ut dolorum dolor voluptas ut. Eum ut eligendi impedit fuga voluptates dolores blanditiis.', 455, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(12, 1, 'Excepturi id aut fugit.', 'excepturi-id-aut-fugit', 'https://via.placeholder.com/640x480.png/00bb99?text=voluptas', 'Provident et sit doloremque et voluptates blanditiis quidem. Qui ut nostrum porro quo nobis et officiis. Qui fugit dolor pariatur vero dolore. Amet explicabo laboriosam non.', 880, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(13, 1, 'Et facere provident voluptates exercitationem odit officia.', 'et-facere-provident-voluptates-exercitationem-odit-officia', 'https://via.placeholder.com/640x480.png/00cc00?text=temporibus', 'Cupiditate autem voluptas voluptas et. Omnis dolore et corrupti quas et voluptatibus. Nostrum quis at iure sint ut autem sequi ullam. Suscipit facilis aut quaerat repellat eum explicabo non reprehenderit. Laborum sed reprehenderit laborum corrupti dolorem.', 441, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(14, 1, 'Sunt voluptatem ut ipsa eos.', 'sunt-voluptatem-ut-ipsa-eos', 'https://via.placeholder.com/640x480.png/000011?text=voluptatem', 'Nobis quaerat laborum fuga molestiae enim et. Qui rem quod et maiores officiis ut. Sed rem eos ab neque. Neque vel adipisci perspiciatis et sit et est.', 479, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(15, 1, 'Veniam maxime rerum molestias.', 'veniam-maxime-rerum-molestias', 'https://via.placeholder.com/640x480.png/00bbaa?text=necessitatibus', 'Eum molestiae iure rerum itaque. Sapiente minima voluptas perspiciatis voluptas non qui. Autem consequuntur ut a incidunt autem ea. Voluptas a praesentium et. Modi reprehenderit sit repellendus ab quis sit occaecati tempore.', 414, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(16, 1, 'Eligendi in hic ab dolorum assumenda dignissimos sed.', 'eligendi-in-hic-ab-dolorum-assumenda-dignissimos-sed', 'https://via.placeholder.com/640x480.png/003300?text=ratione', 'Libero consequatur sed iusto sunt. Et nihil cumque quis placeat amet fuga magni eum. Consequatur sed perspiciatis corrupti a eum et vel. Deserunt vel quo iste magni dolores. Sed eum sunt atque quisquam.', 582, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(17, 1, 'Et labore nemo voluptates dolor.', 'et-labore-nemo-voluptates-dolor', 'https://via.placeholder.com/640x480.png/0000ee?text=tempora', 'Nostrum velit quisquam dicta molestias. Distinctio qui inventore iusto ipsam nam.', 525, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(18, 1, 'Sint nulla itaque quasi repellendus et reprehenderit quis qui.', 'sint-nulla-itaque-quasi-repellendus-et-reprehenderit-quis-qui', 'https://via.placeholder.com/640x480.png/00bbcc?text=dicta', 'Voluptatem laborum optio consequuntur totam consequatur. Odio placeat amet sit sit. Aut magni provident qui repellat eos. Dicta voluptatem et ut.', 593, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(19, 1, 'Voluptas ipsa odit consequatur dolores ut.', 'voluptas-ipsa-odit-consequatur-dolores-ut', 'https://via.placeholder.com/640x480.png/00cc77?text=tenetur', 'Facere quia laudantium quis fugiat porro illo. Ut nihil qui explicabo est est et.', 847, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(20, 1, 'Dolorem velit rerum consectetur adipisci amet quasi est.', 'dolorem-velit-rerum-consectetur-adipisci-amet-quasi-est', 'https://via.placeholder.com/640x480.png/007788?text=eius', 'Velit iusto id est quisquam voluptatem. Qui harum qui rerum quia voluptas molestiae. Numquam cupiditate suscipit dolores sed ut explicabo dolorum.', 812, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(21, 1, 'Tempora laborum et earum in voluptatem.', 'tempora-laborum-et-earum-in-voluptatem', 'https://via.placeholder.com/640x480.png/0011ff?text=excepturi', 'Aliquam accusantium voluptatibus et est blanditiis ex. Earum quia commodi voluptas commodi odio. Debitis quia architecto aut facilis incidunt quo.', 749, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(22, 1, 'Fugit maiores repellat et voluptatem.', 'fugit-maiores-repellat-et-voluptatem', 'https://via.placeholder.com/640x480.png/00aaee?text=cum', 'Sunt enim est dolor harum earum est qui. Autem unde officia illum.', 67, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(23, 1, 'Voluptatum pariatur eum ea recusandae ipsam necessitatibus voluptatum.', 'voluptatum-pariatur-eum-ea-recusandae-ipsam-necessitatibus-voluptatum', 'https://via.placeholder.com/640x480.png/00bb22?text=natus', 'Aut qui rerum provident voluptates labore. Culpa velit ut quia quia vero. Quibusdam architecto et tenetur earum qui natus provident.', 175, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(24, 1, 'Unde eos dolores praesentium ullam inventore aut.', 'unde-eos-dolores-praesentium-ullam-inventore-aut', 'https://via.placeholder.com/640x480.png/00ee22?text=et', 'Rerum autem consequatur ipsum iste ad ipsum. Ut provident tempora dicta nobis iste facere.', 690, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(25, 1, 'Veritatis optio consequuntur magnam alias autem.', 'veritatis-optio-consequuntur-magnam-alias-autem', 'https://via.placeholder.com/640x480.png/006677?text=vitae', 'Labore culpa amet eos molestiae quos nemo voluptate. Reiciendis omnis ipsam est aut. Accusamus quaerat debitis est qui officia id non. Ipsam suscipit architecto optio est nemo et.', 952, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(26, 1, 'Quo corrupti et repellat optio aut.', 'quo-corrupti-et-repellat-optio-aut', 'https://via.placeholder.com/640x480.png/0022ff?text=quia', 'Voluptate qui molestiae omnis voluptatem quo. Occaecati et dignissimos qui sapiente quas consectetur itaque. Cupiditate soluta exercitationem ipsum vero nostrum asperiores.', 738, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(27, 1, 'Nobis nobis aut rerum.', 'nobis-nobis-aut-rerum', 'https://via.placeholder.com/640x480.png/006655?text=corporis', 'Quod rerum velit quia quae illo. Numquam quos repudiandae commodi nulla sunt qui. Nulla alias minus rerum. Qui aut perspiciatis rerum ea. Nam et aut dolorem unde sunt velit suscipit.', 547, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(28, 1, 'Porro sunt voluptate sapiente dolorem minima sit tenetur.', 'porro-sunt-voluptate-sapiente-dolorem-minima-sit-tenetur', 'https://via.placeholder.com/640x480.png/00eeee?text=omnis', 'Quas quia temporibus debitis repudiandae. Ut nesciunt voluptas culpa. Nobis est laborum accusantium architecto repellendus suscipit. Consectetur vel voluptas ipsa quidem.', 800, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(29, 1, 'Repellendus nobis eos et quia nesciunt.', 'repellendus-nobis-eos-et-quia-nesciunt', 'https://via.placeholder.com/640x480.png/00ff00?text=doloribus', 'Fugit excepturi soluta consequatur consectetur quo labore. Quidem qui omnis sint commodi.', 309, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(30, 1, 'Eos accusantium ullam sunt aut iusto commodi voluptatem.', 'eos-accusantium-ullam-sunt-aut-iusto-commodi-voluptatem', 'https://via.placeholder.com/640x480.png/00ddaa?text=expedita', 'Error incidunt quia eaque eos explicabo fugit. Id recusandae et molestiae qui minima. Cumque delectus in distinctio suscipit.', 298, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(31, 1, 'Blanditiis dolorem eveniet quo cum tempore facere.', 'blanditiis-dolorem-eveniet-quo-cum-tempore-facere', 'https://via.placeholder.com/640x480.png/0044dd?text=eos', 'Et ut atque sapiente voluptatum fugiat quod. Enim voluptatum voluptas voluptatem omnis quasi nulla. Ut alias id ad quis fugit dolores deserunt. Illum voluptate quo ducimus iste vitae fugiat. Atque officia nihil voluptatem delectus quia et quidem.', 430, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(32, 1, 'A quasi earum sunt saepe consequatur.', 'a-quasi-earum-sunt-saepe-consequatur', 'https://via.placeholder.com/640x480.png/000044?text=qui', 'Nulla et repellendus expedita repellat ducimus sed voluptatum. Quibusdam dolor ad eaque. Sit ut est dolor non consequatur.', 814, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(33, 1, 'Rerum minus officia itaque.', 'rerum-minus-officia-itaque', 'https://via.placeholder.com/640x480.png/005599?text=eum', 'Accusantium aut quam cumque. Et asperiores nesciunt libero quaerat laborum voluptas. Aliquid commodi et et quos. Eligendi est laborum dolor asperiores alias a est. Voluptas facilis atque corporis exercitationem officia sit veniam.', 337, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(34, 1, 'Dolorem et mollitia omnis assumenda quasi quod.', 'dolorem-et-mollitia-omnis-assumenda-quasi-quod', 'https://via.placeholder.com/640x480.png/00ff22?text=qui', 'Quis sit aut labore sit doloribus. Qui quidem aspernatur recusandae sint incidunt earum aut et. Et esse voluptas similique alias ut quasi rem nemo.', 375, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(35, 1, 'Quia praesentium saepe nam corporis.', 'quia-praesentium-saepe-nam-corporis', 'https://via.placeholder.com/640x480.png/005511?text=sit', 'Autem voluptas laborum est nesciunt cum. Quia repellat tempore illum qui est est porro. Ab autem porro aut id.', 32, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(36, 1, 'Fuga ea autem laborum praesentium.', 'fuga-ea-autem-laborum-praesentium', 'https://via.placeholder.com/640x480.png/007755?text=molestiae', 'Voluptas non quo id consequatur eum eius ducimus. Vero officiis aut aliquam quae. Id libero quia vero debitis facilis est culpa eum.', 514, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(37, 1, 'Odit incidunt asperiores dolorem sit culpa error quod.', 'odit-incidunt-asperiores-dolorem-sit-culpa-error-quod', 'https://via.placeholder.com/640x480.png/00ffbb?text=recusandae', 'Omnis expedita quod consequatur molestias. Aut aut qui illo architecto. Blanditiis incidunt tenetur necessitatibus quod est quisquam harum deserunt. Quod numquam dolores id enim enim.', 786, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(38, 1, 'Voluptas repellat eius nihil rem impedit aliquam minus.', 'voluptas-repellat-eius-nihil-rem-impedit-aliquam-minus', 'https://via.placeholder.com/640x480.png/002222?text=enim', 'Consequatur explicabo eius non. Ut ut autem eveniet quo architecto ex dolores. Corporis iste nisi est quas porro vel aut. Quos quia et sit quo amet quaerat in.', 99, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(39, 1, 'Ipsam omnis eos velit.', 'ipsam-omnis-eos-velit', 'https://via.placeholder.com/640x480.png/008833?text=sunt', 'Non saepe ad molestiae doloremque maxime qui qui. Esse consequatur quis nihil repudiandae. Aliquam molestiae quia doloremque modi magni minima fuga quidem. Non quo officia et velit natus accusantium.', 639, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(40, 1, 'Ratione incidunt laboriosam vitae aut et.', 'ratione-incidunt-laboriosam-vitae-aut-et', 'https://via.placeholder.com/640x480.png/00ff22?text=necessitatibus', 'Porro incidunt debitis aut nobis sunt aliquam eius. Maxime non magni qui excepturi iusto optio voluptatem. Neque nesciunt culpa consectetur vero. Tempora dolorem eligendi quibusdam.', 491, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(41, 1, 'Ea eligendi non recusandae et aut magnam qui.', 'ea-eligendi-non-recusandae-et-aut-magnam-qui', 'https://via.placeholder.com/640x480.png/00ff22?text=magni', 'Provident doloribus quis omnis nam sit unde reiciendis. Ullam voluptatem qui consequatur sunt consequatur beatae voluptas dolor. Aut quos iusto illo. Quis voluptates nihil amet et.', 671, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(42, 1, 'Placeat sint occaecati unde consectetur.', 'placeat-sint-occaecati-unde-consectetur', 'https://via.placeholder.com/640x480.png/00aa44?text=enim', 'Nobis aliquid recusandae est. Vitae veniam mollitia alias quibusdam doloremque sunt. Consequatur doloremque culpa sed ratione praesentium culpa.', 404, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(43, 1, 'Libero fuga enim eos sed repellat enim beatae.', 'libero-fuga-enim-eos-sed-repellat-enim-beatae', 'https://via.placeholder.com/640x480.png/00eeaa?text=occaecati', 'Quisquam harum est dicta enim enim. Ut corporis velit consequatur. Aut ratione est ut amet sapiente.', 247, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(44, 1, 'Et incidunt enim quod ut.', 'et-incidunt-enim-quod-ut', 'https://via.placeholder.com/640x480.png/0099cc?text=aut', 'Nobis qui in assumenda officia non voluptates officiis. Illo voluptatum eos magnam atque.', 302, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(45, 1, 'Eius consectetur optio sint soluta facere illum blanditiis.', 'eius-consectetur-optio-sint-soluta-facere-illum-blanditiis', 'https://via.placeholder.com/640x480.png/007733?text=maiores', 'Earum aut alias sed amet magnam est nihil. Autem vel labore tempore accusamus. Facere aliquam sint aut in adipisci hic. At odit porro eaque error voluptatem praesentium laboriosam et.', 594, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(46, 1, 'Suscipit velit et illum sit.', 'suscipit-velit-et-illum-sit', 'https://via.placeholder.com/640x480.png/00bbaa?text=dolores', 'Est vel sit omnis blanditiis quam fuga et commodi. Minima cum doloremque iusto mollitia. Amet aut dolorem ab minima. Aspernatur enim inventore officia molestiae. Facere repellendus omnis et id quis.', 385, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(47, 1, 'Ex nihil dolores dolor perferendis doloribus.', 'ex-nihil-dolores-dolor-perferendis-doloribus', 'https://via.placeholder.com/640x480.png/00ccee?text=et', 'Aspernatur quia nemo ut quia qui. Laudantium sint tempora aut aspernatur pariatur. Rerum debitis beatae qui eius. Voluptas nihil consequatur nostrum soluta eos facilis neque.', 307, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(48, 1, 'Recusandae dolorum laboriosam rerum amet eum aut omnis.', 'recusandae-dolorum-laboriosam-rerum-amet-eum-aut-omnis', 'https://via.placeholder.com/640x480.png/00eeaa?text=corrupti', 'Commodi voluptatem et dolorum odit. A voluptatum error similique voluptatem. Et sunt unde perspiciatis magnam sunt facilis eaque.', 23, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(49, 1, 'Dolorum ut sit expedita veritatis unde id.', 'dolorum-ut-sit-expedita-veritatis-unde-id', 'https://via.placeholder.com/640x480.png/008844?text=iure', 'Velit perferendis repellendus quia sequi reiciendis. Officia eos et rem temporibus. Minima sit non nobis qui provident sit.', 219, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(50, 1, 'Voluptas qui deserunt qui rerum.', 'voluptas-qui-deserunt-qui-rerum', 'https://via.placeholder.com/640x480.png/0022ff?text=aliquam', 'Rerum consequuntur est blanditiis accusantium est at. Omnis itaque soluta quo voluptatem laboriosam aut sed.', 123, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(51, 1, 'Magni repudiandae enim et nulla quia ipsa velit.', 'magni-repudiandae-enim-et-nulla-quia-ipsa-velit', 'https://via.placeholder.com/640x480.png/009977?text=quo', 'Accusantium sunt sint illum voluptates. Molestiae nesciunt atque aut eos ea. Dignissimos id est enim ab. Dolore voluptas suscipit facilis blanditiis.', 375, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(52, 1, 'Architecto rerum ab ut.', 'architecto-rerum-ab-ut', 'https://via.placeholder.com/640x480.png/00bbbb?text=suscipit', 'Ipsam reprehenderit aliquam maxime animi quia. Nobis veritatis sint et dicta rerum iure aut. Sit consectetur optio corporis expedita eaque. Reiciendis delectus quibusdam placeat dignissimos ducimus quis et.', 615, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(53, 1, 'Veritatis odio debitis amet consequuntur ut fugit ea.', 'veritatis-odio-debitis-amet-consequuntur-ut-fugit-ea', 'https://via.placeholder.com/640x480.png/0000bb?text=ad', 'Quis consequuntur omnis non voluptate. Eveniet id error ut nihil id molestiae ipsam.', 19, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(54, 1, 'Alias omnis perferendis et quisquam quas quod.', 'alias-omnis-perferendis-et-quisquam-quas-quod', 'https://via.placeholder.com/640x480.png/00ff00?text=in', 'Repudiandae suscipit quibusdam aut laboriosam odio voluptas. Temporibus velit maxime consequatur animi assumenda aut officiis. Deleniti expedita optio et et nostrum et ea. Non nam et debitis sit sed. Ad est placeat quo enim consequatur.', 832, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(55, 1, 'Et delectus animi animi at perspiciatis voluptatem doloremque et.', 'et-delectus-animi-animi-at-perspiciatis-voluptatem-doloremque-et', 'https://via.placeholder.com/640x480.png/002277?text=non', 'Quibusdam beatae minus libero eum sit numquam. Officiis blanditiis dignissimos illum iure sed. Laudantium amet ut accusamus excepturi pariatur accusamus.', 627, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(56, 1, 'Quidem ut dolor rerum rerum.', 'quidem-ut-dolor-rerum-rerum', 'https://via.placeholder.com/640x480.png/00dd77?text=perspiciatis', 'Corrupti distinctio itaque aut expedita possimus vel consequatur. Voluptatem nesciunt voluptate ut quidem. Qui qui nostrum ducimus corporis fugit itaque tempore. Expedita est est fugiat voluptatem.', 203, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(57, 1, 'Odit et laudantium ratione rerum odio.', 'odit-et-laudantium-ratione-rerum-odio', 'https://via.placeholder.com/640x480.png/0099dd?text=necessitatibus', 'Natus ut sed voluptatem neque optio. Deleniti aperiam voluptatum magnam repudiandae. Eligendi numquam maxime repudiandae sunt eos nesciunt.', 13, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(58, 1, 'Et alias est non sed.', 'et-alias-est-non-sed', 'https://via.placeholder.com/640x480.png/002299?text=aliquam', 'Delectus quisquam consequuntur eveniet ducimus illum ducimus. Ab ut numquam modi architecto enim error. Perferendis aliquam suscipit sed necessitatibus quo quaerat.', 305, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(59, 1, 'Cum eaque dolor minima omnis.', 'cum-eaque-dolor-minima-omnis', 'https://via.placeholder.com/640x480.png/008866?text=similique', 'Aliquam unde ut ab voluptate. Eos necessitatibus sunt consequatur rerum. Minima sunt et eius ratione et veniam. Soluta doloremque explicabo repellat nulla. Eum nihil accusamus et perspiciatis culpa.', 562, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(60, 1, 'Quasi nisi facere et architecto quia omnis impedit cum.', 'quasi-nisi-facere-et-architecto-quia-omnis-impedit-cum', 'https://via.placeholder.com/640x480.png/001155?text=impedit', 'Perferendis inventore quibusdam quis et atque. Et fuga ab rerum laborum accusantium. Repellat recusandae qui voluptatibus at et vero.', 704, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(61, 1, 'Eos sequi qui ut.', 'eos-sequi-qui-ut', 'https://via.placeholder.com/640x480.png/0088dd?text=at', 'Sequi fugiat vitae velit rem harum dolor placeat dolore. Debitis natus eveniet autem delectus perspiciatis placeat. Excepturi odit impedit iure est consequatur suscipit. Nulla deserunt veritatis aut deleniti minus.', 774, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(62, 1, 'Accusamus quidem et velit soluta id.', 'accusamus-quidem-et-velit-soluta-id', 'https://via.placeholder.com/640x480.png/004400?text=et', 'Molestiae aut vel quos ut doloribus. Et laborum possimus cum voluptatem. Optio repellat omnis suscipit provident doloribus. Aliquid eveniet similique illo eaque.', 581, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(63, 1, 'Sequi illo cumque dolor.', 'sequi-illo-cumque-dolor', 'https://via.placeholder.com/640x480.png/00ffbb?text=ab', 'Et recusandae quisquam eum possimus quod. Doloremque omnis aut cumque ratione. Laboriosam vero aut earum incidunt.', 918, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(64, 1, 'Voluptatem consequatur laborum consequatur explicabo totam ut qui.', 'voluptatem-consequatur-laborum-consequatur-explicabo-totam-ut-qui', 'https://via.placeholder.com/640x480.png/0088aa?text=adipisci', 'Voluptatibus ad ducimus sunt dolores et. Incidunt sed a aut est necessitatibus aut. Non blanditiis nihil consectetur aut.', 795, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(65, 1, 'Magni est dolor a aut molestiae nihil.', 'magni-est-dolor-a-aut-molestiae-nihil', 'https://via.placeholder.com/640x480.png/007744?text=modi', 'Voluptate adipisci ipsam eius non. Nostrum quia iusto non porro ut ipsum quidem.', 761, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(66, 1, 'Dolor amet reprehenderit voluptatem totam dolores.', 'dolor-amet-reprehenderit-voluptatem-totam-dolores', 'https://via.placeholder.com/640x480.png/002222?text=nihil', 'Rerum similique repudiandae aut eum illum vitae. Aut deserunt veritatis vel ut nihil quas odit esse. Perferendis tempore qui magni voluptate. Natus nemo enim odit facere.', 175, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(67, 1, 'Quia ea quod officia exercitationem aperiam excepturi aut.', 'quia-ea-quod-officia-exercitationem-aperiam-excepturi-aut', 'https://via.placeholder.com/640x480.png/008877?text=ut', 'Est voluptatibus autem autem quia facilis quaerat et. Perferendis eum ipsa numquam voluptatem. Accusantium ipsum quam eius assumenda placeat inventore sed vel.', 348, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(68, 1, 'Laboriosam quidem deleniti minus voluptatem libero ab est.', 'laboriosam-quidem-deleniti-minus-voluptatem-libero-ab-est', 'https://via.placeholder.com/640x480.png/003366?text=rerum', 'Recusandae quia laboriosam amet voluptatem aut minima quo numquam. Ratione rerum provident quis velit. Est est et ea reiciendis et sint. Autem quaerat iste qui ipsa. Consequatur omnis veritatis et consectetur.', 469, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(69, 1, 'Rerum numquam vitae repellendus ducimus ipsam ut sunt.', 'rerum-numquam-vitae-repellendus-ducimus-ipsam-ut-sunt', 'https://via.placeholder.com/640x480.png/00aa33?text=magnam', 'Maiores dolorem maxime voluptatem ullam eum aut. Voluptas sit ut eos sunt et. Voluptatibus quibusdam delectus atque ratione at.', 937, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(70, 1, 'Cumque velit ea maiores dolorem impedit quis.', 'cumque-velit-ea-maiores-dolorem-impedit-quis', 'https://via.placeholder.com/640x480.png/00aadd?text=quaerat', 'Illum animi eum et molestiae est. Quod modi tempora natus unde eveniet. Autem possimus laborum ducimus et laboriosam tempore velit. Sequi omnis vitae repudiandae id sint ut.', 122, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(71, 1, 'Recusandae ea magni delectus et rerum ut.', 'recusandae-ea-magni-delectus-et-rerum-ut', 'https://via.placeholder.com/640x480.png/003322?text=cum', 'Fugiat qui id ut culpa quos. Facilis illo deserunt reiciendis occaecati molestiae. Eum corporis omnis nam quo rem et. Aut atque ut expedita deserunt tempore qui dolorum.', 562, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(72, 1, 'Quo quis velit eligendi nihil.', 'quo-quis-velit-eligendi-nihil', 'https://via.placeholder.com/640x480.png/00cc66?text=temporibus', 'Qui illo architecto amet consequatur modi. Quasi doloribus quos dicta molestias. Consectetur adipisci deserunt rerum a cumque at.', 690, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(73, 1, 'Aut porro pariatur animi ipsa culpa sed labore.', 'aut-porro-pariatur-animi-ipsa-culpa-sed-labore', 'https://via.placeholder.com/640x480.png/0033aa?text=molestiae', 'Modi rerum nam aut facere quas aut. Ut porro ratione aut sit ratione consectetur. Nihil possimus repellat corporis et earum iste.', 303, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(74, 1, 'Nihil explicabo quis et reiciendis architecto.', 'nihil-explicabo-quis-et-reiciendis-architecto', 'https://via.placeholder.com/640x480.png/006622?text=rem', 'Quia et culpa culpa et minima non facere debitis. Facilis est iste ad. Corporis odit dolores repudiandae.', 140, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(75, 1, 'Facere ea labore voluptates autem id.', 'facere-ea-labore-voluptates-autem-id', 'https://via.placeholder.com/640x480.png/005533?text=aut', 'Aliquid ut corporis veniam qui ab eaque. Modi quos ducimus magni voluptas sed provident vero. Asperiores tempore iure eligendi illo ut aliquid adipisci. Nobis occaecati totam aspernatur fugiat impedit.', 895, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(76, 1, 'Nihil sapiente quis magnam velit dolores totam vitae.', 'nihil-sapiente-quis-magnam-velit-dolores-totam-vitae', 'https://via.placeholder.com/640x480.png/008899?text=neque', 'Voluptas beatae vel culpa sed voluptates. Rem consequatur dolores occaecati numquam est dolorem. A maxime ea sed sunt earum ut ad. Rerum aut nobis voluptatem earum.', 318, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(77, 1, 'Quas dignissimos ipsum iure libero.', 'quas-dignissimos-ipsum-iure-libero', 'https://via.placeholder.com/640x480.png/0044bb?text=voluptate', 'Laudantium distinctio ipsum magnam hic ex omnis. Repudiandae rem qui nam molestias. Recusandae et assumenda dicta dolor amet facere rerum. Ut consequuntur officiis qui excepturi nisi impedit minus.', 390, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(78, 1, 'Ab voluptas excepturi ut dolores eveniet.', 'ab-voluptas-excepturi-ut-dolores-eveniet', 'https://via.placeholder.com/640x480.png/00ff77?text=minima', 'Fugit sed qui enim et incidunt atque. Qui voluptatibus accusamus illo dignissimos animi non.', 761, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(79, 1, 'Maiores distinctio possimus nihil earum quis qui provident.', 'maiores-distinctio-possimus-nihil-earum-quis-qui-provident', 'https://via.placeholder.com/640x480.png/009911?text=harum', 'Numquam et iure exercitationem quibusdam dolorum. Nam quibusdam et voluptates sed quae ea. Accusamus quae qui omnis ullam soluta. Error ut rerum pariatur aliquam.', 15, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(80, 1, 'In nobis minima qui exercitationem necessitatibus.', 'in-nobis-minima-qui-exercitationem-necessitatibus', 'https://via.placeholder.com/640x480.png/009911?text=nam', 'Repudiandae in veritatis maxime quaerat dolores vero vel laborum. Assumenda aut animi commodi. Animi tempora ratione sed ut ut nihil reiciendis. Aut nam at laborum eaque labore temporibus quaerat.', 410, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(81, 1, 'Optio nihil quaerat enim necessitatibus temporibus magnam.', 'optio-nihil-quaerat-enim-necessitatibus-temporibus-magnam', 'https://via.placeholder.com/640x480.png/00bb88?text=vero', 'Ut blanditiis qui labore ut dolor non. Occaecati facere at non quidem similique exercitationem in. Natus et et et numquam repudiandae ullam non. Ab consequuntur minima dolorum sed harum nisi.', 940, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(82, 1, 'Eligendi qui debitis voluptatem et recusandae facere.', 'eligendi-qui-debitis-voluptatem-et-recusandae-facere', 'https://via.placeholder.com/640x480.png/009900?text=itaque', 'Impedit quisquam esse aut. Consequuntur eveniet aperiam cupiditate nesciunt qui molestiae repudiandae. Est sit consectetur aut molestias quisquam possimus aut nihil.', 394, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(83, 1, 'Quas sed quidem asperiores illo aliquid repellat.', 'quas-sed-quidem-asperiores-illo-aliquid-repellat', 'https://via.placeholder.com/640x480.png/007733?text=quaerat', 'Alias molestiae voluptatem aspernatur labore rerum voluptatibus voluptatem. Esse nostrum assumenda quaerat quis totam.', 449, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(84, 1, 'Aperiam voluptate totam est voluptas.', 'aperiam-voluptate-totam-est-voluptas', 'https://via.placeholder.com/640x480.png/00ee22?text=dolores', 'Quia consequatur voluptate expedita possimus atque dicta hic. Est non inventore doloribus et culpa nihil iusto.', 357, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(85, 1, 'Similique voluptate est unde omnis neque assumenda id.', 'similique-voluptate-est-unde-omnis-neque-assumenda-id', 'https://via.placeholder.com/640x480.png/00aa88?text=nobis', 'Maxime autem esse animi aut. Tempore harum numquam repudiandae hic modi voluptatem quo. Dicta ut sit necessitatibus possimus. Et qui ullam qui tempore magnam dicta.', 737, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(86, 1, 'Repudiandae aliquid pariatur aut vitae quasi quae.', 'repudiandae-aliquid-pariatur-aut-vitae-quasi-quae', 'https://via.placeholder.com/640x480.png/009944?text=laudantium', 'Hic harum impedit ea et. Eligendi ut est aliquam sint labore. Deleniti aliquid ut dolores aut rem soluta non.', 338, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(87, 1, 'Et voluptas doloremque nihil dolores reiciendis totam.', 'et-voluptas-doloremque-nihil-dolores-reiciendis-totam', 'https://via.placeholder.com/640x480.png/007700?text=asperiores', 'Repudiandae optio error doloribus impedit. Velit perspiciatis repellat et omnis ut sit ut. Consequatur impedit doloremque assumenda dolorem similique et iure quia. Ullam eius atque explicabo consectetur labore.', 161, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(88, 1, 'Fugiat numquam quo vitae autem hic deserunt.', 'fugiat-numquam-quo-vitae-autem-hic-deserunt', 'https://via.placeholder.com/640x480.png/00ddcc?text=aut', 'Dolores culpa sit quaerat alias laudantium ut. Dolorum sint quibusdam maiores assumenda. Eius unde molestiae excepturi saepe qui voluptatem repellat.', 861, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(89, 1, 'Maiores et quia architecto assumenda.', 'maiores-et-quia-architecto-assumenda', 'https://via.placeholder.com/640x480.png/004400?text=ut', 'Consequatur reiciendis ut laboriosam repellendus laboriosam est. Dolorum enim dolores harum. Voluptatem totam repellat reprehenderit eos ab sunt illum. Ut deleniti mollitia nostrum optio optio explicabo aut.', 730, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(90, 1, 'In voluptatibus occaecati in.', 'in-voluptatibus-occaecati-in', 'https://via.placeholder.com/640x480.png/00eedd?text=ut', 'Voluptas consequuntur atque corrupti et voluptas dolore voluptatem. Unde consectetur sint ea praesentium. Deleniti dignissimos pariatur totam maiores error ipsa. Tempore ipsa magni quo.', 785, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(91, 1, 'Vitae quidem odit explicabo sunt amet est.', 'vitae-quidem-odit-explicabo-sunt-amet-est', 'https://via.placeholder.com/640x480.png/00eecc?text=quam', 'Debitis voluptatem ad et quas est vel. Porro harum eum odio. Molestiae numquam quisquam qui veritatis impedit voluptates.', 39, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(92, 1, 'Aut quia architecto soluta eligendi.', 'aut-quia-architecto-soluta-eligendi', 'https://via.placeholder.com/640x480.png/002211?text=perferendis', 'Asperiores quas qui nesciunt. Enim modi nulla in ratione sint. Eaque voluptates quia nostrum.', 926, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(93, 1, 'Nam illo omnis repellendus sed quidem repellendus omnis dolor.', 'nam-illo-omnis-repellendus-sed-quidem-repellendus-omnis-dolor', 'https://via.placeholder.com/640x480.png/0044ff?text=dolores', 'Dolore beatae provident eum eos ut harum eius autem. Rerum laboriosam aut sit laborum et aut modi. Quibusdam officia possimus magni reprehenderit perferendis iste voluptas aperiam. Sit et error perspiciatis alias minima.', 310, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(94, 1, 'Sint ut atque nulla veniam quo.', 'sint-ut-atque-nulla-veniam-quo', 'https://via.placeholder.com/640x480.png/008800?text=ut', 'Voluptatem voluptatum aut sunt quasi. Non dolor voluptas blanditiis aut. Ullam quisquam nostrum neque omnis aut nihil. Libero ut rerum consequatur voluptatem ex quis ut.', 785, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(95, 1, 'Eveniet officiis suscipit unde aut.', 'eveniet-officiis-suscipit-unde-aut', 'https://via.placeholder.com/640x480.png/009933?text=rerum', 'Et rerum dolorem possimus vel nam. Illum ut facilis id assumenda possimus totam. Natus enim minus ducimus. Dolor enim omnis nesciunt cumque suscipit.', 40, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(96, 1, 'Vel qui quisquam natus dolores.', 'vel-qui-quisquam-natus-dolores', 'https://via.placeholder.com/640x480.png/003344?text=ut', 'Ea accusamus id ut quia esse ea nulla. Nihil excepturi et ut. Tenetur quis expedita magnam cum.', 96, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(97, 1, 'Ratione labore modi est necessitatibus numquam molestiae.', 'ratione-labore-modi-est-necessitatibus-numquam-molestiae', 'https://via.placeholder.com/640x480.png/0088bb?text=eligendi', 'Quis sed reiciendis sit ut. Mollitia nesciunt commodi voluptatum cumque. Esse eveniet minima maiores non voluptate quibusdam hic. Libero in velit modi rerum.', 537, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(98, 1, 'Et dicta tempore perspiciatis recusandae.', 'et-dicta-tempore-perspiciatis-recusandae', 'https://via.placeholder.com/640x480.png/00eebb?text=voluptatem', 'Qui similique quibusdam sed distinctio incidunt et vero. Aut ullam atque fugiat animi ab voluptatem est. Quae repellat magnam eum illo.', 520, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(99, 1, 'Autem nobis autem ea quo.', 'autem-nobis-autem-ea-quo', 'https://via.placeholder.com/640x480.png/002222?text=commodi', 'Cumque quisquam eveniet fugiat eos rerum. Nobis nam veritatis quia voluptatem maxime ut. Dolorem consequatur consequatur modi iure dicta exercitationem. Magnam dolorum dolores in non accusamus molestiae sequi.', 155, '2025-01-17 12:30:30', '2025-01-17 12:30:30'),
	(100, 1, 'Corporis veniam omnis iste omnis sunt sunt dolor voluptate.', 'corporis-veniam-omnis-iste-omnis-sunt-sunt-dolor-voluptate', 'https://via.placeholder.com/640x480.png/00ee22?text=in', 'Voluptas libero tempora voluptatem facilis. Aliquid amet odio totam cumque sint eos rerum. Eveniet animi ipsam aut natus.', 556, '2025-01-17 12:30:30', '2025-01-17 12:30:30');
/*!40000 ALTER TABLE "posts" ENABLE KEYS */;

-- Dumping structure for table database.potensis
CREATE TABLE IF NOT EXISTS "potensis" ("id" integer primary key autoincrement not null, "user_id" integer not null, "category_id" integer not null, "title" varchar not null, "slug" varchar not null, "img" varchar, "body" text not null, "views" integer not null default '0', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade, foreign key("category_id") references "categories"("id") on delete cascade);

-- Dumping data for table database.potensis: -1 rows
/*!40000 ALTER TABLE "potensis" DISABLE KEYS */;
/*!40000 ALTER TABLE "potensis" ENABLE KEYS */;

-- Dumping structure for table database.sambutans
CREATE TABLE IF NOT EXISTS "sambutans" ("id" integer primary key autoincrement not null, "name" varchar not null, "body" text not null, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.sambutans: -1 rows
/*!40000 ALTER TABLE "sambutans" DISABLE KEYS */;
INSERT INTO "sambutans" ("id", "name", "body", "created_at", "updated_at") VALUES
	(1, 'PJ Faizin, S.E', '<div><strong>Assalamu Alaikum Warohmatullahi Wabarakatu.</strong></div><div>Website ini hadir sebagai wujud transformasi desa Kersik menjadi desa yang mampu memanfaatkan teknologi informasi dan komunikasi, terintegrasi kedalam sistem online. Keterbukaan informasi publik, pelayanan publik dan kegiatan perekonomian di desa, guna mewujudkan desa Kersik sebagai desa wisata yang berkelanjutan, adaptasi dan mitigasi terhadap perubahan iklim serta menjadi desa yang mandiri.</div><div>Terima kasih kepada semua pihak yang telah banyak memberi dukungan dan kontribusi baik berupa tenaga, pikiran dan semangat, &nbsp;sehingga website ini dapat terealisasi.</div>', '2025-01-09 13:19:22', '2025-01-09 22:55:03');
/*!40000 ALTER TABLE "sambutans" ENABLE KEYS */;

-- Dumping structure for table database.sessions
CREATE TABLE IF NOT EXISTS "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));

-- Dumping data for table database.sessions: -1 rows
/*!40000 ALTER TABLE "sessions" DISABLE KEYS */;
INSERT INTO "sessions" ("id", "user_id", "ip_address", "user_agent", "payload", "last_activity") VALUES
	('NL0kziEoX3W1cPPPdjvE3kZfpFaH2taFmwKPluI8', 1, '192.168.100.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic21tU0pJSndCMkF6UmY0OHI3UUJhTW05bWNxMG1TeDFDeHhOZm5UNCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MDoiaHR0cDovLzE5Mi4xNjguMTAwLjc6ODAwMC9kYXNoYm9hcmQvdWkvYWRtaW5pc3RyYXNpLXBlbmR1ZHVrIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjEwMC43OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737117506);
/*!40000 ALTER TABLE "sessions" ENABLE KEYS */;

-- Dumping structure for table database.users
CREATE TABLE IF NOT EXISTS "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "username" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);

-- Dumping data for table database.users: -1 rows
/*!40000 ALTER TABLE "users" DISABLE KEYS */;
INSERT INTO "users" ("id", "name", "username", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES
	(1, 'Admin Karangpucung', 'admin', 'admin@admin.com', NULL, '$2y$12$si/3Fu8p0XTJE0BtB29oeuQ4oiJrpXBgvJJfK243YeFUu76VhCtge', NULL, '2025-01-17 12:30:30', '2025-01-17 12:30:30');
/*!40000 ALTER TABLE "users" ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
