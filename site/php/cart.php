<?php
    include "connection.php";

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if($_SESSION["uye_adi"]=="")
    {
        header("location:login.php");
    }

    $k_id=$_SESSION["uye_id"];

    $veriler = mysqli_query($baglanti, "select u.resim, u.uisim, m.magazaisim, sat.fiyat
    from liste as l, satis as sat, urun as u, magaza as m
    where (l.satid=sat.satisid and sat.uid=u.uid and sat.mid=m.magazaid) and kid=$k_id and liste='sepet'" );
    $urunler=array();
    while($urun = mysqli_fetch_assoc($veriler))
    {
        $urunler[]=$urun;
    }

    $a=0;
    $shipmentP=10;
    #satır sayısı
    $s_sayi=mysqli_num_rows($veriler);
    

?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="CSS.css" type="text/css">
        <script src="https://kit.fontawesome.com/c8dadfc9a6.js" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php include 'top.php'; ?>
                <div id="new-color-belt">
			<div id="nc-belt"></div>
		        </div>

        <div id="cart-container">
            <div id="cart-content">
                <span id="cart-top-info">Sepetim <span id="cart-quantity-sum"><?php echo $s_sayi; ?> ürün</span></span>
                <?php foreach($urunler as $urunler) { ?>
                    <div class="cart-product">
                        <img src="<?php echo $urunler["resim"];?>">

                        <div class="cart-product-info">
                            <span class="product_name"><?php echo $urunler["uisim"]; ?></span></br>
                            Satıcı <span class="store_name"><?php echo $urunler["magazaisim"] ?></span></br>
                            <span class="price"><?php echo $urunler["fiyat"]; ?></span> TL
                        </div>
                        <?php
                            $b=$urunler["fiyat"];
                            $a=$a+$b;
                        ?>
                        <div class="cart-product-quantity">
                            <button class="quantityUp-btn"><i class="fas fa-plus"></i></button>
                            <input type="text" value="1">
                            <button class="quantityDown-btn"><i class="fas fa-minus"></i></button>
                        </div>

                    </div>
                <?php } ?>
                

            </div>
            <div id="cart-info">
                <span>ÖDENECEK TUTAR</span>
                <div><span id="cart-info-sumPrice_wshipment"><?php echo $a+$shipmentP; ?></span> TL</div>
                <button id="cart-info-continue-btn">Alışverişi tamamla</button></br>
                <div id="cart-info-details">
                    <div id="cart-info-details-shipment"><div>Kargo</div><div><span id="shipment_price"><?php echo $shipmentP; ?></span> TL</div></div>
                    <div id="cart-info-details-sum"><div>Ürünler</div><div><span id="cart-info-sumPrice"><?php echo $a; ?></span> TL</div></div>
                </div>
            </div>
        </div>

        <?php include 'featured.php'; ?>
            
    </body>
</html>