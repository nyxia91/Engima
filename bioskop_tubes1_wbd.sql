-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2019 pada 11.55
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop_tubes1_wbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `finished_time` timestamp NULL DEFAULT NULL,
  `reviewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`history_id`, `user_id`, `schedule_id`, `finished_time`, `reviewed`) VALUES
(9, 3, 12, '0000-00-00 00:00:00', 0),
(10, 3, 12, '0000-00-00 00:00:00', 0),
(11, 3, 12, '0000-00-00 00:00:00', 0),
(12, 3, 12, '0000-00-00 00:00:00', 0),
(13, 3, 12, '0000-00-00 00:00:00', 0),
(14, 3, 12, '0000-00-00 00:00:00', 0),
(15, 3, 12, '0000-00-00 00:00:00', 0),
(16, 3, 12, '0000-00-00 00:00:00', 0),
(17, 3, 12, '0000-00-00 00:00:00', 0),
(18, 3, 12, '0000-00-00 00:00:00', 0),
(19, 3, 12, '0000-00-00 00:00:00', 0),
(20, 3, 12, '0000-00-00 00:00:00', 0),
(21, 3, 12, '0000-00-00 00:00:00', 0),
(22, 3, 12, '0000-00-00 00:00:00', 0),
(23, 3, 12, '0000-00-00 00:00:00', 0),
(24, 3, 12, '0000-00-00 00:00:00', 0),
(25, 3, 12, '0000-00-00 00:00:00', 0),
(26, 3, 12, '0000-00-00 00:00:00', 0),
(27, 3, 12, '0000-00-00 00:00:00', 0),
(28, 3, 12, '0000-00-00 00:00:00', 0),
(29, 3, 12, '0000-00-00 00:00:00', 0),
(30, 3, 12, '0000-00-00 00:00:00', 0),
(31, 3, 12, '0000-00-00 00:00:00', 0),
(32, 3, 12, '0000-00-00 00:00:00', 0),
(33, 3, 12, '0000-00-00 00:00:00', 0),
(34, 3, 12, '0000-00-00 00:00:00', 0),
(35, 3, 12, '0000-00-00 00:00:00', 0),
(36, 3, 12, '0000-00-00 00:00:00', 0),
(37, 3, 12, '0000-00-00 00:00:00', 0),
(38, 3, 12, '0000-00-00 00:00:00', 0),
(39, 3, 12, '0000-00-00 00:00:00', 0),
(40, 3, 12, '0000-00-00 00:00:00', 0),
(41, 3, 12, '0000-00-00 00:00:00', 0),
(42, 3, 12, '0000-00-00 00:00:00', 0),
(43, 3, 12, '0000-00-00 00:00:00', 0),
(44, 3, 12, '0000-00-00 00:00:00', 0),
(45, 3, 12, '0000-00-00 00:00:00', 0),
(46, 3, 12, '0000-00-00 00:00:00', 0),
(47, 3, 12, '0000-00-00 00:00:00', 0),
(48, 3, 12, '0000-00-00 00:00:00', 0),
(49, 3, 12, '0000-00-00 00:00:00', 0),
(50, 3, 12, '0000-00-00 00:00:00', 0),
(51, 3, 12, '0000-00-00 00:00:00', 0),
(52, 3, 12, '0000-00-00 00:00:00', 0),
(53, 3, 12, '0000-00-00 00:00:00', 0),
(54, 3, 12, '0000-00-00 00:00:00', 0),
(55, 3, 12, '0000-00-00 00:00:00', 0),
(56, 3, 12, '0000-00-00 00:00:00', 0),
(57, 3, 12, '0000-00-00 00:00:00', 0),
(58, 3, 12, '0000-00-00 00:00:00', 0),
(59, 3, 12, '0000-00-00 00:00:00', 0),
(60, 3, 13, '0000-00-00 00:00:00', 0),
(61, 3, 13, '0000-00-00 00:00:00', 0),
(62, 3, 13, '0000-00-00 00:00:00', 0),
(63, 3, 13, '0000-00-00 00:00:00', 0),
(64, 3, 13, '0000-00-00 00:00:00', 0),
(65, 3, 13, '0000-00-00 00:00:00', 0),
(66, 3, 13, '0000-00-00 00:00:00', 0),
(67, 3, 13, '0000-00-00 00:00:00', 0),
(68, 2, 14, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'dalam menit',
  `release_date` date NOT NULL,
  `rating` float NOT NULL,
  `description` text NOT NULL,
  `movie_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_title`, `genre`, `duration`, `release_date`, `rating`, `description`, `movie_pic`) VALUES
(1, 'Gundala', 'Action, Crime, Drama', 123, '2019-08-29', 9.5, 'Indonesia\'s preeminent comic book superhero and his alter ego Sancaka enter the cinematic universe to battle the wicked Pengkor and his diabolical squad of orphan assassins.', 'poster_gundala.jpg'),
(2, 'Dua Garis Biru', 'Drama, Family', 113, '2019-07-11', 8.2, 'Dara (Zara JKT48) and Bima (Angga Yunanda) violated the boundary without knowing the consequences. They try to take responsibility for their choices. They think they are ready to become adults to face all the consequences. Their innocence was immediately tested when families who really loved them knew, then forced into their chosen journey.', 'poster_dua_garis.jpg'),
(3, 'Kucumbu Tubuh Indahku', 'Drama', 105, '2019-04-18', 7.4, 'In Center Java Juno, a pre-teen abandoned by his father, joins a Lengger dance centre where men assume feminine appearances but the political and social upheaval in Indonesia forces him on the road, meeting remarkable people on his journey.', 'poster_kucumbu.jpg'),
(4, 'One Piece: Stampede', 'Animation, Action, Adventure', 101, '2019-09-18', 8.6, 'Follow the strawhats as they get invited to the large event known as pirate expo! All star pirates are gathered in the pirate expo, the marines decide to interfere, what conspires in this event? A One Piece spin off movie.', 'poster_one_piece.jpg'),
(5, 'Joker', 'Crime, Drama, Thriller', 121, '2019-10-02', 9.5, 'A gritty character study of Arthur Fleck, a man disregarded by society.\r\n', 'poster_joker.jpg'),
(6, 'Weathering with You', 'Animation, Drama, Fantasy', 111, '2019-08-21', 7, 'A high-school boy who has run away to Tokyo be friends a girl who appears to be able to manipulate the weather.', 'poster_weathering.jpg'),
(7, 'Midsommar', 'Drama, Horror, Mystery', 147, '2019-09-11', 7.5, 'A couple travels to Sweden to visit a rural hometown\'s fabled mid-summer festival. What begins as an idyllic retreat quickly devolves into an increasingly violent and bizarre competition at the hands of a pagan cult.', 'poster_midsommar.jpg'),
(475557, 'Joker', 'Crime, Thriller, Drama', 122, '2019-10-02', 8.4, 'During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure.', 'poster_image.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `movie_id`, `time`, `available_seats`) VALUES
(1, 1, '2019-09-29 08:00:00', 60),
(2, 2, '2019-09-29 08:00:00', 30),
(3, 1, '2019-09-11 09:30:00', 50),
(4, 6, '2019-09-13 04:40:00', 60),
(5, 3, '2019-09-17 07:20:00', 45),
(6, 4, '2019-09-11 13:30:00', 40),
(7, 1, '2019-09-11 05:30:00', 50),
(8, 5, '2019-10-02 17:30:00', 60),
(9, 2, '2019-11-23 20:00:48', 30),
(10, 475557, '2019-11-23 20:52:52', 29),
(11, 475557, '2019-11-23 21:13:53', 29),
(12, 475557, '2019-11-24 10:25:36', 6),
(13, 475557, '2019-11-24 10:51:53', 22),
(14, 475557, '2019-11-24 10:52:36', 29),
(15, 475557, '2019-12-27 14:28:00', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'True masih bisa dibeli'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seats`
--

