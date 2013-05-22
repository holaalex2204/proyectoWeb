<?php 
	include("dao/funcionesBD.php");
	//foreach ($_GET['sitio'] as $selectedOption)
   		//asociaSitio($_GET['suc'] ,$selectedOption);
	asociaSitio($_POST['suc'] ,$_POST['sitio']);
	header("Location: altaServicios.php?error=0");
	?>
	