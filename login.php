<?php
	session_start();
	$error="";
	if(isset($_POST[":D"])){
		include("dao/funcionesBD.php");
		$temp=existeUsuario($_POST['username'],$_POST['password']);	
		if($temp!=null){
			$_SESSION["id"]=$temp;
			$_SESSION["nom"]=$_POST['username'];
			$_SESSION["perm"]=0;
		}
		else{
			$temp=existeSucursal($_POST['username'],$_POST['password']);	
			if($temp!=null){
			$_SESSION["id"]=$temp;
			$_SESSION["nom"]=$_POST['username'];
			$_SESSION["perm"]=1;
		}
		}
		if(!isset($_SESSION["id"])){
			$error='<p class="error">Usuario y/o Contraseña Incorrecta'.$temp.'</p>';
		}
	}
	if(isset($_SESSION["id"])){
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Iniciar Sesión ",null,5,null);
?>		
<section id="content"><div class="ic"></div>
    	<div class="pad-1">
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Iniciar sesión:</h2>
					<form id="form" method="post" action="login.php">
					<input name=":D" type="hidden" value="yes">
					<?php echo $error; ?>
                      <fieldset>
                        Nombre de Usuario<label><input type="text" name="username" required="required"/></label>
                        Contraseña<label><input type="password" name="password" required="required"/></label><br>
			
					<input type="submit" name="inicic" value="Iniciar Sesión" />
                        <div class="btns"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Iniciar sesión</a></div>
                      </fieldset>  
                    </form> 
                </div>
            </div>
        </div>           
    </section> 	
<?php
	drawFooter();
?>
