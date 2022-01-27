<?php

$sunucu = "localhost";
$kullanici = "root";
$parola = "1";
$veritabani = "adresrehberi";

$Baglanti = mysqli_connect($sunucu, $kullanici, $parola, $veritabani) or die("Bağlantı başarısız.");

mysqli_query($Baglanti, "SET NAMES 'UTF8'");



?>