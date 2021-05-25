<?php 
include 'connection.php';

session_start();


$veriler = mysqli_query($baglanti, "select u.uid, u.uisim, u.resim, s.fiyat, s.satisid from urun as u, satis as s where u.uid=s.uid" );
$urunler=array();
while($urun = mysqli_fetch_assoc($veriler))
{
    $urunler[]=$urun;
}



?>





<!DOCTYPE html>
<html>
<head>
	<title>Anasayfa -Himalaya.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="CSS.css">
	<script src="https://kit.fontawesome.com/c8dadfc9a6.js" crossorigin="anonymous"></script>

<script src="jquery-3.6.0.min.js" > </script>
<script>


	
	//$(document).ready(function(){



			/*$("#menu ul li").mouseenter( 
			
				function()
				{
					$(".overlay").css("filter","brightness(50%)");
				}
			);

			$("#menu ul li").mouseleave( 
			
				function()
				{
					$(".overlay").css("filter","grayscale(0%)");
				}
			);*/
			

			/*$("#corbala").click
			(
				function()
				{
					$("body").css("filter","grayscale(100%) contrast(100%)");
				}
			);*/


		//});
	

	




 
</script>



</head>
<body>
		
		<?php include 'top.php'; ?>
		<style>
	#seach_txt
	{
		height: 396px;
	}
</style>

	
		<div id="color-belt">
			<!--<div id="belt-1"></div>-->
			<div id="belt-2"></div>
			<div id="belt-3"></div>
			<div id="belt-4"></div>
			<div id="belt-5"></div>
			<div id="belt-6"></div>
			<div id="belt-7"></div>
		</div>
		<div id="new-color-belt">
			<div id="nc-belt"></div>
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

		<div id="new-color-belt">
			<div id="nc-belt"></div>
		</div>

		<div id="firsatlar-belt"><h3>İŞTE BU FIRSATLAR KAÇMAZ</h3></div>

		<div id="container">
			
			<?php include 'PLF.php'; ?>
			
		</div>


		


		<?php include 'featured.php'; ?>

	

</body>
</html>