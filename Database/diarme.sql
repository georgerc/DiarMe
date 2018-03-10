-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 05:09 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diarme`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_of_post` int(11) NOT NULL,
  `message` text NOT NULL,
  `username` text NOT NULL,
  `odata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_of_post`, `message`, `username`, `odata`) VALUES
(0, 109, '423423432', 'user', 0),
(0, 109, ' 324234324', 'user', 0),
(0, 109, ' 234234324', 'user', 0),
(0, 110, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta massa nibh, non facilisis enim suscipit vel. Phasellus aliquam ligula at erat volutpat, sed laoreet leo pulvinar. Cras egestas commodo eleifend. Aliquam eu aliquam odio, at suscipit lectus. Proin pretium aliquam leo. Curabitur placerat tincidunt tempus. Sed in scelerisque magna, non facilisis ex. Nulla gravida, nisi et imperdiet venenatis, eros nulla posuere sapien, vel sagittis arcu ipsum quis sem. Nulla non placerat ipsum, a malesuada diam. Duis egestas gravida enim, accumsan semper risus vehicula nec. Pellentesque iaculis vulputate erat non iaculis. Donec ultrices tortor quis luctus dignissim. Vivamus et ipsum interdum mauris suscipit laoreet. Vivamus non ultricies risus.\r\n\r\nAliquam at felis gravida, commodo diam eu, laoreet turpis. Morbi id facilisis elit. Aliquam consectetur molestie tellus. Nullam pellentesque, nunc at sollicitudin malesuada, quam libero faucibus sapien, eget vulputate tortor metus ac eros. Suspendisse hendrerit ac arcu sed malesuada. Mauris eu elit risus. Aenean porttitor, mauris id vulputate aliquam, tortor velit placerat arcu, eu blandit metus ex sit amet orci. Maecenas aliquet, diam at malesuada imperdiet, orci dui auctor enim, sit amet gravida neque sem at dui. Praesent est urna, ullamcorper a pulvinar sit amet, aliquet in dui. Quisque ornare aliquet lobortis. Aenean id tristique ex. Phasellus semper sit amet justo sed sagittis. Etiam eget arcu dapibus, euismod turpis quis, luctus massa. Nam quis risus vitae lorem feugiat scelerisque eu accumsan erat. Nullam tincidunt risus massa, vel dignissim orci vulputate in.\r\n\r\nNunc ultrices risus et bibendum commodo. Nunc bibendum convallis orci in porta. Sed faucibus dui et vestibulum dictum. Nulla facilisi. Sed ut ante molestie, vulputate sem non, commodo est. Quisque ut mauris iaculis, hendrerit ex pellentesque, varius urna. Sed sed purus at ante dignissim posuere. Sed tristique, purus vel fermentum interdum, lacus metus laoreet dolor, non rhoncus ante elit at tellus. Nam bibendum tortor in ultricies viverra.\r\n\r\nPellentesque porttitor nisl eget massa bibendum egestas. Nulla eget mi cursus, vestibulum orci in, dapibus ex. Nunc eget tellus gravida, fringilla diam convallis, elementum mauris. Vivamus laoreet interdum leo nec fermentum. Nulla sit amet lobortis diam, et finibus risus. Nullam sit amet elit non mi mollis posuere quis eu leo. Quisque eu rhoncus elit. Phasellus aliquam felis nec justo fringilla porttitor. Integer ultrices nisl sed tellus condimentum, nec eleifend sapien feugiat. Pellentesque tincidunt urna nunc, id condimentum velit elementum vel. Nam ante ligula, pharetra faucibus tellus nec, ultrices aliquet turpis. Mauris convallis lacinia erat, at dictum nibh fermentum et. Cras gravida ante sed elementum aliquet.\r\n\r\nInteger accumsan, diam ac dignissim fringilla, nisi erat dictum augue, ut iaculis velit diam eu enim. Donec mi nibh, efficitur ut sodales et, pulvinar vel nisl. Quisque aliquet, libero eget tempor laoreet, arcu erat mollis metus, vitae imperdiet mauris nisi ac felis. Mauris nec eros mauris. Nam id ornare elit. Proin rhoncus mauris ac nunc efficitur lacinia. Donec in ante elementum, imperdiet neque ut, malesuada enim. Aenean ac mollis est. Cras vestibulum, velit eget viverra eleifend, orci risus tempus arcu, nec aliquet arcu tortor ut mauris. Fusce facilisis lacus nec ultricies vestibulum.', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `journal_title` text NOT NULL,
  `journal_text` text NOT NULL,
  `odata` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `share` int(1) DEFAULT '0',
  `img_path` text NOT NULL,
  `warned` int(11) NOT NULL,
  `warned_reason` text NOT NULL,
  `longitude` float NOT NULL DEFAULT '1',
  `latitude` float NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `username`, `journal_title`, `journal_text`, `odata`, `share`, `img_path`, `warned`, `warned_reason`, `longitude`, `latitude`) VALUES
