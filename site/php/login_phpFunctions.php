<?php
    $baglanti = new mysqli("localhost","root","","proje_database");
    session_start();
    $kadi=$_POST["kadi_txt"];
    $sifre=$_POST["sifre_txt"];

    $kadi = stripcslashes($kadi);
    $sifre = stripcslashes($sifre);
    $kadi=mysqli_real_escape_string($baglanti,$kadi);
    $sifre=mysqli_real_escape_string($baglanti,$sifre);


    $sorgu = mysqli_query($baglanti,"select * from kullanici where eposta='$kadi' and sifre='$sifre'") or die("Sorgu çalıştırılamadı.".mysql_error());

    $kullanici = mysqli_fetch_array($sorgu);

    if($kullanici["eposta"] == $kadi && $kullanici["sifre"] == $sifre)
    {
        $_SESSION["uye_adi"]=$kullanici["isim"];
        $_SESSION["uye_id"]=$kullanici["id"];
        header("location:index.php");
    }

    else
    {
        header("location:login.php?lg-durum=yanlis");
    }


?>