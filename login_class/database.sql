CREATE TABLE `logon` (
  `userid` int(11) NOT NULL auto_increment,
  `useremail` varchar(50) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `userlevel` int(1) NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) TYPE=MyISAM
