
<a href="index.php">Ana Sayfa</a> |
<a href="yeni-kayit.php">Yeni Kayıt</a> |
<a href="kayitlar.php">Kayıtlar</a> |
<a href="arama.php">Arama</a> |
<a href="cikis.php">Çıkış</a>
<?php
session_start();
echo "Hoşgeldiniz ".$_SESSION['adi']." ".$_SESSION['soyadi'];
?>
