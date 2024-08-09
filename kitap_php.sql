-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Ağu 2024, 07:55:11
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitap_php`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_adi` varchar(100) NOT NULL,
  `admin_sifre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_adi`, `admin_sifre`) VALUES
('Admin', 2222);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `resim` varchar(100) NOT NULL,
  `yayinevi` varchar(100) NOT NULL,
  `tur` varchar(100) NOT NULL,
  `yazar` varchar(100) NOT NULL,
  `ucret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `isim`, `resim`, `yayinevi`, `tur`, `yazar`, `ucret`) VALUES
(1, 'faiz lobisi', 'https://img.kitapyurdu.com/v1/getImage/fn:299193/wh:true/wi:800', 'A yayınevi', 'finans', 'süleyman yaşar', 73),
(2, 'mühendis ve hayat', 'https://img.kitapyurdu.com/v1/getImage/fn:11141188/wh:true/wi:800', 'B yayınevi', 'edebiyat', 'yusuf tosun', 63),
(3, 'temel ilkeler', 'https://img.kitapyurdu.com/v1/getImage/fn:11903895/wh:true/wi:800', 'C yayınevi', 'edebiyat', 'ali ünal', 550);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
