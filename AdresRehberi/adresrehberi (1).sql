-- phpMyAdmin SQL Dump
-- version 5.0.0-rc1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 Ara 2019, 12:25:06
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `adresrehberi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresler`
--

CREATE TABLE `adresler` (
  `kno` int(11) NOT NULL,
  `k_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `k_parola` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `k_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyadi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dogum_tarihi` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayit_tarihi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `fotograf` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adresler`
--

INSERT INTO `adresler` (`kno`, `k_adi`, `k_parola`, `k_mail`, `adi`, `soyadi`, `adres`, `telefon`, `dogum_tarihi`, `kayit_tarihi`, `fotograf`) VALUES
(1, 'berat', '123', '', 'Berat', 'Kırdar', 'Kocaeli', '546 456 98 78', '13.06.2000', '1575550841', '_1575550841'),
(2, 'berat', '123', '', 'Berat', 'Kırdar', 'Kocaeli', '546 456 98 78', '13.06.2000', '1575550843', '_1575550843'),
(3, 'mustafa', '123', '', 'Mustafa', 'Arslan', 'Bursa', '321 456 78 98', '', '1575551189', '_1575551189'),
(4, 'oguzhan', '123', '', 'Oguzhan', 'Söğünmez', 'Bursa', '6547895', '11.20.2003', '1575551286', '_1575551286'),
(5, 'oguzhan', '123', '', 'Oguzhan', 'Söğünmez', 'Bursa', '6547895', '11.20.2003', '1575551360', '_1575551360'),
(6, 'yusuf', 'yusuf', '', 'yusuf', '', '', '', '', '1575551406', '_1575551406'),
(7, '', '', '', '', '', '', '', '', '1575551503', '_1575551503'),
(8, '', '', '', '', '', '', '', '', '1575551547', '_1575551547'),
(9, '', '', '', '', '', '', '', '', '1575551652', 'manzara resimleri3.jpg_1575551652'),
(10, 'Karpuz', '25f9e794323b453885f5181f1b624d0b', 'karpuz@hotmail.com', 'Karpuz', 'Kavun', 'Tarla', '5654567891', '12.12.2019', '1576156571', '4_1576156533.png'),
(11, '', '', '', '', '', '', '', '', '1575552510', 'manzara_resimleri3_1575552510.jpg'),
(12, '', '', '', '', '', '', '', '', '1575552598', 't_1575552598.h'),
(13, '', '', '', '', '', '', '', '', '1575552951', 't.h._(.1).jpgh_(_1575552951.h'),
(14, '', '', '', '', '', '', '', '', '1575553006', 't.h._(.1).jpgh_(1)_1575553006.jpg'),
(15, '', '', '', '', '', '', '', '', '1575553054', 't.h._(.1).jpgth_(1)_1575553054.jpg'),
(18, 'Berat', '123', 'kreyziboy_cilgincocuk@hotmail.com', 'Berat', 'Kırdar', 'Kocaeli', '61651654', '13.06.2000', '1575553387', 'th_(1)_1575553387.jpg'),
(19, 'mustafa', '234', 'kreyziboy_cilgincocuk@hotmail.com', 'Enes', 'Altun', 'Kocaeli', '9999999999', '13.06.2000', '1575553608', NULL),
(20, 'oguzhan', '202cb962ac59075b964b07152d234b70', 'kreyziboy_cilgincocuk@hotmail.com', 'Yusuf Can', 'Kırdar', 'Niğde', '9999999999', '13.06.2000', '1575553719', NULL),
(21, 'berat', '202cb962ac59075b964b07152d234b70', 'kreyziboy_cilgincocuk@hotmail.com', 'Berat', 'Kırdar', 'Kocaeli', '546 632 45 78', '13.06.2000', '1575887481', 'th_(1)_1575887481.jpg'),
(24, 'abdürrezzak', '202cb962ac59075b964b07152d234b70', '123@xn--biey-65a.com', 'Nisa', '', '', '', '', '1575889379', NULL),
(25, 'eray', '81dc9bdb52d04dc20036dbd8313ed055', 'erayertas@hotmail.com', 'eray', 'ertaş', 'nilüfer', '5353432312', '01.01.2000', '1576153530', '6cgynk_1576153530.jpg'),
(26, 'Berat2', '202cb962ac59075b964b07152d234b70', '456@gmail.com', '&lt;h1 style=\"color:red;\"&gt;Berat&lt;/h1&gt;', 'Kırdar', 'Kocaeli', '9999999999', '13.06.2000', '1576492813', '4_1576492813.png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresler`
--
ALTER TABLE `adresler`
  ADD PRIMARY KEY (`kno`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresler`
--
ALTER TABLE `adresler`
  MODIFY `kno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

