Select Id, Description, Status, IsUsed from blinx.f_request_status
USE blinx;

CREATE TABLE `f_request_status` (
  `Id` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `Status` varchar(2) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


insert into `f_request_status`(`Id`,`Description`,`Status`,`IsUsed`) values (1,'Pending/Created','P',1);
insert into `f_request_status`(`Id`,`Description`,`Status`,`IsUsed`) values (2,'Accepted','A',1);
insert into `f_request_status`(`Id`,`Description`,`Status`,`IsUsed`) values (3,'Accepted and Cancell','AC',1);
insert into `f_request_status`(`Id`,`Description`,`Status`,`IsUsed`) values (4,'Deleted or Rejected','D',1);
