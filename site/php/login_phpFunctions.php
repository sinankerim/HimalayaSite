<?php
    include 'connection.php';
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

<!--   -------------------------------------------------Register--------------------------------------- -->

<?php
    $r_isim=$_POST["isim"];
    $r_email=$_POST["email"];
    $r_sifre=$_POST["sifre"];


    /*$sorgu = mysqli_query($baglanti,"insert into kullanici (eposta, sifre, isim, yas) select $r_email, $r_sifre, $r_isim, 15 from dual where NOT EXISTS(select * from kullanici where eposta=$r_email)");
    header("location:login.php");*/

    $sql="insert into kullanici (eposta, sifre, isim, yas) select '$r_email', '$r_sifre', '$r_isim', 20 from dual where NOT EXISTS(select * from kullanici where eposta='$r_email')";

    if($baglanti->query($sql) === TRUE)
    {
        echo "kayot başarıyla eklendi";
    }
    else
    {
        echo "NOLUYO LAĞN! KİM LAN BU";
    }
?>