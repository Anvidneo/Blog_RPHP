-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2021 a las 13:43:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_bloc_rphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `description`) VALUES
(1, 'Categoria1', 'Nueva categoria'),
(2, '', ''),
(4, 'categoria 2', 'una descripcion real');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `text` varchar(100) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `id_autor`, `id_post`, `text`, `date_created`) VALUES
(1, 1, 1, 'hola321321312', '2021-04-16 08:27:25'),
(2, 1, 1, 'hola2', '2021-04-16 08:28:49'),
(3, 1, 1, '', '2021-04-17 12:25:09'),
(4, 1, 1, '', '2021-04-17 12:25:25'),
(5, 1, 1, '', '2021-04-17 12:26:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_likes`
--

INSERT INTO `tbl_likes` (`id`, `id_autor`, `id_post`, `date_created`) VALUES
(1, 1, 1, '2021-04-16 08:20:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `text` varchar(50) DEFAULT NULL,
  `text_large` varchar(150) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `id_autor`, `id_category`, `title`, `slug`, `text`, `text_large`, `image`, `date_update`, `date_created`) VALUES
(1, 1, 1, 'titulo', 'una-descripcion-real', 'una descripcion real', 'una descripcion real bla bla bla bla  sdasdsadsad asdsadsa dasdas dasdasd', '', '2021-04-16', '2021-04-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(1) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `password`, `role`, `mail`, `phone`, `date_update`, `date_created`) VALUES
(1, 'Juan Botero', '0c50e48ccc5b7779e79fdc3ec02f9812dc0b7448cfcebaee4a5ef1b4b3f65f253315331dd832034d3673e49d5d15be60bfb3d945b701287cfaecacd13e73b1f9', '1', 'botero1400@gmail.com', '3192288710', '2021-04-15', '2021-04-15'),
(2, 'David Cabrera', '7392b6604eaea7d0ef96a599ff85f1aeb38b710ae0580a10580dfa4a984436c844cbc84b625e5b3d5114f4bfbc8b68467a399715c06fcf7539d12e1e33ddac6a', '1', 'Anvidneo@gmail.com', '3126924708', '2021-04-15', '2021-04-15'),
(6, 'David Cabrera', '7392b6604eaea7d0ef96a599ff85f1aeb38b710ae0580a10580dfa4a984436c844cbc84b625e5b3d5114f4bfbc8b68467a399715c06fcf7539d12e1e33ddac6a', '1', 'Anvidneo@gmail.com', '3126924708', '2021-04-16', '2021-04-16'),
(7, 'Juan David Botero Cabrera', '798d8534a8afc0f091f64afa92e9cd1f1f7816666eea20f9d2113bfdca42aa3cbb78316cedea4970d73db73d9997a81919105f746d4fb21e1177d20a2974eba5', '1', 'Botero1400@gmail.com', '3192288710', '2021-04-16', '2021-04-16'),
(8, 'Valentina Botero Cabrera', 'dedb257f406239a5286026fdac2e3d9338a8bc763e9f826f30eba498530e14c82c946de14f498d9ace941eeebe02b906ef3831f633601e594a5dd8fe66ce1bb4', '0', 'valenbotecabrera@gmail.com', '3054463459', '2021-04-16', '2021-04-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
