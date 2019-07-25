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
  `isEnabled` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'always show the current level',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isDeleted` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'this is for system only if in futrue you want deleted levels',
  `eby` int(11) unsigned DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `contest_levels` */

insert  into `contest_levels`(`id`,`contestID`,`levelName`,`levelSequence`,`description`,`isEnabled`,`status`,`isDeleted`,`eby`,`createdDate`,`updatedDate`) values 
(1,1,'Level one',1,'rtyrsdfgsdfg sdfds 111',0,0,0,NULL,'2019-07-14 22:51:20','2019-07-21 17:11:24'),
(2,1,'Level two',NULL,'hgghjg',0,0,0,NULL,'2019-07-15 08:04:43','2019-07-21 17:10:02'),
(3,1,'Level three',NULL,'sdfsdf -----',0,0,0,NULL,'2019-07-15 08:31:52','2019-07-21 17:10:09'),
(4,1,'Level four',NULL,'asdfasdfasdsdfds sd',0,0,0,NULL,'2019-07-15 08:34:06','2019-07-21 17:02:41'),
(5,1,'Level five',NULL,'sdfsdf222',0,0,0,NULL,'2019-07-15 22:38:25','2019-07-21 17:10:18'),
(6,1,'Level six',NULL,'sdfsd5555',0,0,0,NULL,'2019-07-15 22:38:38','2019-07-21 17:10:26'),
(7,1,'Level seven',NULL,'dfgdfgdgdfsdfdsd 78787',0,1,1,0,'2019-07-15 22:41:14','2019-07-21 17:03:15'),
(8,1,'Level eight',NULL,'sdfgs df 4545454 jghjgh  hkhjkhk hjghjgjg hjh',0,1,0,0,'2019-07-15 22:57:23','2019-07-21 17:10:32'),
(9,1,'Level nine',NULL,' asdfasdf',0,1,0,NULL,'2019-07-15 22:57:34','2019-07-21 17:03:45'),
(10,1,'Level ten',NULL,'asdfasd',0,1,0,NULL,'2019-07-15 22:57:43','2019-07-21 17:10:38'),
(11,3,'Level 1',NULL,'Level 1 Dewsc',1,1,0,NULL,'2019-07-24 23:53:43','2019-07-24 23:54:19'),
(12,3,'Level 2',NULL,'Level 2 Desc',0,1,0,NULL,'2019-07-24 23:54:04','2019-07-24 23:54:04'),
(13,3,'Level 3',NULL,'Level 3',0,1,0,NULL,'2019-07-24 23:54:16','2019-07-24 23:54:16'),
(14,4,'Delhi Level 1',NULL,'Delhi Level 1 Desc',0,1,0,NULL,'2019-07-24 23:54:52','2019-07-24 23:54:52'),
(15,4,'Delhi Level 2',NULL,'Delhi Level 1 Desc',0,1,0,NULL,'2019-07-24 23:55:04','2019-07-24 23:55:04'),
(16,4,'Delhi Level 3',NULL,'Delhi Level 3 Desc',0,1,0,NULL,'2019-07-24 23:55:18','2019-07-24 23:55:18');

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
(1,'','Bhopal Idol','test    sdfsd                      fdgfd      ','2019-07-24','2019-07-31',1,0,NULL,'2019-07-11 23:32:55','2019-07-24 23:47:42'),
(2,'','Panjab Idol','asdfds','2019-08-22','2019-07-13',1,1,NULL,'2019-07-11 23:39:57','2019-07-21 17:20:17'),
(3,'','UP Idol','asdfas kghkhjg hjghgj','2019-08-08','2019-07-31',1,0,NULL,'2019-07-12 00:18:46','2019-07-21 17:20:11'),
(4,'','Delhi Idol','asdfasdf hgj jhghjgj','2019-08-01','2019-07-31',1,0,NULL,'2019-07-14 21:46:57','2019-07-21 17:20:04'),
(5,'','Bangalore Idol','asdf asdf','2019-07-31','2019-07-18',1,0,NULL,'2019-07-17 23:26:17','2019-07-21 17:19:42');

/*Table structure for table `master_judge` */

DROP TABLE IF EXISTS `master_judge`;

CREATE TABLE `master_judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `userType` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'this column always = 1',
  `isActive` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0->inActive,1->Active',
  `aboutJudge` text NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `master_judge` */

