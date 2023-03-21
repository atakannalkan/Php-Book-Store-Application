-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Mar 2023, 17:07:05
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bookapp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `authorName` varchar(50) NOT NULL,
  `pageCount` smallint(6) NOT NULL,
  `language` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `imageUrl` varchar(50) NOT NULL,
  `isApproved` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `book`
--

INSERT INTO `book` (`id`, `title`, `authorName`, `pageCount`, `language`, `price`, `barcode`, `imageUrl`, `isApproved`, `createdDate`) VALUES
(29, 'Yazılım Güvenliği', 'Bünyamin Demir', 452, 'Türkçe', 210, '111', 'yazilim.jpg', 1, '2023-01-11 21:48:41'),
(30, 'Python Sıfırdan Uzmanlığa Programlama', 'Atıl Samancığlu', 520, 'Türkçe', 108, '112', 'yazilim_2.jpg', 1, '2023-01-11 21:51:09'),
(31, 'Yeni Başlayanlar için JavaScript', 'Fahrettin Erdinç', 304, 'Türkçe', 3, '113', 'yazilim_3.jpg', 1, '2023-01-11 21:51:24'),
(32, 'Yazılım Mühendisliğine Giriş', 'Timur Karaçay ', 360, 'Türkçe', 91, '114', 'yazilim_4.jpg', 1, '2023-01-11 21:51:38'),
(33, 'Yeni Başlayanlar için Web Geliştirme', 'Fahrettin Erdinç', 520, 'Türkçe', 101, '115', 'yazilim_5.jpg', 1, '2023-01-11 21:51:50'),
(34, 'Siber Güvenlik', 'İlker Ertuğrul', 400, 'Türkçe', 94, '116', 'siber_guvenlik.jpg', 1, '2023-01-11 21:52:58'),
(35, 'Arka Kapı Siber Güvenlik Dergisi', 'Arka Kapı', 82, 'Türkçe', 36.99, '117', 'siber_guvenlik_2.jpg', 1, '2023-01-11 21:53:09'),
(36, 'Siber Güvenlik ve Sızma Testi', 'Hilmi Bilici', 288, 'Türkçe', 102, '118', 'siber_guvenlik_3.jpg', 1, '2023-01-11 21:53:21'),
(37, 'Uygulamalı Siber Güvenlik ve Hacking', 'Mustafa Altınkaynak ', 288, 'Türkçe', 97, '119', 'siber_guvenlik_4.jpg', 1, '2023-01-11 21:53:35'),
(38, 'Siber Güvenlik Terimleri Sözlüğü', 'Mustafa Atakan Kasacı ', 144, 'Türkçe', 70, '1110', 'siber_guvenlik_5.jpg', 1, '2023-01-11 21:53:47'),
(39, 'Yeni Dünyada Tesla-Bilim ve Gelecek', 'Ürün Dirier', 308, 'Türkçe', 70, '111', 'bilim.jpg', 1, '2023-01-11 22:15:17'),
(40, 'İzafiyet Teorisi: Görelilik Kuramı', 'Albert Einstein', 144, 'Türkçe', 28, '1112', 'bilim_2.jpg', 1, '2023-01-11 22:15:29'),
(41, 'Elon Musk Geleceğin Mimarı', 'İkilem Yayınevi', 144, 'Türkçe', 56.99, '1113', 'bilim_3.jpg', 1, '2023-01-11 22:15:42'),
(42, 'Big Bang ve Tanrı', 'Caner Taslaman', 45, 'Türkçe', 256, '1114', 'bilim_4.jpg', 1, '2023-01-11 22:15:56'),
(43, 'Modern Bilim Felsefe ve Tanrı', 'Caner Taslaman ', 148, 'Türkçe', 35, '1115', 'bilim_5.jpg', 1, '2023-01-11 22:16:07'),
(44, 'Elon Musk', 'İclal Akşamoğlu', 96, 'Türkçe', 69.99, '1116', 'bilim_6.jpg', 1, '2023-01-11 22:16:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bookcategory`
--

CREATE TABLE `bookcategory` (
  `bookId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bookcategory`
--

INSERT INTO `bookcategory` (`bookId`, `categoryId`) VALUES
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Yazılım', 'Yazılım Kategorisine Dair Her Şeyi Bu Kategoride Bulabilirsiniz..'),
(2, 'Siber Güvenlik', 'Siber Güvenlik Kategorisine Dair Her Şeyi Bu Kategoride Bulabilirsiniz..'),
(5, 'Bilim', 'Bilim Kategorisine Dair Her Şeyi Bu Kategoride Bulabilirsiniz.. ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `email`, `password`, `createdDate`, `role`) VALUES
(15, 'K1 İsim', 'K1 Soyisim', 'k1_username', 'k1mail@gmail.com', 'atakan1', '2023-01-11 23:45:38', 'user'),
(16, 'K2 İsim', 'K2 Soyisim', 'k2_username', 'k2mail@gmail.com', 'atakan1', '2023-01-11 23:45:56', 'user'),
(17, 'Atakan', 'Alkan', 'admin', 'admin@gmail.com', 'atakan1', '2023-01-11 23:46:12', 'admin');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`bookId`,`categoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usename` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD CONSTRAINT `bookcategory_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `bookcategory_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
