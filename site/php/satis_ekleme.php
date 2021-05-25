<?php
    if(isset($_POST["s_uid"]) && isset($_POST["s_fiyat"]))
    {
    $satis_uid=$_POST["s_uid"];
    $satis_fiyat=$_POST["s_fiyat"];
    $satis_mid=$_SESSION["uye_id"];

    $sql = mysqli_query($baglanti,"INSERT INTO satis (satisid, mid, uid, fiyat, garanti, indirim) values(NULL, $satis_mid, $satis_uid, $satis_fiyat, 2, NULL)");
    
    unset($_POST["s_uid"]);
    unset($_POST["s_fiyat"]);
    }
?>