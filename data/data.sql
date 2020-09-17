-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `body` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `author_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1,	1,	'Was machen Sie, seit wann machen Sie das und warum lieben Sie Ihren Job?',	'Ich liebe die Fotografie. Sie ist meine absolute Leidenschaft und so habe ich mich 2018 als Fotografin selbstständig gemacht. Aus meinem Hobby ist so ein verantwortungsvoller Beruf geworden.\r\n\r\nDa ich mich als Hochzeitsfotografin spezialisiert habe und diese meistens am Wochenende stattfinden, lässt sich das auch sehr gut vereinbaren. Für mich ist es der perfekte Ausgleich zwischen Alltag und Kreativität.',	'2020-09-17 09:34:12',	'2020-09-17 09:34:12');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1,	'Editor',	'c4ca4238a0b923820dcc509a6f75849b',	NULL,	'2020-09-17 09:32:24',	'2020-09-17 12:10:18');

-- 2020-09-17 12:10:32