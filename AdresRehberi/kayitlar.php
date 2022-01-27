<?php
require_once "vt.php";
require_once "menu.php";
if(!$_SESSION['oturum']){
    header("refresh:0;url=giris-yap.php");
    exit();//bulunduğu satırdan sonrasının çalışmasıın engelliyor
    //exit yerine die(); da kullanılabilir
}
$sorgu = "Select * from adresler";
$sorgu_sonucu = mysqli_query($Baglanti, $sorgu);

echo "<table border='1'>";
echo "<tr>
    <th>SN</th>
    <th>Adı</th>
    <th>Soyadı</th>
    <th>Telefon</th>
    <th>Doğum Tarihi</th>
    <th colspan='2'>İşlemler</th>";

echo "</tr>";
$sayi=1;
while($kayitlar = mysqli_fetch_assoc($sorgu_sonucu)) {
    echo "<tr>";
    echo "<td>".$sayi."</td>";
    echo "<td>".$kayitlar['adi']."</td>";
    echo "<td>".$kayitlar['soyadi']."</td>";
    echo "<td>".$kayitlar['telefon']."</td>";
    echo "<td>".$kayitlar['dogum_tarihi']."</td>";
    echo "<td><a href='degistir.php?kno=".$kayitlar['kno']."'>Değiştir</a></td>";
    echo "<td><a href='sil.php?kno=".$kayitlar['kno']."' onclick='return confirm(\"Silmek istediğinizden emin misiniz?\");'>Sil</a></td>";
    echo "</tr>";
    $sayi++;
}
echo"</table>";
