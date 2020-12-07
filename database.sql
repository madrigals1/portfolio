SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;

-- Projects table

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `date` varchar(128) NOT NULL,
  `lnf` varchar(256) NOT NULL,
  `play_link` varchar(256) NOT NULL,
  `github_link` varchar(256) NOT NULL,
  `visit_link` varchar(256) NOT NULL,
  `big_pic` varchar(256) NOT NULL,
  `small_pic` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `projects` (
  `id`,
  `name`,
  `alias`,
  `short_desc`,
  `long_desc`,
  `date`,
  `lnf`,
  `play_link`,
  `github_link`,
  `visit_link`,
  `big_pic`,
  `small_pic`
)
VALUES
(
  1,
  'Testing Project',
  'TestingAlias',
  'Testing short_desc',
  'Testing long_desc',
  'April 2019',
  'Test LNF',
  'Test Play Link',
  'Test Github Link',
  'Test Visit Link',
  '1575052073-big.png',
  '1575052073-small.png'
),
(
  2,
  'Testing Project 2',
  'asdasd',
  'asdasd',
  'asdasd',
  'asdasd',
  'asdads',
  'asdasd',
  'asdasd',
  'asdasd',
  '1575052150-big.png',
  '1575052150-small.png'
);


-- Users table

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (
  `id`,
  `login`,
  `password`)
VALUES
(
  1,
  'admin',
  '21232f297a57a5a743894a0e4a801fc3'
);
-- md5("admin") = 21232f297a57a5a743894a0e4a801fc3

-- Works table

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `period` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `queue` int(3) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `works` (
  `id`,
  `name`,
  `period`,
  `description`,
  `queue`,
  `picture`
) VALUES
(
  1,
  'Test Journey',
  'APR 2018 - JUN 2019',
  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
  1,
  '1575052217-work.png'
),
(
  2,
  'Test Journey 2',
  'JUN 2019 - AUG 2019',
  'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
  2,
  '1575052395-work.png'
);

-- Indexes

ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT

ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
