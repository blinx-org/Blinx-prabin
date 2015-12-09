Select Id, Description, IsUsed from blinx.f_education
USE blinx;

CREATE TABLE `f_education` (
  `Id` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