(108, 'user', 'regergerg', 'vwggregerg', '2018-03-10 15:46:14', NULL, 'uploads/user.jpg', 0, '', 69, 69),
(109, 'user', '12312345', 'fergergregreb', '2018-03-10 15:46:41', 0, 'uploads/user.jpg', 0, '', 69, 69),
(110, 'user', 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta massa nibh, non facilisis enim suscipit vel. Phasellus aliquam ligula at erat volutpat, sed laoreet leo pulvinar. Cras egestas commodo eleifend. Aliquam eu aliquam odio, at suscipit lectus. Proin pretium aliquam leo. Curabitur placerat tincidunt tempus. Sed in scelerisque magna, non facilisis ex. Nulla gravida, nisi et imperdiet venenatis, eros nulla posuere sapien, vel sagittis arcu ipsum quis sem. Nulla non placerat ipsum, a malesuada diam. Duis egestas gravida enim, accumsan semper risus vehicula nec. Pellentesque iaculis vulputate erat non iaculis. Donec ultrices tortor quis luctus dignissim. Vivamus et ipsum interdum mauris suscipit laoreet. Vivamus non ultricies risus.\r\n\r\nAliquam at felis gravida, commodo diam eu, laoreet turpis. Morbi id facilisis elit. Aliquam consectetur molestie tellus. Nullam pellentesque, nunc at sollicitudin malesuada, quam libero faucibus sapien, eget vulputate tortor metus ac eros. Suspendisse hendrerit ac arcu sed malesuada. Mauris eu elit risus. Aenean porttitor, mauris id vulputate aliquam, tortor velit placerat arcu, eu blandit metus ex sit amet orci. Maecenas aliquet, diam at malesuada imperdiet, orci dui auctor enim, sit amet gravida neque sem at dui. Praesent est urna, ullamcorper a pulvinar sit amet, aliquet in dui. Quisque ornare aliquet lobortis. Aenean id tristique ex. Phasellus semper sit amet justo sed sagittis. Etiam eget arcu dapibus, euismod turpis quis, luctus massa. Nam quis risus vitae lorem feugiat scelerisque eu accumsan erat. Nullam tincidunt risus massa, vel dignissim orci vulputate in.\r\n\r\nNunc ultrices risus et bibendum commodo. Nunc bibendum convallis orci in porta. Sed faucibus dui et vestibulum dictum. Nulla facilisi. Sed ut ante molestie, vulputate sem non, commodo est. Quisque ut mauris iaculis, hendrerit ex pellentesque, varius urna. Sed sed purus at ante dignissim posuere. Sed tristique, purus vel fermentum interdum, lacus metus laoreet dolor, non rhoncus ante elit at tellus. Nam bibendum tortor in ultricies viverra.\r\n\r\nPellentesque porttitor nisl eget massa bibendum egestas. Nulla eget mi cursus, vestibulum orci in, dapibus ex. Nunc eget tellus gravida, fringilla diam convallis, elementum mauris. Vivamus laoreet interdum leo nec fermentum. Nulla sit amet lobortis diam, et finibus risus. Nullam sit amet elit non mi mollis posuere quis eu leo. Quisque eu rhoncus elit. Phasellus aliquam felis nec justo fringilla porttitor. Integer ultrices nisl sed tellus condimentum, nec eleifend sapien feugiat. Pellentesque tincidunt urna nunc, id condimentum velit elementum vel. Nam ante ligula, pharetra faucibus tellus nec, ultrices aliquet turpis. Mauris convallis lacinia erat, at dictum nibh fermentum et. Cras gravida ante sed elementum aliquet.\r\n\r\nInteger accumsan, diam ac dignissim fringilla, nisi erat dictum augue, ut iaculis velit diam eu enim. Donec mi nibh, efficitur ut sodales et, pulvinar vel nisl. Quisque aliquet, libero eget tempor laoreet, arcu erat mollis metus, vitae imperdiet mauris nisi ac felis. Mauris nec eros mauris. Nam id ornare elit. Proin rhoncus mauris ac nunc efficitur lacinia. Donec in ante elementum, imperdiet neque ut, malesuada enim. Aenean ac mollis est. Cras vestibulum, velit eget viverra eleifend, orci risus tempus arcu, nec aliquet arcu tortor ut mauris. Fusce facilisis lacus nec ultricies vestibulum.', '2018-03-10 15:49:15', 0, 'uploads/user.jpg', 0, '', 69, 69);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(128) NOT NULL,
  `old_pass` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` int(1) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL,
  `suspended` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `old_pass`, `email`, `reg_time`, `avatar`, `admin`, `suspended`) VALUES
(62, 'user', '24c9e15e52afc47c225b757e7bee1f9d', 'ee11cbb19052e40b07aac0ca060c23', 'user@user.com', '2017-05-09 20:17:29', 1, 0, 0),
(63, 'User1', '24c9e15e52afc47c225b757e7bee1f9d', '24c9e15e52afc47c225b757e7bee1f', 'tester@gmail.com', '2018-03-10 16:08:33', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `id_of_comment` int(11) NOT NULL,
  `upvote` int(11) NOT NULL,
  `id_of_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
