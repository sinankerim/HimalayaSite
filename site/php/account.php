<?php 
    
    session_start();
    if($_SESSION["uye_adi"]=="")
    {
        header("location:index.php");
    }
    function session_stp()
    {
        
        if(session_status() == PHP_SESSION_NONE){

            session_unset($_SESSION["uye_adi"]);
            
            header("location:index.php");

		}
        else echo "gae";
    }
    
    if(isset($_GET["logout-check"]))
    {
        session_unset($_SESSION["uye_adi"]);
    }

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

        });    
        </script>

    </head>
<body>



<?php include 'top.php'; ?>
        <?php
            if(!isset($_SESSION["uye_adi"]))
            {
                header("location:index.php");
            }
        ?>
    <div id="account-container">
        <div id="account-left">
            <button id="account-orders-btn">Siparişlerim</button>
            <button id="account-comments-btn">Yorumlarım</button>
            <button id="account-info-btn">Bilgilerim</button>
            <button id="account-abort-session-btn" onclick="location.href='account.php?logout-check=something'">Hesaptan Ayrıl</button>
        </div>

        <div id="account-right">
            <div id="account-orders">
                <h3>Siparişlerim</h3>

                <div class="order">
                    <img src="images/urun.jpg">

                    <span class="order-product_name"> Ürün Adı</span>

                    <span class="order-price"> Fiyat</span>

                    <span class="order-status">Sipariş Durumu</span>
                </div>

                <div class="order">
                    <img src="images/urun.jpg">

                    <span class="order-product_name"> Ürün Adı</span>

                    <span class="order-price"> Fiyat</span>

                    <span class="order-status">Sipariş Durumu</span>
                </div>

            </div>
            
            <div id="account-info">
                <h3>Kullanıcı Bilgileri</h3>
                
                <table style="font-size:22px; font-weight:500;">
                <tr>
                    <td>Ad: </td>
                    <td><input type="text" value=""></td>
                </tr>
                
                <tr>
                    <td>E-Posta: </td>
                    <td><input type="text" value=""></td>
                </tr>

                <tr>
                    <td>Doğum Tarihi: </td>
                    <td><input type="text" value=""></td>
                </tr>

                <tr>
                    <td>Adres: </td>
                    <td><input type="text" id="account-info-address" placeholder="Adresinizi ekleyin!"></td>
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
					<div id="comment-section">
						<span style="font-weight: 600;">Ürün Adı</span><br>
						<br>
						Yorum
						<br>
					</div>
					
				</div>
            </div>

        </div>
    </div>

    <?php include 'featured.php'; ?>


</body>
</html>