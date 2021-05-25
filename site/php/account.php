<?php 
    
    include 'connection.php';
    
    session_start();
    
    if($_SESSION["uye_adi"]=="")
    {
        header("location:login.php");
    }

    if($_SESSION["m-check"]!="")
	{
        header("location:store.php");
	}

    if(isset($_GET["logout-check"]))
    {
        unset($_SESSION["uye_adi"]);
        header("location:index.php");

        //gizli inputun içine php verisini koy postla 
    }

    $k_id=$_SESSION["uye_id"];
    //echo $k_id;    

    $veriler = mysqli_query($baglanti, "select s.siprarisid, s.sid,u.uisim,u.resim, s.tarih, d.durum, s.adet, sat.fiyat from siparis as s, durum as d, satis as sat, urun as u where (d.id=s.durum and s.sid=sat.satisid and sat.uid=u.uid) and kid=$k_id" );

    
    
    $urunler=array();
    while($urun = mysqli_fetch_assoc($veriler))
    {
        $urunler[]=$urun;
    }

    # FOR COMMENTS TO LOAD

    
    $yorum_veriler=mysqli_query($baglanti, "select u.uisim, uy.puan, uy.yorum from urunyorumlari as uy, kullanici as k, urun as u where (uy.kullaniciid=k.id and uy.urunid=u.uid) and k.id=$k_id");

    $yorumlar=array();
    while ($yorum = mysqli_fetch_assoc($yorum_veriler))
    {
        $yorumlar[]=$yorum;
    }


    # FOR ACCOUNT INFOS TO LOAD

    $kullanici_veriler = $baglanti->query("select isim,eposta,adres from kullanici where id=$k_id");

    $row=$kullanici_veriler->fetch_assoc();

    




?>


<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="CSS.css">
        <script src="jquery-3.6.0.min.js" > </script>
        
        <script>
            
        $(document).ready(function(){
            
            //-------When you click on the "Siparişlerim" button-------------
            
            $('#account-orders-btn').click(function(){

                $('#account-comments').css({
                    'display':'none'
                });

                $('#account-info').css({
                    'display':'none'
                });

                $('#account-orders').css({
                    'display':'block',
                    'animation':'fade 1s linear'
                });

                $('#account-comments-btn').css({
                    'background-color':'#ccc'
                });

                $('#account-info-btn').css({
                    'background-color':'#ccc'
                });

                $('#account-orders-btn').css({
                    'background-color':'#eee'
                });

            });

            //---------------------When you click on the "Yorumlarım" button---------------------

            $('#account-comments-btn').click(function(){

                $('#account-comments').css({
                    'display':'block',
                    'animation':'fade 1s linear'
                });

                $('#account-info').css({
                    'display':'none'
                });

                $('#account-orders').css({
                    'display':'none'
                });

                $('#account-comments-btn').css({
                    'background-color':'#eee'
                });

                $('#account-info-btn').css({
                    'background-color':'#ccc'
                });

                $('#account-orders-btn').css({
                    'background-color':'#ccc'
                });
  
            });
            
            // -------------------------When you click on the "Bilgilerim" button----------------------
            
            $('#account-info-btn').click(function(){

                $('#account-comments').css({
                    'display':'none'
                });

                $('#account-info').css({
                    'display':'block',
                    'animation':'fade 1s linear'
                });

                $('#account-orders').css({
                    'display':'none'
                });

                $('#account-comments-btn').css({
                    'background-color':'#ccc'
                });

                $('#account-info-btn').css({
                    'background-color':'#eee'
                });

                $('#account-orders-btn').css({
                    'background-color':'#ccc'
                });

            });


            // -----------------------ÇORBA-------------------

            /*$("#deneme-butonu").click(function(){

            $.ajax({
                type: 'POST',
                url: 'ajax-tries.php',
                success: function(data) 
                {
                    alert(data);
                    //$("p").text(data);
                }
            });*/

        });    
        </script>

    </head>
<body>


<?php include 'top.php'; ?>
        
    <div id="account-container">
        
        <!-- ---------------BUTTONS-------------------->

        <div id="account-left">
            <button id="account-orders-btn">Siparişlerim</button>
            <button id="account-comments-btn">Yorumlarım</button>
            <button id="account-info-btn">Bilgilerim</button>
            <button id="account-abort-session-btn" onclick="location.href='account.php?logout-check=something'">Hesaptan Ayrıl</button>
        </div>

        <!-- ---------------BUTTONS-------------------->

        <div id="account-right">
            <div id="account-orders">
                <h3>Siparişlerim</h3>

                <?php foreach($urunler as $urunler){?>


                    <div class="order">
                        <img src="<?php echo $urunler["resim"]; ?>">

                        <span class="order-product_name"><?php echo $urunler['uisim']; ?></span>

                        <span class="order-price"> <?php echo $urunler['fiyat']; ?> TL</span>

                        <span class="order-status"><?php echo $urunler['durum']; ?></span>
                    </div>

                <?php } ?>

                    <div class="order">
                        <img src="images/urun.jpg">

                        <span class="order-product_name"> Tek bu görünüyorsa siparişi yok demektir</span>

                        <span class="order-price"> Fiyat</span>

                        <span class="order-status">Sipariş Durumu</span>
                    </div>

                

            </div>
            
            <div id="account-info">
                <h3>Kullanıcı Bilgileri</h3>
                
                <table style="font-size:22px; font-weight:500;">
                <tr>
                    <td>Ad: </td>
                    <td><input class="login-txt-box" style="font-size:22px;" type="text" value="<?php echo $row["isim"]; ?>"></td>
                </tr>
                
                <tr>
                    <td>E-Posta: </td>
                    <td><input class="login-txt-box" style="font-size:22px;" type="text" value="<?php echo $row["eposta"]; ?>"></td>
                </tr>

                <!-- <tr>
                    <td>Doğum Tarihi: </td>
                    <td><input type="text" value=""></td>
                </tr> -->

                <tr>
                    <td>Adres: </td>
                    <td><input class="login-txt-box" style="font-size:22px;" type="text" id="account-info-address" placeholder="Adresinizi ekleyin!" value="<?php echo $row["adres"]; ?>"></td>
                </tr>
                </table>
                <!--Ad: <input type="text" value=""><br>
                <br>
                E-Posta: <input type="text" value=""><br>
                <br>
                Doğum Tarihi: <input type="text" value=""><br>
                <br>
                Adres: <input type="text" placeholder="Adresinizi ekleyin!">
                -->
            </div>

            <div id="account-comments">
                <div id="account-comment">
					
                    <?php foreach ($yorumlar as $yorumlar) 
                    
                    { 

                    ?>
                    

                        <div id="comment-section">
    						<span style="font-weight: 600;"><?php echo $yorumlar["uisim"]; ?></span><br>
    						<br>
    						<?php echo $yorumlar["yorum"]; ?>
    						<br>
    					</div>


                    <?php }

                    ?>
    					
				</div>
            </div>

        </div>
    </div>

    <?php include 'featured.php'; ?>


</body>
</html>