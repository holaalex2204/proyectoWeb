<?php
	$url = "localhost";
	$usuario = "root";
	$password = "root";
	$db = "rentalcar";
	include("php/DataConnection.class.php");
	$db = new DataConnection($url, $usuario,$password);	
?>
