<?php
session_start();
session_destroy();//session'u sonlandırır.
header("refresh:0;url=giris-yap.php");
?>