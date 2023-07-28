-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 10:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iquizmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizusers`
--

CREATE TABLE `quizusers` (
  `sno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quizusers`
--

INSERT INTO `quizusers` (`sno`, `email`, `password`, `date`) VALUES
(1, 'test@gmail.com', 'test123', '2023-07-28 21:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `sno` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(255) NOT NULL,
  `question_type` varchar(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_otp`
--

CREATE TABLE `quiz_otp` (
  `sno` int(11) NOT NULL,
  `user_opt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_otp`
--

INSERT INTO `quiz_otp` (`sno`, `user_opt`) VALUES
(1, 1223456);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `q_sno` int(11) NOT NULL,
  `q_question` text NOT NULL,
  `q_answer` text NOT NULL,
  `q_ans1` text NOT NULL,
  `q_ans2` text NOT NULL,
  `q_ans3` text NOT NULL,
  `q_techtype` varchar(255) NOT NULL,
  `q_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`q_sno`, `q_question`, `q_answer`, `q_ans1`, `q_ans2`, `q_ans3`, `q_techtype`, `q_date`) VALUES
(1, 'What is the correct way to declare a variable in Python?', 'x = 5', 'var x = 5', 'int x = 5', 'declare x = 5', 'Python', '2023-06-02 00:04:21'),
(2, 'Which of the following data types is immutable in Python?', 'Tuple', 'List', 'Dictionary', 'Set', 'Python', '2023-06-02 00:05:12'),
(3, 'How do you print \"Hello, World!\" in Python?', 'print(\'Hello, World!\')', 'display(\'Hello, World!\')', 'console.log(\'Hello, World!\')', 'system.out.println(\'Hello, World!\')', 'Python', '2023-06-02 00:05:56'),
(4, 'What is the result of the following expression: 5 + \"2\"?', 'Error', '7', '\'52\'', '52', 'Python', '2023-06-02 00:07:30'),
(5, 'Which keyword is used to define a function in Python?', 'def', 'function', 'func', 'define', 'Python', '2023-06-02 00:08:17'),
(6, 'Which of the following is NOT a valid way to comment in Python?', '/* This is a comment */', '# This is a comment', '\'\'\' This is a comment \'\'\'', '# This is a comment', 'Python', '2023-06-02 00:08:52'),
(7, 'What does the \"range()\" function return in Python?', 'An iterator of numbers', 'A list of numbers', 'A tuple of numbers', 'A dictionary of numbers', 'Python', '2023-06-02 00:09:47'),
(8, 'Which statement is used to exit a loop in Python?', 'break', 'exit', 'quit', 'stop', 'Python', '2023-06-02 00:10:07'),
(9, 'What is the output of the following code?\r\n x = [1, 2, 3]\r\n    y = x\r\n    y.append(4)\r\n    print(x)', '[1, 2, 3, 4]', '[1, 2, 3]', '[4]', 'Error', 'Python', '2023-06-02 00:10:36'),
(10, 'How do you check the length of a list in Python?', 'len(list)', 'length(list)', 'size(list)', 'count(list)\r\n', 'Python', '2023-06-02 00:11:09'),
(11, 'Which of the following is a primitive data type in Java?', 'Boolean', 'Integer', 'String', 'Array', 'Java', '2023-06-12 01:43:20'),
(12, 'What is the correct syntax to declare a variable in Java?', 'int name;', 'var name;', 'variable name;', 'name;', 'Java', '2023-06-12 01:45:48'),
(13, 'which keyword is used to create an instance of a class in Java?', 'new', 'instance', 'create', 'instantiate', 'Java', '2023-06-12 01:47:48'),
(15, 'Which keyword is used to define a constant variable in Java?', 'final', 'constant', 'static', 'const', 'Java', '2023-06-12 16:42:55'),
(16, 'What is the default value of a boolean variable?', 'false', 'O', 'null', 'true', 'Java', '2023-06-12 16:42:55'),
(17, 'Which of the following is Not a valid modifier?', 'internal', 'protected', 'private', 'public', 'Java', '2023-06-12 16:44:19'),
(18, 'Which data structure in Java provides a first-in, first-out (FIFO) order?', 'Queue', 'ArrayList', 'LinkedList', 'HashSet', 'Java', '2023-06-12 16:45:54'),
(19, 'Which of the following is NOT a valid type conversion?', 'Type promotion', 'Autoboxing', 'Explicit casting', 'Implicit casting', 'Java', '2023-06-12 16:47:50'),
(20, 'Which of the following is Not a valid type of loop?', 'until loop', 'do-while loop', 'while loop', 'for loop', 'Java', '2023-06-12 16:49:14'),
(21, 'Which of the following is used to handle exceptions?', 'All of the above', 'try', 'catch', 'finally', 'Java', '2023-06-12 16:52:44'),
(36, 'Who is the leading run-scorer in international cricket?', 'Sachin Tendulkar', 'Ricky ponting', 'Virat Kohli', 'Brain Lara', 'Cricket', '2023-06-14 16:55:40'),
(37, 'Which bowler has taken the most wickets in Test cricket?', 'Muttiah Muralitharan', 'Shane Warne', 'Anil Kumble', 'James Anderson', 'Cricket', '2023-06-14 16:57:40'),
(38, 'Which country has won the most cricket World Cup titles?', 'Australia', 'India', 'England', 'West Indies', 'Cricket', '2023-06-14 16:58:37'),
(39, 'Who has scored highest individual score in a One Day International (ODI) cricket match?', 'Martin Guptill', 'Chris Gayle', 'Virender Sehwag', 'Rohit Sharma', 'Cricket', '2023-06-14 17:00:33'),
(40, 'Who is the fastest cricketer to reach 10,000 runs in ODI  cricket?', 'Virat Kohli', 'Sachin Tendulkar', 'Ricky Ponting', 'Brain Lara', 'Cricket', '2023-06-14 17:02:12'),
(41, 'Which country has won the most ICC T20 World Cup titles?', 'West Indies', 'Pakistan', 'Australia', 'India', 'Cricket', '2023-06-14 17:03:28'),
(42, 'Who holds the record for the fastest century in Test cricket in terms of balls faced?', 'Brendon Mccullum', 'Viv Richards', 'Adam Gilchrist', 'Misbah-ul-Haq', 'Cricket', '2023-06-14 17:04:57'),
(43, 'Which player has hit the most sixes in the history of IPL?', 'Chris Gayle', 'AB de Villiers', 'Rihit Sharma', 'Ms Dhoni', 'Cricket', '2023-06-14 17:06:14'),
(44, 'Who is the only cricketer to have scored 10,000 runs and taken 500 wickets in Test cricket?', 'Jacques Kallis', 'lan Botham', 'Kapil Dev', 'Shane warne', 'Cricket', '2023-06-14 17:07:22'),
(45, 'Who is the current captain of the Australian cricket team?', 'Tim Paine', 'Aaron Finch', 'Steve Smith', 'Pat Cummins', 'Cricket', '2023-06-14 17:08:15'),
(54, 'Which company developed Free Fire?', 'Garena', 'Electronic Arits', 'Epic Gamis', 'Activision', 'Free Fire', '2023-06-15 03:06:15'),
(55, 'How many players participate in a single Free Fire match?', '50', '75', '100', '120', 'Free Fire', '2023-06-15 03:07:27'),
(56, 'What is the primary objective in Free Fire?', 'Survive and be the last player/team standing', 'Complete missions and challenges', 'Defend the base', 'Capture the flag', 'Free Fire', '2023-06-15 03:09:03'),
(57, 'Which of the following is NOT a playable character in Free Fire?', 'Jon Snow', 'DJ Alok', 'Maxim', 'Kelly', 'Free Fire', '2023-06-15 03:10:43'),
(58, 'How often does the Free Fire map shrink during a match?', 'Every two minutes', 'Every minute', 'Every three minutes', 'Every five minutes', 'Free Fire', '2023-06-15 03:13:12'),
(59, 'Which of the following is NOT a weapon category in Free Fire?', 'Swords', 'Assault rifles', 'Snipers', 'Shotguns', 'Free Fire', '2023-06-15 03:16:56'),
(60, 'How do players acquire new weapons and equipment in Free Fire?', 'By earning them through gameplay', 'By trading with other players', 'By completing specific missions', 'By purchasing them with real money', 'Free Fire', '2023-06-15 03:18:07'),
(61, 'Which vehicle can players use for faster movement in Free Fire?', 'Motorcycle', 'Bicycle', 'Tank', 'Helicopter', 'Free Fire', '2023-06-15 03:19:45'),
(62, 'Which game mode in Free Fire allows players to form teams and compete against other teams?', 'Squad', 'Solo', 'Ranked', 'Duo', 'Free Fire', '2023-06-15 03:20:58'),
(63, 'Which of the following is NOT a Free Fire game map?', 'Miramar', 'kalahari', 'purgatory', 'Bermuda', 'Free Fire', '2023-06-15 03:21:54'),
(64, 'Who is known as the \"King of Bollywood\"?', 'Shah Rukh Khan', 'Amitabh Bachan', 'Aamir Khan', 'Salman Khan', 'Bollywood', '2023-06-15 15:10:22'),
(65, 'Which Bollywood actress made her Hollywood debut in the movie \"XXX: Return of Xander Cage\"?', 'Deepika Padukone', 'Priyanka Chopra', 'Kareena Kapoor Khan', 'Akia Bhatt', 'Bollywood', '2023-06-15 15:12:24'),
(66, 'who directed the film \'dilwale Dulhania Le Jayenge\'?', 'Aditya Chopra', 'Sanjay Leela Bhansali', 'Karna Johar', 'Farah Khan', 'Bollywood', '2023-06-15 15:13:31'),
(67, 'Which Bollywood actor has won the most National Film Awards for Best Actor?', 'Amitabh Bachchan', 'Rajkummar Roa', 'Shah Rukh Khan', 'Aamir Khan', 'Bollywood', '2023-06-15 15:14:34'),
(68, 'Who composed the music for the film \'Dil Se\'?', 'A.R. Rahman', 'Vishal-Shekhar', 'Pritam Chakraborty', 'Shankar-Ehsaan-Loy', 'Bollywood', '2023-06-15 15:15:47'),
(69, 'Which Bollywood film won the Academy Award for Best Foreign Language Film?', 'Pather Panchali', 'Lagaan', 'Mother India', 'Slumdog Millionaire', 'Bollywood', '2023-06-15 15:17:06'),
(70, 'Who played the lead role in the film \'Kuch Kuch Hota Hai\'?', 'Shah Rukh Khan', 'Ranbir Kapoor', 'Hritik Roshan', 'Aamir Khan', 'Bollywood', '2023-06-15 15:18:08'),
(71, 'Which Bollywood actress is also known as the \"Queen of Bollywood\"?', 'Kangana Ranaut', 'Kareena Kapoor Khan', 'Priyanka Chopra', 'Deepika Padukone', 'Bollywood', '2023-06-15 15:18:58'),
(72, 'Who directed the film \"Gangs of Wasseypur\"?', 'Anurag Kashyap', 'Imtiaz Ali', 'Zoya Akhtar', 'Vishal Bhardwaj', 'Bollywood', '2023-06-15 15:19:43'),
(73, 'Which Bollywood actor starred in the film \'Dangal\'?', 'Aamir Khan', 'Ranveer Singh', 'Akshay Kumar', 'Shah Rukh Khan', 'Bollywood', '2023-06-15 15:20:37'),
(74, 'Who is the leader of the Avengers?', 'Captain America', 'Iron Man', 'Thor', 'Hulk', 'Marvel Studios', '2023-06-15 15:35:25'),
(75, 'Which Infinity Stone grants control over time?', 'Time Stone', 'Reality Stone', 'Space Stone', 'Power Stone', 'Marvel Studios', '2023-06-15 15:36:08'),
(76, 'What is the real name of Black Widow?', 'Natasha Romanoff', 'Wanda Maximoff', 'Carol Danvers', 'Gamora', 'Marvel Studios', '2023-06-15 15:36:49'),
(77, 'Which Marvel film features the character T\'Challa as the Black Panther?', 'Black Panther', 'Avengers: Engame', 'Thor: Rangnarok', 'Guardians of the Galaxy', 'Marvel Studios', '2023-06-15 15:37:37'),
(78, 'Which superhero wields a mystical hammer called Mjolnir?', 'Thor', 'Captain Marvel', 'Black Widow', 'Spider-Man', 'Marvel Studios', '2023-06-15 15:38:16'),
(79, 'What is the name of Tony Stark\'s A.I. assistant?', 'Jarvis', 'Vision', 'Ultron', 'Friday', 'Marvel Studios', '2023-06-15 15:39:04'),
(80, 'Which Avengers film introduces the character of Scarlet Witch?', 'Avengers: Age of Ultron', 'Avengers: Infinity War', 'Avengers: Endgame', 'The Avengers', 'Marvel Studios', '2023-06-15 15:39:45'),
(81, 'Which Guardians of the Galaxy member is a sentient tree-like creature?', 'Groot', 'Star-Lord', 'Gamora', 'Drax the Destroyer', 'Marvel Studios', '2023-06-15 15:40:21'),
(82, 'Which actor portrays Spider-Man in the Marvel Cinematic Universe?', 'Tom Holland', 'Tom Hardy', 'Andrew Garfield', 'Tobey Maguire', 'Marvel Studios', '2023-06-15 15:41:06'),
(83, 'Who is the primary antagonist in the film \"Avengers: Infinity War\"?', 'Thanos', 'Ultron', 'Red Skull', 'Loki', 'Marvel Studios', '2023-06-15 15:41:33'),
(84, 'Which planet is known as the \"Red Planet\"?', 'Mars', 'Venus', 'Jupiter', 'Saturn', 'General Knowledge', '2023-06-15 15:50:28'),
(85, 'Who painted the Mona Lisa?', 'Leonardo do Vinci', 'Pablo Picasso', 'Vincent van Gogh', 'Claude Monet', 'General Knowledge', '2023-06-15 15:51:27'),
(86, 'What is the capital city of Australia?', 'Canberra', 'Sydney', 'Melbourne', 'Perth', 'General Knowledge', '2023-06-15 15:51:54'),
(87, 'Which famous scientist developed the theory of relativity?', 'Albert Einstein', 'Isaac Newton', 'Galileo Galilei', 'Nikola Tesla', 'General Knowledge', '2023-06-15 15:52:43'),
(88, 'Which animal is known as the \'King of the Jungle?', 'Lion', 'Gorilla', 'Elephant', 'Tiger', 'General Knowledge', '2023-06-15 15:53:32'),
(89, 'Who wrote the play \"Romeo and Juliet\"?', 'William Shakespeare', 'George Orwell', 'Charles Dickens', 'Jane Austen', 'General Knowledge', '2023-06-15 15:54:33'),
(90, 'Which is the largest ocean in the world?', 'Pacific Ocean', 'Arctic Ocean', 'Indian Ocean', 'Atlantic Ocean', 'General Knowledge', '2023-06-15 15:55:38'),
(91, 'Who is the author of the Harry Potter book series?', 'J.K. Rowling', 'Stephen King', 'George R.R. Martin', 'Dan Brown', 'General Knowledge', '2023-06-15 15:56:23'),
(92, 'Which country is famous for the Taj Mahal?', 'India', 'China', 'Egypt', 'Greece', 'General Knowledge', '2023-06-15 15:56:46'),
(93, 'What is the chemical symbol for gold?', 'Au', 'Ag', 'Fe', 'Pb', 'General Knowledge', '2023-06-15 15:57:08'),
(94, 'Who is known as the \"Father of the Nation\" in India?', 'Mahatma Gandhi', 'Rabindranath Tagore', 'Subhas Chandra Bose', 'Jawaharlal Nehru', 'India', '2023-06-15 16:06:32'),
(95, 'Which city is the capital of India?', 'New Delhi', 'Chennai', 'Mumbai', 'Kolkata', 'India', '2023-06-15 16:07:01'),
(96, 'Which river is considered sacred by Hindus and is often referred to as the \"Ganges\"?', 'Ganga', 'Godavari', 'Yamuna', 'Brahmaputra', 'India', '2023-06-15 16:07:31'),
(97, 'Which sport is considered the national game of India?', 'Hockey', 'Cricket', 'Football', 'Kabaddi', 'India', '2023-06-15 16:08:24'),
(98, 'The Taj Mahal, one of the Seven Wonders of the World, is located in which Indian city?', 'Agra', 'New Delhi', 'Jaipur', 'Mumbai', 'India', '2023-06-15 16:09:06'),
(99, 'Which festival is widely celebrated in India as the \"Festival of Lights\"?', 'Diwali', 'Christmas', 'Eid', 'Holi', 'India', '2023-06-15 16:09:35'),
(100, 'Who was the first Prime Minister of India?', 'Jawaharlal Nehru', 'Indira Gandhi', 'Rajiv Gandhi', 'Lal Bahadur Shastri', 'India', '2023-06-15 16:10:18'),
(101, 'What is the currency of India?', 'Rupee', 'Dollar', 'Euro', 'Yen', 'India', '2023-06-15 16:10:44'),
(102, 'Who composed the Indian national anthem, \"Jana Gana Mana\"?', 'Rabindranath Tagore', 'Mahatma Gandhi', 'Jawaharlal Nehru', 'Subhas Chandra Bose', 'India', '2023-06-15 16:11:17'),
(103, 'Which state in India is famous for its backwaters and houseboat tours?', 'Kerala', 'Rajasthan', 'Himachal Pradesh', 'Goa', 'India', '2023-06-15 16:12:00'),
(104, 'Who is the creator of the YouTube channel \"BB Ki Vines\"?', 'Bhuvan Bam', 'Ashish Chanchlani', 'Amit Bhadana', 'CarryMinati', 'Indian Youtubers', '2023-06-15 16:27:17'),
(105, 'Which Indian YouTuber is known for his cooking and travel videos?', 'Ranveer Brar', 'Sanjeev Kapoor', 'Tarla Dalal', 'Gaurav Taneja', 'Indian Youtubers', '2023-06-15 16:28:13'),
(106, 'Who is the host of the YouTube channel \"Technical Guruji\"?', 'Gaurav Chaudhary', 'Ashish Chanchlani', 'Bhuvan Bam', 'Ajey Nagar', 'Indian Youtubers', '2023-06-15 16:28:51'),
(107, 'Which YouTuber is famous for his \"Roasting\" videos?', 'CarryMinati', 'Ashish Chanchlani', 'Bhuvan Bam', 'Amit Bhadana', 'Indian Youtubers', '2023-06-15 16:29:28'),
(108, 'Which Indian YouTuber is known for his prank and comedy videos?', 'Harsh Beniwal', 'Gaurav Taneja', 'Prajakta Koli', 'Bhuvan Bam', 'Indian Youtubers', '2023-06-15 16:30:24'),
(109, 'Who is the creator of the YouTube channel \"Mumbiker Nikhil\"?', 'Nikhil Sharma', 'Ranveer Brar', 'Ranjit Kumar', 'Nisha Madhulika', 'Indian Youtubers', '2023-06-15 16:31:17'),
(110, 'Which YouTuber gained popularity with her fashion and beauty videos?', 'Prajakta Koli', 'Scherezade Shroff', 'Sejal Kumar', 'Komal Pandey', 'Indian Youtubers', '2023-06-15 16:32:07'),
(111, 'Which Indian YouTuber is known for her comedy sketches and vlogs?', 'Prajakta Koli', 'Nisha Madhulika', 'Lilly Singh', 'Bhuvan Bam', 'Indian Youtubers', '2023-06-15 16:33:01'),
(112, 'Who is the popular Indian YouTuber behind the channel \"Techno Gamerz\"?', 'Ujjwal Chaurasia', 'CarryMinati', 'Gaurav Taneja', 'Amit Bhadana', 'Indian Youtubers', '2023-06-15 16:36:50'),
(113, 'Which Indian YouTuber gained immense popularity for his gaming content, especially related to the game \"Minecraft\"?', 'Techno Gamerz', 'GamerFleet', 'Mythpat', 'Lokesh Gamer', 'Indian Youtubers', '2023-06-15 16:41:08'),
(114, '\"Mere paas maa hai.\" This iconic dialogue is from which Bollywood film?', 'Deewar', 'Kabhi Khushi Kabhie Gham', 'Dilwale Dulhania Le Jayenge', 'Sholay', 'Movie Lines', '2023-06-15 18:44:27'),
(115, '\"Rishte mein toh hum tumhare baap lagte hai, naam hai Shahenshah.\"', 'Amitabh Bachchan', 'Salman Khan', 'Shah Rukh Khan', 'Aamir Khan', 'Movie Lines', '2023-06-15 18:45:43'),
(116, '\"Bade bade deshon mein aisi choti choti baatein hoti rehti hai.\"', 'Kuch Kuch Hota Hai', 'Dil To Pagal Hai', 'Dilwale Dulhania Le Jayenge', 'Kabhi Khushi Kabhie Gham', 'Movie Lines', '2023-06-15 18:46:29'),
(117, '\"Kitne aadmi the?\"', 'Gabbar Singh', 'Crime Master Gogo', 'Shakaal', 'Mogambo', 'Movie Lines', '2023-06-15 18:47:14'),
(118, '\"Bade bade shehron mein aisi chhoti chhoti baatein hoti rehti hai, Senorita.\"', 'Yeh Jawaani Hai Deewani', 'Dilwale Dulhania Le Jayenge', 'Dil Chahta Hai', 'Kabhi Khushi Kabhie Gham', 'Movie Lines', '2023-06-15 18:48:08'),
(119, '\"Pushpa, I hate tears.\"', 'Amar Prem', 'Kabhi Khushi Kabhie Gham', 'Amar Prem', 'Sholay', 'Movie Lines', '2023-06-15 18:48:50'),
(120, '\"Don ko pakadna mushkil hi nahi, namumkin hai.\"', 'Shah Rukh Khan', 'Salman Khan', 'Aamir Khan', 'Akshay Kumar', 'Movie Lines', '2023-06-15 18:49:48'),
(121, '\"Bade bade deshon mein aisi chhoti chhoti baatein hoti rehti hai.\"', 'Dilwale Dulhania Le Jayenge', 'Kuch Kuch Hota Hai', 'Kal Ho Naa Ho', 'Dil Chahta Hai', 'Movie Lines', '2023-06-15 18:50:17'),
(122, '\"Picture abhi baaki hai, mere dost.\"', 'Om Shanti Om', 'Dilwale Dulhania Le Jayenge', 'Kabhi Khushi Kabhie Gham', 'Sholay', 'Movie Lines', '2023-06-15 18:50:56'),
(123, '\"Mogambo khush hua.\"', 'Mr. India', 'Sholay', 'Kabhi Khushi Kabhie Gham', 'Dilwale Dulhania Le Jayenge', 'Movie Lines', '2023-06-15 18:51:33'),
(124, 'What is the next number in the sequence: 2, 4, 6, 8, ___?', '12', '10', '14', '16', 'IQ Test', '2023-06-15 19:06:53'),
(125, 'If a cat has 4 legs, how many legs would 3 cats have?', '8', '6', '10', '12', 'IQ Test', '2023-06-15 19:07:17'),
(126, 'Which number is the odd one out?', '4', '8', '12', '16', 'IQ Test', '2023-06-15 19:08:12'),
(127, 'How many sides does a triangle have?', '3', '2', '4', '5', 'IQ Test', '2023-06-15 19:08:32'),
(128, 'Complete the analogy: Dog is to bark as cat is to ___.', 'purr', 'chirp', 'growl', 'hiss', 'IQ Test', '2023-06-15 19:08:59'),
(129, 'What is the square root of 144?', '12', '10', '14', '16', 'IQ Test', '2023-06-15 19:09:35'),
(130, 'Which planet is closest to the sun?', 'Mercury', 'Mars', 'Venus', 'Earth', 'IQ Test', '2023-06-15 19:09:59'),
(131, 'How many colors are there in a rainbow?', '7', '5', '6', '8', 'IQ Test', '2023-06-15 19:10:19'),
(132, 'What is the capital city of France?', 'Paris', 'London', 'Rome', 'Madrid', 'IQ Test', '2023-06-15 19:10:47'),
(133, 'How many days are there in a leap year?', '366', '365', '367', '368', 'IQ Test', '2023-06-15 19:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `techs`
--

CREATE TABLE `techs` (
  `tech_sno` int(11) NOT NULL,
  `tech_name` varchar(255) NOT NULL,
  `tech_desc` text NOT NULL,
  `tech_image` varchar(55) NOT NULL,
  `tech_questnum` int(55) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `techs`
--

INSERT INTO `techs` (`tech_sno`, `tech_name`, `tech_desc`, `tech_image`, `tech_questnum`, `date`) VALUES
(2, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. ', 'Java.jpg', 10, '2023-06-01 22:48:09'),
(14, 'Cricket', 'Cricket is a popular sport played between two teams consisting of eleven players each. It is played with a bat and a ball on a large oval-shaped field. The objective of the game is for the batting team to score more runs than the opposing team while the fielding team aims to dismiss the batsmen and restrict the scoring.', 'Cricket.jpg', 10, '2023-06-14 16:52:28'),
(15, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation via the off-side rule. Python is dynamically typed and garbage-collected.', 'Python.jpg', 10, '2023-06-14 23:03:53'),
(16, 'Free Fire', 'Free Fire is a battle royale game developed and published by Garena for Android and iOS. It became the most downloaded mobile game globally in 2019. As of 2023, Free Fire had surpassed 187 million daily active users.', 'Free Fire.jpg', 10, '2023-06-15 03:03:13'),
(17, 'Bollywood', '\r\nBollywood is the informal term commonly used for the Hindi-language film industry based in Mumbai (formerly known as Bombay), Maharashtra, India. It is the largest film industry in terms of the number of films produced and the number of tickets sold, both within India and worldwide. Bollywood movies are known for their vibrant song and dance sequences, melodramatic storytelling, and larger-than-life performances.', 'Bollywood.jpg', 10, '2023-06-15 03:33:48'),
(18, 'Marvel Studios', 'Marvel Studios, LLC is an American film and television production company that is a subsidiary of Walt Disney Studios, a division of Disney Entertainment, which is owned by the Walt Disney Company.', 'Marvel Studios.jpg', 10, '2023-06-15 15:31:19'),
(19, 'General Knowledge', 'General knowledge is information that has been accumulated over time through various media and sources. It excludes specialized learning that can only be obtained with extensive training and information confined to a single medium. General knowledge is an essential component of crystallized intelligence.', 'General Knowledge.jpg', 10, '2023-06-15 15:49:38'),
(20, 'India', 'India, officially the Republic of India, is a country in South Asia. It is the seventh-largest country by area, the most populous country in the world, and the most populous democracy.', 'India.jpg', 10, '2023-06-15 16:04:18'),
(21, 'Indian Youtubers', 'A YouTuber is an online personality or influencer who posts videos on the video-sharing platform YouTube, typically posting to their personal YouTube channel. The term was first used in the English language in 2006.', 'Indian Youtubers.jpg', 10, '2023-06-15 16:24:48'),
(22, 'Movie Lines', 'Famous movie lines are memorable quotes or phrases that have become iconic due to their impact, popularity, or cultural significance. These lines often capture the essence of a character, convey powerful emotions, or provide a witty remark that resonates with audiences.', 'Movie Lines.jpg', 10, '2023-06-15 18:43:10'),
(23, 'IQ Test', 'An intelligence quotient is a total score derived from a set of standardised tests or subtests designed to assess human intelligence.', 'IQ Test.jpg', 10, '2023-06-15 18:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizusers`
--
ALTER TABLE `quizusers`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `quiz_otp`
--
ALTER TABLE `quiz_otp`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`q_sno`);

--
-- Indexes for table `techs`
--
ALTER TABLE `techs`
  ADD PRIMARY KEY (`tech_sno`);
ALTER TABLE `techs` ADD FULLTEXT KEY `tech_name` (`tech_name`,`tech_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizusers`
--
ALTER TABLE `quizusers`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `quiz_otp`
--
ALTER TABLE `quiz_otp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `q_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `techs`
--
ALTER TABLE `techs`
  MODIFY `tech_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
