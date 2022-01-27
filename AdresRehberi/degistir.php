<?php

require_once "vt.php";

include "menu.php";

if ($_POST){
    $kayitNo = $_POST['kayitno'];
    $k_ad = $_POST['k_ad'];
    if (empty($k_ad)){
        echo "Kullanıcı adı boş geçilemez lütfen bir değer giriniz.";
    }else{
        $k_ad_sorgu = "SELECT k_adi FROM adresler WHERE k_adi='$k_ad' AND kno!=$kayitNo";
        $k_ad_sonuc = mysqli_query($Baglanti,$k_ad_sorgu );//sonradan değiştirdik
        if (mysqli_num_rows($k_ad_sonuc) > 0){
            echo "$k_ad Adlı kullanıcı ismi zaten mevcut. Başka bir kullanıcı adı giriniz.";
            header("refresh:2; url=degistir.php?kno=$kayitNo");
        }else{
            $k_sifre = $_POST['k_sifre'];
            $k_eposta = $_POST['k_eposta'];
            if (empty($k_eposta)){
                echo "E-posta boş geçilemez.";
            }else{
                if(!empty($k_sifre)){
                $k_sifre = md5($_POST['k_sifre']);// md5() fonksiyonu şifreyi veritabanına md5 şifreleme algoritması ile kayıt ediyor.
                }
                $k_eposta_sonuc = mysqli_query($Baglanti, "SELECT k_mail FROM adresler WHERE k_mail='$k_eposta' AND kno!=$kayitNo");
                if (mysqli_num_rows($k_eposta_sonuc) > 0){
                    echo "$k_eposta Bu e-posta adresi zaten mevcut. Başka bir e-posta giriniz.";
                    header("refresh:2; url=yeni-kayit.php");
                }else{
                    $ad = $_POST['ad'];
                    $soyad = $_POST['soyad'];
                    $adresi = $_POST['adresi'];
                    $tel = $_POST['tel'];
                    $dtarihi = $_POST['dtarihi'];
                    $ktarihi = time();


                    if ($_FILES['foto']['name']!=""){
                        $foto = $_FILES['foto']['name']; // Yüklenen resmin adını alır. time() fonksiyonunu dosya isimleri aynı olmasın diye sonuna ekledik.

                        $foto_adi_bileseni = explode(".", $foto); //explode() Fotograf ismini noktalardan parçalamaya yarar.

                        $foto_adi_eleman_sayisi = count($foto_adi_bileseni);

                        $foto_adi="";
                        for ($x = 0; $x < $foto_adi_eleman_sayisi - 1 ; $x++){
                            $foto_adi .= $foto_adi_bileseni[$x];
                        }


                        $degisecek_karakterler = array("Ş","ş","İ","ı","Ü","ü","Ö","ö","Ç","ç"," ");
                        $yerine_gelecek_karakterler = array("S","s","I","i","U","u","O","o","C","c","_");

                        $foto = str_replace($degisecek_karakterler, $yerine_gelecek_karakterler, $foto_adi);

                        $foto = $foto."_".time().".".$foto_adi_bileseni[$foto_adi_eleman_sayisi-1];

                        $foto_gecici_kayit_yeri = $_FILES['foto']['tmp_name']; // Yüklenen resmin geçici kayıt yerini alır.
                        $fotograf_sorgusu = mysqli_query($Baglanti, "SELECT * FROM adresler WHERE fotograf='$foto'");
                        if ( mysqli_num_rows($fotograf_sorgusu) > 0 ){ //mysqli_num_rows fonksiyonu kaç tane kayıt olduğuna bakar.
                            echo "Bu dosya zaten mevcut.";
                        }

                        if(move_uploaded_file($foto_gecici_kayit_yeri, "fotograflar/$foto")){
                            $eskiFotografSorgusu = mysqli_query($Baglanti,"SELECT * FROM adresler WHERE kno=$kayitNo");
                            $eskiFotografAdi = mysqli_fetch_assoc($eskiFotografSorgusu);
                            unlink("fotograflar/".$eskiFotografAdi['fotograf']);//içerisine girilen bilgiyi silen(dosya siler, girilen her şeyi siler)
                        }
                    }

                    $kayit_sorgusu = "UPDATE adresler SET 
                      k_adi='$k_ad', ";
                      if($_POST['k_sifre'] != ""){
                      $kayit_sorgusu .= " k_parola='$k_sifre', ";
                      }
                      $kayit_sorgusu .= " k_mail='$k_eposta',
                      adi='$ad',
                      soyadi='$soyad',
                      adres='$adresi',
                      telefon='$tel',
                      dogum_tarihi='$dtarihi',
                      kayit_tarihi='$ktarihi' ";
                    if ($_FILES['foto']['name']!=""){
                        $kayit_sorgusu.=",fotograf='$foto'";
                    }
                    $kayit_sorgusu .= " WHERE kno=$kayitNo";

                    $kayit_sorgusu_sonucu = mysqli_query($Baglanti , $kayit_sorgusu);

                    if ($kayit_sorgusu_sonucu){
                        echo "<h1>Kayıt başarıyla değiştirildi.</h1>";
                        header("refresh:2;url=kayitlar.php");
                    }else{
                        echo "<h1>Hata! Kayıt değiştirilemedi.<br></h1>";
                    }
                }
            }




        }
    }




    //phpinfo();
}else{



    ?>

    <!doctype html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            form{
                margin-top: 50px;
            }
            input{
                margin: 10px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
<?php
    $kno = $_GET['kno'];
    $Sorgu = "SELECT * FROM adresler where kno=$kno";
    $sorguSonucu = mysqli_query($Baglanti,$Sorgu);
    $kayitlar = mysqli_fetch_assoc($sorguSonucu);
?>
    <form action="" method="post" enctype="multipart/form-data">
        <img src="fotograflar/<?php echo $kayitlar['fotograf']; ?>" width="150" height="150"><br>
        <input name="foto" type="file" placeholder="Fotoğrafınız"><br>
        <input name="k_ad" type="text" placeholder="Kullanıcı Adı" value="<?php echo $kayitlar['k_adi']; ?>"><br>
        <input name="k_sifre" type="password" placeholder="Kullanıcı Şifre">Şifrenizi değiştirmek istiyorsanız yazın, istemiyorsanız boş bırakın.<br>
        <input name="k_eposta" type="email" placeholder="Kullanıcı E-Posta" value="<?php echo $kayitlar['k_mail']; ?>"><br>
        <input name="ad" type="text" placeholder="Adınız" value="<?php echo $kayitlar['adi']; ?>"><br>
        <input name="soyad" type="text" placeholder="Soyadınız" value="<?php echo $kayitlar['soyadi']; ?>"><br>
        <input name="adresi" type="text" placeholder="Adresiniz" value="<?php echo $kayitlar['adres']; ?>"><br>
        <input name="tel" type="text" placeholder="Telefon Numaranız" value="<?php echo $kayitlar['telefon']; ?>"><br>
        <input name="dtarihi" type="text" placeholder="Doğum Tarihi" value="<?php echo $kayitlar['dogum_tarihi']; ?>"><br>
        <input type="hidden" name="kayitno" value="<?php echo $kayitlar['kno']; ?>" >
        <input type="submit" value="Kaydı Değiştir">


    </form>

    </body>
    </html>

    <?php
}
?>