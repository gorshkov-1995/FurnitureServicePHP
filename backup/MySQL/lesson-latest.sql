-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных lesson
CREATE DATABASE IF NOT EXISTS `lesson` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lesson`;

-- Дамп структуры для таблица lesson.signup
CREATE TABLE IF NOT EXISTS `signup` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы lesson.signup: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `signup` DISABLE KEYS */;
INSERT INTO `signup` (`user_id`, `username`, `password`, `date_create`) VALUES
	(17, 'qwerty@list.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-03-12 17:32:16'),
	(18, 'giuda@list.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-03-12 20:13:13');
/*!40000 ALTER TABLE `signup` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
