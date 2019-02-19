-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 19 2019 р., 17:51
-- Версія сервера: 8.0.12
-- Версія PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `secondmodule`
--

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `post_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`post_id`, `post_name`, `post_description`, `post_text`, `author_id`, `post_image`) VALUES
(1, 'Hello everyone!', 'Every one should know what he should to do for effective learing PHP.', 'PHP is a general-purpose scripting language primarily used in web development to enhance web pages. First created in 1994 by Rasmus Lerdorf, PHP began life as a suite of scripts known as “Personal Home Page Tools.” In 1995, Rasmus expanded his suite to add functionality and released the source code to the public.\r\n\r\nUnlike JavaScript, which is client-side, PHP is server-side. When the browser requests information from the server, the server executes the code and sends the result to the client. Typically, the output is an HTML file, but this can also include CSS and JavaScript. The browser uses this information to create the web page.', 2, 'reinis-birznieks-1355047-unsplash.jpg'),
(2, 'Learn the Basics of PHP and start create soft.', 'Few effective things for learning PHP programming language.', 'Learn PHP online from the best PHP tutorials & courses recommended by the programming community.', 2, 'reinis-birznieks-1355047-unsplash.jpg'),
(3, 'What about try matrix with php?', 'One of the best method receive practive in programin language.', 'Hello everyone. A lot of users asking - how we can get practice during learning php pragramming language. The main things - everyday write code.', 2, 'reinis-birznieks-1355047-unsplash.jpg'),
(4, 'Reading more books.', 'Today people read books less than 10 years ago.', 'Books lost their pupular in the world, but they still stay the best way in personal upgrading.', 2, 'tesla-model-s-tesla-model-s-633.jpg'),
(5, 'PHP Training.', 'PHP is the world’s most popular server-side scripting language.', 'f you’ve been learning front-end development and want to take the next step, PHP is an ideal place to start. Although you have the choice of many other server-side technologies like Rails and Node, PHP is especially suited to a beginner. This is because it’s the easiest to get up and running and it plugs right into HTML.\r\n\r\nHere are 6 of Code Conquest’s top PHP training recommendations. There’s something from every category – free and premium, online and offline, basic and extensive, hands-on and theoretical. Guaranteed, one is the perfect training for you.', 2, 'matrix-356024.jpg'),
(6, 'Knowledge Center.', 'Whether you want to learn how to make a website.', 'Get help with your coding or even start a career, the Code Conquest knowledge center has all the info you need.\r\n\r\nYou can learn how to start working on your own self-directed coding project or make a website. You’ll get the opportunity to familiarize yourself with a range of different coding tools, like GitHub and text editors. You can also find out where to get coding help.\r\n\r\nThis is also the place to introduce yourself to some advanced concepts, once you’re confident you’ve mastered the basics of coding. Finally, there are tips for finding a job as a coder or starting a business.', 9, 'nebo-tuchi-molniia-stikhiia.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `Id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `secondname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userphoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`Id`, `firstname`, `secondname`, `login`, `email`, `password`, `userphoto`) VALUES
(1, 'Aleksey', 'Zhuk', 'Aleksey', 'aleksey@mail.com', '722C53076934353B6179953B622A4FA9', ''),
(2, 'Dima', 'Zhuk', 'Dimka', 'dimka@mail.com', '489d460f0a77910a5d019701859d50d7', 'titanic_647_041416113640.jpg'),
(8, 'Lena', 'Zhuk', 'Lenchik', 'lena@mail.com', '73586c09cf0d2e898aaa75d456f4e044', ''),
(9, 'Denis', 'Zhuk', 'Denchik', 'denchik@mail.com', 'A3B8EB6FAAF230BD0944847C527D30BF', 'denis.png');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
