<?php


	if(session_status() == PHP_SESSION_NONE){
			session_start();
		}


	$login_txt="Giriş Yap";

	if(isset($_SESSION["uye_adi"]) && $_SESSION["uye_adi"]!="")
	{
		$login_txt=$_SESSION["uye_adi"];
		$uye_ad= $_SESSION["uye_adi"];
		//echo "'uye_adi' session'ı ".$_SESSION["uye_adi"]." değerini döndürdü";
	}
	else
	{
		//echo "'uye_adi' session'ı kontrol edilirken boş değeri döndürdü ";
		echo isset($_SESSION["uye_adi"]);
	}

	
	
?>

<script type="text/javascript">
	
	
	
	/*function login_btn()
            {
				alert("session");
				if($GEal-check)
				{
					window.location.href = "account.php";
					alert("if değeri true verdi");
				}
				else
				{
					header("location:index.php");
					alert("if değeri false verdi");
				}

            }*/
            

</script>

<div id="top">
			<div id="logo">
				<a href="index.php"><span id="logo-spn">haydiburada</span></a>
			</div>


			<div id="search">
				<form id="search" action="search.php" method="get">
					<div><input id="search_txt" name="s_text" type="text" placeholder="Söyleyin sizin için bulalım!"></div>
					<div><button id="search-btn" onclick="location.href='search.php'">ARA</button></div>
				</form>
			</div>

			<div id="member-box">
				<button id="login-btn" onclick="location.href='account.php'"><?php echo $login_txt; ?></button>
				<button id="cart-btn" onclick="location.href='cart.php'"><i class="fas fa-shopping-cart"></i> Sepetim</button>
			</div>

</div>