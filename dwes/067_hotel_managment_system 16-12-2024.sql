DROP PROCEDURE IF EXISTS 067_random_reservations;
DROP VIEW IF EXISTS 067_places_view;
DROP VIEW IF EXISTS 067_reservations_view;
DROP TABLE IF EXISTS 067_done_tasks;
DROP TABLE IF EXISTS 067_tasks;
DROP TABLE IF EXISTS 067_services;
DROP TABLE IF EXISTS 067_employees_tasks;
DROP TABLE IF EXISTS 067_reservations;
DROP TABLE IF EXISTS 067_places;
DROP TABLE IF EXISTS 067_place_type;
DROP TABLE IF EXISTS 067_place_category;
DROP TABLE IF EXISTS 067_hotels;
DROP TABLE IF EXISTS 067_users;


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2024 a las 19:41:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `067_hotel_managment_system`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE  PROCEDURE `067_random_reservations` (IN `n_reservations` INT)   BEGIN

-- creacion de reservas reales para simular reservas del usuario en la web
	DECLARE var_place_id int;
    DECLARE var_place_price DECIMAL(10,2);
    DECLARE var_customer_id int;
    DECLARE var_date_in date;
    DECLARE var_date_out date;
    
    
    
    
    IF n_reservations IS NULL or n_reservations = 0 THEN
    	SET n_reservations=5;
    END IF;
    
    FOR i IN 1..n_reservations DO
    
    -- select a random customer_id
    SELECT customer_id INTO var_customer_id
    FROM 067_customers
    ORDER BY RAND()
    LIMIT 1;
    
    -- random date_in
      SELECT DATE_ADD(CONCAT(YEAR(NOW()), '-01-01'), INTERVAL FLOOR(RAND() * 31) DAY) INTO var_date_in;
      -- random date_out, is date_in + random number between 1 and 15
      SELECT DATE_ADD(var_date_in , INTERVAL FLOOR(RAND() * 15) DAY) INTO var_date_out;
      
        -- select a random place
    SELECT place_id, place_price INTO var_place_id,var_place_price
    FROM 067_places
    WHERE place_id NOT IN ( SELECT place_id
                     FROM 067_reservations
                     WHERE date_out > var_date_in
                     AND date_in < var_date_out)
    ORDER BY RAND()
    LIMIT 1;
    
    
    
  
  INSERT INTO 067_reservations (customer_id,place_id,date_in,date_out,price_per_day) VALUES
    (var_customer_id,var_place_id,var_date_in,var_date_out,var_place_price);
    SELECT var_customer_id,var_place_id,var_date_in,var_date_out,var_place_price;   
    
    END FOR;
    
    END$$

CREATE  PROCEDURE `doAllTimeCheckIn` ()   BEGIN
	UPDATE `067_reservations` SET reservation_state = 'check-in'
	WHERE date_in <= CURRENT_DATE() AND date_out >= CURRENT_DATE(); 

END$$

CREATE  PROCEDURE `doAllTimeCheckOut` ()   BEGIN
	UPDATE `067_reservations` SET reservation_state = 'check-out'
	 WHERE (date_in = CURRENT_DATE() OR date_in < CURRENT_DATE()) AND date_out <= CURRENT_DATE();  



END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_done_tasks`
--

CREATE TABLE `067_done_tasks` (
  `task_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_done_tasks`
--

INSERT INTO `067_done_tasks` (`task_id`, `employee_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_employees_tasks`
--

CREATE TABLE `067_employees_tasks` (
  `task_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_employees_tasks`
--

INSERT INTO `067_employees_tasks` (`task_id`, `employee_id`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_hotels`
--

CREATE TABLE `067_hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `hotel_address` varchar(100) DEFAULT NULL,
  `stars` enum('1','2','3','4','5') DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_hotels`
--

