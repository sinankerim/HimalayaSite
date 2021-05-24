<?php

include 'connection.php';

$k_id=$_POST["urunun_idsi"];

if(isset($_POST["urunun_idsi"]))
{
	echo "id verisi dolu döndürüldü".$k_id."";
}

else
{
	echo "id verisi boş döndürüldü";
}

$sql = mysqli_query($baglanti ,"select u.uid, u.uisim,u.resim, u.umarka, u.hakkinda, s.fiyat, m.magazaisim 
from urun as u, satis as s, magaza as m
where u.uid=$k_id order by s.fiyat asc limit 1"); 

$row = mysqli_fetch_assoc($sql);



?>

<!DOCTYPE html>
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
		$('#product-pDetails-btn').click(function()
		{
				$('#product-comment').css({

					'display':'none'

				});

				$('#product-details').css({
					'display':'block',
					'animation':'fade 1s'
				});

				$('#product-pComments-btn').css({

					'background-color':'#aaa'

				});

				$('#product-pDetails-btn').css({
					'background-color':'#eee'
				});
		});

		$('#product-pComments-btn').click(function(){
			$('#product-details').css({

					'display':'none'

				});

				$('#product-comment').css({
					'display':'block',
					'animation':'fade 1s'
				});

				$('#product-pDetails-btn').css({

					'background-color':'#aaa'

				});

				$('#product-pComments-btn').css({
					'background-color':'#eee'
				});

			
		});
	});


 
</script>

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
		

		<div id="product-container">
            <div id="product-left">
				<img src="">
            </div>

            <div id="product-right">
                
                <span id="product-product_name"><?php echo $row["uisim"]; ?></span><br>
                <span id="product-product_brand"><?php echo $row["umarka"]; ?></span>

                <div id="product-price-details">
                    <div id="product-discount-percent-box">
                        <div>
							%<span id="discount" style="height:20px;">X</span><br>
                        	İndirim
						</div>
					</div>
                    <div>
                        <span id="product-oldPrice-style"><span id="product-old_price">6.000</span> TL<br></span>
                        <span id="product-product_price"><?php echo $row["fiyat"]; ?></span> TL
                    </div>    
                </div>

                <div id="product-store">Satıcı: <span id="product-store_name"><?php echo $row["magazaisim"]; ?></span></div>
                
				<div id="product-qatc">
					<div id="product-quantity">
						<button id="product-quantityUp"><i class="fas fa-plus"></i></button><input type="text" value="1"><button id="product-quantityDown"><i class="fas fa-minus"></i></button>
					</div>
					<button id="product-addToCart-btn"><i class="fas fa-shopping-cart"></i> Sepete Ekle</button>
				</div>
            </div>
			
        </div>
		
		<div id="product-bottom">
			
			<div id="product-bottom-left">
				<button id="product-pDetails-btn">Ürün Detayları</button>

				<button id="product-pComments-btn">Yorumlar</button>
			</div>

			<div id="product-bottom-right">
				<div id="product-details">
					<?php product_name ?> Ürün Adı<br>
					<br>
					<?php product_details ?>
					açıklama açıklama açıklama açıklama açıklama açıklama açıklama açıklama açıklama açıklama 
				</div>

				<div id="product-comment">
					<div id="comment-section">
						<span style="font-weight: 600;"><?php member_name ?> Yorum Gönderen</span><br>
						<br>
						<?php comment ?> Yorum
						<br>
					</div>
					<div id="post-comment-section">
						<span style="font-weight:600; font-size:18px;">Deneyimlerinizi diğer kullanıcılarımıza iletin</span><br>
						<br>
						<textarea id="post-comment-txt"></textarea><br>
						<button id="post-commend-send-btn">Gönder</button>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php include 'featured.php'; ?>

	

</body>
</html>