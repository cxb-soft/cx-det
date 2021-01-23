-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `username` mediumtext NOT NULL,
  `classname` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `last_time` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `class` mediumtext NOT NULL,
  `per` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-01-23 02:20:39
