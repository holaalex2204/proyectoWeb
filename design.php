<?php
	/*
		Parametros:
		titleText->Titulo de la pagina mostrada en el navegador.
		mainURL->Ruta desde la carpeta actual a la carpeta raiz, si
				 se esta en la misma carpeta puede dejarse como null.
				 Ejemplo: Si estas en administrator se manda "../".
		current->Numero identificando la pestala en la que se encuentra,
				 0-Index, 1-Galeria, 2-Renta o Registro 3-Contacto
				 4-Terminos y Condiciones o perfil, y 6- Sesion.
		activeSession->Nombre de usuario de la sesion activa null si no hay sesion iniciada.
	*/
	
	function drawHeader($titleText,$mainURL,$current,$activeSession){
		if($mainURL==null){
			$mainURL="";
		}
		if($activeSession==null){
			$tab=array("Inicio","Galeria","Registro","Contacto","Terminos y Condiciones","Iniciar sesión");
			$tabURL=array("index.php","galeria.php","registro.php","contacto.php","news.php","login.php");
		}else{
			$tab=array("Inicio","Galeria","Renta","Contacto","Administrar: ".$activeSession,"cerrar sesión");
			$tabURL=array("index.php","galeria.php","renta.php","contacto.php","administrar.php","cerrar.php");
		}
		
		for($i=0;$i<6;$i++){
			$tabURL[$i]=$mainURL.$tabURL[$i];
		}
		echo '<!DOCTYPE html5><html lang="en"><head>
			<title>'.$titleText.'</title><meta charset="utf-8">
			<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
			<link rel="stylesheet" type="text/css" href="css/style.css" />
			<link href="http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700" rel="stylesheet" type="text/css">
			<script src="js/jquery-1.7.min.js"></script>
			<script src="js/jquery.easing.1.3.js"></script>
			</head><body>
  <!--==============================header=================================-->
			<div class="header">
			<div>
			<div class="subpages-nav">
					<nav>  
						<ul class="menu">';
						for($i=0;$i<6;$i++){
							echo '<li';
							if($current==$i){
								echo ' class="current"';
							}
							echo '><a href="'.$tabURL[$i].'">'.$tab[$i].'</a></li>';
		}
		echo
							
						'</ul>
						<h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
					</nav>
				</div>
			</div>
			</div>'  ;
	}
	/*
		Parametros:
		mainURL->Ruta desde la carpeta actual a la carpeta raiz, si
				 se esta en la misma carpeta puede dejarse como null.
				 Ejemplo: Si estas en administrator se manda "../".
	*/
	function drawFooter(){
		
		echo ' <footer>
         <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>';
	}

?>