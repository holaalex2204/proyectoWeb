<?php 
	include("dao/funcionesBD.php");
	$aux = insertaRentaCliente($_GET['ini'],$_GET['fin'],$_GET['sitio'],$_GET['cliente'],$_GET['modelo']);
	if( $aux!=0){
		session_start();
		header("Location: confirmacion.php?cliente=".$_GET['cliente']);
	}
	else{
		//header("Location: index.php?error=1");
	}