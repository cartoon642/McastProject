-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 27, 2018 at 12:26 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tvshowname` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `watched episodes` int(11) NOT NULL,
  `Completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `username`, `tvshowname`, `rating`, `comment`, `watched episodes`, `Completed`) VALUES
(10, 'cartoon642', 'Game of Thrones', 10, 'very nice i like lol', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tvshows`
--

CREATE TABLE `tvshows` (
  `tvshowname` varchar(20) NOT NULL,
  `Seasons` int(2) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvshows`
--

INSERT INTO `tvshows` (`tvshowname`, `Seasons`, `Description`, `Image`) VALUES
('Big Bang Theory', 12, 'The lives of two geniuses named Dr. Leonard Hofstader and Dr. Sheldon Cooper change when they meet their new neighbor; motivated but unsuccessful actress Penny, who now works as a waitress at The Cheesecake Factory. As they struggle socially, Penny decides to help them discover the world that they know everything about, but yet know nothing about how to live in it. Friends Howard and Rajesh are along for the ride.', 'Images/bigbang.jpg'),
('Black Sails', 4, 'A prequel to the (fictional) events of Robert Louis Stevenson\'s \"Treasure Island\". The series centres on a group of pirates operating out of Nassau in the Bahamas. We meet characters from history - Captain Charles Vane, Governor Woodes Rogers, Jack Rackham and Anne Bonny - plus characters from fiction - Captain Flint and, of course, Long John Silver.', 'Images/blacksails.jpg'),
('Desperate Housewives', 8, 'The \"normal\" suburban life for a group of close-knit housewives takes a dark turn when one of their closest friends mysteriously commits suicide. Now while trying to deal with their own hectic problems and romantic lives, each year brings on a new mystery and more dark and twisted events to come. Life behind closed doors is about to be revealed as suburban life takes a funny and dark turn.', 'Images/desperate.jpg'),
('Flash', 5, 'Nine months after \"The Particle Accelerator\" explosion, Barry Allen wakes up from his coma and discovers that the explosion gave him the power of super speed. Others were affected and gained new abilities as well. However, not all of them use it for good. With Barry\'s new powers and team of scientists, he becomes \"The Flash\" and helps fight crime and protects Central City.', 'Images/flash.jpg'),
('Game of Thrones', 7, 'In the mythical continent of Westeros, several powerful families fight for control of the Seven Kingdoms. As conflict erupts in the kingdoms of men, an ancient enemy rises once again to threaten them all. Meanwhile, the last heirs of a recently usurped dynasty plot to take back their homeland from across the Narrow Sea.', 'Images/gameofthrones.jpg'),
('Jane the Virgin', 5, 'A young, devout Catholic woman discovers that she was accidentally artificially inseminated.', 'Images/jane.jpg'),
('Lucifer', 3, 'Lucifer, bored from his sulking life in hell, comes to live in Los Angeles. While there, he helps humanity with its miseries through his experience and telepathic abilities to bring people\'s deepest desires and thoughts out of them. While meeting with a girl in his nightclub (called Lux), a shootout involving him and the girl leads him to become a LAPD consultant who tries to punish people for their crimes through law and justice.', 'Images/lucifer.jpg'),
('MR Robot', 4, 'Elliot\'s internal struggles surrounding his upbringing and personal life intertwine with his present external challenges as part of fsociety. Being very introverted, Elliot fails to express emotions and determine for himself what is real and what is not, a question that is also left somewhat ambiguous to the viewer. In particular Elliot struggles to remember important facts about his close relatives.\r\n', 'Images/mrrobot.jpg'),
('Riverdale', 3, 'After the death of one of the rich and popular Blossom twins on the 4th of July, the small town of Riverdale investigates the murder. The series starts in September, the beginning of a new school year, that brings with it new students, relationships, and reveals the mysteries of the past 4th of July.', 'Images/riverdale.jpg'),
('Suits', 8, 'On the run from a drug deal gone bad, Mike Ross, a brilliant college-dropout, finds himself a job working with Harvey Specter, one of New York City\'s best lawyers.', 'Images/suits.jpg'),
('Vikings', 6, 'The adventures of a Ragnar Lothbrok: the greatest hero of his age. The series tells the saga of Ragnar\'s band of Viking brothers and his family as he rises to become King of the Viking tribes. As well as being a fearless warrior, Ragnar embodies the Norse traditions of devotion to the gods: legend has it that he was a direct descendant of Odin, the god of war and warriors.', 'Images/vikings.jpg'),
('Walking Dead', 9, 'Sheriff Deputy Rick Grimes gets shot and falls into a coma. When awoken he finds himself in a Zombie Apocalypse. Not knowing what to do he sets out to find his family, after he\'s done that he gets connected to a group to become the leader. He takes charge and tries to help this group of people survive, find a place to live, and get them food. This show is all about survival, the risks, and the things you\'ll have to do to survive.', 'Images/waslkingdead.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Favourite` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `Name`, `Country`, `Favourite`) VALUES
('cartoon642', 'meme123', 'ddsada', '', ''),
('newboi', 'lole', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tvshows`
--
ALTER TABLE `tvshows`
  ADD PRIMARY KEY (`tvshowname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
