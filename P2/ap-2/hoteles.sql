-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 01-04-2019 a les 18:28:33
-- Versió del servidor: 10.1.34-MariaDB
-- Versió de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `hoteles`
--
CREATE DATABASE IF NOT EXISTS `hoteles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hoteles`;

-- --------------------------------------------------------

--
-- Estructura de la taula `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `zona` varchar(80) DEFAULT NULL,
  `piscina` int(11) DEFAULT '0',
  `img` varchar(2083) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcament de dades per a la taula `hoteles`
--

INSERT INTO `hoteles` (`id`, `nombre`, `ciudad`, `pais`, `zona`, `piscina`, `img`) VALUES
(10001, 'Hotel Roc Doblemar', 'La Manga', 'España', 'Playa', 1, 'https://pix10.agoda.net/hotelImages/260/2600081/2600081_17092617340056817169.jpg?ca=6&ce=1&s=1024x768'),
(10002, 'Hotel Nelva', 'Múrcia', 'España', 'Interior', 1, 'https://www.hotelmurcianelva.com/wp-content/uploads/sites/2492/nggallery/gallery-exterior/fotos_04_exteriores_exteriores_nocturnos_11.jpg'),
(10003, 'Hotel Park Puigcerdà & Spa', 'Cerdanya', 'España', 'Montaña', 1, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/14/43/20/piscina.jpg?w=900&h=-1&s=1'),
(10004, 'Hotel Cabana', 'Benidorm', 'España', 'Playa', 1, 'https://www.thespruce.com/thmb/I6pcHWsO9ZJ1pSfmWw4s-C_BG_M=/2128x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-509553708-c1c5eaa374094aa48038a8ba2959e98b.jpg'),
(10005, 'Nestor Hotel', 'Ayia Napa', 'Chipre', 'Playa', 1, 'https://th.bing.com/th/id/OIP.c_R_u3V2uiuPy20qo8F5kQHaE7?rs=1&pid=ImgDetMain'),
(10006, 'Hotel Perrakis', 'Andros Island', 'Grécia', 'Playa', 1, 'https://cdn.webhotelier.net/photos/w=1920/perrakis/L338867.jpg'),
(10007, 'Hotel Cezar', 'Banja Luka', 'Bosnia y Herzegovina', 'Interior', 0, 'https://th.bing.com/th/id/OIP.jMi7jPh0NMYI3CsIXdZYiQHaE9?rs=1&pid=ImgDetMain'),
(10008, 'Hotel Angelica', 'Limenas', 'Grécia', 'Playa', 0, 'https://images.yesalps.com/hp/287995/67523_esterno-estate.jpg'),
(10009, 'Hotel Alanda', 'Marbella', 'España', 'Playa', 1, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/f6/84/36/alanda-hotel-marbella.jpg?w=900&h=-1&s=1'),
(10010, 'Marconfort Griego Hotel', 'Torremolinos', 'España', 'Playa', 1, 'https://www.bing.com/images/search?view=detailV2&ccid=mk3clQwD&id=1318E775280B1E82405F5C30501FDDB5936F2E6E&thid=OIP.mk3clQwDqAxNUcDcvvmt_wHaEK&mediaurl=https%3a%2f%2fmedia-cdn.tripadvisor.com%2fmedia%2fphoto-s%2f11%2f69%2fc2%2f35%2fmarconfort-griego-hotel.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.9a4ddc950c03a80c4d51c0dcbef9adff%3frik%3dbi5vk7XdH1AwXA%26pid%3dImgRaw%26r%3d0%26sres%3d1%26sresct%3d1%26srh%3d730%26srw%3d1300&exph=309&expw=550&q=Marconfort+Griego+Hotel&simid=608054932194032675&FORM=IRPRST&ck=DDEBF73CC2E9CC1BB35D2CFF50472774&selectedIndex=27&itb=0' ||
                                                                         ''),
(10011, 'Hotel H10 Tindaya', 'Fuerteventura', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/15/96/15968_v6.jpeg'),
(10012, 'H10 Lanzarote Princess', 'Playa Blanca', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/72/04/7204_v16.jpeg'),
(10013, 'Eurostars León', 'León', 'España', 'Interior', 0, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/80/90/80900_v15.jpeg'),
(10014, 'Hotel NH Amistad', 'Múrcia', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/40/71/40716_v6.jpeg'),
(10015, 'Fuerte Conil-Costa Luz', 'Conil de la Frontera', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/81/78/81787_v5.jpeg'),
(10016, 'Urban Sea Atocha', 'Madrid', 'España', 'Interior', 0, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/12/73/1273691_v3.jpeg'),
(10017, 'Hotel Playafels', 'Casteldefels', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/11/06/110638_v3.jpeg'),
(10018, 'Meliá Sevilla', 'Sevilla', 'España', 'Playa', 1, 'https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,f_auto,h_450,q_auto:eco,w_450/itemimages/80/88/80884_v10.jpeg');

-- --------------------------------------------------------

--
-- Estructura de la taula `reservas`
--

CREATE TABLE `reservas` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_hotel` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `country_codes` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `code` varchar(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `country_codes` (`code`) VALUES
                                         ('+34'),
                                         ('+1'),
                                         ('+44'),
                                         ('+49'),
                                         ('+5959'),
                                         ('+33');
--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;