Select user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number, date_of_birth, gender, qualification, institution, occupation, state, district, location, address, document_path, create_time, update_time, cud, verified, m_id, pwd, verifier_mid from blinx.m_user
USE blinx;

CREATE TABLE `m_user` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_mobile_number` int(10) NOT NULL,
  `date_of_birth` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `document_path` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cud` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `m_id` int(6) NOT NULL,
  `pwd` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `verifier_mid` int(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


insert into `m_user`(`user_id`,`first_name`,`last_name`,`email_id`,`mobile_number`,`emergency_mobile_number`,`date_of_birth`,`gender`,`qualification`,`institution`,`occupation`,`state`,`district`,`location`,`address`,`document_path`,`create_time`,`update_time`,`cud`,`verified`,`m_id`,`pwd`,`verifier_mid`) values (1,'raju','Mani','maniraju@gmail.com','9538088668',2147483647,'2015-08-15','Male','1','1','1','1','1','1','1','1','2015-09-18 22:40:08','2015-08-01 00:00:00','C',0,0,'a',null);
insert into `m_user`(`user_id`,`first_name`,`last_name`,`email_id`,`mobile_number`,`emergency_mobile_number`,`date_of_birth`,`gender`,`qualification`,`institution`,`occupation`,`state`,`district`,`location`,`address`,`document_path`,`create_time`,`update_time`,`cud`,`verified`,`m_id`,`pwd`,`verifier_mid`) values (2,'raju','Mahesh','mahesh@gmail.com','8538210083',1111111,'2015-08-15','Male','1','1','1','1','1','1','1','1','2015-09-18 22:39:50','2008-08-01 00:00:00','C',0,1,'a',null);
insert into `m_user`(`user_id`,`first_name`,`last_name`,`email_id`,`mobile_number`,`emergency_mobile_number`,`date_of_birth`,`gender`,`qualification`,`institution`,`occupation`,`state`,`district`,`location`,`address`,`document_path`,`create_time`,`update_time`,`cud`,`verified`,`m_id`,`pwd`,`verifier_mid`) values (4,'Raju','Pawan','pawan@gmail.com','9538088669',777777,'2015-08-15','Male','1','1','1','1','1','1','1','1','2015-11-29 04:44:51','2015-09-01 00:00:00','C',0,0,'a',null);
insert into `m_user`(`user_id`,`first_name`,`last_name`,`email_id`,`mobile_number`,`emergency_mobile_number`,`date_of_birth`,`gender`,`qualification`,`institution`,`occupation`,`state`,`district`,`location`,`address`,`document_path`,`create_time`,`update_time`,`cud`,`verified`,`m_id`,`pwd`,`verifier_mid`) values (7,'sharukh','khan','sharukh@gmail.com','123456789',123456789,'2015-08-15','Male','1','','1','1','1','1','1','1','2015-01-01 00:00:00','2015-09-01 00:00:00','C',0,1,'a',null);