INSERT INTO `seats` (`seat_id`, `schedule_id`, `user_id`, `price`, `seat_no`, `status`) VALUES
(1, 10, NULL, 30000, 1, 1),
(2, 10, NULL, 30000, 2, 1),
(3, 10, NULL, 30000, 3, 1),
(4, 10, NULL, 30000, 4, 1),
(5, 10, NULL, 30000, 5, 1),
(6, 10, NULL, 30000, 6, 1),
(7, 10, NULL, 30000, 7, 1),
(8, 10, NULL, 30000, 8, 1),
(9, 10, NULL, 30000, 9, 1),
(10, 10, NULL, 30000, 10, 1),
(11, 10, NULL, 30000, 11, 1),
(12, 10, NULL, 30000, 12, 1),
(13, 10, NULL, 30000, 13, 1),
(14, 10, NULL, 30000, 14, 1),
(15, 10, NULL, 30000, 15, 1),
(16, 10, NULL, 30000, 16, 1),
(17, 10, NULL, 30000, 17, 1),
(18, 10, NULL, 30000, 18, 1),
(19, 10, NULL, 30000, 19, 1),
(20, 10, NULL, 30000, 20, 1),
(21, 10, NULL, 30000, 21, 1),
(22, 10, NULL, 30000, 22, 1),
(23, 10, NULL, 30000, 23, 1),
(24, 10, NULL, 30000, 24, 1),
(25, 10, NULL, 30000, 25, 1),
(26, 10, NULL, 30000, 26, 1),
(27, 10, NULL, 30000, 27, 1),
(28, 10, NULL, 30000, 28, 1),
(29, 10, NULL, 30000, 29, 1),
(30, 10, NULL, 30000, 30, 1),
(31, 11, NULL, 30000, 1, 1),
(32, 11, NULL, 30000, 2, 1),
(33, 11, NULL, 30000, 3, 1),
(34, 11, NULL, 30000, 4, 1),
(35, 11, NULL, 30000, 5, 1),
(36, 11, NULL, 30000, 6, 1),
(37, 11, NULL, 30000, 7, 1),
(38, 11, NULL, 30000, 8, 1),
(39, 11, NULL, 30000, 9, 1),
(40, 11, NULL, 30000, 10, 1),
(41, 11, NULL, 30000, 11, 1),
(42, 11, NULL, 30000, 12, 1),
(43, 11, NULL, 30000, 13, 1),
(44, 11, NULL, 30000, 14, 1),
(45, 11, NULL, 30000, 15, 1),
(46, 11, NULL, 30000, 16, 1),
(47, 11, NULL, 30000, 17, 1),
(48, 11, NULL, 30000, 18, 1),
(49, 11, NULL, 30000, 19, 1),
(50, 11, NULL, 30000, 20, 1),
(51, 11, NULL, 30000, 21, 1),
(52, 11, NULL, 30000, 22, 1),
(53, 11, NULL, 30000, 23, 1),
(54, 11, NULL, 30000, 24, 1),
(55, 11, NULL, 30000, 25, 1),
(56, 11, NULL, 30000, 26, 1),
(57, 11, NULL, 30000, 27, 1),
(58, 11, NULL, 30000, 28, 1),
(59, 11, NULL, 30000, 29, 1),
(60, 11, NULL, 30000, 30, 1),
(61, 12, NULL, 30000, 1, 1),
(62, 12, NULL, 30000, 2, 1),
(63, 12, NULL, 30000, 3, 1),
(64, 12, NULL, 30000, 4, 1),
(65, 12, NULL, 30000, 5, 1),
(66, 12, NULL, 30000, 6, 1),
(67, 12, 3, 30000, 7, 0),
(68, 12, 3, 30000, 8, 0),
(69, 12, 3, 30000, 9, 0),
(70, 12, 3, 30000, 10, 0),
(71, 12, 3, 30000, 11, 0),
(72, 12, 3, 30000, 12, 0),
(73, 12, 3, 30000, 13, 0),
(74, 12, 3, 30000, 14, 0),
(75, 12, 3, 30000, 15, 0),
(76, 12, 3, 30000, 16, 0),
(77, 12, 3, 30000, 17, 0),
(78, 12, 3, 30000, 18, 0),
(79, 12, 3, 30000, 19, 0),
(80, 12, 3, 30000, 20, 0),
(81, 12, 3, 30000, 21, 0),
(82, 12, 3, 30000, 22, 0),
(83, 12, 3, 30000, 23, 0),
(84, 12, 3, 30000, 24, 0),
(85, 12, 3, 30000, 25, 0),
(86, 12, 3, 30000, 26, 0),
(87, 12, 3, 30000, 27, 0),
(88, 12, 3, 30000, 28, 0),
(89, 12, 3, 30000, 29, 0),
(90, 12, 3, 30000, 30, 0),
(91, 13, NULL, 30000, 1, 1),
(92, 13, NULL, 30000, 2, 1),
(93, 13, NULL, 30000, 3, 1),
(94, 13, NULL, 30000, 4, 1),
(95, 13, NULL, 30000, 5, 1),
(96, 13, NULL, 30000, 6, 1),
(97, 13, NULL, 30000, 7, 1),
(98, 13, NULL, 30000, 8, 1),
(99, 13, NULL, 30000, 9, 1),
(100, 13, NULL, 30000, 10, 1),
(101, 13, NULL, 30000, 11, 1),
(102, 13, NULL, 30000, 12, 1),
(103, 13, NULL, 30000, 13, 1),
(104, 13, NULL, 30000, 14, 1),
(105, 13, NULL, 30000, 15, 1),
(106, 13, NULL, 30000, 16, 1),
(107, 13, NULL, 30000, 17, 1),
(108, 13, NULL, 30000, 18, 1),
(109, 13, NULL, 30000, 19, 1),
(110, 13, NULL, 30000, 20, 1),
(111, 13, NULL, 30000, 21, 1),
(112, 13, NULL, 30000, 22, 1),
(113, 13, 3, 30000, 23, 0),
(114, 13, 3, 30000, 24, 0),
(115, 13, 3, 30000, 25, 0),
(116, 13, 3, 30000, 26, 0),
(117, 13, 3, 30000, 27, 0),
(118, 13, 3, 30000, 28, 0),
(119, 13, 3, 30000, 29, 0),
(120, 13, 3, 30000, 30, 0),
(121, 14, NULL, 30000, 1, 1),
(122, 14, NULL, 30000, 2, 1),
(123, 14, NULL, 30000, 3, 1),
(124, 14, NULL, 30000, 4, 1),
(125, 14, NULL, 30000, 5, 1),
(126, 14, NULL, 30000, 6, 1),
(127, 14, NULL, 30000, 7, 1),
(128, 14, NULL, 30000, 8, 1),
(129, 14, NULL, 30000, 9, 1),
(130, 14, NULL, 30000, 10, 1),
(131, 14, NULL, 30000, 11, 1),
(132, 14, NULL, 30000, 12, 1),
(133, 14, NULL, 30000, 13, 1),
(134, 14, NULL, 30000, 14, 1),
(135, 14, NULL, 30000, 15, 1),
(136, 14, NULL, 30000, 16, 1),
(137, 14, NULL, 30000, 17, 1),
(138, 14, NULL, 30000, 18, 1),
(139, 14, NULL, 30000, 19, 1),
(140, 14, NULL, 30000, 20, 1),
(141, 14, NULL, 30000, 21, 1),
(142, 14, NULL, 30000, 22, 1),
(143, 14, NULL, 30000, 23, 1),
(144, 14, NULL, 30000, 24, 1),
(145, 14, NULL, 30000, 25, 1),
(146, 14, NULL, 30000, 26, 1),
(147, 14, NULL, 30000, 27, 1),
(148, 14, NULL, 30000, 28, 1),
(149, 14, NULL, 30000, 29, 1),
(150, 14, 2, 30000, 30, 0),
(151, 15, NULL, 30000, 1, 1),
(152, 15, NULL, 30000, 2, 1),
(153, 15, NULL, 30000, 3, 1),
(154, 15, NULL, 30000, 4, 1),
(155, 15, NULL, 30000, 5, 1),
(156, 15, NULL, 30000, 6, 1),
(157, 15, NULL, 30000, 7, 1),
(158, 15, NULL, 30000, 8, 1),
(159, 15, NULL, 30000, 9, 1),
(160, 15, NULL, 30000, 10, 1),
(161, 15, NULL, 30000, 11, 1),
(162, 15, NULL, 30000, 12, 1),
(163, 15, NULL, 30000, 13, 1),
(164, 15, NULL, 30000, 14, 1),
(165, 15, NULL, 30000, 15, 1),
(166, 15, NULL, 30000, 16, 1),
(167, 15, NULL, 30000, 17, 1),
(168, 15, NULL, 30000, 18, 1),
(169, 15, NULL, 30000, 19, 1),
(170, 15, NULL, 30000, 20, 1),
(171, 15, NULL, 30000, 21, 1),
(172, 15, NULL, 30000, 22, 1),
(173, 15, NULL, 30000, 23, 1),
(174, 15, NULL, 30000, 24, 1),
(175, 15, NULL, 30000, 25, 1),
(176, 15, NULL, 30000, 26, 1),
(177, 15, NULL, 30000, 27, 1),
(178, 15, NULL, 30000, 28, 1),
(179, 15, NULL, 30000, 29, 1),
(180, 15, NULL, 30000, 30, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `session`
--

CREATE TABLE `session` (
  `sid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expire_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `session`
--

INSERT INTO `session` (`sid`, `user_id`, `expire_time`) VALUES
(29, 2, 1574851942),
(30, 3, 1574851446);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof_pic` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `phone`, `password`, `prof_pic`) VALUES
(2, 'yoelsusanto', 'email@yahoo.com', '113123', 'yoelsusanto', ''),
(3, 'nyxia91', 'email2@yahoo.com', '123123123', 'yoelsusanto', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indeks untuk tabel `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indeks untuk tabel `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indeks untuk tabel `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`,`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475559;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `session`
--
ALTER TABLE `session`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Ketidakleluasaan untuk tabel `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
