Select volunteer_id, first_name, last_name, email_id, mobile_number, longi, lati, pwd, create_time, update_time, cud from blinx.m_volunteer
USE blinx;

CREATE TABLE `m_volunteer` (
  `volunteer_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `longi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lati` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cud` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


