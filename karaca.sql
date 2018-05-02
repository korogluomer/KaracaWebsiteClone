-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2018, 19:18:22
-- Sunucu sürümü: 10.1.30-MariaDB
-- PHP Sürümü: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `karaca`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`BrandID`, `BrandName`) VALUES
(2, 'EMSAN'),
(1, 'KARACA');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `GroupsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `GroupsID`) VALUES
(2, 'YEMEK TAKIMLARI', 6),
(3, 'KAHVALTI TAKIMLARI', 6),
(4, 'ÇATAL KAŞIK BIÇAK TAKIMI', 6),
(5, 'ÇAY KAHVE PASTA TAKIMLARI', 6),
(6, 'SOFRA SERVİS', 6),
(7, 'TEKLİ ÜRÜNLER', 6),
(8, 'PİŞİRME', 7),
(9, 'MUTFAK GEREÇLERİ', 7),
(10, 'CUTLERY', 7),
(11, 'İÇECEK HAZIRLAMA', 7),
(12, 'ELEKTRİKLİ ÜRÜNLER', 8),
(13, 'GIDA PAZARLAMA', 8),
(14, 'YATAK ODASI', 9),
(15, 'BANYO', 9),
(16, 'MASA ÖRTÜLERİ', 9),
(17, 'BEBEK GENÇ', 9),
(18, 'SOFRA AKSESUARI', 10),
(19, 'DEKORATİF AKSESUARLAR', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `member`
--

CREATE TABLE `member` (
  `Mid` int(11) NOT NULL,
  `Mail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Mad` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Msoyad` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Msifre` varchar(12) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Madres` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Mfavori` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `member`
--

INSERT INTO `member` (`Mid`, `Mail`, `Mad`, `Msoyad`, `Msifre`, `Madres`, `Mfavori`) VALUES
(2, 'omerotobot@gmail.com', 'ömer', 'köroğlu', 'e10adc3949ba', '', ''),
(7, 'sadas@gmail.com', 'omer', 'dsada', 'bc85c363e9d6', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `Pid` int(11) NOT NULL,
  `Padi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `Pfiyat` double NOT NULL,
  `Pstok` int(11) NOT NULL,
  `Presim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Pindirim` tinyint(1) NOT NULL DEFAULT '0',
  `Pindirimy` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `SubCategoryID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_groups`
--

CREATE TABLE `product_groups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `product_groups`
--

INSERT INTO `product_groups` (`GroupID`, `GroupName`) VALUES
(6, 'SOFRA GRUBU'),
(7, 'MUTFAK GRUBU'),
(8, 'KÜÇÜK EV ALETLERİ'),
(9, 'EV TEKSTİLİ'),
(10, 'AKSESUARLAR');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sub_category`
--

CREATE TABLE `sub_category` (
  `SubCategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sub_category`
--

INSERT INTO `sub_category` (`SubCategoryID`, `SubCategoryName`, `CategoryID`) VALUES
(1, '12 Kişilik Yemek Takımları', 2),
(2, '6 Kişilik Yemek Takımları', 2),
(3, '4 Kişilik Yemek Takımları', 2),
(4, 'Mama Takımları', 2),
(5, '6 Kişilik Kahvaltı Takımı', 3),
(6, 'Kahvaltılık', 3),
(7, '12 Kişilik Çatal Kaşık Bıçak Takımı', 4),
(8, '6 Kişilik Çatal Kaşık Bıçak Takımı', 4),
(9, 'Çay Kaşığı', 4),
(13, 'Tekli Yemek Çkb', 4),
(14, 'Tekli Tatlı Çkb', 4),
(15, 'Pasta Takımı', 5),
(16, 'Çay Fincan Takımı', 5),
(17, 'Kahve Fincan Takımı', 5),
(18, 'Mug-Kupa', 5),
(19, 'Çay Bardağı', 5),
(20, 'Çay Seti', 5),
(21, 'Kurabiyelik', 5),
(22, 'Kek Servis', 5),
(23, 'Çerezlik', 6),
(24, 'Kase', 6),
(25, 'Servis Tabağı', 6),
(26, 'Bardak/Bardak Seti', 6),
(27, 'Baharatlık/Baharatlık Takımı', 6),
(28, 'Sürahi', 6),
(29, 'Meyvelik', 6),
(30, 'Yağlık-Sirkelik', 6),
(31, 'Tepsi', 6),
(32, 'Tuzluk-Biberlik', 6),
(33, 'Kahvaltı Tabağı', 7),
(34, 'Kaseler', 7),
(35, 'Kayık Tabak', 7),
(36, 'Pasta Tabağı', 7),
(37, 'Servis Tabağı', 7),
(38, 'Tabak Seti', 7),
(39, 'Çukur Tabak', 7);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`),
  ADD UNIQUE KEY `BrandName` (`BrandName`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Tablo için indeksler `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Mid`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Pid`);

--
-- Tablo için indeksler `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Tablo için indeksler `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`SubCategoryID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `member`
--
ALTER TABLE `member`
  MODIFY `Mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
