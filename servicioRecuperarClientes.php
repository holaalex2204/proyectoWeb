<?php
	include("dao/funcionesBD.php");
	$campo = $_GET['campo'];
	$correo = $_GET['correo'];
	session_start();
	if(isset($_SESSION["id"])){
		if($_SESSION["perm"]==1){
			header("Location: recuperarCliente.php?ini=".$_GET['ini']."&fin=".$_GET['fin']."&sitio=".$_GET['sitio']."&modelo=".$_GET['modelo']."");
		}
		else{
			header("Location: insertaRenta.php?ini=".$_GET['ini']."&fin=".$_GET['fin']."&cliente=".$_SESSION['id']."&sitio=".$_GET['sitio']."&modelo=".$_GET['modelo']."");
		}
	}
	else{
	}
?>