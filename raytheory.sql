/*
SQLyog Community v12.2.5 (32 bit)
MySQL - 10.1.25-MariaDB : Database - raytheory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`raytheory` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `rt_coursecontentdescription` */

DROP TABLE IF EXISTS `rt_coursecontentdescription`;

CREATE TABLE `rt_coursecontentdescription` (
  `rt_name` varchar(255) NOT NULL,
  `rt_divdescription` varchar(255) NOT NULL,
  `rt_contenttime` varchar(255) NOT NULL,
  `rt_coursedescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rt_coursecontentdescription` */

insert  into `rt_coursecontentdescription`(`rt_name`,`rt_divdescription`,`rt_contenttime`,`rt_coursedescription`) values 
('sdfgsdfgsdfg','sdfgsdfgsdf','1hr','asdf'),
('sdfgsdfgsdfgsdf','afgvsdfgsdfg','2 hrs','asdf');

/*Table structure for table `rt_coursedescription` */

DROP TABLE IF EXISTS `rt_coursedescription`;

CREATE TABLE `rt_coursedescription` (
  `primarykey` varchar(255) NOT NULL,
  `rt_conentshortdesc` varchar(255) NOT NULL,
  `rt_contentdesc` varchar(255) NOT NULL,
  `rt_coursename` varchar(255) NOT NULL,
  `rt_offlineprice` varchar(255) NOT NULL,
  `rt_onlineprice` varchar(255) NOT NULL,
  `rt_offlinebatchtime` varchar(255) NOT NULL,
  `rt_onlinebatchtime` varchar(255) NOT NULL,
  PRIMARY KEY (`primarykey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rt_coursedescription` */

insert  into `rt_coursedescription`(`primarykey`,`rt_conentshortdesc`,`rt_contentdesc`,`rt_coursename`,`rt_offlineprice`,`rt_onlineprice`,`rt_offlinebatchtime`,`rt_onlinebatchtime`) values 
('adsfasd','asdfasd','asdfasd','secondCourse','adsfasdf','asdfasdf','adsfasdf','adfasd'),
('asdf','ssdfgsdfgdsfgsdfgsdfg','adsfas','firstCourse','sdfgsdfgsdfg','sdfgsdfgsdfff','gsfgsdfgsdfgsdfg','sfdgsdfgsdf'),
('asdfas','asdfasd','sadfsa','thirdCourse','adsfasdf','asdfasdf','adsfasdfa','asdfasdf'),
('asdfasf','asdfasdf','asdfasdfsadf','fourthCourse','adsfasdfa','asdfasdfas','adsfasdfasd','asdfasdfasdf');

/*Table structure for table `rt_coursehighlights` */

DROP TABLE IF EXISTS `rt_coursehighlights`;

CREATE TABLE `rt_coursehighlights` (
  `rt_name` varchar(255) NOT NULL,
  `rt_highdesc` varchar(255) NOT NULL,
  `rt_coursedescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rt_coursehighlights` */

insert  into `rt_coursehighlights`(`rt_name`,`rt_highdesc`,`rt_coursedescription`) values 
('addgasfgasdf','asgasgasfgsa','	\r\nasdf'),
('asdfs','adsfas','asdfff'),
('asdfas','asdfsafd','asdf'),
('asdasdffas','asdfsadsfasdfafd','asdf'),
('asdassdfgdsdffas','asdfsadsfasdfsdfgsdfafd','asdf'),
('asdfdsfsd','asdfsadfas','asdf');

/*Table structure for table `rt_enquiry` */

DROP TABLE IF EXISTS `rt_enquiry`;

CREATE TABLE `rt_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `enquiry_msg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rt_enquiry` */

/*Table structure for table `rt_payment` */

DROP TABLE IF EXISTS `rt_payment`;

CREATE TABLE `rt_payment` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `customer_ip` varchar(50) NOT NULL,
  `pay_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `rt_payment` */

insert  into `rt_payment`(`id`,`name`,`email`,`age`,`phone`,`location`,`note`,`amount`,`customer_ip`,`pay_time`) values 
(1,'hansika','hansika.kalra171@gmail.com','7','7291919523','h','h','sdfgsdfgsdfg','::1','0000-00-00 00:00:00'),
(2,'hansika','hansika.kalra171@gmail.com','7','7291919523','h','h','sdfgsdfgsdfg','::1','0000-00-00 00:00:00'),
(3,'hansika','hansika.kalra171@gmail.com','7','7291919523','h','h','sdfgsdfgsdfg','::1','0000-00-00 00:00:00'),
(4,'hansika','hansika.kalra171@gmail.com','7','7291919523','h','h','sdfgsdfgsdfg','::1','2017-12-15 16:39:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
