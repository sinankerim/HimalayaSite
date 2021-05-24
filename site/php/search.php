<?php 
include 'connection.php';

$metin = $_GET["s_text"];
$veriler = mysqli_query($baglanti, "select u.uisim, u.resim, sat.fiyat, m.magazaisim from satis as sat, urun as u, magaza as m where (sat.uid=u.uid and sat.mid=m.magazaid) and ((u.uisim like '%$metin%' or u.hakkinda like '%$metin%' or m.magazaisim like '%$metin%'))" );
$urunler=array();
while($urun = mysqli_fetch_assoc($veriler))
{
    $urunler[]=$urun;
}



?>


<html>
<head>
    <title></title>

	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="CSS.css">
	<link rel="stylesheet" type="text/javascript" href="myJquery.js">
    <script src="https://kit.fontawesome.com/c8dadfc9a6.js" crossorigin="anonymous"></script>

<script src="jquery-3.6.0.min.js" > </script>

</head>
<body>

<?php include 'top.php'; ?>

    <div id="color-belt">
        <div id="belt-2"></div>
        <div id="belt-3"></div>
        <div id="belt-4"></div>
        <div id="belt-5"></div>
        <div id="belt-6"></div>
        <div id="belt-7"></div>
    </div>
    
    <div id="menum">
        <ul>
            <li><a href="#"> Ev Eşyaları </a></li>
            <li>
                <a href="#"> Bilgisayar, Elektronik </a>

                <!--
                    <div class="downmenu">
                            <div class="sol">
                                <h3>haydiburada.com</h3><br>
                                Deneme<br>
                                deneme<br>
                            </div>
                    </div>
                -->

            </li>
            <li><a href="#"> Bahçe </a></li>
            <li><a href="#"> Çocuk,Bebek </a></li>
            <li><a href="#"> Bay,Bayan Giyim </a></li>
            <li><a href="#"> Kitap, Müzik, Film, Hobi</a></li>
        </ul>
    </div>

    <div id="color-belt">
        <div id="belt-7"></div>
        <div id="belt-6"></div>
        <div id="belt-5"></div>
        <div id="belt-4"></div>
        <div id="belt-3"></div>
        <div id="belt-2"></div>
    </div>

    <div id="search-container">
        
        <?php include 'PLF.php';?>

        


    </div>

    <?php include 'featured.php'; ?>


</body>
</html>