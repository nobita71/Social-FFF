-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2016 at 04:33 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_from` varchar(225) NOT NULL,
  `user_to` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_from`, `user_to`) VALUES
(1, 'MHabir', 'Rubel)'),
(2, 'Rubel', 'Rubel)'),
(3, 'MHabir', 'Rubel)'),
(4, 'Rubel', 'MHabir)'),
(5, 'zxcvbnm', 'zxcvbnm)'),
(6, 'zxcvbnm', 'MHabir)');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(225) NOT NULL,
  `user_posted_to` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES
(1, 'this is a post', '2016-05-10', 'zahid', 'jahidul'),
(2, 'this is a post', '2016-05-10', 'test123', 'xahid'),
(3, 'this is a post', '2016-05-10', 'test123', 'test123'),
(4, 'this is a post', '2016-05-10', 'test123', 'test123'),
(5, 'this is a post', '2016-05-10', 'test123', 'test123'),
(6, 'this is a post', '2016-05-10', 'test123', 'test123'),
(7, 'this is a post', '2016-05-10', 'test123', 'test123'),
(8, 'this is a post', '2016-05-10', 'test123', 'jahidulhasan'),
(9, 'this is a post', '2016-05-10', 'test123', 'test123'),
(10, 'this is a post', '2016-05-10', 'test123', 'test123'),
(11, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(12, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(13, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(14, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(15, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(16, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(17, 'This is a new post', '2016-05-10', 'test123', 'test123'),
(18, 'my name is jahidul hasan zahid', '2016-05-10', 'Rubel', 'Rubel'),
(19, 'i love name  jahidul hasan zahid', '2016-05-10', 'test123', 'test123'),
(20, 'my post', '2016-05-10', 'test123', 'test123'),
(21, 'new post', '2016-05-10', 'test123', '$username'),
(22, 'kamal post', '2016-05-10', 'test123', 'kamalhs'),
(23, 'kamal post', '2016-05-11', 'test123', 'test123'),
(24, 'Hi,,,This is a New And Nice post.', '2016-05-11', 'Rubel', 'Rubel'),
(25, 'hi', '2016-05-29', 'Rubel)', 'Rubel'),
(26, 'hi!Friends How Are you?', '2016-05-30', 'MHabir)', 'MHabir'),
(27, 'hello', '2016-05-30', 'MHabir', 'MHabir'),
(28, 'hi this is mhabir......So my friends How are you?', '2016-05-30', 'MHabir', 'MHabir'),
(29, 'hello my dear friends!', '2016-05-30', 'Rubel', 'Rubel'),
(30, 'yap!', '2016-05-30', 'Rubel)', 'Rubel'),
(31, 'hi\r\n', '2016-06-01', 'zxcvbnm', 'zxcvbnm'),
(32, 'hello!', '2016-06-01', 'zxcvbnm', 'zxcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` text NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `bio`, `profile_pic`, `friend_array`) VALUES
(1, 'xahid', 'rhfghfg', 'hfdjgdjhfjfhj', 'jahidul@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2016-05-01', '0', 'This is my Simple Bio.\r\nUpdate recently.....', '', ''),
(2, 'Nobita Bright', 'Jahidul', 'Hasan Zahid', 'jahidul@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2016-05-01', '0', '', '', ''),
(3, 'asdfgh', 'gjdfsnbfsgfs', 'fdhfshfsh', 'dhgfgjdfgjgfjgf@hdfhd.dhfsg', 'a152e841783914146e4bcd4f39100686', '2016-05-01', '0', '', '', ''),
(4, 'abcdefg', 'rahalon', 'jahnab', 'jahidul@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2016-05-01', '0', '', '', ''),
(5, 'rmrakib', 'rashed', 'mahmud', 'rmrakib@live.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-05-02', '0', '', '', ''),
(6, 'asdfghjkl', 'hhhhhhhhhhh', 'fghfhfhffhfhfgh', 'hhhhhhhhhhhhhh@hdhdh.fhjf', 'c44a471bd78cc6c2fea32b9fe028d30a', '2016-05-02', '0', '', '', ''),
(7, 'Hasan12', 'Hasanwallah', 'Mojomder', 'bright.hasa.1@facebook.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-05-04', '0', '', '', ''),
(8, 'kamalhs', 'Kamal Hussen', 'Sagur', 'kamalhossen@yahoo.com', '668b261ad6f707cc994ff1146c47e5b3', '2016-05-05', '0', '', '', ''),
(9, 'Jahidulhasan', 'Jahidul', 'Hasan', 'a2@aftr.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-05-06', '0', 'Hi!This is jahidulhasanzahid.', '', ''),
(10, 'Rubel', 'jahidul', 'hasan', 'Rubenrala@yahoo.com', 'dffb4da9c104dbbd968e27e5f0d37d90', '2016-05-06', '0', 'this is jahidul hasan profile information!Now You can see this profile bio info.!', 'tYeXnzfCFgUN7qP/2016-04-25.png', ''),
(11, 'jahidul', 'dgsdfhshfsfd', 'hfshfshfshfsh', 'dgfhsfghdfs@sgfdsg.com', '827ccb0eea8a706c4c34a16891f84e7b', '2016-05-10', '0', '', '', ''),
(12, 'ShaSha', 'jahidulhasan', 'hasan', 'jahidulk@yahoo.com', 'shasha', '2016-05-10', '0', 'this is ShaSha', '', ''),
(13, 'shakamal', 'Shasha', 'kamal', 'shasha@yahoo.com', 'e960eecd908954dbc2fde2f473084132', '2016-05-10', '0', '', '', ''),
(14, 'zahidulhasan', 'Jahidulroy', 'Zahid', 'zahidulhasa@yahoo.com', 'b2257001322a7949683615d2ec6dadba', '2016-05-12', '0', '', '', ''),
(15, 'MasumReza', 'Masum Al', 'Reza', 'masumr@yahoo.com', 'bd5a9afb906dc6a6430144545e89a3ab', '2016-05-12', '0', '', '', ''),
(16, 'MHabir', 'Abir', 'Hasan', 'mhabir@yahoo.com', '5f1d7237ced4ec8726dbf395984988c2', '2016-05-13', '0', 'This is Abir hasan Information!', '8knNDhYtQres5WV/2016-04-09 (1).png', ''),
(17, 'zxcvbnm', 'hasanimam', 'hasanul', 'asd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-06-01', '0', 'hi,My name is hasan Imam.I am awesome and happy for friend-ship.', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
