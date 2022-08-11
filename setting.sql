/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.5.34 : Database - test_mcode
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_mcode` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test_mcode`;

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setting` */

insert  into `setting`(`id_setting`,`group`,`options`,`value`) values 
(1,'general','web_name','M-CODE CRUD GEBERATOR CODEIGNITER'),
(2,'general','web_domain','www.m-code.dev'),
(3,'general','web_owner','mpampam.dev/programmer_jalanan'),
(4,'general','email','mpampam@dev.com'),
(5,'general','telepon','085288888888'),
(6,'general','address','Jalan apa saja boleh, yang pasti jangan jalan buntu'),
(7,'general','logo','p'),
(8,'general','logo_mini','p'),
(9,'general','favicon','p'),
(50,'sosmed','facebook','https://facebook.com/mpampam'),
(51,'sosmed','instagram','https://instagram/mpampam'),
(52,'sosmed','youtube','https://www.youtube.com/channel/UC1TlTaxRNdwrCqjBJ5zh6TA'),
(53,'sosmed','twitter','https://twitter/m_pampam'),
(60,'config','maintenance_status','N'),
(61,'config','user_log_status','N');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
