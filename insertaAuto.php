<?php 
	include("dao/funcionesBD.php");
	if(insertaCarro($_POST['nserie'],$_POST['modelo'],$_POST['transmision'],$_POST['suc'], $_POST['year'])!=0){
		header("Location: Altaauto.php?error=0");
	}
	else{
		header("Location: Altaauto.php?error=1");
	}