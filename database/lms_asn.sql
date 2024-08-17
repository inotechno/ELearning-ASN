/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - lms_asn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lms_asn` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `lms_asn`;

/*Table structure for table `category_courses` */

DROP TABLE IF EXISTS `category_courses`;

CREATE TABLE `category_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_courses` */

insert  into `category_courses`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'TA2024','ta2024','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(2,'TA2025','ta2025','2024-07-01 08:43:51','2024-07-01 08:43:51');

/*Table structure for table `course_topics` */

DROP TABLE IF EXISTS `course_topics`;

CREATE TABLE `course_topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) unsigned NOT NULL,
  `type_topic_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `document_url` varchar(255) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `zoom_url` varchar(255) DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `percentage_value` decimal(5,2) DEFAULT NULL,
  `status` enum('begin','progress','finish') NOT NULL DEFAULT 'begin',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_topics_course_id_foreign` (`course_id`),
  KEY `course_topics_type_topic_id_foreign` (`type_topic_id`),
  KEY `course_topics_created_by_foreign` (`created_by`),
  CONSTRAINT `course_topics_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `course_topics_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `course_topics_type_topic_id_foreign` FOREIGN KEY (`type_topic_id`) REFERENCES `type_topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `course_topics` */

insert  into `course_topics`(`id`,`course_id`,`type_topic_id`,`title`,`slug`,`description`,`video_url`,`document_url`,`document_path`,`zoom_url`,`start_at`,`end_at`,`percentage_value`,`status`,`created_by`,`created_at`,`updated_at`) values 
(1,1,2,'Saepe consequatur autem sit.','dicta-omnis','Quis sed et sit perspiciatis. Eveniet odit doloremque deserunt fuga et. Sunt incidunt quo quo laboriosam. Occaecati quae consequuntur corporis vel maxime fuga. Ullam optio ex suscipit voluptatem rerum exercitationem. Iste voluptatibus et voluptas consequatur. Et provident consequatur omnis animi placeat sapiente quasi.','http://www.widiastuti.net/fugit-vel-est-dignissimos-porro-dolores-suscipit-voluptatem.html','http://widiastuti.info/',NULL,'http://permata.go.id/','2023-03-18 00:00:00','2007-10-06 00:00:00',84.00,'begin',1,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(2,1,1,'Saepe earum.','animi-voluptatem-vel-quidem','Et similique enim sit incidunt aliquid. Non quia hic rerum fuga ea eum reprehenderit dolor. Asperiores sunt facilis sunt velit in. Voluptatem qui quibusdam delectus et cumque sunt hic dolore. Enim corrupti aspernatur voluptatem perferendis et aliquam. Consequatur facilis cumque consequuntur velit impedit. Aut cumque vitae dolor iusto eum eveniet nobis. Vel reprehenderit quia qui. Tenetur expedita ducimus quis delectus voluptas voluptate vero. Necessitatibus adipisci id est quos. Qui ratione dolor aliquam. Nesciunt vero est eveniet a modi quas laboriosam. Exercitationem quo architecto sit magni doloremque enim temporibus. Molestiae eos occaecati dolores explicabo vel velit. Neque unde sed similique odit molestiae eum dolor.','http://wibisono.info/ab-ut-rerum-quos','https://gunawan.my.id/distinctio-aut-qui-sapiente-quod-iste-praesentium.html',NULL,'http://www.halimah.com/','1979-06-06 00:00:00','2016-10-04 00:00:00',68.00,'progress',10,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(3,1,3,'Qui inventore debitis.','corporis-ut-eos-eum','Sequi facere et nemo accusantium voluptas. Iste id minus amet dignissimos sint quia. Voluptas culpa ipsam iusto qui facere dolorem. Ut vel recusandae nisi consequatur qui voluptates aut inventore. Reprehenderit sint vel nulla. Praesentium magnam non odit ut consequatur libero ut. Sed quod nulla blanditiis impedit. Eveniet dolore rerum recusandae quo aut illo sed.','http://www.hartati.org/animi-molestiae-ut-quia-illum-aut-ipsum','http://maulana.biz.id/veritatis-ipsa-necessitatibus-dolorum-nihil',NULL,'https://www.irawan.ac.id/harum-amet-non-quam-voluptatem-dolore-qui-sit','1970-08-15 00:00:00','2012-11-16 00:00:00',53.00,'progress',4,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(4,1,3,'Pariatur cupiditate praesentium cumque.','maiores-voluptatem-voluptas','Omnis nisi quia aperiam adipisci totam. Corrupti amet illo esse. Et iusto voluptas exercitationem sit blanditiis. Et hic facere et dolor. In maxime et qui velit quod. Provident minus rerum eos quisquam dolorum. Rerum fuga qui totam inventore. Quos qui architecto aspernatur accusamus placeat libero illum est. Dolor dolor ea voluptatem consequatur modi.','http://puspita.org/soluta-minima-facere-vero-nisi','http://www.wibowo.name/molestias-est-ratione-et-voluptatem-et-delectus-perferendis',NULL,'http://jailani.asia/officia-unde-porro-alias-ea','2010-06-15 00:00:00','2018-09-17 00:00:00',34.00,'progress',14,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(5,1,3,'Quibusdam vero quo tempore.','cum-sit-ut-a','Dicta quia minus necessitatibus enim quos. Aut soluta quaerat distinctio provident. Rem deleniti voluptates eligendi et eligendi voluptatem. Quia accusamus neque dolorem qui et optio ducimus eum. Ea ea rerum iure accusamus atque recusandae aliquam. Quia earum labore enim vitae quisquam voluptas sit. Dolore et cum illum nesciunt quia aut et fuga. Aut dolor error totam delectus dolores porro. Ut id enim libero nihil nesciunt consequatur eveniet. Iusto et recusandae quaerat eos vel impedit. Perspiciatis dolorem distinctio accusantium id quia.','http://www.pradana.tv/','http://www.astuti.co/non-consequuntur-eaque-laboriosam',NULL,'https://mayasari.web.id/nulla-ut-delectus-vero-sit-at-unde.html','1987-10-19 00:00:00','2006-03-25 00:00:00',94.00,'finish',7,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(6,2,1,'Expedita rerum ab.','fugit-autem-fugiat-reiciendis-facere','Consequatur repellendus fuga saepe aut. Molestias id quae aliquam voluptatum. Voluptate consequuntur alias et voluptatem. Ut voluptatem aut dolore voluptas placeat. Et nemo a enim error. Nihil et qui officia laborum quis. Maxime est eaque inventore consequuntur voluptatem vel et. Est ipsa rerum consectetur debitis corrupti non nihil. Aut quia omnis fugiat. Sint a porro quia. Officia eum et exercitationem perspiciatis quam. Aliquid architecto qui harum eaque non rerum odit ipsa. Quia repellendus minus voluptas accusamus quis distinctio.','http://www.nainggolan.com/est-dicta-nobis-doloremque-eaque-excepturi-consequuntur','http://www.zulaika.or.id/sunt-consequuntur-ullam-perferendis-ullam-quia-aut',NULL,'http://www.budiyanto.name/dolorem-enim-magnam-omnis','1970-03-03 00:00:00','1980-12-09 00:00:00',61.00,'begin',21,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(7,2,1,'Labore deserunt necessitatibus.','consectetur-fugiat-sequi','Voluptas suscipit velit minima in. Quo vel est ad illo. Beatae dolorum libero exercitationem suscipit veritatis aut. Eius laboriosam nobis quisquam occaecati et fugit quia. Quibusdam nisi iste corrupti nobis. Assumenda velit totam sit eum sint in. Quam deleniti temporibus nihil a dignissimos in. Unde officia quae eos veniam id quo molestiae. Voluptatem aliquam animi aut ut.','http://sihombing.web.id/ut-et-voluptatum-animi-expedita-reprehenderit','http://budiman.co/porro-assumenda-ex-accusamus-ut-et-est-sed',NULL,'https://www.najmudin.or.id/repudiandae-ipsa-possimus-necessitatibus-sunt-quis-quia-explicabo','1999-12-04 00:00:00','2003-11-17 00:00:00',55.00,'progress',2,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(8,2,3,'Est eaque quod.','qui-praesentium-ipsam-natus','Culpa blanditiis fuga suscipit autem doloremque. Est similique eligendi asperiores minus et deleniti. Quidem deleniti maxime voluptatibus ut neque ea. Modi hic a quia quia voluptatum distinctio. Dignissimos nostrum aut vel neque. Ea est itaque facere quae deleniti. Ipsam tempore esse cum.','http://www.wibowo.web.id/','http://www.rahayu.tv/omnis-voluptate-dolor-unde-quod-saepe-qui-magni',NULL,'https://www.laksmiwati.com/et-ratione-tempore-veniam-quo-inventore-magni','2002-02-21 00:00:00','1985-06-10 00:00:00',54.00,'progress',21,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(9,2,1,'Sint voluptatem qui quos.','suscipit-ipsam-ipsum-molestias','Veniam id laudantium impedit excepturi. Minus est minus et quis vitae vel. Sunt in sed quos facere. Culpa voluptates rerum dignissimos ex. Quia quis quasi omnis voluptatem et libero molestias. Quia cum quidem et odio autem dolor dolorem corrupti. Odio ut aut aspernatur aut voluptate ducimus. Id nihil omnis et nobis excepturi aut. Omnis laborum quo exercitationem vitae amet. Distinctio praesentium omnis ut nesciunt. Quas et quo ducimus itaque. Omnis ipsum numquam ab est. Quam est rerum quis error eligendi vero voluptates. Voluptatem eius nobis est rerum quaerat cupiditate sit.','http://www.haryanti.biz/debitis-rerum-iusto-saepe-itaque-dolor-natus-voluptatem','http://www.rajasa.asia/expedita-assumenda-provident-aliquid-cupiditate.html',NULL,'http://mandasari.ac.id/distinctio-quo-exercitationem-praesentium-et-magnam-velit-sunt-ut','2014-03-21 00:00:00','1974-07-30 00:00:00',57.00,'progress',25,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(10,2,1,'Voluptas id itaque consequatur.','nobis-impedit-asperiores','Fuga ipsa est omnis et quisquam quia. Dolorem praesentium rerum molestiae sit consequatur amet. Rem voluptate non vel eos tempora error at voluptatem. Et blanditiis rerum reiciendis. Culpa modi ducimus et non. Magnam aliquam cumque tempora consequatur molestiae est. A aut odio et quaerat omnis. Voluptate error ratione veniam natus consectetur qui aperiam. Quasi ut dolor voluptas voluptatem. Blanditiis iusto voluptatem illo non sit natus.','http://novitasari.desa.id/eligendi-ratione-inventore-optio-consequatur-natus-voluptates','https://www.usada.id/enim-similique-saepe-nisi-illum-odio',NULL,'http://www.tampubolon.my.id/sed-aliquid-asperiores-quis-et-blanditiis-eum','1978-07-26 00:00:00','1983-01-01 00:00:00',54.00,'finish',2,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(11,3,1,'Voluptate laboriosam nobis.','a-veritatis-quo','Est alias suscipit nemo reiciendis vero quaerat dignissimos. Non asperiores et fugit quis. Temporibus sunt laboriosam et unde blanditiis. Incidunt blanditiis deserunt est aut eos dolorum. Eaque quia eos magni quidem. Ea deleniti eum quia autem. Vero aut pariatur voluptatem sed aut. Consequuntur atque totam eos aliquam consequatur. Natus doloremque ex eligendi assumenda cumque recusandae. Autem reprehenderit qui voluptate dolor dolore cumque.','http://mandasari.tv/nihil-consequatur-praesentium-nihil-ipsum','http://www.usada.co/sint-voluptatem-sit-vitae-modi-voluptatem-temporibus-minima.html',NULL,'http://www.tamba.my.id/quasi-voluptatem-illo-quia-quisquam-deleniti-sint','2000-03-10 00:00:00','1983-07-12 00:00:00',45.00,'begin',25,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(12,3,1,'Saepe eum quis.','voluptate-sunt-quasi-aut-ut','Minus autem dolorem et et. Laudantium corrupti eaque hic ea laudantium nisi dolores. Voluptas et excepturi ratione libero est. Odio aut quo et ea dignissimos amet quis. Vel assumenda doloremque suscipit amet. Vitae corporis quia repudiandae necessitatibus omnis. Rerum sit perferendis quae aut est.','http://www.jailani.org/','http://www.halim.co.id/animi-et-perspiciatis-aliquid.html',NULL,'https://www.kuswoyo.in/quia-possimus-odit-quasi-fuga-error-quia-animi','2006-04-10 00:00:00','1985-01-09 00:00:00',32.00,'progress',10,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(13,3,3,'Quidem et provident odio.','asperiores-aut-autem-quisquam','Omnis et nisi earum impedit labore reprehenderit. Quia officiis totam nobis dolore placeat inventore. Mollitia voluptatem ut sequi soluta ipsa omnis. Ipsa saepe commodi velit voluptatem. Sapiente aut quia explicabo. Perspiciatis sit aut maxime maxime dolorem. Pariatur excepturi non voluptatem quae aperiam earum pariatur. Perspiciatis quo error provident.','http://www.mahendra.mil.id/nobis-eius-sed-quidem-facilis-earum-sequi-non.html','http://www.kusmawati.name/aspernatur-quasi-autem-nam-nobis-tempore-perspiciatis-quo',NULL,'http://mustofa.org/non-facilis-eaque-voluptas-nisi-enim.html','1991-12-17 00:00:00','2015-02-28 00:00:00',76.00,'progress',16,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(14,3,1,'Est vel distinctio.','blanditiis-culpa-explicabo','Dignissimos atque magnam consequatur aspernatur est aliquid. Incidunt nesciunt maxime culpa non quia voluptatibus omnis. Cumque exercitationem eligendi quia modi molestias nihil consequatur. Unde sequi eligendi ut aut similique illum. Cumque sequi dolores soluta quia. Ut libero sit tenetur dolorem dolor rerum omnis repellendus. Magnam id libero labore voluptas sunt architecto deleniti. Reprehenderit mollitia doloremque laborum fugiat sapiente libero aliquid magnam. Aliquam nam quam consequatur rerum tempora. Quisquam non possimus ut velit velit. Necessitatibus accusantium totam ea totam voluptatibus numquam reprehenderit id. Ducimus voluptatem in officia. Totam exercitationem quia in sit voluptatem. Optio quam et illo cupiditate laudantium recusandae.','http://www.thamrin.id/quod-nesciunt-illo-quisquam-enim-architecto-voluptatem-doloribus-a','https://napitupulu.desa.id/minus-perspiciatis-consequuntur-ut-consequuntur-totam.html',NULL,'http://tamba.in/velit-voluptas-consequatur-earum-est-nemo-id','1998-09-10 00:00:00','2016-04-30 00:00:00',4.00,'progress',2,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(15,3,3,'Odit quaerat atque.','itaque-nihil-possimus','Et voluptates quia iure animi assumenda. Distinctio vel dicta odit qui. Dolorem est fugit eos. Alias quae ducimus ipsum debitis rem. Reprehenderit at atque molestiae nobis ut. Qui dolor nihil ex ea ea harum iste. Reprehenderit fuga eveniet quia ipsum. Voluptas distinctio autem illo magni facere et quo. Ut quia sint vero qui.','http://www.wibowo.mil.id/consectetur-est-praesentium-perspiciatis-ratione-sint-est','https://uwais.co/inventore-tempora-necessitatibus-quisquam-commodi-earum-dolorem-eos-et.html',NULL,'http://hidayanto.org/','2019-12-02 00:00:00','1994-05-19 00:00:00',23.00,'finish',28,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(16,4,3,'Animi ea.','voluptas-occaecati-quas','Molestiae et soluta eius et omnis quia qui. Dolorem autem sapiente similique repellendus voluptatem sit voluptatem. Architecto cum ratione delectus ducimus omnis aut. Commodi vel atque asperiores laborum recusandae veritatis fugit. Inventore vero et hic quam a molestiae. Laboriosam dignissimos ea numquam ipsa possimus culpa et neque. Impedit quidem perspiciatis veritatis exercitationem.','http://megantara.go.id/nesciunt-maiores-labore-autem-placeat-deleniti-et-sint','http://www.suryono.web.id/',NULL,'http://handayani.in/non-aspernatur-in-magni-nam','1997-01-30 00:00:00','1986-12-01 00:00:00',37.00,'begin',9,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(17,4,2,'Perspiciatis saepe labore iusto.','ab-assumenda-ut-est','Animi ut laboriosam fuga. Voluptatem cupiditate doloremque voluptates ex dignissimos quaerat. Non esse consequuntur consequuntur commodi. Numquam repudiandae ut accusantium qui. Veniam inventore voluptatem rem. Doloribus sint dolorem omnis et ullam quibusdam nisi. Natus tempore dicta praesentium eum earum labore suscipit excepturi.','http://zulaika.com/accusantium-nulla-quibusdam-neque-et-consequatur.html','http://budiyanto.asia/doloremque-et-accusantium-sint-inventore-est-consequuntur-qui.html',NULL,'http://hakim.name/','2006-11-24 00:00:00','1985-05-12 00:00:00',92.00,'progress',2,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(18,4,3,'Vitae incidunt aperiam.','alias-sed','Voluptas hic et maxime qui ut ipsum quia. Accusantium error hic ea eum consectetur alias. Qui deserunt dolores dolores necessitatibus eius et nihil. Reiciendis deserunt velit illum optio consequatur ut dolores. Laboriosam et iure veniam quisquam non eum. Reprehenderit quis sed numquam nihil inventore voluptatibus. Iure qui iure accusamus itaque quas iusto accusantium labore. Quis quia commodi ea consequatur quisquam atque. Eius enim dignissimos iure sit. Eius architecto sit quasi voluptates.','https://mandasari.net/aspernatur-eos-ipsum-dolor-non-animi.html','http://www.marbun.net/',NULL,'http://www.mardhiyah.asia/sunt-consequatur-et-voluptatem-qui-voluptas-assumenda-quam','1998-08-20 00:00:00','2001-07-15 00:00:00',50.00,'progress',1,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(19,4,3,'Quae officiis.','minima-reprehenderit-vel','Perferendis ea voluptatibus et in ut. Et voluptates velit harum asperiores natus qui minus. Ad voluptatem quis impedit libero dicta. Non odio mollitia quia et qui. Ut quia occaecati repudiandae. Enim sunt libero quis quia quia recusandae. Soluta nihil et quo voluptatem aperiam doloribus exercitationem. Ea nostrum nostrum veniam recusandae voluptatum et. Incidunt rem voluptatem sed quia commodi quas qui.','http://www.uwais.net/adipisci-quia-sit-asperiores-et-voluptatem-molestiae.html','https://namaga.com/consequatur-possimus-nobis-et.html',NULL,'https://januar.net/ut-est-qui-modi.html','2007-02-15 00:00:00','1989-06-13 00:00:00',54.00,'progress',7,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(20,4,3,'Sunt ut eius molestiae.','sequi-nesciunt-qui','Sed sint sunt velit autem modi nulla. Ipsum similique ipsa velit et. Ex blanditiis consectetur earum vel et. Ipsa necessitatibus ad quia qui et consequatur id. Aut et sit ea repellendus quis iure. Quod eveniet vel quisquam deserunt explicabo. Aut repellendus reiciendis est quisquam odio enim modi. Odit minima nam repudiandae et esse sint. Ut id libero et non consectetur soluta. Exercitationem reprehenderit minima consectetur voluptas occaecati inventore. Sapiente aut voluptatem ratione.','http://ramadan.name/','http://simbolon.sch.id/voluptatibus-commodi-numquam-possimus-quis-quam-dignissimos-aut-ad',NULL,'http://firgantoro.org/','2024-02-11 00:00:00','2001-04-05 00:00:00',70.00,'finish',22,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(21,5,2,'Id autem.','similique-voluptas-labore','Sunt illo culpa ex doloremque laboriosam et quia officiis. Voluptatem possimus ipsum labore maiores et nesciunt cum eos. Sint excepturi ut voluptatum distinctio magnam explicabo. Voluptatem ex aperiam rem qui omnis dolores occaecati. Quia molestiae aut tenetur illum. Exercitationem numquam id et et vero. Sit inventore blanditiis porro quo. Et molestiae excepturi recusandae.','http://uwais.ac.id/atque-nulla-voluptatem-esse-expedita-tempora-eius-mollitia','http://www.nasyidah.desa.id/',NULL,'http://najmudin.org/laudantium-illum-atque-accusantium-eum-enim','2011-04-20 00:00:00','1988-02-08 00:00:00',33.00,'begin',1,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(22,5,3,'Quisquam sint odit.','eum-quasi','Accusamus labore quo non similique facilis. Est omnis cum non voluptatum modi alias debitis quaerat. Assumenda ad rem est sint nam eligendi quos illo. Vero vero adipisci sapiente hic. Suscipit magni veritatis tempore quo esse omnis molestias autem. Eum harum qui eius commodi laudantium architecto harum. In atque sint aperiam.','https://dongoran.co/sapiente-beatae-voluptas-atque-error-eum-vel-molestias.html','http://www.budiman.biz.id/',NULL,'http://rahayu.mil.id/esse-aliquam-at-provident-eum-laboriosam-vitae-praesentium.html','1999-07-15 00:00:00','1982-01-31 00:00:00',11.00,'progress',5,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(23,5,1,'Harum facilis voluptatem.','eum-est-ullam-quia','Numquam repellat consequuntur qui et iure. Error quia quia quia accusantium sit minima mollitia. Odit qui sed qui doloremque provident necessitatibus. Accusamus repellendus iste doloribus voluptas in vel vel corporis. Dicta incidunt eum voluptas qui sint laudantium eos omnis. Quis qui fuga impedit. Dolorem omnis illum voluptas voluptatem est voluptatem. Doloremque repudiandae modi exercitationem voluptatum. Aut dolore dolor et assumenda cumque autem. Veniam temporibus sit fugit dolorum. Fuga velit quo voluptas mollitia velit minus. Mollitia impedit nesciunt et facilis. Saepe ex vitae corporis et atque.','http://www.wahyuni.desa.id/maiores-tempora-et-aut','https://www.laksmiwati.co/deserunt-facere-nulla-autem-consectetur-voluptatibus-magni-animi',NULL,'http://latupono.tv/est-sunt-temporibus-pariatur-veniam-et-corrupti-voluptatem','1993-06-29 00:00:00','1993-03-27 00:00:00',24.00,'progress',39,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(24,5,3,'Quae libero voluptas.','culpa-dolorem-repudiandae-tempora','Voluptatum perferendis voluptas consectetur quaerat molestiae molestiae. Nam reprehenderit cupiditate atque id. Ea quo numquam assumenda ab unde. Sequi doloribus illum aut dolorem et. Dolorum quo vel voluptatem omnis incidunt nemo velit sed. Eos aut aperiam architecto sed eius. Aut qui accusamus at ab voluptate perspiciatis architecto. Voluptatem ipsam tempore nisi voluptatem ipsa necessitatibus officia pariatur. Itaque et voluptas animi illum repudiandae quaerat ducimus. Eum tempora error sed. Minima qui est placeat ea. Qui et sed ut quo. Eum nihil libero accusamus.','https://saptono.go.id/consequatur-nemo-earum-occaecati-sit.html','https://www.siregar.my.id/est-repellat-laudantium-magnam-iusto-et-et',NULL,'http://www.wasita.co.id/est-repudiandae-voluptatem-quo-cum-nam-quidem.html','1990-12-09 00:00:00','1985-11-13 00:00:00',8.00,'progress',37,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(25,5,3,'Minus omnis quae voluptates.','ut-totam-id-neque','Id debitis aut cumque dolores laboriosam deleniti. Et quia in commodi tempora vel. Aut voluptas et minus enim voluptas facere. Omnis excepturi eaque minus quasi rem. Corporis veritatis rerum provident placeat sed ut est. Error tempore est natus ut laboriosam rerum fuga rerum. Est adipisci totam hic cupiditate facere. Id odit dolores eum omnis ut eligendi hic ea. Error inventore repellendus ea rem amet. Doloremque eveniet velit cumque.','http://www.salahudin.co/aut-atque-distinctio-deserunt-impedit-maiores-eum.html','http://tampubolon.biz/facere-illo-ipsa-repellendus-velit-quod-alias-dolor-et',NULL,'https://sihombing.tv/iusto-et-quo-voluptas-eos.html','1983-01-17 00:00:00','1993-07-03 00:00:00',84.00,'finish',6,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(26,31,NULL,'FGHFGHFGH','fghfghfgh','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',NULL,NULL,NULL,NULL,'2024-07-01 00:00:00','2024-07-01 15:00:00',50.00,'begin',1,'2024-07-01 11:19:54','2024-07-01 11:20:10'),
(27,31,1,'materas','materas','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','https://www.youtube.com/embed/vaPSz2-NVQs?si=eAhNaqJE-iXV5YOb',NULL,NULL,NULL,'2024-07-01 14:01:45','2024-07-01 18:00:00',50.00,'finish',1,'2024-07-01 11:19:54','2024-07-01 11:19:54'),
(28,32,NULL,'Upload SPT','upload-spt','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL,NULL,NULL,'2024-08-17 07:00:00','2024-08-17 16:06:20',10.00,'begin',1,'2024-08-17 14:18:12','2024-08-17 14:18:12'),
(29,32,3,'Belajar Operator PHP','belajar-operator-php','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL,NULL,'https://youtube.com','2024-08-17 12:00:00','2024-08-17 16:00:00',30.00,'progress',1,'2024-08-17 14:18:12','2024-08-17 14:18:12'),
(30,32,3,'Perulangan PHP','perulangan-php','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL,NULL,'https://youtube.com','2024-08-17 13:00:00','2024-08-17 17:00:00',30.00,'progress',1,'2024-08-17 14:18:12','2024-08-17 14:18:12'),
(31,32,3,'Penggunaan IF','penggunaan-if','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL,NULL,'https://github.com','2024-08-18 07:00:00','2024-08-18 17:00:00',30.00,'finish',1,'2024-08-17 14:18:12','2024-08-17 14:18:12');

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `teacher_id` bigint(20) unsigned NOT NULL,
  `img_thumbnail` varchar(255) NOT NULL,
  `img_thumbnail_path` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description_short` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `implementation_start` date NOT NULL,
  `implementation_end` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_category_id_foreign` (`category_id`),
  KEY `courses_type_id_foreign` (`type_id`),
  KEY `courses_teacher_id_foreign` (`teacher_id`),
  KEY `courses_created_by_foreign` (`created_by`),
  KEY `courses_updated_by_foreign` (`updated_by`),
  KEY `courses_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courses_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `courses` */

