/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

--
-- Установить режим SQL (SQL mode)
--
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Установка базы данных по умолчанию
--
USE chat;

--
-- Описание для таблицы user
--
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(32) NOT NULL,
  password VARCHAR(128) NOT NULL,
  state INT(11) NOT NULL,
  token VARCHAR(128) NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX login (login),
  UNIQUE INDEX token (token)
)
ENGINE = INNODB
AUTO_INCREMENT = 21
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы friend
--
DROP TABLE IF EXISTS friend;
CREATE TABLE friend (
  user_id INT(11) NOT NULL,
  friend_id INT(11) NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE INDEX UK_frends (user_id, friend_id),
  CONSTRAINT FK_frends_user_frend_id FOREIGN KEY (friend_id)
    REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_frends_user_id FOREIGN KEY (user_id)
    REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы message
--
DROP TABLE IF EXISTS message;
CREATE TABLE message (
  id INT(11) NOT NULL AUTO_INCREMENT,
  from_id INT(11) NOT NULL,
  to_id INT(11) NOT NULL,
  message VARCHAR(256) NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  state INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id (id),
  CONSTRAINT FK_message_to_user_id FOREIGN KEY (to_id)
    REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_message_user_id FOREIGN KEY (from_id)
    REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(17, 'laleksandrov', '$2y$13$nlnwVet6LjQRGMLownAzOOOJneiJBx.NBnnQdAis.jvFZ.AZ0akrm', 1, 'iHPVmDAArFwxlurfZxcC5y-nucd_gfTx09kjilEc3Gdg8FxX1OE349zOhm8vlJ1nVVkLS68N4BLRQWj27nmkEUA7Ytt-e7sefCowww5QIVMqQiUXvi4mgcmPWDbUwz8L', '2015-04-14 13:04:13', '2015-04-14 13:04:13'),
(18, 'lubov39', '$2y$13$8uHOwN3uGGn5vK/4UoZe.uneD0waZExeUJPPBVIz4zH9.o8qprDXi', 1, 'HLJq1NrfM43rBuuvSW5ci7cGxn3-4wV-l4I_NOyx47mRJKc4roV8qmoy4-WRdPhUysa8tZsDStTyhlb61HL0S34YcmoVpuOCE0UBG7gEU7gG1gogMnXEdqpdqSGnSlh-', '2015-04-14 13:04:15', '2015-04-14 13:04:15'),
(19, 'gsergeev', '$2y$13$lI12BOp3j0R9zr.pGgy2yOr61IBzWCqtYKhzysrsImoaFPhMl4jJ6', 1, 'sWxT_Cum3vU4ackD1XRwknqb-XqBsQQARcQ7Hjp1PEuE8tO598VCrGQywpLGPlAfekIxl13iWkGV4PT8E29BNt0j9Bp4B8A0uXj_j2DputHUyCkq7X5wMFMhOEXv7alB', '2015-04-14 13:04:16', '2015-04-14 13:04:16'),
(20, 'rfadeev', '$2y$13$.8Ap0UDZ0sdAv3u3BD0HGOAHzAqjBiKHvQ9HpOf4rPOrAx1qZu3ne', 1, 'H9b5WLnkgrTcORtH2v4EVMNXwVsCiYeHafv5qnfStDIM8YUN5ZfHeY3sdITtqswUOS1iKdm2tTXpX5iKZpG-SHVlPXpaunQmRxQ8SKDyNJNiGYcdUaMZ1DMwMZplOPB_', '2015-04-14 15:04:21', '2015-04-14 15:04:21');

--
-- Вывод данных для таблицы friend
--
INSERT INTO friend VALUES
(17, 18, '2015-04-14 20:40:39', '2015-04-14 20:40:40'),
(17, 19, '2015-04-14 20:41:01', '2015-04-14 20:41:03'),
(18, 17, '2015-04-14 20:40:51', '2015-04-14 20:40:53'),
(19, 17, '2015-04-14 20:41:13', '2015-04-14 20:41:14');

--
-- Вывод данных для таблицы message
--
INSERT INTO message VALUES
(1, 17, 18, '17-18', '2015-04-14 22:03:08', '2015-04-14 22:03:08', 1),
(2, 18, 17, '18-17', '2015-04-14 22:03:08', '2015-04-14 22:03:08', 1),
(3, 17, 19, '17-19', '2015-04-14 22:03:08', '2015-04-14 22:03:08', 1),
(4, 17, 18, 'test 17-18', '2015-04-14 16:04:01', '2015-04-14 16:04:01', 1),
(5, 17, 19, 'asdas', '2015-04-14 17:04:14', '2015-04-14 17:04:14', 1),
(6, 17, 19, 'asdas', '2015-04-14 17:04:47', '2015-04-14 17:04:47', 1),
(7, 17, 19, 'asdas', '2015-04-14 17:04:59', '2015-04-14 17:04:59', 1),
(8, 17, 19, 'asdas', '2015-04-14 17:04:18', '2015-04-14 17:04:18', 1);

--
-- Восстановить предыдущий режим SQL (SQL mode)
--
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

--
-- Включение внешних ключей
--
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;