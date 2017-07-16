DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT '',
  `user_lastname` varchar(200) DEFAULT '',
  `user_fullname` varchar(200) DEFAULT '',
  `user_ref_role` int(10) DEFAULT NULL,
  `user_cellphone` varchar(50) DEFAULT NULL,
  `user_email` varchar(500) DEFAULT '',
  `user_password` varchar(1000) DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `FK_users_user_roles` (`user_ref_role`),
  CONSTRAINT `FK_users_user_roles` FOREIGN KEY (`user_ref_role`) REFERENCES `user_roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table capetown_jobs.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_fullname`, `user_ref_role`, `user_cellphone`, `user_email`, `user_password`) VALUES
	(1, 'berkaPhp', 'berkaPhp', 'berkaPhp-small php', 2, NULL, 'berkaPhp@gmail.com', '1234');

