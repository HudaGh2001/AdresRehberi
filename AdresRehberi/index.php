<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
include "menu.php";
if(!$_SESSION['oturum']){
    header("refresh:0;url=giris-yap.php");
    exit();//bulunduğu satırdan sonrasının çalışmasıın engelliyor
    //exit yerine die(); da kullanılabilir
}
/*setcookie("yusuf","10","60");
echo $_COOKIE['yusuf'];
*/
?>

</body>
</html>