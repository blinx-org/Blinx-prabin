Select Id, Description, IsUsed from blinx.f_help
USE blinx;

CREATE TABLE `f_help` (
  `Id` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into `f_help`(`Id`,`Description`,`IsUsed`) values (1,'Reading',1);
insert into `f_help`(`Id`,`Description`,`IsUsed`) values (2,'Writing',1);
insert into `f_help`(`Id`,`Description`,`IsUsed`) values (3,'Scanning Books',1);
insert into `f_help`(`Id`,`Description`,`IsUsed`) values (4,'Audio Books',1);
insert into `f_help`(`Id`,`Description`,`IsUsed`) values (5,'Filling Application',1);
