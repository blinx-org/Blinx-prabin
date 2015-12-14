Select Id, Description, IsUsed from blinx.f_language
USE blinx;

CREATE TABLE `f_language` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into `f_language`(`Id`,`Description`,`IsUsed`) values (1,'English',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (2,'Hindi',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (3,'Telugu',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (4,'Tamil',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (5,'Kannada',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (6,'Malayalam',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (7,'Gujarati',1);
insert into `f_language`(`Id`,`Description`,`IsUsed`) values (8,'Punjabi',1);
