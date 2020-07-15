DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FName` varchar(255) DEFAULT NULL,
  `LName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `tbl_user` ('`ID`FName`,`LName`,`Email`,`Password`) VALUES
(31,'Eddy','Green','green@abc.com', '73ghjdrgh234924jfsdf');
