

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            margin-top: 50px;
            margin-left: 50px;
        }
        input{
            font-size: 30px;
        }
    </style>
</head>
<body>

<?php

include "menu.php";

if(!$_SESSION['oturum']){
    header("refresh:0;url=giris-yap.php");
    exit();//bulunduğu satırdan sonrasının çalışmasıın engelliyor
    //exit yerine die(); da kullanılabilir
}
?>

<form action="" method="post">

    <input type="text" name="ara" placeholder="Aranacak İfade">

    <input type="submit" value="Ara">

</form>


<?php

if ($_POST) {

    require_once "vt.php";

    $Aranacak_Kelime = htmlspecialchars(addslashes(trim($_POST['ara'])));


    $Sorgu = "SELECT * FROM adresler WHERE adi like '%$Aranacak_Kelime%' or soyadi like '%$Aranacak_Kelime%' or adres like '%$Aranacak_Kelime%' or telefon like '%$Aranacak_Kelime%'";

    $Sorgu_Sonucu = mysqli_query($Baglanti, $Sorgu);

    echo "<table border='1'>";
    echo "<tr>
        <th>Adı</th>
        <th>Soyadı</th>
        <th>Adresi</th>
        <th>Telefon</th></tr>
        ";
    while($Kayitlar = mysqli_fetch_assoc($Sorgu_Sonucu)){
        echo "<tr>
            <td>{$Kayitlar['adi']}</td>
            <td>{$Kayitlar['soyadi']}</td>
            <td>{$Kayitlar['adres']}</td>
            <td>{$Kayitlar['telefon']}</td>
            </tr>
        ";
    }
    echo "</table>";

    echo "$Sorgu";

}


?>



</body>
</html>