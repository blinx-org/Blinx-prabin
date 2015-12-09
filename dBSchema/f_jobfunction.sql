Select Id, Description, IsUsed from blinx.f_jobfunction
USE blinx;

CREATE TABLE `f_jobfunction` (
  `Id` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