insert  into `courses`(`id`,`category_id`,`type_id`,`teacher_id`,`img_thumbnail`,`img_thumbnail_path`,`title`,`slug`,`description_short`,`description`,`implementation_start`,`implementation_end`,`is_active`,`created_by`,`updated_by`,`deleted_by`,`created_at`,`updated_at`,`deleted_at`) values 
(1,2,1,4,'https://via.placeholder.com/640x480.png/00bb88?text=dignissimos',NULL,'Eligendi veritatis dolorum quos vel velit doloribus distinctio.','eum-officiis-iure-libero-deleniti-dolor','Tenetur maiores sunt architecto unde itaque.','Ratione eius voluptatem aliquid harum. Numquam labore hic quae. Sit ut incidunt eum alias.','1984-05-29','2011-12-05',1,6,NULL,1,'2024-07-01 08:43:52','2024-07-01 11:22:03','2024-07-01 11:22:03'),
(2,1,2,5,'https://via.placeholder.com/640x480.png/007755?text=ea',NULL,'Expedita voluptas optio vel aliquid.','qui-sed-laborum-rerum','Et fuga sequi repudiandae sint incidunt sed quia.','Rerum harum et reprehenderit iure eveniet repellendus ipsum eligendi. Ipsa cupiditate culpa debitis aliquam velit optio. Quas iusto voluptas ad et.','2019-10-10','2014-11-02',1,9,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(3,1,1,6,'https://via.placeholder.com/640x480.png/001188?text=ea',NULL,'Esse et occaecati sit occaecati rerum voluptatem voluptatem consequatur.','odit-at-distinctio-facilis-voluptate-vero-nobis','Earum rerum enim et molestiae.','Repellat sit in accusantium dolorem sunt. Iure consequuntur aliquid beatae architecto illum aut et. Tenetur occaecati eligendi facere.','2020-01-01','1990-10-20',0,10,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(4,2,1,8,'https://via.placeholder.com/640x480.png/0099ee?text=asperiores',NULL,'Et non cum quod maiores magni.','vel-omnis-alias-molestiae-ad','Sunt maxime voluptas autem quia.','Quo ut earum quo aliquam tempore est optio. Laborum doloremque nihil velit unde. Est quam ut architecto officiis distinctio.','2016-11-14','1997-12-18',1,13,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(5,1,3,10,'https://via.placeholder.com/640x480.png/00ee22?text=voluptatem',NULL,'Dolorem unde quod id ratione nihil sit.','aut-totam-numquam-exercitationem','Vero voluptas est blanditiis suscipit possimus dolorum.','Veritatis dolorum sed perferendis. Facilis dolorem autem voluptatibus eius dolor hic. Quo molestiae ut velit aperiam recusandae voluptates. Dolor iste laborum autem omnis.','2013-06-17','1983-06-09',1,12,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(6,1,3,11,'https://via.placeholder.com/640x480.png/0066aa?text=corporis',NULL,'Itaque maiores tenetur perferendis libero fugit voluptatibus explicabo.','doloremque-iste-dolores-sit-cupiditate','Fugiat ipsum eos beatae quo et.','Aut fugiat sapiente et in ea. Neque esse est aliquam soluta aspernatur eos et. Eum blanditiis atque rerum eaque perspiciatis non quisquam.','1999-09-21','1985-04-30',0,7,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(7,1,2,12,'https://via.placeholder.com/640x480.png/001133?text=eos',NULL,'Cupiditate optio rem eum eius odio dolores tenetur.','est-sunt-repellat-omnis-dolores','Iure eum tempore possimus.','Perspiciatis iusto quia dolores distinctio sint. Et et sequi enim aut et nihil. A maxime ipsum reiciendis aperiam est quia eius. Laudantium qui perferendis earum et sunt qui.','1980-02-17','2007-11-24',0,1,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(8,1,3,13,'https://via.placeholder.com/640x480.png/008811?text=aut',NULL,'Aliquam perferendis nulla quae magnam.','repellendus-et-eos-similique-magni-maiores','Ratione omnis ab qui illo. Eum est asperiores corrupti quam qui quam sit magnam.','Eos harum ut debitis sed soluta et dolores nihil. Ipsam ut sit rerum est. Amet omnis ut rerum et a sit et. Sunt numquam dolor magni qui.','2004-12-14','2012-05-22',0,19,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(9,1,3,14,'https://via.placeholder.com/640x480.png/000044?text=voluptatem',NULL,'Repudiandae reiciendis perferendis quidem autem quaerat porro.','eligendi-quo-illo-enim-repellendus-consequatur-et','Corrupti rerum aliquam eum harum vel magni suscipit sit. Eos corporis et et minus quia libero architecto dolores.','Dolor dolorum iste facere quasi. Aut minima perspiciatis beatae minus doloremque. Sunt inventore ratione dolor. Est aliquid velit aut voluptas vero nihil.','2001-01-04','1985-02-18',0,12,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(10,2,1,16,'https://via.placeholder.com/640x480.png/003344?text=molestias',NULL,'Cupiditate maxime veniam voluptas dolor.','dolor-aspernatur-voluptatum-occaecati-natus-ut','Aliquid repellendus asperiores ut.','Vel quos repellat perferendis voluptatibus id sed rerum. Harum magnam ex atque rem aliquid. Maxime nesciunt sit voluptatem quam. Dolore non voluptatem eum est ut sit.','1992-10-21','2008-06-30',1,2,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(11,2,1,17,'https://via.placeholder.com/640x480.png/0099dd?text=molestiae',NULL,'Asperiores perspiciatis blanditiis quas commodi.','amet-fuga-aspernatur-consectetur-itaque-quibusdam-et','Sint velit quo sit est.','Commodi unde rerum et vel facere necessitatibus pariatur. Blanditiis cumque explicabo est qui et delectus. Soluta odit perferendis ducimus quod eveniet odio. Repellat maiores repellat magni aut. Et autem tempora ea repellat.','1994-01-13','1972-07-26',1,4,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(12,2,1,18,'https://via.placeholder.com/640x480.png/00ee55?text=fuga',NULL,'Non ratione expedita perferendis et voluptatibus et quis.','tenetur-ea-et-odit-ut-cupiditate-sint','Maiores est temporibus nulla non maxime ipsum eaque. Nemo unde est est magnam.','Quia rerum explicabo reiciendis quis. Quidem commodi tempore et nihil non rerum. Aliquam ducimus et aliquid alias suscipit similique eos. Incidunt accusamus ipsa reiciendis ad id.','2023-09-23','1989-01-25',1,25,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(13,1,1,20,'https://via.placeholder.com/640x480.png/009988?text=dolorum',NULL,'Eligendi id et quibusdam voluptates quae earum.','ex-qui-placeat-magnam-et','Vel non vero natus.','Ducimus accusamus omnis quae non asperiores. Veniam qui nemo nihil et accusantium. Veniam suscipit magnam commodi sit eos ut.','1979-07-25','1981-01-15',0,9,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(14,1,1,21,'https://via.placeholder.com/640x480.png/003333?text=et',NULL,'Ex perspiciatis quia aut.','et-quos-quibusdam-dolores-saepe-quo-cumque','Nam eum aut dolores rerum.','Sapiente ab incidunt eum numquam non. Quod quam omnis at placeat est. Quia voluptas alias perferendis dicta quia. Ad maxime eius dolorem corrupti a error.','2023-02-10','2000-12-03',0,13,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(15,2,3,22,'https://via.placeholder.com/640x480.png/000022?text=necessitatibus',NULL,'Repellendus dolor et aut ratione.','voluptatum-quidem-et-rerum','Esse rerum dolor in voluptates. Numquam pariatur ut aut rem aperiam earum possimus.','Est non sunt ut perspiciatis qui maiores eligendi nulla. Voluptatem quo autem fugiat autem ducimus et consequatur.','1979-09-27','2006-07-28',1,8,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(16,1,3,24,'https://via.placeholder.com/640x480.png/00ccbb?text=rerum',NULL,'Consequatur veritatis et deserunt reiciendis nulla dolores autem ad.','dolore-ut-est-itaque-quo','Nihil dolor provident voluptates ullam voluptate explicabo. Vel sed qui eos.','Iste ea pariatur voluptatem voluptatem qui et voluptatibus earum. Aperiam quam praesentium aut aut impedit. Reiciendis voluptatem fuga neque dolorum unde atque pariatur. Minima qui fuga est aut natus.','1993-09-30','2010-04-26',0,13,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(17,1,3,25,'https://via.placeholder.com/640x480.png/00ffbb?text=fugiat',NULL,'Reiciendis dolore repellat similique.','cum-molestias-aperiam-exercitationem-qui-inventore-qui','Cum est enim est ut rem. Debitis eos rerum aut facilis.','Praesentium voluptatem fugiat quia quo eius. Vel maiores dicta harum qui voluptatibus fugiat dicta. Laudantium aut quis sed repudiandae.','2007-04-15','2013-05-17',1,11,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(18,2,3,26,'https://via.placeholder.com/640x480.png/006666?text=et',NULL,'Odit voluptates unde quos.','minima-quia-aspernatur-quia-est','Consequuntur voluptatem deleniti voluptate iure error tenetur ad incidunt. Sint harum illum nulla.','Eos est ipsam quisquam adipisci veniam velit accusamus. Similique aut adipisci illo voluptate earum sed error ut. Minus dolores eius est quis officiis dolore fuga. Aspernatur quasi asperiores iste expedita aut est.','1971-01-27','1996-05-06',1,9,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(19,1,3,28,'https://via.placeholder.com/640x480.png/00bbff?text=magni',NULL,'Placeat porro dolorem beatae et provident.','et-eum-sit-sit-omnis','Aut ullam et exercitationem qui tempore. At qui aliquam ut distinctio in.','Earum corporis velit omnis fuga accusantium officiis. Et deserunt maxime ullam quo ut itaque quo. Accusamus corrupti at sed saepe libero facilis. Sed et temporibus consectetur impedit doloremque expedita omnis.','1991-10-19','2001-05-09',0,15,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(20,1,2,29,'https://via.placeholder.com/640x480.png/006633?text=dolor',NULL,'Nobis aliquam accusamus aut dolor laborum voluptas sint perspiciatis.','asperiores-cum-aliquid-placeat','Ipsum corrupti excepturi quia ducimus.','Nam voluptatem ab eius accusantium voluptatem nostrum. Est consectetur molestiae animi et non laboriosam. Quo voluptatum voluptas nesciunt ad velit placeat.','1991-02-13','2006-07-13',0,25,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(21,2,3,30,'https://via.placeholder.com/640x480.png/0088ee?text=molestias',NULL,'Iste vel autem corporis voluptatem perspiciatis aut consequatur.','tempore-sapiente-consequuntur-sapiente-quae-sed-officiis','Eos sit eaque dolor est. Iure et vel dolorum exercitationem aut consequatur.','Eligendi quia id accusamus esse rem unde quibusdam esse. Quia optio officia ea autem. Alias dignissimos et necessitatibus delectus et totam.','2007-02-06','2022-01-25',1,3,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(22,2,1,31,'https://via.placeholder.com/640x480.png/0088dd?text=quod',NULL,'Ducimus excepturi amet qui reiciendis blanditiis animi dolor.','recusandae-repellendus-est-est-eligendi-voluptatem-delectus','Eos tempora aut et soluta.','Voluptates sed ipsum error nobis veniam consequatur fugit libero. Voluptatem et et id magni repellendus et doloribus. Perferendis impedit aut voluptatem nostrum minus doloribus est. Libero necessitatibus amet qui facilis sequi.','2005-02-24','2000-05-17',0,28,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(23,1,1,32,'https://via.placeholder.com/640x480.png/006600?text=et',NULL,'Quia necessitatibus dolor sapiente hic.','atque-ipsam-sunt-enim-et-harum-laudantium-error','Magnam dolorem dolorem ut voluptatem. Aliquid asperiores ut voluptatem ab tenetur laudantium fuga.','Est et dolor harum reprehenderit. Cumque dignissimos harum et et suscipit et error. Dolorem consequatur non nam. Quia ut voluptas vitae aperiam velit sed.','2018-06-10','2022-03-27',0,13,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(24,1,2,34,'https://via.placeholder.com/640x480.png/006644?text=sed',NULL,'Reiciendis natus dignissimos repudiandae cupiditate cum suscipit.','distinctio-sapiente-nisi-recusandae-ex-sunt-veritatis','Omnis consequatur earum rerum odio. Aut quisquam hic veritatis aut nemo ipsum eos tempore.','Id velit omnis voluptatem impedit. Labore veritatis et sit ea ut debitis deleniti. Est non eius deserunt cumque.','2007-02-17','2017-08-15',1,13,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(25,1,1,35,'https://via.placeholder.com/640x480.png/002200?text=molestias',NULL,'Doloremque ex suscipit et quam hic eos exercitationem.','aliquam-assumenda-cum-velit-numquam-tenetur','Et quasi quia quia consequatur voluptatem.','Qui et et et animi repudiandae voluptatem aut. Sit qui odit odio magni quaerat tempora qui. Voluptatem nostrum natus id rerum. Molestiae deleniti praesentium sit eum suscipit.','2007-05-24','2014-12-15',0,36,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(26,2,2,36,'https://via.placeholder.com/640x480.png/00ee77?text=placeat',NULL,'Architecto assumenda sed omnis fuga ratione aut.','saepe-harum-temporibus-et-odit-nam','Atque exercitationem debitis a numquam. Voluptatum nulla maiores voluptates fugiat nisi et sapiente.','Omnis et aut in numquam. Nesciunt dolores quam sed odit facere est quia culpa.','2017-06-29','2018-08-18',1,19,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(27,2,2,37,'https://via.placeholder.com/640x480.png/005555?text=tempore',NULL,'Quia et eligendi in et ea voluptas quas.','tempore-ea-reiciendis-distinctio-provident-quisquam-inventore','Rerum voluptas eum ut et cumque molestiae. Maiores totam perspiciatis tempore non tempora impedit qui voluptatibus.','Inventore enim temporibus ea occaecati et eos laboriosam. Eum quam repudiandae maxime atque maxime temporibus.','2005-04-03','1981-09-15',0,24,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(28,1,1,38,'https://via.placeholder.com/640x480.png/001122?text=soluta',NULL,'Quam eum quia eos animi qui.','ut-corporis-quis-voluptas-amet','Iste rem est itaque harum voluptatem.','In repellat sed qui ut consequatur dignissimos. Consectetur quo aut autem. Ab sed vero totam explicabo corrupti vel.','1991-03-21','2012-01-01',0,1,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(29,1,1,40,'https://via.placeholder.com/640x480.png/008800?text=porro',NULL,'Aspernatur quod ea qui asperiores voluptates molestias enim.','esse-deserunt-id-aliquam-laborum-et','Voluptates laborum amet suscipit nihil molestiae optio. Dolorem voluptatum et cupiditate voluptas quo provident et.','Asperiores nam harum saepe. Quisquam nemo facere exercitationem perferendis fugit vero.','1973-07-02','1983-04-08',0,37,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(30,1,1,42,'https://via.placeholder.com/640x480.png/006699?text=sed',NULL,'Quia placeat doloribus sunt enim nisi rerum.','amet-recusandae-cupiditate-nihil-expedita','Dolorem quo facilis eum sit.','Laborum dolorum dolor atque voluptate quidem consequatur ut. Accusamus ut odit a vel praesentium culpa atque. Aspernatur ea dolorum ut rem enim nam. Delectus voluptates dolores quia accusamus ut sit qui.','2018-02-12','1979-02-16',0,17,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52',NULL),
(31,1,1,1,'http://localhost:8000/storage/thumbnails/FBGQKJOkrcM65WCjYZDo5y7Z4Bb6noMxAezbr5H0.png','thumbnails/FBGQKJOkrcM65WCjYZDo5y7Z4Bb6noMxAezbr5H0.png','asdasdasda sdas','asdasdasda-sdas','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s','<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s</span></p>','2024-07-01','2024-07-01',1,1,NULL,NULL,'2024-07-01 11:19:54','2024-07-01 11:19:54',NULL),
(32,1,1,1,'http://localhost:8000/storage/thumbnails/7ukzdeXmbDzP4PJEtVcnPrA8UWWgGALjmh9r45jR.png','thumbnails/7ukzdeXmbDzP4PJEtVcnPrA8UWWgGALjmh9r45jR.png','Pemrograman PHP Basic','pemrograman-php-basic','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','2024-08-17','2024-08-19',1,1,NULL,NULL,'2024-08-17 14:18:12','2024-08-17 14:18:12',NULL);

/*Table structure for table `education_masters` */

DROP TABLE IF EXISTS `education_masters`;

CREATE TABLE `education_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `education_masters` */

insert  into `education_masters`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Tidak Sekolah','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,'SD Sederajat','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(3,'SMP Sederajat','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(4,'SMA Sederajat','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(5,'D1','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(6,'D2','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(7,'D3','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(8,'D4','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(9,'S1','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(10,'S2','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(11,'S3','2024-07-01 08:43:50','2024-07-01 08:43:50');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `institution_masters` */

DROP TABLE IF EXISTS `institution_masters`;

CREATE TABLE `institution_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `institution_masters` */

insert  into `institution_masters`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'SETDA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,'SETWAN','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(3,'INSPEKTORAT','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(4,'BAKESBANAGPOL','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(5,'BAPENDA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(6,'BAPPEDA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(7,'BPBD','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(8,'BKPSDM','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(9,'BPKAD','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(10,'DINSOS','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(11,'DISDUKCAPIL','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(12,'DISHUB','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(13,'DISKOMINFO','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(14,'DISKOPUKMPERINDANG','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(15,'DISNAKERTRANS','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(16,'DISPAPORA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(17,'DKP3','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(18,'DLH','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(19,'DP3AKB','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(20,'DPK','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(21,'DPKP','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(22,'DPMPTSP','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(23,'DPUPR','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(24,'SATPOL PP','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(25,'KEC CIPOCOK JAYA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(26,'KEC CURUG','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(27,'KEC KASEMEN','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(28,'KEC TAKTAKAN','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(29,'KEC WALANTAKA','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(30,'DINKES','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(31,'RSUD','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(32,'DINDIKBUD','2024-07-01 08:43:50','2024-07-01 08:43:50');

/*Table structure for table `learning_materials` */

DROP TABLE IF EXISTS `learning_materials`;

CREATE TABLE `learning_materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_topic_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_mime` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `learning_materials_course_topic_id_foreign` (`course_topic_id`),
  CONSTRAINT `learning_materials_course_topic_id_foreign` FOREIGN KEY (`course_topic_id`) REFERENCES `course_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `learning_materials` */

insert  into `learning_materials`(`id`,`course_topic_id`,`title`,`description`,`file_path`,`file_url`,`file_type`,`file_size`,`file_mime`,`created_at`,`updated_at`) values 
(1,29,'Belajar Operator',NULL,'documents/wXwlOej70Bzix0Xs0wY4gJpEWRVy3r3Ktoheey3j.pdf','http://localhost:8000/storage/documents/wXwlOej70Bzix0Xs0wY4gJpEWRVy3r3Ktoheey3j.pdf','pdf','171081','application/pdf','2024-08-17 14:25:47','2024-08-17 14:25:47'),
(2,30,'Perulangan PHP',NULL,'documents/kmwtgDeuCC1OG7MZtVyugUQR41ze30U0i72mOHoU.pdf','http://localhost:8000/storage/documents/kmwtgDeuCC1OG7MZtVyugUQR41ze30U0i72mOHoU.pdf','pdf','209178','application/pdf','2024-08-17 15:04:21','2024-08-17 15:04:21'),
(3,31,'Penggunaan IF',NULL,'documents/ROZ3BZ5QdtWIRIcZo7NM0mcyEbSobBQTz8BqzRpl.pdf','http://localhost:8000/storage/documents/ROZ3BZ5QdtWIRIcZo7NM0mcyEbSobBQTz8BqzRpl.pdf','pdf','394842','application/pdf','2024-08-17 15:04:44','2024-08-17 15:04:44');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2024_06_18_113741_create_education_masters_table',1),
(6,'2024_06_18_113920_create_rank_masters_table',1),
(7,'2024_06_18_113955_create_institution_masters_table',1),
(8,'2024_06_18_123128_create_permission_tables',1),
(9,'2024_06_18_123453_create_teachers_table',1),
(10,'2024_06_18_123625_create_participants_table',1),
(11,'2024_06_18_123831_create_category_courses_table',1),
(12,'2024_06_18_123914_create_type_courses_table',1),
(13,'2024_06_18_124941_create_courses_table',1),
(14,'2024_06_18_162724_create_type_topics_table',1),
(15,'2024_06_18_170843_create_course_topics_table',1),
(16,'2024_06_18_172651_participants_courses',1),
(17,'2024_06_18_172755_create_participant_activities_table',1),
(18,'2024_08_15_211659_create_learning_materials_table',2),
(19,'2024_08_15_225948_change_description_learning_materials',2);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(1,'App\\Models\\User',5),
(1,'App\\Models\\User',8),
(1,'App\\Models\\User',11),
(1,'App\\Models\\User',12),
(1,'App\\Models\\User',19),
(1,'App\\Models\\User',21),
(1,'App\\Models\\User',22),
(1,'App\\Models\\User',25),
(1,'App\\Models\\User',27),
(1,'App\\Models\\User',28),
(1,'App\\Models\\User',33),
(1,'App\\Models\\User',36),
(1,'App\\Models\\User',38),
(1,'App\\Models\\User',40),
(2,'App\\Models\\User',2),
(2,'App\\Models\\User',10),
(2,'App\\Models\\User',14),
(2,'App\\Models\\User',17),
(2,'App\\Models\\User',18),
(2,'App\\Models\\User',23),
(2,'App\\Models\\User',26),
(2,'App\\Models\\User',29),
(2,'App\\Models\\User',32),
(2,'App\\Models\\User',37),
(2,'App\\Models\\User',42),
(2,'App\\Models\\User',43),
(3,'App\\Models\\User',3),
(3,'App\\Models\\User',4),
(3,'App\\Models\\User',6),
(3,'App\\Models\\User',7),
(3,'App\\Models\\User',9),
(3,'App\\Models\\User',13),
(3,'App\\Models\\User',15),
(3,'App\\Models\\User',16),
(3,'App\\Models\\User',20),
(3,'App\\Models\\User',24),
(3,'App\\Models\\User',30),
(3,'App\\Models\\User',31),
(3,'App\\Models\\User',34),
(3,'App\\Models\\User',35),
(3,'App\\Models\\User',39),
(3,'App\\Models\\User',41);

/*Table structure for table `participant_activities` */

DROP TABLE IF EXISTS `participant_activities`;

CREATE TABLE `participant_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` bigint(20) unsigned NOT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `course_topic_id` bigint(20) unsigned NOT NULL,
  `progress` decimal(8,2) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participant_activities_participant_id_foreign` (`participant_id`),
  KEY `participant_activities_course_id_foreign` (`course_id`),
  KEY `participant_activities_course_topic_id_foreign` (`course_topic_id`),
  CONSTRAINT `participant_activities_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participant_activities_course_topic_id_foreign` FOREIGN KEY (`course_topic_id`) REFERENCES `course_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participant_activities_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `participant_activities` */

insert  into `participant_activities`(`id`,`participant_id`,`course_id`,`course_topic_id`,`progress`,`file`,`created_at`,`updated_at`) values 
(1,1,31,26,50.00,'documents/YXW2TMxoqnFg8SnuAVNLBaN5SqYA4j68FIUGRzTd.pdf','2024-07-01 14:01:36','2024-07-01 14:01:36'),
(2,1,31,27,50.00,NULL,'2024-07-01 14:01:53','2024-07-01 14:01:53'),
(3,2,31,26,50.00,'documents/lGWdwo9ZYlo3TuiFAuv3s9QWqKxxqP6AOQwpMbUi.jpg','2024-07-01 14:13:02','2024-07-01 14:13:02'),
(4,1,32,28,10.00,'documents/bWO3TETsHWCW3a5LRlKNLsmar9Ov9hZP2ZYYt1in.pdf','2024-08-17 15:07:02','2024-08-17 15:07:02'),
(5,1,32,29,30.00,NULL,'2024-08-17 15:26:00','2024-08-17 15:26:00');

/*Table structure for table `participants` */

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `institution_id` bigint(20) unsigned DEFAULT NULL,
  `education_id` bigint(20) unsigned DEFAULT NULL,
  `rank_id` bigint(20) unsigned DEFAULT NULL,
  `front_name` varchar(255) NOT NULL,
  `back_name` varchar(255) DEFAULT NULL,
  `front_title` varchar(255) DEFAULT NULL,
  `back_title` varchar(255) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_user_id_foreign` (`user_id`),
  KEY `participants_institution_id_foreign` (`institution_id`),
  KEY `participants_education_id_foreign` (`education_id`),
  KEY `participants_rank_id_foreign` (`rank_id`),
  CONSTRAINT `participants_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `participants_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institution_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `participants_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `rank_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `participants` */

insert  into `participants`(`id`,`user_id`,`institution_id`,`education_id`,`rank_id`,`front_name`,`back_name`,`front_title`,`back_title`,`nik`,`nip`,`birth_place`,`birth_date`,`gender`,`city`,`country`,`address`,`phone`,`unit_name`,`position`,`created_at`,`updated_at`) values 
(1,3,1,1,1,'Peserta','Doe',NULL,NULL,'1234567890123456',NULL,'Participant Birth Place','1990-01-01','Male','Participant City',NULL,'Participant Address','0987654321',NULL,NULL,'2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,4,NULL,1,NULL,'Jarwa','Uwais','Dr.',NULL,NULL,'59236015849','Manado','1997-06-08','female',NULL,NULL,'Ki. R.E. Martadinata No. 373, Bengkulu 92753, Kalsel',NULL,NULL,NULL,'2024-07-01 08:43:51','2024-07-01 08:43:51'),
(3,6,NULL,10,8,'Caturangga','Wulandari',NULL,'Esq.','2931558990758140','08248237584','Pematangsiantar','1985-05-30',NULL,'Surakarta',NULL,NULL,'0700 0479 065',NULL,NULL,'2024-07-01 08:43:51','2024-07-01 08:43:51'),
(4,7,24,NULL,9,'Tantri','Sitorus',NULL,'JD','3707451929530490','67286535781',NULL,'1985-06-06','female',NULL,NULL,'Gg. Jayawijaya No. 437, Surakarta 47128, Sultra','(+62) 800 2095 8506',NULL,NULL,'2024-07-01 08:43:51','2024-07-01 08:43:51'),
(5,9,NULL,5,NULL,'Kalim','Rahayu',NULL,NULL,'6685211389245246','05698903767','Bandung',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:51','2024-07-01 08:43:51'),
(6,13,NULL,NULL,NULL,'Carla','Sinaga',NULL,'MD','9449831873207230','67588551536','Magelang','1992-06-14',NULL,NULL,NULL,NULL,'0486 9950 6831',NULL,'Belum / Tidak Bekerja','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(7,15,NULL,NULL,11,'Daniswara','Utama','Dr.',NULL,'4019734412059039','44235953043',NULL,'2022-02-13','male','Langsa',NULL,'Jr. Haji No. 375, Sawahlunto 91050, Bengkulu',NULL,'PT Dabukke Pudjiastuti','Tukang Kayu','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(8,16,26,NULL,NULL,'Cakrawangsa','Mandala','Mrs.','DDS',NULL,'46957596952',NULL,'1986-12-01','male','Bandar Lampung',NULL,NULL,NULL,'PJ Lestari',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(9,20,NULL,9,15,'Dirja','Hartati',NULL,'PhD','5319413394875545',NULL,NULL,'1991-02-15',NULL,NULL,NULL,'Jln. Raden No. 465, Pangkal Pinang 23428, Sulteng',NULL,NULL,'Nahkoda','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(10,24,NULL,NULL,NULL,'Galar','Kurniawan','Dr.','MD',NULL,'51667982743',NULL,NULL,'male','Samarinda',NULL,NULL,NULL,'PD Mustofa Thamrin',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(11,30,2,9,14,'Arsipatra','Saptono',NULL,'DDS',NULL,'98795304713',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Buruh Peternakan','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(12,31,7,8,NULL,'Ghaliyati','Melani','Ms.','DDS',NULL,NULL,'Langsa',NULL,NULL,NULL,NULL,'Kpg. Uluwatu No. 828, Langsa 92451, Papua',NULL,NULL,'Belum / Tidak Bekerja','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(13,34,18,NULL,1,'Hafshah','Prasasta',NULL,NULL,'6530579871225002',NULL,'Manado',NULL,'female',NULL,NULL,'Ki. Bawal No. 198, Administrasi Jakarta Timur 98083, Kaltim','0784 7314 3734',NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(14,35,10,NULL,18,'Tami','Marpaung','Mrs.',NULL,'9683724764564801',NULL,'Ambon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(15,39,16,6,NULL,'Hendra','Sinaga',NULL,NULL,NULL,NULL,'Banjarbaru','1990-08-19',NULL,'Blitar',NULL,NULL,NULL,'Fa Handayani Fujiati','Biarawati','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(16,41,12,9,NULL,'Shania','Santoso','Dr.',NULL,'4909696409643596',NULL,'Prabumulih',NULL,'male','Tangerang',NULL,NULL,'(+62) 568 0998 973',NULL,'Desainer','2024-07-01 08:43:52','2024-07-01 08:43:52');

/*Table structure for table `participants_courses` */

DROP TABLE IF EXISTS `participants_courses`;

CREATE TABLE `participants_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) unsigned NOT NULL,
  `participant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_courses_course_id_foreign` (`course_id`),
  KEY `participants_courses_participant_id_foreign` (`participant_id`),
  CONSTRAINT `participants_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participants_courses_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `participants_courses` */

insert  into `participants_courses`(`id`,`course_id`,`participant_id`,`created_at`,`updated_at`) values 
(1,31,1,'2024-07-01 14:00:38',NULL),
(2,31,2,'2024-07-01 14:11:50',NULL),
(3,32,1,'2024-08-17 15:05:56',NULL);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

insert  into `password_reset_tokens`(`email`,`token`,`created_at`) values 
('ahmad.fatoni@mindotek.com','$2y$10$XEz2s11ao0A3yjcmlQaequ2OjUe5frp30JotWTG5yHrhZUScq1F02','2024-07-01 10:24:01');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `rank_masters` */

DROP TABLE IF EXISTS `rank_masters`;

CREATE TABLE `rank_masters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rank_masters` */

insert  into `rank_masters`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'non asn','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,'pembina utama / iv e','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(3,'pembina utama madya / iv d','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(4,'pembina utama muda / iv c','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(5,'pembina tingkat 1 / iv b','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(6,'pembina / iv a','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(7,'penata tingkat 1 / iii d','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(8,'penata / iii c','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(9,'penata muda tingkat 1 / iii b','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(10,'penata muda / iii a','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(11,'pengatur tingkat 1 / ii d','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(12,'pengatur / ii c','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(13,'pengatur muda tingkat 1 / ii b','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(14,'pengatur muda / ii a','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(15,'juru tingkat / i d','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(16,'juru / i c','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(17,'juru muda tingkat 1 / i b','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(18,'juru muda / i a','2024-07-01 08:43:50','2024-07-01 08:43:50');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'administrator','web','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,'teacher','web','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(3,'participant','web','2024-07-01 08:43:50','2024-07-01 08:43:50');

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `institution_id` bigint(20) unsigned DEFAULT NULL,
  `education_id` bigint(20) unsigned DEFAULT NULL,
  `rank_id` bigint(20) unsigned DEFAULT NULL,
  `front_name` varchar(255) NOT NULL,
  `back_name` varchar(255) DEFAULT NULL,
  `front_title` varchar(255) DEFAULT NULL,
  `back_title` varchar(255) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`),
  KEY `teachers_institution_id_foreign` (`institution_id`),
  KEY `teachers_education_id_foreign` (`education_id`),
  KEY `teachers_rank_id_foreign` (`rank_id`),
  CONSTRAINT `teachers_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `teachers_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institution_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `teachers_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `rank_masters` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`user_id`,`institution_id`,`education_id`,`rank_id`,`front_name`,`back_name`,`front_title`,`back_title`,`nik`,`nip`,`birth_place`,`birth_date`,`gender`,`city`,`country`,`address`,`phone`,`unit_name`,`position`,`created_at`,`updated_at`) values 
(1,2,NULL,1,NULL,'Pengajar','Smith',NULL,NULL,'1234567890123456',NULL,NULL,NULL,NULL,'Teacher City',NULL,'Teacher Address','1234567890',NULL,NULL,'2024-07-01 08:43:50','2024-07-01 08:43:50'),
(2,10,NULL,9,NULL,'Dimaz','Andriani',NULL,NULL,'1453972135644062','73888298343','Tangerang Selatan','2013-08-18','male',NULL,NULL,'Psr. M.T. Haryono No. 711, Yogyakarta 11146, Jateng',NULL,NULL,'Tukang Jahit','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(3,14,5,NULL,NULL,'Garda','Putra','Mr.','Esq.','4267277206451168',NULL,NULL,NULL,'female','Bitung',NULL,NULL,NULL,'PJ Yolanda Purnawati (Persero) Tbk',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(4,14,18,2,12,'Dewi','Manullang','Mr.','DDS',NULL,'25987332943',NULL,'2000-01-31','male','Pagar Alam',NULL,'Gg. Kali No. 362, Malang 46350, Sultra',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(5,15,NULL,9,NULL,'Karma','Natsir','Ms.','Esq.',NULL,'50787027903',NULL,'2020-07-17','male','Lhokseumawe',NULL,'Ki. Tubagus Ismail No. 123, Payakumbuh 25206, Sumsel','0839 3748 205','Fa Pratiwi Fujiati Tbk',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(6,16,3,NULL,NULL,'Dinda','Sitompul','Ms.','MD',NULL,NULL,NULL,'1996-10-08','female','Samarinda',NULL,NULL,'(+62) 485 2173 082',NULL,'Penyiar Radio','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(7,17,27,NULL,6,'Danu','Wacana',NULL,NULL,NULL,'07884078002',NULL,NULL,NULL,NULL,NULL,NULL,'0838 9737 3305',NULL,'Tukang Cukur','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(8,17,8,5,NULL,'Rahmi','Gunawan','Dr.',NULL,'0645062124617360','87348928464',NULL,NULL,'male','Manado',NULL,NULL,NULL,'PJ Namaga Mayasari Tbk','Tukang Las / Pandai Besi','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(9,18,NULL,NULL,NULL,'Yusuf','Hidayanto',NULL,'Esq.','5335309359901004',NULL,'Malang',NULL,'female','Prabumulih',NULL,'Jr. Laswi No. 626, Pariaman 34961, Jatim',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(10,18,25,NULL,18,'Winda','Hutasoit',NULL,'Esq.',NULL,'80825682508','Padangpanjang','2018-08-28','male',NULL,NULL,NULL,NULL,'PT Winarsih Uyainah','Notaris','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(11,19,10,10,10,'Kayla','Adriansyah','Dr.','Esq.',NULL,NULL,NULL,NULL,'female','Kupang',NULL,'Dk. Supomo No. 4, Banjar 41916, Kalteng',NULL,'UD Rahmawati',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(12,20,NULL,NULL,4,'Humaira','Prabowo',NULL,NULL,NULL,'92187944667','Metro',NULL,NULL,'Cimahi',NULL,NULL,NULL,'UD Andriani Laksmiwati Tbk',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(13,21,28,10,12,'Sabrina','Iswahyudi',NULL,'PhD','1500519459435723','06021525382',NULL,'2006-12-23','male',NULL,NULL,'Psr. Flora No. 429, Gunungsitoli 69259, Sumbar',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(14,22,16,NULL,NULL,'Tirta','Irawan',NULL,NULL,NULL,'44761674123','Jayapura','1975-07-31',NULL,NULL,NULL,'Jln. Ronggowarsito No. 355, Palembang 88861, Sumut','0451 8497 717',NULL,'Masinis','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(15,23,4,NULL,NULL,'Intan','Yulianti','Ms.',NULL,'0451502940169806',NULL,'Tanjungbalai',NULL,'female',NULL,NULL,'Dk. Bakin No. 203, Yogyakarta 37943, Lampung',NULL,'CV Wastuti','Arsitek','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(16,23,NULL,5,NULL,'Jinawi','Santoso','Mrs.','Esq.','1219552792674272',NULL,NULL,'1991-08-19',NULL,NULL,NULL,'Ki. Basuki No. 426, Tomohon 93719, Malut','0550 1692 101',NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(17,24,30,9,NULL,'Asman','Prakasa','Prof.',NULL,NULL,NULL,'Tarakan',NULL,NULL,'Sawahlunto',NULL,'Jln. Labu No. 9, Langsa 16822, NTB',NULL,NULL,'Penata Busana','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(18,25,17,1,NULL,'Reksa','Mansur','Mr.','DDS',NULL,'03837035850',NULL,NULL,NULL,NULL,NULL,NULL,'0789 6893 0431','PT Adriansyah (Persero) Tbk',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(19,26,4,NULL,NULL,'Gilang','Yulianti','Ms.',NULL,'8455568091746680',NULL,'Madiun',NULL,'female','Banjarmasin',NULL,'Kpg. Aceh No. 521, Bima 97033, Sulut',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(20,26,23,8,NULL,'Mulya','Mandasari','Mr.',NULL,'2717315860622374','34509491737',NULL,NULL,NULL,'Ternate',NULL,NULL,NULL,NULL,'Pedagang','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(21,27,NULL,5,16,'Lega','Yuliarti','Mrs.','Esq.',NULL,NULL,'Administrasi Jakarta Timur','1996-03-17',NULL,NULL,NULL,'Dk. Batako No. 376, Sawahlunto 30013, DIY','0214 2694 3052',NULL,'Penata Rambut','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(22,28,18,10,NULL,'Gabriella','Rahmawati',NULL,NULL,NULL,NULL,'Ternate',NULL,'male','Payakumbuh',NULL,NULL,NULL,'CV Manullang','Apoteker','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(23,29,NULL,1,14,'Ulya','Rahmawati','Ms.',NULL,'9222501277253460','83226377116',NULL,'2007-06-25','female','Subulussalam',NULL,NULL,'(+62) 729 2408 7714',NULL,'Atlet','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(24,29,NULL,NULL,NULL,'Xanana','Setiawan',NULL,NULL,NULL,NULL,'Cimahi','1987-07-29','female',NULL,NULL,'Dk. Bahagia No. 63, Bukittinggi 52779, Sulteng',NULL,'PT Permata Lestari','Pelajar / Mahasiswa','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(25,30,18,NULL,NULL,'Sakura','Prastuti','Prof.',NULL,'1449575750825820',NULL,NULL,NULL,'male','Gorontalo',NULL,'Ki. Supono No. 92, Tanjungbalai 98433, Jatim',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(26,31,23,NULL,3,'Harjasa','Safitri','Ms.',NULL,'0940961427582176',NULL,NULL,NULL,'female','Banda Aceh',NULL,'Jr. Babadan No. 843, Bontang 62429, Jabar','(+62) 963 5249 8596',NULL,'Pramugari','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(27,32,8,NULL,2,'Zamira','Purnawati','Mrs.',NULL,'2504649010249206',NULL,NULL,NULL,'female',NULL,NULL,'Jln. Katamso No. 105, Pagar Alam 24980, Sumsel',NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(28,32,20,6,NULL,'Nadia','Aryani',NULL,'PhD',NULL,NULL,NULL,NULL,'male','Metro',NULL,NULL,NULL,'PJ Hakim Susanti Tbk','Peternak','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(29,33,13,NULL,NULL,'Olivia','Mangunsong',NULL,'DDS','3237568752268839',NULL,NULL,'1977-02-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(30,34,NULL,11,7,'Elisa','Hassanah','Mrs.','PhD',NULL,'03365937949','Administrasi Jakarta Utara',NULL,NULL,NULL,NULL,'Jr. Dahlia No. 117, Pariaman 79572, Sulteng','0792 0557 028','Yayasan Anggraini Kuswandari Tbk','Tukang Jahit','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(31,35,NULL,7,11,'Maryanto','Padmasari','Dr.','PhD','2669036639417800','48863688228','Tomohon',NULL,NULL,'Cirebon',NULL,'Jr. Nangka No. 991, Palembang 14345, Pabar','(+62) 446 5855 362',NULL,'Pengacara','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(32,36,NULL,6,18,'Cecep','Situmorang',NULL,'PhD','6806161898426966','73157119390',NULL,NULL,'female',NULL,NULL,'Dk. Uluwatu No. 635, Pasuruan 21034, Kaltim',NULL,'Yayasan Purnawati Kurniawan',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(33,37,NULL,6,NULL,'Novi','Susanti',NULL,'Esq.',NULL,'44240602685','Administrasi Jakarta Utara',NULL,NULL,NULL,NULL,'Ds. Sukajadi No. 644, Tual 77012, Aceh','0764 1738 908','Yayasan Pudjiastuti','Wartawan','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(34,37,15,NULL,17,'Dartono','Situmorang','Ms.','Esq.','4543827069740612',NULL,NULL,'1982-11-06','male',NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(35,38,NULL,6,4,'Ibun','Suryatmi','Mr.',NULL,'3224312037031528','80987106483','Pekanbaru','1988-10-22',NULL,NULL,NULL,'Jln. Yogyakarta No. 374, Pontianak 31074, DIY','(+62) 747 3983 196','PD Gunarto Widodo','Tukang Sol Sepatu','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(36,39,NULL,NULL,NULL,'Rini','Jailani',NULL,'DDS',NULL,'52725717297','Sorong',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Dosen','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(37,40,NULL,NULL,16,'Ulya','Prabowo',NULL,NULL,'8165722045173894',NULL,'Lhokseumawe',NULL,NULL,NULL,NULL,'Ds. Badak No. 565, Manado 20923, Banten','0848 8472 7969','PD Yolanda (Persero) Tbk',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(38,41,28,5,7,'Gawati','Sihombing','Dr.',NULL,NULL,'61110165492','Kotamobagu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(39,42,4,10,11,'Darmana','Nugroho','Ms.',NULL,NULL,NULL,NULL,'1986-10-06','male','Bima',NULL,NULL,NULL,NULL,NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(40,42,21,2,5,'Makara','Mandala','Prof.',NULL,NULL,'15196940396',NULL,NULL,'female','Sawahlunto',NULL,NULL,NULL,'CV Pratama Melani',NULL,'2024-07-01 08:43:52','2024-07-01 08:43:52'),
(41,43,4,7,NULL,'Eko','Farida',NULL,'JD',NULL,NULL,'Bontang',NULL,'male','Salatiga',NULL,NULL,NULL,'Fa Nuraini Tbk','Programmer','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(42,43,21,NULL,NULL,'Violet','Mayasari',NULL,NULL,NULL,NULL,'Surakarta',NULL,'female','Tual',NULL,NULL,NULL,NULL,'Guru','2024-07-01 08:43:52','2024-07-01 08:43:52');

/*Table structure for table `type_courses` */

DROP TABLE IF EXISTS `type_courses`;

CREATE TABLE `type_courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `type_courses` */

insert  into `type_courses`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Moneterial','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(2,'Teknis/Fungsional','2024-07-01 08:43:51','2024-08-17 16:14:06'),
(3,'Sosio Kultural','2024-07-01 08:43:51','2024-07-01 08:43:51');

/*Table structure for table `type_topics` */

DROP TABLE IF EXISTS `type_topics`;

CREATE TABLE `type_topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `type_topics` */

insert  into `type_topics`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Video Link','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(2,'File','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(3,'Zoom Link','2024-07-01 08:43:51','2024-07-01 08:43:51');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`image`,`image_path`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator','administrator','admin@app.com','2024-07-01 08:43:50','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','http://localhost:8000/storage/thumbnails/3nwKQCmC5Sn9RHbVqCwRXc72llRd0b3h6JDh9fgM.jpg','thumbnails/3nwKQCmC5Sn9RHbVqCwRXc72llRd0b3h6JDh9fgM.jpg',1,'uEoiqP8CVwMuSHQSwKRhIwGWwiN2kqlvg7RuZmN2FrvtCR3ZDT5eK4f2aj3y','2024-07-01 08:43:50','2024-07-01 09:38:32'),
(2,'Pengajar','pengajar','pengajar@app.com','2024-07-01 08:43:50','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,1,'sQMcWozh1PLGVhY5IvzwVgda1YCmwPXvUZchBaz6EZ4GjEDiXbUyHrRASimN','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(3,'Peserta','peserta','peserta@app.com','2024-07-01 08:43:50','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,1,'rULiaZKCmqRUjJCcU4CJjTX7cPPCgI2amS3KZMmIHPCVHpVnh90eT5UnAw82','2024-07-01 08:43:50','2024-07-01 08:43:50'),
(4,'Ozy Mahendra','cyuliarti','ahmad.fatoni@mindotek.com','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ffcc?text=people+est',NULL,1,'MIucFDlDyrL2d4ml2twnjgK00lde4v4TjEv57tR87P0lYr56knChbg9UXgXm','2024-07-01 08:43:51','2024-07-01 10:45:20'),
(5,'Padmi Nasyiah','gina.halimah','jpalastri@example.org','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00bbaa?text=people+nesciunt',NULL,1,'NP1xWM5Ug5','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(6,'Janet Hafshah Safitri S.IP','simon53','daru.kuswandari@example.com','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/007755?text=people+voluptatem',NULL,1,'YNP9cb5au4','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(7,'Prasetyo Adiarja Megantara','quwais','riyanti.rafid@example.com','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/002244?text=people+distinctio',NULL,1,'fecLRMPMqx','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(8,'Anggabaya Mandala','uwais.tania','usamah.paulin@example.org','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00bb88?text=people+qui',NULL,1,'goZHA8gbZn','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(9,'Syahrini Permata','siti.napitupulu','anasyidah@example.net','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00dd88?text=people+molestiae',NULL,1,'pS6257r0dx','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(10,'Mujur Gamani Gunawan M.Ak','mandasari.harsaya','jaswadi99@example.org','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00cc99?text=people+iusto',NULL,1,'w6ius1WBAF','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(11,'Unggul Ramadan','nadine.suryatmi','ramadan.ghani@example.org','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00cc77?text=people+dolores',NULL,1,'0komEYxMJA','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(12,'Raden Situmorang','galiono63','adriansyah.kamal@example.net','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/008811?text=people+deserunt',NULL,1,'XoZSGrMVh6','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(13,'Zelda Widiastuti','padmasari.zelda','kuswoyo.dinda@example.com','2024-07-01 08:43:51','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/005588?text=people+autem',NULL,1,'mbYuf5tN58','2024-07-01 08:43:51','2024-07-01 08:43:51'),
(14,'Baktiono Mansur S.Farm','prakasa.kardi','yulianti.paulin@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0088aa?text=people+laudantium',NULL,1,'XWLlkNGvjy','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(15,'Irma Mulyani S.I.Kom','kajen.sitorus','warsita32@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/005511?text=people+corporis',NULL,1,'wcKJqD06Im','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(16,'Jabal Pratama','wirda13','uwais.putri@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ee88?text=people+consectetur',NULL,1,'JBdudhXnBp','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(17,'Hamzah Rosman Natsir','maryadi.jatmiko','wastuti.victoria@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/007766?text=people+rerum',NULL,1,'1inFGNVobs','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(18,'Rangga Gunawan S.Psi','natsir.rika','vinsen61@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0077ff?text=people+tempore',NULL,1,'gNZXb7bhLL','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(19,'Emong Gamblang Simbolon S.H.','xanggraini','hartaka20@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00dd11?text=people+mollitia',NULL,1,'OIEvTZUXrS','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(20,'Gawati Syahrini Utami','jane97','hana43@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0033bb?text=people+voluptatem',NULL,1,'6hl8DehY3v','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(21,'Alambana Pratama','mbudiman','nilam.rajata@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00bb00?text=people+totam',NULL,1,'Yy1AyrqaKu','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(22,'Laksana Hartaka Waluyo S.Ked','zsetiawan','waskita.jati@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00cc55?text=people+atque',NULL,1,'CuLKtm4RDo','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(23,'Raden Widodo','bancar.jailani','kyolanda@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/004433?text=people+atque',NULL,1,'NkF15sTrs1','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(24,'Faizah Maryati','budiman.maida','lasmono55@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00bbaa?text=people+quo',NULL,1,'DFkr0mrVWx','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(25,'Soleh Pratama','mahmud67','qkuswoyo@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0033cc?text=people+et',NULL,1,'WcxDteEgrL','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(26,'Danang Sihombing','pudjiastuti.mulyono','ika.utama@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/006677?text=people+voluptatem',NULL,1,'Odnd5vLfPk','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(27,'Kunthara Caturangga Pradipta','ehutasoit','saiful13@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0044cc?text=people+enim',NULL,1,'nSaVu4nybq','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(28,'Najam Rajasa','febi92','eva.najmudin@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0022dd?text=people+est',NULL,1,'2JWr3gkzN4','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(29,'Shania Mardhiyah','haryanti.syahrini','omar.mayasari@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/007788?text=people+deleniti',NULL,1,'YgkS1zZfdJ','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(30,'Jamal Bakiono Siregar S.Farm','ymandasari','haryanto.tiara@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ee66?text=people+accusamus',NULL,1,'HRN11359wx','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(31,'Hardana Jindra Nainggolan M.Pd','knainggolan','rahayu.firgantoro@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/008877?text=people+at',NULL,1,'ogffNklUe3','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(32,'Farah Uyainah S.I.Kom','cinthia.yolanda','galak68@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ffff?text=people+eligendi',NULL,1,'cDK1Jn1WqZ','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(33,'Ikin Lantar Wasita','lirawan','mayasari.kezia@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00dd11?text=people+accusantium',NULL,1,'Duc6Sqi9hY','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(34,'Jasmani Garda Prayoga S.Psi','saka80','clara.hakim@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/008888?text=people+nobis',NULL,1,'L9JPcfKWo3','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(35,'Cornelia Fujiati','najwa93','rahayu.prayitna@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0011cc?text=people+quasi',NULL,1,'wJJNDcCYQJ','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(36,'Yulia Prastuti S.Farm','mulyani.siska','unggul.hakim@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00dd55?text=people+saepe',NULL,1,'FtTWnpVU4d','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(37,'Himawan Dabukke','dadi00','icha.nugroho@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/0066dd?text=people+sunt',NULL,1,'cPjWEL2U5F','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(38,'Vicky Jane Suartini S.E.','gina62','michelle.permata@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ee88?text=people+ad',NULL,1,'V9DANaEOMv','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(39,'Dadap Saefullah','queen83','anastasia.novitasari@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/008899?text=people+autem',NULL,1,'4QuDvduHlZ','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(40,'Farah Farida','keisha53','fitria54@example.com','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ee11?text=people+laboriosam',NULL,1,'jrUH1XAsYy','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(41,'Mustika Kusumo','ade.usada','utama.yuliana@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00ddaa?text=people+quo',NULL,1,'TIKupDEuGs','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(42,'Putri Fitria Usada S.Kom','ajeng97','unjani25@example.net','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/000055?text=people+et',NULL,1,'OEq1aZcmrq','2024-07-01 08:43:52','2024-07-01 08:43:52'),
(43,'Ilyas Candra Suryono','riyanti.asirwada','farhunnisa68@example.org','2024-07-01 08:43:52','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','https://via.placeholder.com/640x480.png/00aadd?text=people+repellat',NULL,1,'LewcvmCT0b','2024-07-01 08:43:52','2024-07-01 08:43:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
