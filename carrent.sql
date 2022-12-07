-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2022 at 06:08 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `autobooking`
--

DROP TABLE IF EXISTS `autobooking`;
CREATE TABLE IF NOT EXISTS `autobooking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(55) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `getDate` varchar(25) NOT NULL,
  `returnDate` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `autobooking`
--

INSERT INTO `autobooking` (`id`, `fullName`, `phone`, `email`, `getDate`, `returnDate`, `status`, `created`, `updated`) VALUES
(5, 'Jozef Mrkvicka', '+44445556687', 'jozef@ukf.sk', '2022-12-08', '2022-12-17', 'new', '2022-12-07 05:58:45', '2022-12-07 05:58:45'),
(4, 'jan nan', '+42199999998', 'aaa@ukf.sk', '2022-12-01', '2022-12-31', 'finished', '2022-12-07 04:23:52', '2022-12-07 05:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `mainText` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL,
  `buttonLink` varchar(25) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `mainText`, `description`, `button`, `buttonLink`, `imageLink`) VALUES
(1, 'lorem ipsum dolor sit amet!', 'Quam temporibus accusam <br> hic ducimus quia', 'Magni deserunt dolorem consectetur adipisicing elit. Corporis molestiae optio, laudantium odio quod rerum maiores, omnis unde quae illo.', 'Contact us', 'contact.php', 'assets/images/slider-image-1-1920x900.jpg'),
(2, 'magni deserunt dolorem harum quas!', 'Aliquam iusto harum <br>  ratione porro odio', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa cupiditate mollitia adipisci assumenda laborum eius quae quo excepturi, eveniet. Dicta nulla ea beatae consequuntur?', 'Fleet', 'fleet.php', 'assets/images/slider-image-2-1920x900.jpg'),
(3, 'alias officia qui quae vitae natus!', 'Lorem ipsum dolor <br> sit amet, consectetur.', 'Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate mi. Sed nec cursus augue. Phasellus lacinia ac sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.', 'Offers', 'offers.php', 'assets/images/slider-image-3-1920x900.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fullName`, `position`, `comment`) VALUES
(1, 'George Walker', 'Chief Financial Analyst', '\"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.\"'),
(2, 'John Smith', 'Market Specialist', '\"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi.\"'),
(3, 'David Wood', 'Chief Accountant', '\"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique.\"'),
(4, 'Andrew Boom', 'Marketing Head', '\"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis.\"');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyName` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `year` int NOT NULL,
  `facebookLink` varchar(50) NOT NULL,
  `twitterLink` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `companyName`, `phone`, `email`, `year`, `facebookLink`, `twitterLink`, `description`, `location`) VALUES
(1, 'LIPA RENT', '+1 333 4040 5566', 'contact@company.com', 2022, 'https://www.facebook.com/', 'https://twitter.com/', 'Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.', '212 Barrington Court New York str <br> USA');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sysName` varchar(25) NOT NULL,
  `displayName` varchar(25) NOT NULL,
  `link` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `sysName`, `displayName`, `link`) VALUES
(1, 'home', 'Home', 'index.php'),
(3, 'offers', 'Offers', 'offers.php'),
(4, 'contact', 'Contact Us', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL,
  `fullName` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fullName`, `email`, `subject`, `message`, `created`) VALUES
(0, 'Artur Lypodatenko', 'aaa@ukf.sk', 'Hi', 'Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.', '2022-12-07 05:56:56'),
(0, 'Jan Skalka', 'jan@ukf.sk', 'Skuska', 'Zajtra skuska', '2022-12-07 05:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `idOffer` int NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `minPrice` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  PRIMARY KEY (`idOffer`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`idOffer`, `title`, `minPrice`, `description`, `imageLink`) VALUES
(1, 'Offer 1', 120, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-1-720x480.jpg'),
(2, 'Offer 2', 135, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-2-720x480.jpg'),
(3, 'Offer 3', 145, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-3-720x480.jpg'),
(4, 'Offer 4', 170, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-4-720x480.jpg'),
(5, 'Offer 5', 210, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-5-720x480.jpg'),
(6, 'Offer 6', 255, 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'assets/images/offer-6-720x480.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
