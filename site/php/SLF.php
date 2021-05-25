<?php

    #STORE.PHP LOGIN FUNCTIONS


    include 'connection.php';
    session_start();
    $kadi=$_POST["kadi_txt"];
    $sifre=$_POST["sifre_txt"];

    $kadi = stripcslashes($kadi);
    $sifre = stripcslashes($sifre);
    $kadi=mysqli_real_escape_string($baglanti,$kadi);
    $sifre=mysqli_real_escape_string($baglanti,$sifre);


    $sorgu = mysqli_query($baglanti,"select * from magaza where magazaisim='$kadi' and magazasifre='$sifre'") or die("Sorgu çalıştırılamadı.".mysql_error());

    $kullanici = mysqli_fetch_array($sorgu);

    if($kullanici["magazaisim"] == $kadi && $kullanici["magazasifre"] == $sifre)
    {
        $_SESSION["m-check"]="dolu";
        $_SESSION["uye_adi"]=$kullanici["magazaisim"];
        $_SESSION["uye_id"]=$kullanici["magazaid"];
        header("location:index.php");
    }

    else
    {
        header("location:store_login.php?lg-durum=yanlis");
    }
?>