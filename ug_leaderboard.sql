-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `codes`;
CREATE TABLE `codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(260) NOT NULL,
  `code` varchar(260) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `codes` (`id`, `email`, `code`) VALUES
(12,	'jackbreeton@gmail.com',	'6jvPLT8G');

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(260) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `options` (`id`, `header`) VALUES
(31,	'The ultra games score board ');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` mediumtext NOT NULL,
  `wod` text NOT NULL,
  `score` int(11) DEFAULT NULL,
  `_Time` time DEFAULT NULL,
  `pos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `scores` (`id`, `team_name`, `wod`, `score`, `_Time`, `pos`) VALUES
(128,	'opentest',	'1',	12,	NULL,	2),
(129,	'opentest2',	'1',	4,	NULL,	3),
(130,	'opentest3',	'1',	17,	NULL,	1),
(131,	'opentest',	'2',	NULL,	'00:03:26',	3),
(132,	'opentest2',	'2',	NULL,	'00:02:07',	1),
(133,	'opentest3',	'2',	NULL,	'00:02:40',	2),
(134,	'opentest',	'3',	6,	NULL,	3),
(135,	'opentest2',	'3',	19,	NULL,	1),
(136,	'opentest3',	'3',	11,	NULL,	2),
(137,	'opentest',	'4',	NULL,	'00:01:01',	1),
(138,	'opentest2',	'4',	NULL,	'00:01:07',	2),
(139,	'opentest3',	'4',	NULL,	'00:02:01',	3),
(140,	'opentest',	'5',	15,	NULL,	2),
(141,	'opentest2',	'5',	14,	NULL,	3),
(142,	'opentest3',	'5',	21,	NULL,	1),
(143,	'opentest',	'6',	5,	NULL,	2),
(144,	'opentest2',	'6',	2,	NULL,	3),
(145,	'opentest3',	'6',	14,	NULL,	1);

DROP TABLE IF EXISTS `scores_s`;
CREATE TABLE `scores_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` mediumtext NOT NULL,
  `wod` text NOT NULL,
  `score` int(11) DEFAULT NULL,
  `_Time` time DEFAULT NULL,
  `pos` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `scores_s` (`id`, `team_name`, `wod`, `score`, `_Time`, `pos`) VALUES
(1,	'Test_skills',	'1',	NULL,	'00:12:34',	3),
(2,	'score skillz',	'2',	13,	NULL,	2),
(3,	'testscore skillz',	'3',	15,	NULL,	2),
(4,	'scooore',	'5',	NULL,	'00:04:06',	2),
(5,	'scoorre',	'6',	7,	'00:04:10',	1),
(7,	'team_skillz',	'7',	34,	NULL,	1),
(8,	'team_score',	'7',	21,	NULL,	2),
(9,	'test_team',	'4',	12,	NULL,	2),
(10,	'new_team',	'3',	11,	NULL,	3),
(11,	'newer_team',	'3',	11,	NULL,	4),
(12,	'another_team',	'4',	9,	NULL,	3),
(14,	'skillzteam',	'2',	3,	NULL,	3),
(15,	'skill',	'7',	21,	NULL,	3),
(16,	'bestteam',	'1',	NULL,	'00:03:03',	2),
(17,	'theteam',	'2',	18,	NULL,	1),
(18,	'team21',	'3',	21,	NULL,	1),
(19,	'skillz-team',	'4',	21,	NULL,	1),
(20,	'exampleteam',	'5',	NULL,	'00:03:13',	1),
(21,	'example',	'7',	3,	'00:00:00',	4),
(22,	'team22',	'4',	3,	NULL,	5),
(23,	'team23',	'3',	3,	NULL,	5),
(24,	'team24',	'7',	1,	NULL,	5),
(25,	'team25',	'1',	NULL,	'00:01:04',	1),
(26,	'team26',	'7',	1,	NULL,	6),
(27,	'team27',	'4',	4,	NULL,	4),
(28,	'team28',	'2',	3,	NULL,	4);

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(260) NOT NULL,
  `gym_name` varchar(260) NOT NULL,
  `category` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `teams` (`id`, `team_name`, `gym_name`, `category`, `date_created`) VALUES
(115,	'My GG',	'UH',	'Rookie(Males)',	'2021-09-22 09:30:14'),
(116,	'kicks ',	'g',	'Rookie(Females)',	'2021-09-22 09:30:28'),
(117,	'your',	'g',	'Rookie(Females)',	'2021-09-22 09:30:42'),
(118,	'breath',	'g',	'Rookie(Females)',	'2021-09-22 09:30:57'),
(119,	'team name',	'waddi bumber',	'Rookie(Females)',	'2021-09-22 09:31:22'),
(120,	'bread',	'dog',	'Rookie(Mixed)',	'2021-09-22 12:21:12'),
(121,	'doge',	's',	'Skillz(Males)',	'2021-09-22 12:25:37'),
(122,	'heheh',	'hehehe',	'Rookie(Males)',	'2021-10-01 11:50:31'),
(123,	'test',	'test',	'Skillz(Males)',	'2021-10-06 14:45:26'),
(124,	'mok',	'd',	'Rookie(Mixed)',	'2021-10-06 14:48:56'),
(125,	'Standard team name',	'the best gym',	'Skillz(Females)',	'2021-11-22 11:07:06'),
(126,	'enter_team',	'the_best_gym',	'Skillz(Males)',	'2022-06-01 10:13:25'),
(127,	'new_team',	'best gym',	'Skillz(Mixed)',	'2022-06-01 11:03:49'),
(128,	'open team',	'open gym',	'Rookie(Females)',	'2022-06-01 11:09:22');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(260) NOT NULL,
  `first_name` varchar(260) NOT NULL,
  `last_name` varchar(260) NOT NULL,
  `password` varchar(260) NOT NULL,
  `Invite Code` text NOT NULL,
  `forgot_pass` text NOT NULL,
  `date_created` date NOT NULL,
  `date_last_login` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `Invite Code`, `forgot_pass`, `date_created`, `date_last_login`) VALUES
(3,	'jackbreeton@gmail.com',	'jack',	'breeton',	'5e9d11a14ad1c8dd77e98ef9b53fd1ba',	'',	'PTZr73If',	'2021-10-14',	'2021-10-14'),
(4,	'exampleuser@test.comm',	'anon',	'anon',	'e16b2ab8d12314bf4efbd6203906ea6c',	'',	'',	'0000-00-00',	'0000-00-00'),
(5,	'jbreeton@gmail.com',	'anon',	'anon',	'86ad89437b304db60d8881541ef3d47a',	'',	'TIJ4S59Q',	'0000-00-00',	'0000-00-00');

-- 2022-06-06 12:52:37
