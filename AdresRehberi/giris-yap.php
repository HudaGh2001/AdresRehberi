<?php
if($_POST){
    require_once "vt.php";

    session_start();//sesion'ı başlatır.

    $k_adi = $_POST['k_adi'];
    $k_parola = md5($_POST['k_parola']);//

    $Sorgu = "SELECT * FROM adresler WHERE k_adi='$k_adi' and k_parola='$k_parola'";

    $SorguSonucu = mysqli_query($Baglanti,$Sorgu);



    if(mysqli_num_rows($SorguSonucu) > 0){

        $Kayitlar = mysqli_fetch_assoc($SorguSonucu);

        $_SESSION['oturum'] = true;
        $_SESSION['adi'] = $Kayitlar['adi'];
        $_SESSION['soyadi'] = $Kayitlar['soyadi'];
        header("refresh:0;url=index.php");
    }
    else{
        echo "Kullancı adı veya parolanız hatalı.";
        header("refresh:2;url=giris-yap.php");
    }
}
else{
    ?>
    <!doctype html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Giriş Yap</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    </head>
    <body>

    <form action="" method="post" class="w-25 mx-auto" style="margin-top: 20%;">

        <fieldset class="border p-4 rounded">

            <legend style="width: 60%;" class="text-right border mx-auto shadow rounded py-1"><h4 class="text-center ">Giriş Yap</h4></legend>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input class="form-control" name="k_adi" type="text" placeholder="Kullanıcı Adı" required>
            </div>

            <br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input class="form-control" name="k_parola" type="password" placeholder="Şifre" required>
            </div>

            <br>

            <input class="form-control btn btn-success" type="submit" value="Giriş Yap">
            <br><br>
            <!-- <p>Üye olmak ister misin?<br> <a href="kayit-ol.php">Kayıt Ol</a></p> -->

        </fieldset>

    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
    </html>
<?php
}
?>
