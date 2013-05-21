<?php 
	include("dao/funcionesBD.php");
	if(insertaUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['tel'], $_POST['dir'] , $_POST['mail'], $_POST['nickname'], $_POST['pass'])!=0){
		session_start();
		$_SESSION['id']=existeUsuario($_POST['username'],$_POST['password']);	
		$_SESSION['nom']=$_POST['nickname'];
		$_SESSION["perm"]=0;
		header("Location: index.php");
	}
	else{
		header("Location: registro.php?error=1");
	}