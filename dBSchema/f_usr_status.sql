Select Id, Description, Status, IsUsed from blinx.f_usr_status
USE blinx;

CREATE TABLE `f_usr_status` (
  `Id` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Status` varchar(2) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


insert into `f_usr_status`(`Id`,`Description`,`Status`,`IsUsed`) values (1,'Newly Created','N',1);
insert into `f_usr_status`(`Id`,`Description`,`Status`,`IsUsed`) values (2,'Confirm','C',1);
insert into `f_usr_status`(`Id`,`Description`,`Status`,`IsUsed`) values (3,'Reject','R',1);