INSERT INTO `067_hotels` (`hotel_id`, `hotel_name`, `hotel_address`, `stars`, `max_capacity`) VALUES
(1, 'Hotel Sol', 'Calle del Sol, 123, Madrid', '5', 200),
(2, 'Hotel Luna', 'Avenida de la Luna, 45, Barcelona', '4', 150),
(3, 'Hotel Estrella', 'Plaza de las Estrellas, 9, Valencia', '3', 100),
(4, 'Hotel Mar', 'Paseo del Mar, 67, Málaga', '5', 250),
(5, 'Hotel Montaña', 'Calle de la Sierra, 22, Granada', '4', 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_places`
--

CREATE TABLE `067_places` (
  `hotel_id` int(11) NOT NULL DEFAULT 1,
  `place_id` int(11) NOT NULL,
  `place_type_id` int(11) NOT NULL DEFAULT 1,
  `place_category_id` int(11) NOT NULL,
  `place_capacity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_places`
--

INSERT INTO `067_places` (`hotel_id`, `place_id`, `place_type_id`, `place_category_id`, `place_capacity`, `status`) VALUES
(1, 1, 1, 1, 3, 1),
(1, 2, 1, 1, 4, 1),
(1, 3, 1, 2, 2, 1),
(1, 4, 1, 2, 3, 1),
(1, 5, 1, 2, 2, 1),
(1, 6, 1, 1, 3, 1),
(1, 7, 1, 2, 5, 1),
(1, 12, 1, 1, 2, 1),
(1, 13, 1, 1, 2, 1),
(1, 14, 1, 2, 9, 1),
(1, 15, 1, 2, 5, 1),
(1, 17, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `067_places_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `067_places_view` (
`hotel_id` int(11)
,`place_id` int(11)
,`place_type_id` int(11)
,`place_category_id` int(11)
,`place_capacity` int(11)
,`status` tinyint(1)
,`hotel_name` varchar(100)
,`hotel_address` varchar(100)
,`stars` enum('1','2','3','4','5')
,`max_capacity` int(11)
,`place_type_name` varchar(100)
,`place_category_name` varchar(100)
,`place_category_price` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_place_category`
--

CREATE TABLE `067_place_category` (
  `place_category_id` int(11) NOT NULL,
  `place_category_name` varchar(100) NOT NULL,
  `place_category_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_place_category`
--

INSERT INTO `067_place_category` (`place_category_id`, `place_category_name`, `place_category_price`) VALUES
(1, 'basic', 80.00),
(2, 'premium', 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_place_type`
--

CREATE TABLE `067_place_type` (
  `place_type_id` int(11) NOT NULL,
  `place_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_place_type`
--

INSERT INTO `067_place_type` (`place_type_id`, `place_type_name`) VALUES
(1, 'room'),
(2, 'chalet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_reservations`
--

CREATE TABLE `067_reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL DEFAULT 1,
  `place_id` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `extras_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `reservation_state` enum('book','check-in','check-out','cancelled') NOT NULL DEFAULT 'book'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_reservations`
--

INSERT INTO `067_reservations` (`reservation_id`, `user_id`, `hotel_id`, `place_id`, `date_in`, `date_out`, `price_per_day`, `extras_json`, `reservation_state`) VALUES
(1, 1, 1, 1, '2024-01-01', '2024-12-31', 100.00, '', 'check-in'),
(2, 2, 2, 2, '2024-07-01', '2024-07-05', 150.00, '', 'check-out'),
(3, 3, 3, 3, '2024-08-10', '2024-08-15', 200.00, '', 'cancelled'),
(4, 4, 4, 4, '2024-09-05', '2024-09-10', 120.00, '', 'check-out'),
(10, 15, 1, 4, '2024-01-26', '2024-01-29', 120.00, '', 'check-out'),
(11, 41, 1, 4, '2024-01-17', '2024-01-27', 120.00, '', 'check-out'),
(12, 38, 1, 3, '2024-01-30', '2024-02-05', 200.00, '', 'check-out'),
(13, 49, 1, 3, '2024-01-18', '2024-01-24', 200.00, '', 'check-out'),
(14, 16, 1, 2, '2024-01-25', '2024-01-31', 150.00, '', 'check-out'),
(16, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(21, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(22, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(23, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(24, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(25, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(26, 1, 1, 2, '2024-10-28', '2024-10-31', 80.00, '', 'check-out'),
(27, 3, 1, 3, '2024-11-01', '2024-11-30', 100.00, '', 'check-out'),
(28, 1, 1, 2, '2024-11-08', '2024-11-30', 80.00, '', 'check-out'),
(29, 1, 1, 2, '2024-11-08', '2024-11-30', 80.00, '', 'check-out'),
(30, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(31, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(32, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(33, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(34, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(35, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(36, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(37, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(38, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(39, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(40, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(41, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(42, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(43, 2, 1, 4, '2024-11-16', '2024-11-27', 100.00, '', 'check-out'),
(44, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(45, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(46, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(47, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(48, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(49, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(50, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(51, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(52, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(53, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(54, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(55, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(56, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(57, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(58, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(59, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(60, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(61, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(62, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(63, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(64, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(65, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(66, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(67, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(68, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(69, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(70, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(71, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(72, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(73, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(74, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(75, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(76, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(77, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(78, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(79, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(80, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(81, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(82, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(83, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(84, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(85, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(86, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(87, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(88, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(89, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(90, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(91, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(92, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(93, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(94, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(95, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(96, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(97, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(98, 57, 1, 6, '2024-11-06', '2024-11-21', 80.00, '', 'check-out'),
(99, 64, 1, 12, '2024-11-08', '2024-11-30', 80.00, '', 'check-out'),
(100, 64, 1, 13, '2024-11-09', '2024-11-21', 80.00, '', 'check-out'),
(101, 64, 1, 13, '2024-11-09', '2024-11-21', 80.00, '', 'check-out'),
(102, 64, 1, 13, '2024-11-09', '2024-11-21', 80.00, '', 'check-out'),
(103, 64, 1, 13, '2024-11-09', '2024-11-21', 80.00, '', 'check-out'),
(104, 64, 1, 3, '2024-11-30', '2024-12-01', 100.00, '', 'check-out'),
(105, 64, 1, 3, '2024-11-30', '2024-12-01', 100.00, '', 'check-out'),
(106, 64, 1, 5, '2024-11-08', '2024-11-26', 100.00, '', 'check-out'),
(107, 64, 1, 5, '2024-11-08', '2024-11-26', 100.00, '', 'check-out'),
(112, 2, 1, 6, '2024-11-29', '2024-11-28', 80.00, '{\"spa\":[{\"concept\":\"sauna\",\"dateTime_in\":\"2024-11-11T16:00\",\"dateTime_out\":\"2024-11-11T17:00\",\"unitPrice\":\"15\"}]}', 'check-out'),
(113, 2, 1, 6, '2024-11-28', '2024-11-29', 80.00, '{\"spa\":[{\"concept\":\"sauna\",\"dateTime_in\":\"2024-11-13T16:00\",\"dateTime_out\":\"2024-11-13T17:00\",\"unitPrice\":\"15\"}],\"horse_excursion\":[{\"concept\":\"standar_excursion\",\"dateTime_in\":\"2024-11-13T10:00\",\"dateTime_out\":\"2024-11-13T11:00\",\"unitPrice\":\"30\"}]}', 'check-out'),
(114, 2, 1, 6, '2024-11-29', '2024-11-28', 80.00, 'null', 'check-out'),
(115, 2, 1, 6, '2024-11-29', '2024-11-28', 80.00, '', 'check-out'),
(123, 2, 1, 2, '2024-11-30', '2024-11-28', 80.00, '', 'check-out'),
(124, 2, 1, 2, '2024-11-30', '2024-11-28', 80.00, '', 'check-out'),
(125, 2, 1, 7, '2024-11-13', '2025-03-08', 100.00, '', 'check-in'),
(126, 2, 1, 4, '2024-11-15', '2024-11-15', 100.00, '', 'check-out'),
(127, 2, 1, 4, '2024-11-15', '2024-11-15', 100.00, '', 'check-out'),
(128, 2, 1, 4, '2024-11-15', '2024-11-15', 100.00, '', 'check-out'),
(129, 2, 1, 4, '2024-11-15', '2024-11-15', 100.00, '', 'check-out'),
(130, 2, 1, 4, '2024-11-15', '2024-11-15', 100.00, '', 'check-out'),
(131, 2, 1, 6, '2024-11-28', '2024-11-29', 80.00, NULL, 'check-out'),
(132, 65, 1, 2, '2024-12-05', '2024-12-13', 80.00, NULL, 'check-in'),
(133, 65, 1, 2, '2024-12-04', '2024-12-05', 80.00, NULL, 'check-out'),
(134, 65, 1, 3, '2024-12-08', '2024-12-16', 100.00, NULL, 'check-in'),
(135, 65, 1, 3, '2024-12-23', '2025-01-01', 100.00, NULL, 'check-in'),
(136, 68, 1, 4, '2024-12-23', '2025-01-01', 100.00, NULL, 'book'),
(137, 65, 1, 6, '2024-12-12', '2024-12-26', 80.00, NULL, 'book');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `067_reservations_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `067_reservations_view` (
`reservation_id` int(11)
,`user_id` int(11)
,`hotel_id` int(11)
,`place_id` int(11)
,`date_in` date
,`date_out` date
,`price_per_day` decimal(10,2)
,`extras_json` longtext
,`reservation_state` enum('book','check-in','check-out','cancelled')
,`total_days` int(7)
,`forename` varchar(100)
,`lastname` varchar(100)
,`username` varchar(100)
,`password` varchar(100)
,`nif` varchar(100)
,`email` varchar(100)
,`phone` int(100)
,`hotel_name` varchar(100)
,`hotel_address` varchar(100)
,`stars` enum('1','2','3','4','5')
,`max_capacity` int(11)
,`place_type_name` varchar(100)
,`place_category_name` varchar(100)
,`place_category_price` decimal(10,2)
,`subtotal` decimal(16,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_services`
--

CREATE TABLE `067_services` (
  `hotel_id` int(11) NOT NULL DEFAULT 1,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_services`
--

INSERT INTO `067_services` (`hotel_id`, `service_id`, `service_name`, `capacity`, `price`, `description`, `start_time`) VALUES
(1, 1, 'massage', 1, 50.00, 'A 30 minutes personal massage', '11:00'),
(1, 4, 'kayak excursion', 20, 30.00, 'Excursion with kayaks, 1 hour duration', '10:00'),
(1, 5, 'bar', NULL, NULL, 'consume somthing in the bar', '8:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_tasks`
--

CREATE TABLE `067_tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `isDone` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_tasks`
--

INSERT INTO `067_tasks` (`task_id`, `task_name`, `description`, `isDone`) VALUES
(1, 'Limpieza de habitaciones', 'Limpiar y ordenar las habitaciones del hotel', 1),
(2, 'Limpieza de áreas comunes', 'Limpiar y mantener las áreas comunes del hotel, como el vestíbulo y los pasillos', 0),
(3, 'Mantenimiento de equipos', 'Revisar y reparar los equipos del hotel, como aire acondicionado y electrodomésticos', 0),
(4, 'Jardinería', 'Mantener y cuidar los jardines y áreas verdes del hotel', 0),
(5, 'Reparaciones menores', 'Realizar reparaciones menores en las instalaciones del hotel, como pintura y fontanería', 0);

--
-- Disparadores `067_tasks`
--
DELIMITER $$
CREATE TRIGGER `tr_update_isDone` AFTER UPDATE ON `067_tasks` FOR EACH ROW BEGIN
	DECLARE var_task_id INT;
    DECLARE var_employee_id INT;

	IF OLD.isDone = 0 AND NEW.isDone = 1 THEN
    	
         SELECT NEW.task_id, employee_id INTO var_task_id,var_employee_id
        FROM employees_tasks
        WHERE task_id = NEW.task_id;
        
        INSERT INTO done_tasks (task_id,employee_id) VALUES
        (var_task_id,var_employee_id);
        
        DELETE FROM employees_tasks 
        WHERE task_id =  var_task_id AND employee_id = var_employee_id;

	END IF;      
       
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `067_users`
--

CREATE TABLE `067_users` (
  `user_id` int(11) NOT NULL,
  `forename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL COMMENT 'user name',
  `password` varchar(100) NOT NULL,
  `nif` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) DEFAULT NULL,
  `job_position` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `rols` set('customer','employee','admin','') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `067_users`
--

INSERT INTO `067_users` (`user_id`, `forename`, `lastname`, `username`, `password`, `nif`, `email`, `phone`, `job_position`, `status`, `rols`) VALUES
(1, 'Sergi', 'Salord', 'SergiSalord', '12345', '11111111A', 'ssalord@gmail.com', 111111111, '', 1, 'customer'),
(2, 'Josep', 'Vinent', 'JosepVinent', '1234', '22222222B', 'jvinent@gmail.com', 222222222, '', 1, 'customer'),
(3, 'Daniel', 'Pons', 'DanielPons', '', '33333333C', 'dpons@gmail.com', 333333333, '', 1, 'customer'),
(4, 'Ruben', 'Marques', 'RubenMarques', '', '44444444D', 'rmarques@gmail.com', 444444444, '', 1, 'customer'),
(5, 'Xavier', 'Caules', 'XavierCaules', '', '55555555E', 'xcaules@gmail.com', 555555555, '', 0, 'customer'),
(6, 'Pedro', 'Martinez', 'PedroMartinez', '', '66666666F', 'pmartinez@gmail.com', 666666666, '', 1, 'customer'),
(7, 'Whitney', 'Cote', 'WhitneyCote', '', '72818641F', 'in@outlook.net', 437437928, '', 1, 'customer'),
(8, 'Nina', 'Mejia', 'NinaMejia', '', '33517388N', 'elementum.lorem@icloud.couk', 720808752, '', 1, 'customer'),
(9, 'Sade', 'Campbell', 'SadeCampbell', '', '44523262D', 'orci@aol.net', 985244326, '', 1, 'customer'),
(10, 'Kylie', 'Roberson', 'KylieRoberson', '', '27653329L', 'erat.neque.non@protonmail.com', 742240984, '', 1, 'customer'),
(11, 'Rose', 'Stein', 'RoseStein', '', '83885884M', 'amet@protonmail.org', 262212563, '', 1, 'customer'),
(12, 'Damon', 'Harding', 'DamonHarding', '', '43652757G', 'mauris.ipsum.porta@yahoo.ca', 841503411, '', 1, 'customer'),
(13, 'Ray', 'Sweeney', 'RaySweeney', '', '71366741R', 'senectus.et@icloud.ca', 379643631, '', 1, 'customer'),
(14, 'Arden', 'Burke', 'ArdenBurke', '', '62377275Z', 'nunc.commodo@yahoo.ca', 878063706, '', 1, 'customer'),
(15, 'Althea', 'Anthony', 'AltheaAnthony', '', '81533777P', 'etiam.gravida@aol.com', 330526083, '', 1, 'customer'),
(16, 'Cathleen', 'Terrell', 'CathleenTerrell', '', '85598177K', 'risus.donec@google.edu', 182067952, '', 1, 'customer'),
(17, 'Callum', 'Randolph', 'CallumRandolph', '', '62847355G', 'lectus.pede.et@yahoo.net', 502052713, '', 1, 'customer'),
(18, 'Bell', 'Saunders', 'BellSaunders', '', '74754147A', 'pretium.aliquet@google.edu', 415869888, '', 1, 'customer'),
(19, 'Carter', 'Guthrie', 'CarterGuthrie', '', '13758653Q', 'duis@google.org', 427144366, '', 1, 'customer'),
(20, 'Giacomo', 'Barron', 'GiacomoBarron', '', '61234814O', 'dictum.eleifend.nunc@aol.org', 453122975, '', 1, 'customer'),
(21, 'Halla', 'Cain', 'HallaCain', '', '41276418B', 'ridiculus.mus@hotmail.edu', 548841661, '', 1, 'customer'),
(22, 'Elmo', 'Hines', 'ElmoHines', '', '68631836R', 'amet.risus@hotmail.net', 534263867, '', 1, 'customer'),
(23, 'Ira', 'Hurst', 'IraHurst', '', '97254468M', 'ante.iaculis.nec@google.org', 482332774, '', 1, 'customer'),
(24, 'Lysandra', 'Maldonado', 'LysandraMaldonado', '', '49512446U', 'dapibus.gravida.aliquam@protonmail.net', 158166378, '', 1, 'customer'),
(25, 'Thaddeus', 'Tyler', 'ThaddeusTyler', '', '72452583Y', 'ut.quam@aol.edu', 454949231, '', 1, 'customer'),
(26, 'Gregory', 'Greer', 'GregoryGreer', '', '67323217N', 'cubilia.curae@aol.com', 157257944, '', 1, 'customer'),
(27, 'Owen', 'Fox', 'OwenFox', '', '33618437K', 'risus.in@aol.org', 356858723, '', 1, 'customer'),
(28, 'Erin', 'Osborn', 'ErinOsborn', '', '24786515P', 'nisl.arcu@google.ca', 447123856, '', 1, 'customer'),
(29, 'Zane', 'Castillo', 'ZaneCastillo', '', '56222137Q', 'per.conubia@hotmail.couk', 373824123, '', 1, 'customer'),
(30, 'Ferris', 'Gardner', 'FerrisGardner', '', '46698852R', 'suscipit.est@protonmail.net', 251936433, '', 1, 'customer'),
(31, 'Tucker', 'Gay', 'TuckerGay', '', '92529736H', 'ut.sem@icloud.couk', 827174718, '', 1, 'customer'),
(32, 'Rudyard', 'English', 'RudyardEnglish', '', '62447779H', 'pharetra.sed@yahoo.ca', 116341461, '', 1, 'customer'),
(33, 'Alexander', 'Reed', 'AlexanderReed', '', '76933797R', 'diam@icloud.couk', 642837718, '', 1, 'customer'),
(34, 'Luke', 'Carrillo', 'LukeCarrillo', '', '88612533L', 'non@icloud.net', 156683163, '', 1, 'customer'),
(35, 'Alika', 'Young', 'AlikaYoung', '', '43617785V', 'quam.quis@icloud.couk', 948446865, '', 1, 'customer'),
(36, 'Noah', 'Bridges', 'NoahBridges', '', '95453735M', 'nec.enim.nunc@icloud.net', 861447388, '', 1, 'customer'),
(37, 'Pascale', 'Ayers', 'PascaleAyers', '', '48435823R', 'consectetuer@aol.ca', 174637515, '', 1, 'customer'),
(38, 'Yoko', 'Pena', 'YokoPena', '', '25538223Y', 'ac@icloud.ca', 878511147, '', 1, 'customer'),
(39, 'Justin', 'Burke', 'JustinBurke', '', '32426637V', 'accumsan@aol.ca', 76542586, '', 1, 'customer'),
(40, 'Jamalia', 'Massey', 'JamaliaMassey', '', '47437774W', 'mauris@google.edu', 234765390, '', 1, 'customer'),
(41, 'Audra', 'Craig', 'AudraCraig', '', '34611112Y', 'nunc.mauris@google.org', 258366168, '', 1, 'customer'),
(42, 'Wynne', 'Sweet', 'WynneSweet', '', '73418136C', 'non.vestibulum@yahoo.net', 463293372, '', 1, 'customer'),
(43, 'Cedric', 'Mcclure', 'CedricMcclure', '', '75845239E', 'fermentum.vel.mauris@outlook.couk', 885616270, '', 1, 'customer'),
(44, 'Drake', 'Griffin', 'DrakeGriffin', '', '56893566M', 'non.lorem@hotmail.couk', 378687386, '', 1, 'customer'),
(45, 'Jerome', 'Huffman', 'JeromeHuffman', '', '67277323Y', 'nunc@hotmail.couk', 211542504, '', 1, 'customer'),
(46, 'Nigel', 'Vasquez', 'NigelVasquez', '', '15595518G', 'natoque.penatibus.et@icloud.net', 137753172, '', 1, 'customer'),
(47, 'Eagan', 'Curry', 'EaganCurry', '', '83564654P', 'at@google.org', 161361860, '', 1, 'customer'),
(48, 'Debra', 'Stafford', 'DebraStafford', '', '64975667K', 'aliquam@google.ca', 638397308, '', 1, 'customer'),
(49, 'Ulla', 'Davis', 'UllaDavis', '', '52786444D', 'ullamcorper@aol.org', 349032564, '', 1, 'customer'),
(50, 'Ifeoma', 'Kent', 'IfeomaKent', '', '45562978Z', 'sapien.molestie.orci@protonmail.couk', 379103223, '', 1, 'customer'),
(51, 'Montana', 'Maynard', 'MontanaMaynard', '', '95544864L', 'interdum.curabitur@aol.ca', 867423795, '', 1, 'customer'),
(53, 'Ebony', 'Keller', 'EbonyKeller', '', '44856849D', 'libero.et@aol.com', 571025442, '', 1, 'customer'),
(54, 'Ivana', 'Lindsay', 'IvanaLindsay', '', '65682388C', 'sagittis.placerat.cras@hotmail.org', 175843361, '', 1, 'customer'),
(55, 'Galena', 'Cooke', 'GalenaCooke', '', '89493461C', 'at.lacus@hotmail.com', 994581224, '', 1, 'customer'),
(57, 'Lewis', 'Hamilton', 'LewisHamilton', 'lh44', '78304572J', 'lhamilton@hotmail.com', 44, '', 1, 'customer'),
(64, 'Erik', 'Mozos', 'ErikMozos', '1234', '41751988E', 'emozos@gmail.com', 651203894, '', 1, 'employee'),
(65, 'Arnau', 'Marques', 'amarques', '1234', '41751988L', 'amarquesabello@gmail.com', 653590801, '', 1, 'customer,admin'),
(66, 'Enrique', '', 'enrique@gmail.com', 'dwesteacher', '', '', NULL, '', 1, 'admin'),
(67, 'Carlos', 'Marques', 'CarlosMarques', '1234', '41756324J', 'cmarques@gmail.com', 625410236, 'boss', 1, 'employee'),
(68, 'Toni', 'Barrera', 'ToniBarrera', '1234', '41751945F', 'tbarrera@gmail.com', 660405601, '', 1, 'customer');

-- --------------------------------------------------------

--
-- Estructura para la vista `067_places_view`
--
DROP TABLE IF EXISTS `067_places_view`;

CREATE VIEW `067_places_view`  AS SELECT `p`.`hotel_id` AS `hotel_id`, `p`.`place_id` AS `place_id`, `p`.`place_type_id` AS `place_type_id`, `p`.`place_category_id` AS `place_category_id`, `p`.`place_capacity` AS `place_capacity`, `p`.`status` AS `status`, `h`.`hotel_name` AS `hotel_name`, `h`.`hotel_address` AS `hotel_address`, `h`.`stars` AS `stars`, `h`.`max_capacity` AS `max_capacity`, `pt`.`place_type_name` AS `place_type_name`, `pc`.`place_category_name` AS `place_category_name`, `pc`.`place_category_price` AS `place_category_price` FROM (((`067_places` `p` join `067_hotels` `h` on(`p`.`hotel_id` = `h`.`hotel_id`)) join `067_place_type` `pt` on(`p`.`place_type_id` = `pt`.`place_type_id`)) join `067_place_category` `pc` on(`p`.`place_category_id` = `pc`.`place_category_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `067_reservations_view`
--
DROP TABLE IF EXISTS `067_reservations_view`;

CREATE VIEW `067_reservations_view`  AS SELECT `r`.`reservation_id` AS `reservation_id`, `r`.`user_id` AS `user_id`, `r`.`hotel_id` AS `hotel_id`, `r`.`place_id` AS `place_id`, `r`.`date_in` AS `date_in`, `r`.`date_out` AS `date_out`, `r`.`price_per_day` AS `price_per_day`, `r`.`extras_json` AS `extras_json`, `r`.`reservation_state` AS `reservation_state`, to_days(`r`.`date_out`) - to_days(`r`.`date_in`) AS `total_days`, `c`.`forename` AS `forename`, `c`.`lastname` AS `lastname`, `c`.`username` AS `username`, `c`.`password` AS `password`, `c`.`nif` AS `nif`, `c`.`email` AS `email`, `c`.`phone` AS `phone`, `h`.`hotel_name` AS `hotel_name`, `h`.`hotel_address` AS `hotel_address`, `h`.`stars` AS `stars`, `h`.`max_capacity` AS `max_capacity`, `plv`.`place_type_name` AS `place_type_name`, `plv`.`place_category_name` AS `place_category_name`, `plv`.`place_category_price` AS `place_category_price`, (to_days(`r`.`date_out`) - to_days(`r`.`date_in`)) * `r`.`price_per_day` AS `subtotal` FROM (((`067_reservations` `r` join `067_users` `c` on(`r`.`user_id` = `c`.`user_id`)) join `067_hotels` `h` on(`r`.`hotel_id` = `h`.`hotel_id`)) join `067_places_view` `plv` on(`r`.`place_id` = `plv`.`place_id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `067_done_tasks`
--
ALTER TABLE `067_done_tasks`
  ADD PRIMARY KEY (`task_id`,`employee_id`);

--
-- Indices de la tabla `067_employees_tasks`
--
ALTER TABLE `067_employees_tasks`
  ADD PRIMARY KEY (`task_id`,`employee_id`);

--
-- Indices de la tabla `067_hotels`
--
ALTER TABLE `067_hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indices de la tabla `067_places`
--
ALTER TABLE `067_places`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `fk_Placeshotel_id` (`hotel_id`),
  ADD KEY `fk_place_category_id` (`place_category_id`),
  ADD KEY `fk_place_type_id` (`place_type_id`);

--
-- Indices de la tabla `067_place_category`
--
ALTER TABLE `067_place_category`
  ADD PRIMARY KEY (`place_category_id`);

--
-- Indices de la tabla `067_place_type`
--
ALTER TABLE `067_place_type`
  ADD PRIMARY KEY (`place_type_id`);

--
-- Indices de la tabla `067_reservations`
--
ALTER TABLE `067_reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_customer_id` (`user_id`),
  ADD KEY `fk_place_id` (`place_id`),
  ADD KEY `fk_Reservationhotel_id` (`hotel_id`);

--
-- Indices de la tabla `067_services`
--
ALTER TABLE `067_services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `fk_Servicehotel_id` (`hotel_id`);

--
-- Indices de la tabla `067_tasks`
--
ALTER TABLE `067_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indices de la tabla `067_users`
--
ALTER TABLE `067_users`
  ADD PRIMARY KEY (`user_id`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `067_hotels`
--
ALTER TABLE `067_hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `067_places`
--
ALTER TABLE `067_places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `067_place_category`
--
ALTER TABLE `067_place_category`
  MODIFY `place_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `067_place_type`
--
ALTER TABLE `067_place_type`
  MODIFY `place_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `067_reservations`
--
ALTER TABLE `067_reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `067_services`
--
ALTER TABLE `067_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `067_tasks`
--
ALTER TABLE `067_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `067_users`
--
ALTER TABLE `067_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `067_places`
--
ALTER TABLE `067_places`
  ADD CONSTRAINT `fk_Placeshotel_id` FOREIGN KEY (`hotel_id`) REFERENCES `067_hotels` (`hotel_id`),
  ADD CONSTRAINT `fk_place_category_id` FOREIGN KEY (`place_category_id`) REFERENCES `067_place_category` (`place_category_id`),
  ADD CONSTRAINT `fk_place_type_id` FOREIGN KEY (`place_type_id`) REFERENCES `067_place_type` (`place_type_id`);

--
-- Filtros para la tabla `067_reservations`
--
ALTER TABLE `067_reservations`
  ADD CONSTRAINT `fk_Reservationhotel_id` FOREIGN KEY (`hotel_id`) REFERENCES `067_hotels` (`hotel_id`),
  ADD CONSTRAINT `fk_place_id` FOREIGN KEY (`place_id`) REFERENCES `067_places` (`place_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `067_users` (`user_id`);

--
-- Filtros para la tabla `067_services`
--
ALTER TABLE `067_services`
  ADD CONSTRAINT `fk_Servicehotel_id` FOREIGN KEY (`hotel_id`) REFERENCES `067_hotels` (`hotel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
