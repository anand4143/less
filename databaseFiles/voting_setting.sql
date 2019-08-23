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

/*Table structure for table `master_voting_settings` */

DROP TABLE IF EXISTS `master_voting_settings`;

CREATE TABLE `master_voting_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contestID` int(11) unsigned NOT NULL,
  `weekDay` tinyint(1) unsigned NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `isActive` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `updatedBY` int(11) unsigned DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_voting_settings` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
