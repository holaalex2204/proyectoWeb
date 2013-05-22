<!DOCTYPE html>
<html lang="en">
<head>
    <title>AltaAuto</title>
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
  <!--==============================header=================================-->
  <div class="header">
  	<div>
        <div class="subpages-nav">
            <nav>  
                <ul class="menu">
                    <li class="li-none"><a href="index.html">Inicio</a></li>
                    <li><a href="AltaModelo.html">Ingresar Modelo</a></li>
					<li class="current"><a href="AltaAuto.html">Registra Auto</a></li>
                    <li><a href="Renta.html">Renta a otros clientes</a></li>
                    <li><a href="Ventas.html">Revisar Ventas</a></li>
                    
					
                </ul>
                <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
            </nav>
        </div>
    </div>
  </div>   
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Ingresa los siguientes datos:</h2>
					<form id="form" method="post" >
                      <fieldset>
                        
						id<label><input type="text" name="id"  maxlength="23" required="required"></label><br>


						Modelo<label><input type="text" name="modelo" required="required"></label><br>
						Capacidad de Pasajeros<label><input type="number" name="capacidad" required="required" min="2" max="8"></label><br>
						Rendimiento<label><input type="number" name="capacidad" required="required"></label><br>
						Categor�a<label><select size="1" name="cat"><br>
						<option selected="selected" required="required">-</option>
						<option>Peque�os</option>
						<option>Grandes</option>
						<option>Ejecutivos</option>
						<option>CRV</option>
						<option>Premium</option>
						</select> 
						</label>
						Foto<input type="file" name="foto"/> <br>
						
					Precio por D�a<label><input type="number" name="precio" required="required" ></label><br>
						<input type="submit" name="EnviarDatos" value="Aceptar" />
                        <div class="btns"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Aceptar</a></div>
                      </fieldset>  
                     
                </div>
            </div>
			</form>
        </div>           
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>� 2013 ESCOM</strong><br><span>Arroyo. | Ort�z. | Cardenas </span><br/>
    </footer>	           
</body>
</html>