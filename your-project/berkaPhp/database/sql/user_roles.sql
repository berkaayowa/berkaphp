
CREATE DATABASE IF NOT EXISTS `capetown_jobs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `capetown_jobs`;

-- Dumping structure for table capetown_jobs.user_roles
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  `role_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`role_id`, `role_name`, `role_description`) VALUES
	(1, 'dev', 'developer'),
	(2, 'admin', 'administartor'),
	(3, 'user', 'user');
