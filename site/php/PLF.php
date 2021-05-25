<!-- PRODUCT LISTING FUNCTIONS -->

<?php



	foreach($urunler as $urunler){


				echo "
				<form action='deneme.php' method='POST'>

					<div class='search-product'>
				
						<img src='".$urunler['resim']."'>
						
						<input type='hidden' name='urunun_idsi' value='".$urunler['uid']."'>

						<input type='hidden' name='satisin_idsi' value='".$urunler['satisid']."'>

						<div class='search-product-name'><a class='search-product-name' href='product.php?ud=".$urunler["uid"]."'>".$urunler['uisim']."</a></div>
			
						<div class='seach-product-price'>".$urunler['fiyat']." TL</div>
			
						<div><button class='search-addToCart-btn'>Sepete Ekle</button></div>
					</div>

				</form>
				";

	}
?>