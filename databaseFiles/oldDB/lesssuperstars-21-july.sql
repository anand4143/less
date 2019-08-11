/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.37-MariaDB : Database - lesssuperstars
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lesssuperstars` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lesssuperstars`;

/*Table structure for table `contest_levels` */

DROP TABLE IF EXISTS `contest_levels`;

CREATE TABLE `contest_levels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contestID` int(11) unsigned NOT NULL,
  `levelName` varchar(128) NOT NULL,
  `levelSequence` tinyint(1) unsigned DEFAULT NULL,
  `description` varbinary(256) DEFAULT NULL,
  `isEnabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `eby` int(11) unsigned DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `contest_levels` */

insert  into `contest_levels`(`id`,`contestID`,`levelName`,`levelSequence`,`description`,`isEnabled`,`status`,`isDeleted`,`eby`,`createdDate`,`updatedDate`) values 
(1,0,'ftgyhrtsdfsd sdfsd c11',NULL,'rtyrsdfgsdfg sdfds 111',0,0,0,NULL,'2019-07-14 22:51:20','2019-07-15 08:27:03'),
(2,0,'dfgf',NULL,'hgghjg',0,0,0,NULL,'2019-07-15 08:04:43','2019-07-15 08:27:43'),
(3,0,'sdfsdsd',NULL,'sdfsdf -----',0,0,0,NULL,'2019-07-15 08:31:52','2019-07-15 08:32:07'),
(4,0,'asdfasdfasdf',NULL,'asdfasdfasdsdfds sd',0,0,0,NULL,'2019-07-15 08:34:06','2019-07-15 08:34:59'),
(5,0,'sdfsdf',NULL,'sdfsdf222',0,0,0,NULL,'2019-07-15 22:38:25','2019-07-15 22:39:01'),
(6,0,'sdfsdsdf',NULL,'sdfsd5555',0,0,0,NULL,'2019-07-15 22:38:38','2019-07-15 22:41:37'),
(7,1,'ertrtertetdfgdg 5',NULL,'dfgdfgdgdfsdfdsd 78787',0,1,1,0,'2019-07-15 22:41:14','2019-07-15 22:54:21'),
(8,4,'fdgdsfg dfgdg sdfsd',NULL,'sdfgs df 4545454 jghjgh  hkhjkhk hjghjgjg hjh',0,1,0,0,'2019-07-15 22:57:23','2019-07-17 23:25:49'),
(9,3,'asdfasdf',NULL,' asdfasdf',0,1,0,NULL,'2019-07-15 22:57:34','2019-07-15 22:57:34'),
(10,1,'asdf',NULL,'asdfasd',0,1,0,NULL,'2019-07-15 22:57:43','2019-07-15 22:57:43');

/*Table structure for table `master_contests` */

DROP TABLE IF EXISTS `master_contests`;

CREATE TABLE `master_contests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(32) NOT NULL,
  `contestName` varchar(128) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `eby` int(11) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `master_contests` */

insert  into `master_contests`(`id`,`uniqueID`,`contestName`,`description`,`startDate`,`endDate`,`status`,`isDeleted`,`eby`,`createdDate`,`updatedDate`) values 
(1,'','Test1236786','test    sdfsd                      fdgfd      ','2019-07-12','2019-07-31',1,1,NULL,'2019-07-11 23:32:55','2019-07-18 21:28:41'),
(2,'','test123','asdfds','2019-07-12','2019-07-13',1,1,NULL,'2019-07-11 23:39:57','2019-07-12 00:17:53'),
(3,'','asdfasd','asdfas kghkhjg hjghgj','2019-07-18','2019-07-31',1,0,NULL,'2019-07-12 00:18:46','2019-07-15 23:06:03'),
(4,'','sfasdf hjkhkjhkhkj','asdfasdf hgj jhghjgj','2019-07-19','2019-07-31',1,0,NULL,'2019-07-14 21:46:57','2019-07-15 23:06:17'),
(5,'','sdfasdfa sdf','asdf asdf','2019-07-31','2019-07-18',1,0,NULL,'2019-07-17 23:26:17','2019-07-17 23:26:17');

/*Table structure for table `trans_contest_participation` */

DROP TABLE IF EXISTS `trans_contest_participation`;

CREATE TABLE `trans_contest_participation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contestID` int(11) unsigned NOT NULL,
  `userID` int(11) unsigned NOT NULL,
  `isActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `eby` int(11) unsigned DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_contest_participation` */

/*Table structure for table `trans_votings` */

DROP TABLE IF EXISTS `trans_votings`;

CREATE TABLE `trans_votings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contestID` int(11) unsigned NOT NULL,
  `contestLevelID` int(11) unsigned NOT NULL,
  `participantID` int(11) unsigned NOT NULL,
  `votedByUserID` int(11) unsigned NOT NULL,
  `ratings` smallint(4) NOT NULL,
  `isActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_votings` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1=>Admin,2=>judg,3=>participants',
  `isActive` tinyint(1) DEFAULT '0',
  `createdData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedData` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`userName`,`email`,`firstName`,`lastName`,`password`,`userType`,`isActive`,`createdData`,`updatedData`) values 
(1,'anand4143','anand.knp@gmail.com','anand','shukla','202cb962ac59075b964b07152d234b70',1,1,'2019-07-20 16:43:09','0000-00-00 00:00:00'),
(2,'','verma.thegreat92@gmail.com ','Sourabh','Verma','202cb962ac59075b964b07152d234b70',3,1,'2019-07-20 16:43:10','0000-00-00 00:00:00'),
(3,'','deepeshtct@gmail.com','Deepesh','Singh','dd4936bf8f4c399b2bd95c07486172b5',1,1,'2019-07-20 16:43:11','0000-00-00 00:00:00'),
(4,'','harijjmd@gmail.com','Hari','Choudhary','202cb962ac59075b964b07152d234b70',3,1,'2019-07-20 16:43:19','0000-00-00 00:00:00'),
(5,'','deepesh@gmail.com','Deepesh1','Singh','dd4936bf8f4c399b2bd95c07486172b5',3,1,'2019-07-20 16:43:04','0000-00-00 00:00:00'),
(6,'','deepesh2@gmail.com','Deepesh2','thakur','dd4936bf8f4c399b2bd95c07486172b5',2,1,'2019-07-20 16:43:05','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
