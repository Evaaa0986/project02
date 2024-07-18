-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024 年 07 月 18 日 15:24
-- 伺服器版本： 8.4.0
-- PHP 版本： 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `members`
--

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `user_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`) VALUES
(6, 'text@gmail.com', '$2y$10$1c6T3LDDtLAgtIN24Rew/.khKYQTQqRzR3nd05Gejxb8qQ5HgXGLm'),
(9, '123@mail.com', '$2y$10$J5XSs6HfhNOcLz3uX0K5k.6uMN/9T5xfAQ7oRR36twEw.JtuoQLOO'),
(11, '1111@mail.com', '$2y$10$.Cmuyxsc9u1l6xNUT1TzcutMrwngcUAWCGG/URy423aLXwd5AtDs.'),
(19, '313@mail.com', '$2y$10$VAlUnhIsLL6hOZSBcE..K.h3dZGdJHHmFGM3kacAAMXRjhgRIbBae');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `user_id` int NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`user_id`, `user_name`, `email`, `password`, `mobile`, `member_name`, `location`, `avatar`, `birthday`, `gender`) VALUES
(1, 'john', 'john.doe@example.com', 'password123', '0912345678', 'John Doe', 'New York, USA', 'fish.jpeg', '1990-01-15', 'Male'),
(2, 'jane_smith', 'jane.smith@example.com', 'password456', '0912345678', 'Jane Smith', 'Los Angeles, USA', 'maple.jpeg', '1992-05-23', 'Female'),
(3, 'alex_jones', 'alex.jones@example.com', 'password789', '0912345678', 'Alex Jones', 'Chicago, USA', 'maple.jpeg', '1988-08-10', 'Other'),
(4, 'user1', 'user1@example.com', 'password1', '1234567890', 'Member One', 'Location One', 'avatar1.png', '1990-01-01', 'M'),
(5, 'michael_brown', 'michael.brown@example.com', 'passworddef', '0912345678', 'Michael Brown', 'Phoenix, USA', 'maple.jpeg', '1985-03-25', 'Male'),
(6, '123asd231', 'text@gmail.com', '$2y$10$1c6T3LDDtLAgtIN24Rew/.khKYQTQqRzR3nd05Gejxb8qQ5HgXGLm', '546615', '123123', '123asdq', 'sea1.jpeg', '', 'Male'),
(7, '12esdcasd21', 'shin@test.com', '$2y$10$LLoX6P5m48AcVxNaRDesB.lzxoXQ1AUsBF91RBHyvoDi2cju6XqYe', '36562', '221231', 'dgfhegfdgbvc4w', 'sea2.jpeg', '', 'Other'),
(8, 'user2', 'user2@example.com', 'password2', '1234567891', 'Member Two', 'Location Two', 'avatar2.png', '1991-02-02', 'F'),
(9, '123@mail.com', '123@mail.com', '$2y$10$J5XSs6HfhNOcLz3uX0K5k.6uMN/9T5xfAQ7oRR36twEw.JtuoQLOO', 'sadawqwqw', 'zxcasdw', 'sdawdxzcadww', 'sea2.jpeg', '2024-07-01', 'Male'),
(10, 'user3', 'user3@example.com', 'password3', '1234567892', 'Member Three', 'Location Three', 'avatar3.png', '1992-03-03', 'M'),
(11, '1111', '1111@mail.com', '$2y$10$.Cmuyxsc9u1l6xNUT1TzcutMrwngcUAWCGG/URy423aLXwd5AtDs.', '1111111', '1111111', '1111111', 'fish.jpeg', '2024-07-01', '男'),
(12, 'user4', 'user4@example.com', 'password4', '1234567893', 'Member Four', 'Location Four', 'avatar4.png', '1993-04-04', 'F'),
(13, 'user10', 'user10@example.com', 'password10', '1234567899', 'Member Ten', 'Location Ten', 'avatar10.png', '1999-10-10', 'F'),
(14, 'user9', 'user9@example.com', 'password9', '1234567898', 'Member Nine', 'Location Nine', 'avatar9.png', '1998-09-09', 'M'),
(15, 'user8', 'user8@example.com', 'password8', '1234567897', 'Member Eight', 'Location Eight', 'avatar8.png', '1997-08-08', 'F'),
(16, 'user7', 'user7@example.com', 'password7', '1234567896', 'Member Seven', 'Location Seven', 'avatar7.png', '1996-07-07', 'M'),
(17, 'user6', 'user6@example.com', 'password6', '1234567895', 'Member Six', 'Location Six', 'avatar6.png', '1995-06-06', 'F'),
(18, 'user5', 'user5@example.com', 'password5', '1234567894', 'Member Five', 'Location Five', 'avatar5.png', '1994-05-05', 'M'),
(19, '31231', '313@mail.com', '$2y$10$VAlUnhIsLL6hOZSBcE..K.h3dZGdJHHmFGM3kacAAMXRjhgRIbBae', 'dasqew212', 'asdwwq', 'qwadawzdadww', 'sea1.jpeg', '2024-07-12', '男'),
(20, 'aaaa', 'aaa@mail.com', '$2y$10$k9WVvNvVcgWkrf0qJ0NTpex4EnAe82DSa8FYJ/WtV1dbdY4v2Lzka', 'aaaaaaaaa', 'aaa', 'asaaaaaa', 'sea-turtle.jpeg', '2024-07-04', 'Female'),
(21, 'ssss', 'ssss@mail.com', '$2y$10$Q.yFwdR1iPjHlG/nyyzfeeJovctw2PnSb8Dm.zRHMgV2FUrm1JPDW', 'ssssssssss', 'ssss', 'sssssssssssssssss', 'sea-turtle.jpeg', '2024-07-02', 'Male'),
(22, 'asds', 'dassadas@aaaa', '$2y$10$iWyswTqoF59/8XNJs/GPBOhy7y3g6jvhk5rfI8HMBBYCNaWg17IoW', 'adsasds', 'zxxzcsda', 'szdasdzxcas', 'sea1.jpeg', '2024-07-02', 'Male'),
(23, '6666', '6666@mail.com', '$2y$10$pfja6ZPii6wbRgZdrOZwgevPSnRpJY5jnPB.F3I89L4y1tNNI/oES', '6666666666', '666', '66666666666666666', 'red-sea.jpeg', '2024-07-01', 'Male'),
(24, 'user11', 'user11@example.com', 'password11', '1234567890', 'Member Eleven', 'Location Eleven', 'avatar11.png', '1990-11-11', 'M'),
(25, 'user12', 'user12@example.com', 'password12', '1234567891', 'Member Twelve', 'Location Twelve', 'avatar12.png', '1991-12-12', 'F'),
(26, 'user13', 'user13@example.com', 'password13', '1234567892', 'Member Thirteen', 'Location Thirteen', 'avatar13.png', '1992-01-13', 'M'),
(27, 'user14', 'user14@example.com', 'password14', '1234567893', 'Member Fourteen', 'Location Fourteen', 'avatar14.png', '1993-02-14', 'F'),
(28, 'user15', 'user15@example.com', 'password15', '1234567894', 'Member Fifteen', 'Location Fifteen', 'avatar15.png', '1994-03-15', 'M'),
(29, 'user16', 'user16@example.com', 'password16', '1234567895', 'Member Sixteen', 'Location Sixteen', 'avatar16.png', '1995-04-16', 'F'),
(30, 'user17', 'user17@example.com', 'password17', '1234567896', 'Member Seventeen', 'Location Seventeen', 'avatar17.png', '1996-05-17', 'M'),
(31, 'user18', 'user18@example.com', 'password18', '1234567897', 'Member Eighteen', 'Location Eighteen', 'avatar18.png', '1997-06-18', 'F'),
(32, 'user19', 'user19@example.com', 'password19', '1234567898', 'Member Nineteen', 'Location Nineteen', 'avatar19.png', '1998-07-19', 'M'),
(33, 'user20', 'user20@example.com', 'password20', '1234567899', 'Member Twenty', 'Location Twenty', 'avatar20.png', '1999-08-20', 'F'),
(34, 'user34', 'user34@example.com', 'password34', '1234567834', 'Member Thirty-Four', 'Location Thirty-Four', 'avatar34.png', '1984-04-04', 'M'),
(35, 'user35', 'user35@example.com', 'password35', '1234567835', 'Member Thirty-Five', 'Location Thirty-Five', 'avatar35.png', '1985-05-05', 'F'),
(36, 'user36', 'user36@example.com', 'password36', '1234567836', 'Member Thirty-Six', 'Location Thirty-Six', 'avatar36.png', '1986-06-06', 'M'),
(37, 'user37', 'user37@example.com', 'password37', '1234567837', 'Member Thirty-Seven', 'Location Thirty-Seven', 'avatar37.png', '1987-07-07', 'F'),
(38, 'user38', 'user38@example.com', 'password38', '1234567838', 'Member Thirty-Eight', 'Location Thirty-Eight', 'avatar38.png', '1988-08-08', 'M'),
(39, 'user39', 'user39@example.com', 'password39', '1234567839', 'Member Thirty-Nine', 'Location Thirty-Nine', 'avatar39.png', '1989-09-09', 'F'),
(40, 'user40', 'user40@example.com', 'password40', '1234567840', 'Member Forty', 'Location Forty', 'avatar40.png', '1990-10-10', 'M'),
(41, 'user41', 'user41@example.com', 'password41', '1234567841', 'Member Forty-One', 'Location Forty-One', 'avatar41.png', '1991-11-11', 'F'),
(42, 'user42', 'user42@example.com', 'password42', '1234567842', 'Member Forty-Two', 'Location Forty-Two', 'avatar42.png', '1992-12-12', 'M'),
(43, 'user43', 'user43@example.com', 'password43', '1234567843', 'Member Forty-Three', 'Location Forty-Three', 'avatar43.png', '1993-01-13', 'F'),
(44, 'user44', 'user44@example.com', 'password44', '1234567844', 'Member Forty-Four', 'Location Forty-Four', 'avatar44.png', '1994-02-14', 'M'),
(45, 'user45', 'user45@example.com', 'password45', '1234567845', 'Member Forty-Five', 'Location Forty-Five', 'avatar45.png', '1995-03-15', 'F'),
(46, 'user46', 'user46@example.com', 'password46', '1234567846', 'Member Forty-Six', 'Location Forty-Six', 'avatar46.png', '1996-04-16', 'M'),
(47, 'user47', 'user47@example.com', 'password47', '1234567847', 'Member Forty-Seven', 'Location Forty-Seven', 'avatar47.png', '1997-05-17', 'F'),
(48, 'user48', 'user48@example.com', 'password48', '1234567848', 'Member Forty-Eight', 'Location Forty-Eight', 'avatar48.png', '1998-06-18', 'M'),
(49, 'user49', 'user49@example.com', 'password49', '1234567849', 'Member Forty-Nine', 'Location Forty-Nine', 'avatar49.png', '1999-07-19', 'F'),
(50, 'user50', 'user50@example.com', 'password50', '1234567850', 'Member Fifty', 'Location Fifty', 'avatar50.png', '2000-08-20', 'M'),
(51, 'user51', 'user51@example.com', 'password51', '1234567851', 'Member Fifty-One', 'Location Fifty-One', 'avatar51.png', '2001-09-21', 'F'),
(52, 'user52', 'user52@example.com', 'password52', '1234567852', 'Member Fifty-Two', 'Location Fifty-Two', 'avatar52.png', '2002-10-22', 'M'),
(53, 'user53', 'user53@example.com', 'password53', '1234567853', 'Member Fifty-Three', 'Location Fifty-Three', 'avatar53.png', '2003-11-23', 'F'),
(54, 'user54', 'user54@example.com', 'password54', '1234567854', 'Member Fifty-Four', 'Location Fifty-Four', 'avatar54.png', '2004-12-24', 'M'),
(55, 'user55', 'user55@example.com', 'password55', '1234567855', 'Member Fifty-Five', 'Location Fifty-Five', 'avatar55.png', '2005-01-25', 'F');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