insert  into `master_judge`(`id`,`email`,`firstName`,`lastName`,`password`,`userType`,`isActive`,`aboutJudge`,`createdDate`,`updatedDate`) values 
(1,'anandd@gmail.com','anandJ','shuklsJ','202cb962ac59075b964b07152d234b70',1,1,'','2019-07-19 10:34:29','0000-00-00 00:00:00'),
(2,'saurabh@lesssuperstar.com','saurabh','verma','202cb962ac59075b964b07152d234b70',1,1,'test','2019-07-19 22:10:53','0000-00-00 00:00:00');

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

/*Table structure for table `user_smule` */

DROP TABLE IF EXISTS `user_smule`;

CREATE TABLE `user_smule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `contest_id` int(10) NOT NULL,
  `levels_id` int(10) NOT NULL COMMENT 'contest_levels table id',
  `smuleUrl` varchar(1024) NOT NULL,
  `smuleID` varchar(1024) NOT NULL COMMENT 'this is smule app id',
  `createdBy` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This is mapping b/w user and smule URL';

/*Data for the table `user_smule` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1=>Admin,2=>participants',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isActive` tinyint(2) NOT NULL COMMENT '0->inActive,1->Active',
  `aboutUser` text NOT NULL,
  `updatedData` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`userName`,`email`,`firstName`,`lastName`,`password`,`userType`,`createdDate`,`isActive`,`aboutUser`,`updatedData`) values 
(1,'anand4143','anand.knp@gmail.com','anand','shukla','202cb962ac59075b964b07152d234b70',1,'2019-07-09 10:32:38',0,'','0000-00-00 00:00:00'),
(2,'saurabh4143123','verma.thegreat92@gmail.com','Sourabh123','Verma','202cb962ac59075b964b07152d234b70',2,'2019-07-21 10:32:53',0,'','0000-00-00 00:00:00'),
(3,'deep','deepeshtct@gmail.com','Deepesh','Singh','dd4936bf8f4c399b2bd95c07486172b5',1,'2019-07-24 22:38:39',1,'','0000-00-00 00:00:00'),
(4,'','harijjmd@gmail.com','Hari','Choudhary','202cb962ac59075b964b07152d234b70',2,'2019-07-19 01:23:30',1,'','0000-00-00 00:00:00'),
(15,'judge1','judge1@lesssuperstar.com','judge1','judge1123','',2,'2019-07-18 08:53:02',1,'judge1judge1judge1judge1judge1judge1 judge1judge1judge1 judge1judge1judge1judge1judge1','0000-00-00 00:00:00'),
(16,'judge2','judge2@lesssuperstar.com','judge22','judge2','',2,'2019-07-18 08:52:58',1,'judge2judge2judge2 judge2judge2judge2judge2 judge2','0000-00-00 00:00:00'),
(17,'saurabh4143123','saurabh4143123@lesssuperstar.com','anand','shukla','',2,'2019-07-18 08:52:52',1,'this is testing judge','0000-00-00 00:00:00'),
(14,'anandd','ananddshukkla@lesssuperstart.com','ANAND123','SHUKLA','',2,'2019-07-18 08:30:06',1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged','0000-00-00 00:00:00'),
(18,'deepesh2','deepesh@test.com','Deepesh','Singh','dd4936bf8f4c399b2bd95c07486172b5',3,'2019-07-24 22:16:36',0,'','0000-00-00 00:00:00');

/*Table structure for table `users_contests_levels` */

DROP TABLE IF EXISTS `users_contests_levels`;

CREATE TABLE `users_contests_levels` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL COMMENT 'users table id',
  `levelID` int(10) NOT NULL COMMENT 'contest_level id',
  `contestID` int(10) NOT NULL COMMENT 'master_contests table id',
  `createdDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='This table is mapping of users,master_contests,and levels';

/*Data for the table `users_contests_levels` */

insert  into `users_contests_levels`(`id`,`userID`,`levelID`,`contestID`,`createdDate`) values 
(1,18,11,3,NULL),
(2,18,11,3,NULL),
(3,18,11,3,NULL),
(4,18,11,3,NULL);

/*Table structure for table `users_judge` */

DROP TABLE IF EXISTS `users_judge`;

CREATE TABLE `users_judge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judge_id` int(10) NOT NULL COMMENT 'master_judge table id',
  `user_id` int(10) NOT NULL COMMENT 'users table id',
  `levels_id` int(10) NOT NULL COMMENT 'contest_levels table id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='relation b/w master_judge & users tables';

/*Data for the table `users_judge` */

insert  into `users_judge`(`id`,`judge_id`,`user_id`,`levels_id`) values 
(1,1,1,8),
(2,1,16,9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
