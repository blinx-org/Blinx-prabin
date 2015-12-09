Select Id, UserId, `Datetime`, Status, VolunteerId, Mid from blinx.t_help_request_log
USE blinx;

CREATE TABLE `t_help_request_log` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `UserId` int(11) DEFAULT NULL,
  `Datetime` datetime DEFAULT NULL,
  `Status` varchar(3) DEFAULT NULL,
  `VolunteerId` int(11) DEFAULT NULL,
  `Mid` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into `blinx`.`t_help_request_log`(`Id`,`UserId`,`Datetime`,`Status`,`VolunteerId`,`Mid`) values (19,0,'2015-12-09 19:57:15','A',1,1);
insert into `blinx`.`t_help_request_log`(`Id`,`UserId`,`Datetime`,`Status`,`VolunteerId`,`Mid`) values (19,null,'2015-12-09 19:57:15','A',1,1);
insert into `blinx`.`t_help_request_log`(`Id`,`UserId`,`Datetime`,`Status`,`VolunteerId`,`Mid`) values (19,0,'2015-12-09 19:57:15','A',1,1);
insert into `blinx`.`t_help_request_log`(`Id`,`UserId`,`Datetime`,`Status`,`VolunteerId`,`Mid`) values (19,0,'2015-12-09 21:42:42','A',1,0);
