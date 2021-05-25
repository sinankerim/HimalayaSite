<?php
    
    include "connection.php";
    session_start();
    include "satis_ekleme.php";
    //include "CN_UIF.php";
    
    
    
    if(isset($_GET["logout-check"]))
    {
        unset($_SESSION["uye_adi"]);
        unset($_SESSION["id"]);
        $_SESSION["m-check"]="";
        header("location:index.php");
    }
    
    
    
    
    $kid=$_SESSION["uye_id"];

    $s_veriler = mysqli_query($baglanti, "select s.siprarisid, s.adet, u.uisim,u.uid,k.isim,k.eposta,s.tarih,k.adres,d.durum,u.resim,sat.fiyat
    from siparis as s, magaza as m, satis as sat, kullanici as k,urun as u, durum as d
    where (s.sid=sat.satisid and m.magazaid=sat.mid and s.kid=k.id and sat.uid=u.uid and d.id=s.durum) and m.magazaid=$kid
    order by durum" );
    $siparisler=array();
    while($siparis = mysqli_fetch_assoc($s_veriler))
    {
        $siparisler[]=$siparis;
    }

    $veriler = mysqli_query($baglanti, "select u.resim, u.uisim, s.fiyat
    from magaza as m, satis as s, urun as u
    where m.magazaid=s.mid and s.uid=u.uid and m.magazaid=$kid" );
    $urunler=array();
    while($urun = mysqli_fetch_assoc($veriler))
    {
        $urunler[]=$urun;
    }


    $ue_veriler = mysqli_query($baglanti, "select uid,uisim,umarka,kategori_id,hakkinda,resim 
    from urun
    where uid NOT IN(select u.uid from urun as u, satis as s where u.uid=s.uid)" );
    $ue_urunler=array();
    while($ue_urun = mysqli_fetch_assoc($ue_veriler))
    {
        $ue_urunler[]=$ue_urun;
    }


    $kullanici_veriler = $baglanti->query("select * from magaza where magazaid=$kid");

    $row=$kullanici_veriler->fetch_assoc();


?>
<html>
    <head>
        <title></title>

        <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="CSS.css">
	<link rel="stylesheet" type="text/javascript" href="myJquery.js">
    <script src="https://kit.fontawesome.com/c8dadfc9a6.js" crossorigin="anonymous"></script>

<script src="jquery-3.6.0.min.js" > </script>

<script>
            
    $(document).ready(function(){
        
        //-------When you click on the "Ürünlerim" button-------------
        
        $('#store-products-btn').click(function(){

            $('#store-products').css({
                'display':'flex',
                'animation':'fade 1s linear'
            });
            
            $('#store-addProduct').css({
                'display':'none'
            });

            $('#store-orders').css({
                'display':'none'
            });

            $('#store-info').css({
                'display':'none',
            });
            
            $('#store-products-btn').css({
                'background-color':'#eee'
            });

            $('#store-addProduct-btn').css({
                'background-color':'#ccc'
            });

            $('#store-orders-btn').css({
                'background-color':'#ccc'
            });
            
            $('#store-info-btn').css({
                'background-color':'#ccc'
            });




        });

        // ----------------------When you click on the "Ürün Ekle" button----------------

        $('#store-addProduct-btn').click(function(){

            $('#store-products').css({
                'display':'none'
            });
            
            $('#store-addProduct').css({
                'display':'flex',
                'animation':'fade 1s linear'
            });

            $('#store-orders').css({
                'display':'none'
            });

            $('#store-info').css({
                'display':'none',
            });
            
            $('#store-products-btn').css({
                'background-color':'#ccc'
            });

            $('#store-addProduct-btn').css({
                'background-color':'#eee'
            });

            $('#store-orders-btn').css({
                'background-color':'#ccc'
            });
            
            $('#store-info-btn').css({
                'background-color':'#ccc'
            });




        });


        // -----------------------------When you click on the "Siparişler" button------------------------

        $('#store-orders-btn').click(function(){

            $('#store-products').css({
                'display':'none'
            });
            
            $('#store-addProduct').css({
                'display':'none'
            });

            $('#store-orders').css({
                'display':'block',
                'animation':'fade 1s linear'
            });

            $('#store-info').css({
                'display':'none',
            });
            
            $('#store-products-btn').css({
                'background-color':'#ccc'
            });

            $('#store-addProduct-btn').css({
                'background-color':'#ccc'
            });

            $('#store-orders-btn').css({
                'background-color':'#eee'
            });
            
            $('#store-info-btn').css({
                'background-color':'#ccc'
            });


            
            
            
        });
        
        //------------------------When you click on the "Bilgilerim" button----------------
        
        $('#store-info-btn').click(function(){

            $('#store-products').css({
                'display':'none'
            });
            
            $('#store-addProduct').css({
                'display':'none'
            });

            $('#store-orders').css({
                'display':'none'
            });

            $('#store-info').css({
                'display':'block',
                'animation':'fade 1s linear'
            });
            
            $('#store-products-btn').css({
                'background-color':'#ccc'
            });

            $('#store-addProduct-btn').css({
                'background-color':'#ccc'
            });

            $('#store-orders-btn').css({
                'background-color':'#ccc'
            });
            
            $('#store-info-btn').css({
                'background-color':'#eee'
            });




        });

    });    
    </script>

    </head>
<body>

<?php include 'top.php'; ?>

    <div id="store-container">

        <div id="store-left">
            <button id="store-products-btn">Ürünlerim</button>
            <button id="store-addProduct-btn">Ürün Ekle</button>
            <button id="store-orders-btn">Siparişler</button>
            <button id="store-info-btn">Bilgilerim</button>
            <button id="account-abort-session-btn" onclick="location.href='store.php?logout-check=something'">Hesaptan Ayrıl</button>
        </div>

        <div id="store-right">
            
            
                <div id="store-products">
            <?php foreach($urunler as $urunler){ ?>
                    <div class="search-product">
                        
                        <img src="<?php echo $urunler["resim"]; ?>">
                        
                        <div class="search-product-name"><?php echo $urunler["uisim"]; ?></div>
            
                        <div class="seach-product-price"><?php echo $urunler["fiyat"]; ?> TL</div>
            
                    </div>
            <?php } ?>    
                </div>

            <div id="store-addProduct">

                <div style="width:420px;">
                        <form action="CN_UIF.php" method="post" enctype="multipart/form-data">
                            <table style="margin:0px;">
                                    <tr>
                                        <td>Ürün İsmi:</td>
                                        <td><input class="login-txt-box" name="urun_isim" placeholder="Ürün ismi giriniz..." type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Marka:</td>
                                        <td><input class="login-txt-box" name="urun_marka" placeholder="Ürünün markasını giriniz..." type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori Id'si:</td>
                                        <td><input class="login-txt-box" name="urun_kategori_id" placeholder="Kategori id'si giriniz..." type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Ürün Açıklaması:</td>
                                        <td><textarea class="login-txt-box" name="urun_aciklama" placeholder="Açıklama giriniz..." id="post-comment-txt"></textarea></td>
                                    </tr>
                                    <tr>
                                            <td>Resim</td>
                                            <td><input type="file" name="file">
                                                <button name="submit" value="e" onclick="submitButtonClick(event)">Yükle...</button>
                                            </td>
                                    </tr>
                            </table>
                        </form>


                        <form method="POST">
                            <table style="border-top:1px solid black;">
                                            <tr>
                                                <td>Ürün id:</td>
                                                <td><input type="text" class="login-txt-box" name="s_uid" placeholder="Ürün id girin..."></td>
                                            </tr>
                                            <tr>
                                                <td>Fiyat: </td>
                                                <td><input type="text" class="login-txt-box" name="s_fiyat"placeholder="Ürün fiyatı girin..."></td>
                                            </tr>
                                            <tr>
                                                <td><input type="submit" value="Gönder"></td>
                                            </tr>
                            </table>
                        </form>

                </div>
                

                <div>
                    <ul>
                        
                        <?php foreach($ue_urunler as $ue_urunler ){ ?>
                            <li style="border:1px solid black; width:280px; list-style-type:none; padding:2px 5px; font-weight:bolder;"><?php echo "Ürün id: "."<span style='color:green;'>".$ue_urunler["uid"]."</span> // Ürün Adı: <span style='color:green;''>".$ue_urunler["uisim"]."</span>"; ?></li>
                        <?php } ?>
                    
                    
                    </ul>

                </div>



            </div>

            <div id="store-orders">
                <h3>Siparişlerim</h3>

                <?php foreach($siparisler as $siparisler){ ?>    
                    <div class="order">
                        <img src="<?php echo $siparisler["resim"]; ?>">

                        <span class="order-product_name"><?php echo $siparisler["uisim"]; ?></span>

                        <span class="order-price"> <?php echo $siparisler["fiyat"] ?> TL</span>

                        <span class="order-status"><?php echo $siparisler["durum"] ?></span>
                        <?php $siparisler["resim"]; ?>
                    </div>
                <?php } ?>
                
            </div>

            <div id="store-info">
                <h3>Mağaza Bilgileri</h3>
                
                <table style="font-size:22px; font-weight:500;">
                    <tr>
                        <td>Mağaza Adı: </td>
                        <td><input class="login-txt-box" style="font-size:22px;" type="text" value="<?php echo $row["magazaisim"]; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td>Mağaza Puanı: </td>
                        <td><input class="login-txt-box" style="font-size:22px;" type="text" value="<?php echo $row["rating"]; ?>" readonly></td>
                    </tr>


                    <tr>
                        <td>Adres: </td>
                        <td><input class="login-txt-box" style="font-size:22px;" type="text" id="account-info-address" placeholder="Adresinizi ekleyin!" value="<?php echo $row["adres"]; ?>"></td>
                    </tr>
                </table>
            </div>

            

        </div>
    </div>
</body>
</html>