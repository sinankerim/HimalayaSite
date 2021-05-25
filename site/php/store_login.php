<?php
     $sifre_yanlis="";

     if(isset($_GET["lg-durum"]))
     {
         $sifre_yanlis="kullanıcı adı veya şifreniz yanlış";
     }
?>


<html>
    <head>
        <title></title>
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <link rel="stylesheet" type="text/javascript" href="myJquery.js">
    <script src="jquery-3.6.0.min.js" ></script>
        <script>
           
           /*$(document).ready(function()
           {
           
            $('#lg-login-btn').click(function(){
                        
                        $('#login').css(
                       {
                            'display':'block',
                            'animation':'fade 1s'
                       }); 
                    
                       $('#register').css(
                       {
                            'display':'none'
                       });

                       $('#lg-register-btn').css(
                           {
                                'background-color':'#eee'
                           });

                       $('#lg-login-btn').css(
                           {
                                'background-color':'white'
                           });
            });

               $('#lg-register-btn').click(function(){
                   $('#login').css(
                       {
                            'display':'none'
                       }); 
                    

                       $('#register').css(
                       {
                            'display':'block',
                            'animation':'fade 1s'
                       }); 

                       $('#lg-register-btn').css(
                           {
                               'background-color':'white'
                           });

                       $('#lg-login-btn').css(
                           {
                                'background-color':'#eee'
                           });
                });
            });*/
        </script>

    </head>

    <body>
        <div id="login-container">
            <div id="lg-logo-box"><a href="index.php"><span id="lg-logo">Himalaya<span style="color:orangered;"> Mağaza</span></span></a></div>

            <div id="main-box">
                
                
                <div id="login">
                <span style="color:red; margin-left:10px; "><?php echo $sifre_yanlis; ?></span>
                    
                    <form action="SLF.php" method="POST" >
                        <input class="login-txt-box" name="kadi_txt" type="text" placeholder="E-posta adresi">
                        <input class="login-txt-box" name="sifre_txt" type="text"  placeholder="Şifre">
                        
                        <button  id="giris-btn">Giriş Yap</button>
                    </form>


                    <span id="sif-unuttum">Şifremi Unuttum</span><br>

                
                </div>

                

                

            </div>

        </div>
    </body>
</html>