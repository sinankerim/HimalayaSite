<?php


	if(session_status() == PHP_SESSION_NONE){
			session_start();
		}


	$login_txt="Giriş Yap";

	if(isset($_SESSION["uye_adi"]) && $_SESSION["uye_adi"]!="")
	{
		$login_txt=$_SESSION["uye_adi"];
		echo "gaeee";
		$uye_ad= $_SESSION["uye_adi"];
	}
	else
	{
		echo "gae";
	}

	
	
	if(isset($_SESSION["uye_adi"]))
	{
		echo "heleho".$_SESSION["uye_adi"];
	}
?>
<script>
	

	
	var session="<?php echo $uye_ad ?>";

	//alert(session);
	function login_btn()
            {
				if(session != "")
				{
					window.location.href = "account.php";
				}
				else
				{
					header("location:index.php");
				}
            }

</script>
<div id="top">
			<div id="logo">
				<a href="index.php"><span id="logo-spn">haydiburada</span></a>
			</div>


			<div id="search">
				<div id="search-box">	
					<div id="inputbox"><img style="height: 20px; width: auto; margin: 10px;" src="images/buyutec.png"><input type="text" placeholder="Ne arzu edersiniz?"></div>
					<button id="search-btn">ARA</button>	
				</div>
			</div>

			<div id="member-box">
				<button id="login-btn" onclick="login_btn()"><?php echo $login_txt; ?></button>
				<button id="cart-btn" onclick="location.href='cart.php'"><i class="fas fa-shopping-cart"></i> Sepetim</button>
			</div>

</div>