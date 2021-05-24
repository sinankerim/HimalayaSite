<?php

	include 'connection.php';
	if(session_status() == PHP_SESSION_NONE){
			session_start();
		}

	$dg=$_POST["satisin_idsi"];
	$kid=$_SESSION["uye_id"];

	$sql = mysqli_query($baglanti ,"INSERT INTO liste (listeid, kid, satid, liste) values (NULL, ".$kid.", ".$dg.", 'sepet')");

	header("location:index.php");
?>