/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - sistem_elektronik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistem_elektronik` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sistem_elektronik`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Komputer',NULL,'2022-12-07 23:49:25','2022-12-07 23:49:25'),
(2,'Gadgets',NULL,'2022-12-25 23:09:48','2022-12-25 23:09:48'),
(3,'Kamera',NULL,'2022-12-25 23:10:57','2022-12-25 23:10:57');

/*Table structure for table `electronics` */

DROP TABLE IF EXISTS `electronics`;

CREATE TABLE `electronics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `electronics` */

insert  into `electronics`(`id`,`name`,`slug`,`category_id`,`description`,`price`,`stock`,`image_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Laptop Acer Swift X','laptop-acer-swift-x',1,'<p>Keren Pollll</p>',13000000,1,'202212251612Review-Laptop-Acer-Swift-X-Indonesia.jpg',NULL,'2022-12-07 23:49:57','2022-12-25 16:12:23'),
(2,'Nikon D5500','nikon-d5500',3,'<p>Nikon D5500 With Lens Kit</p>',50000000,5,'202212251611nikon-d5500.jpg',NULL,'2022-12-25 23:11:23','2022-12-25 23:11:23');

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `transaction_id` bigint(20) NOT NULL,
  `electronic_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `transaction_details` */

insert  into `transaction_details`(`id`,`transaction_id`,`electronic_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,4,1,NULL,'2022-12-25 16:06:35','2022-12-25 16:06:35');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `transaction_total` bigint(20) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `total_payment` double DEFAULT NULL,
  `total_item` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`uuid`,`transaction_total`,`transaction_status`,`deleted_at`,`created_at`,`updated_at`,`user_id`,`total_payment`,`total_item`) values 
(1,'81ea6514-edcc-4e60-9ddd-8194d71ec058',13000000,'Waiting Confirmation',NULL,'2022-12-25 16:01:21','2022-12-25 16:01:21',2,15000000,1),
(2,'9edfc49b-811a-4c61-af08-a52156594f68',13000000,'Waiting Confirmation',NULL,'2022-12-25 16:05:49','2022-12-25 16:05:49',2,15000000,1),
(3,'9ea1084c-48da-4db2-9edb-53ee0319aae7',13000000,'Waiting Confirmation',NULL,'2022-12-25 16:06:29','2022-12-25 16:06:29',2,15000000,1),
(4,'1876cac5-b132-48c0-9006-1cd783719131',13000000,'Confirmed',NULL,'2022-12-25 16:06:35','2022-12-25 16:06:35',2,15000000,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`isAdmin`,`created_at`,`updated_at`) values 
(2,'alban','alban@test.com','$2y$10$ErvuHsJRwlDbXP4vnpf2SOan3ezPk0vSxZjPBzpLrZRYJ7YjJ0YtC',1,'2022-12-07 16:38:41','2022-12-07 16:38:41'),
(7,'admin','admin@test.com','$2y$10$bXh/YygBPi3HfmP0LozJAOpQav/c.gvhK9d0jim.qZ0fOe2iOWCBG',1,'2022-12-25 16:17:58','2022-12-25 16:17:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
