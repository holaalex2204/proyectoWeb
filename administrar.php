<?php
	session_start();
	if(isset($_SESSION["id"])){
		if($_SESSION["perm"]==1){
			header("Location: menu.php");
		}
		else{
			header("Location: perfil.php");
		}
	}
	else{
		header("Location: index.php");
	}
?>