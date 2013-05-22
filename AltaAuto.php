<?php
	include("dao/funcionesBD.php");
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	else{
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Alta Modelo",null,1,$user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AltaModelo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
  <!--==============================header=================================--><!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Ingresa los siguientes datos:</h2>
					<?php 
						if($_GET['error']==1){
							echo '<p> El noSerie ya Existe</p>';
						}
						if($_GET['error']==1){
							echo '<p> Éxito al ingresar el carro.</p>';
						}
					?>
					<form id="form" method="post" action="insertaAuto.php">
                      <fieldset>
                        
						Número de Serie<label><input type="text" name="nserie"  maxlength="17" required="required"></label><br>


						Modelo<label><select size="1" name="modelo"><?php echo(getModelos()); 
						?>
						</select> </label><br>
						Transmisión<label><select size="1" name="transmision"><br>
						<option selected="selected" required="required">-</option>
						<option>Manual</option>
						<option>Automática</option>
						<option>CVT</option>
						<option>Tiptronic</option>
						
						</select> 
						</label>
						<label><input type="hidden" name="suc" value="<?php echo($_SESSION["id"]);?>" >
						</label>
					Año<label><input type="number" name="year" required="required" min="2009" max="2013"></label><br>
						<input type="submit" name="EnviarDatos" value="Registrarse" />
                        <div class="btns"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Aceptar</a></div>
                      </fieldset>  
                     
                </div>
            </div>
			</form>
        </div>           
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>