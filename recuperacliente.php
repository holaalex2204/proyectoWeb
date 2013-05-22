<?php
	session_start();
	if(isset($_SESSION["id"])){
		if($_SESSION["perm"]==1){
		}
		else{
			header("Location: insertaRenta.php?ini=".$_GET['ini']."&fin=".$_GET['fin']."&cliente=".$_SESSION['id']."&sitio=".$_GET['sitio']."&modelo=".$_GET['modelo']."");
		}
	}
	else{
	}
?>