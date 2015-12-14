Select Id, user_id, help_request_id, comments, rating from blinx.ratings
USE blinx;

CREATE TABLE `ratings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `help_request_id` int(11) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


insert into `ratings`(`Id`,`user_id`,`help_request_id`,`comments`,`rating`) values (1,121,111,'This guys is supper awosomw',0);
insert into `ratings`(`Id`,`user_id`,`help_request_id`,`comments`,`rating`) values (2,121,111,'This guys is supper awosomw',4);
insert into `ratings`(`Id`,`user_id`,`help_request_id`,`comments`,`rating`) values (3,121,111,'This guys is supper awosomw',4);
