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
                'display':'block',
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
        </div>

        <div id="store-right">
            
            <div id="store-products">
                <div class="search-product">
                    
                    <img src="images/urun.jpg">
                    
                    <div class="search-product-name">Ürün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün AdıÜrün Adı</div>
        
                    <div class="seach-product-price">Ürün Fiyatı</div>
        
                    <div><button class="search-addToCart-btn">Sepete Ekle</button></div>
                </div>
            </div>

            <div id="store-addProduct">
                store-addProduct
            </div>

            <div id="store-orders">
                <h3>Siparişlerim</h3>

                <div class="order">
                    <img src="images/urun.jpg">

                    <span class="order-product_name"><?php product_name ?> Ürün Adı</span>

                    <span class="order-price"><?php price ?> Fiyat</span>

                    <span class="order-status">Sipariş Durumu</span>
                </div>

                <div class="order">
                    <img src="images/urun.jpg">

                    <span class="order-product_name"><?php product_name ?> Ürün Adı</span>

                    <span class="order-price"><?php price ?> Fiyat</span>

                    <span class="order-status">Sipariş Durumu</span>
                </div>
            </div>

            <div id="store-info">
                <h3>Mağaza Bilgileri</h3>
                
                <table style="font-size:22px; font-weight:500;">
                <tr>
                    <td>Mağaza Adı: </td>
                    <td><input type="text" value="<?php echo store_name ?>"></td>
                </tr>
                
                <tr>
                    <td>E-Posta: </td>
                    <td><input type="text" value="<?php echo e_mail ?>"></td>
                </tr>


                <tr>
                    <td>Adres: </td>
                    <td><input type="text" id="account-info-address" placeholder="Adresinizi ekleyin!"></td>
                </tr>
                </table>
            </div>

            

        </div>
    </div>
</body>
</html>