<?php
require_once "vt.php";
$Kno = $_GET['kno'];
$Sorgu = "DELETE FROM adresler  WHERE kno=$Kno";
$sil = mysqli_query($Baglanti,$Sorgu);
if($sil){
    echo "Kayıt Silindi.";
    header("refresh:2;url=kayitlar.php");
}
else{
    echo "HATA!!Kayıt Silinemedi.";
}
?>

