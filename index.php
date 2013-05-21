<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/skin.css">
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/jquery.jcarousel.min.js"></script>
    <script>
		$(document).ready(function(){
			$('.slider')._TMS({
				show:0,
				pauseOnHover:false,
				prevBu:false,
				nextBu:false,
				playBu:false,
				duration:750,
				preset:'fade',
				pagination:'.pags',
				pagNums:false,
				slideshow:3000,
				numStatus:false,
				banners:false,// fromLeft, fromRight, fromTop, fromBottom
				waitBannerAnimation:false,
				progressBar:false
			})
			jQuery('#mycarousel').jcarousel({
				horisontal: true,
				wrap:'circular',
				scroll:1,
				easing:'easeInOutBack',
				animation:1200
			});
		});
	</script>
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
        <div class="nav">
            <nav>  
                <ul class="menu">
                    <li class="current li-none"><a href="index.php">Inicio</a></li>
                    <li><a href="galeria.php">Galerìa</a></li>
					<?php if(!$session)
							echo '<li><a href="registro.php">Registro</a></li>
							<li><a href="contacto.php">Contacto</a></li>
							<li><a href="news.php">Tèrminos y condiciones</a></li>
							<li><a href="login.php">Iniciar sesión</a></li>';
						else
							echo '<li><a href="renta.php">Renta de autos</a></li>
								<li><a href="contacto.php">Contacto</a></li>
								<li><a href="administrar.php">Administrar:'.$user.'</a></li>
								<li><a href="cerrar.php">Cerrar sesión</a></li>';
                    
				 ?>
                    
                </ul>
            </nav>
      </div>
        <header>
            <h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
        </header>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                     <li><img src="images/slide-1.jpg" alt="" /></li>
                    <li><img src="images/slide-2.jpg" alt="" /></li>
                    <li><img src="images/slide-3.jpg" alt="" /></li>
                    <li><img src="images/slide-4.jpg" alt="" /></li>
                    <li><img src="images/slide-5.jpg" alt="" /></li>
                </ul>
            </div>
            <ul class="pags">
                <li><a href="#"><strong>0</strong>1</a></li>
                <li><a href="#"><strong>0</strong>2</a></li>
                <li><a href="#"><strong>0</strong>3</a></li>
                <li><a href="#"><strong>0</strong>4</a></li>
                <li><a href="#"><strong>0</strong>5</a></li>
            </ul>	
        </div>
    </div>
  </div>   
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="gallery-block">
        	<h2>SimpleCar</h2>
            
        </div>
        <div class="page1-row1 pad-1">
        	
            <div class="col-2">
            	<h2 class="h2 p2">SimpleCar</h2>
                <p class="p1">SimpleCar es una empresa dedicada a la renta de autos  con más de 30 años 
				de experiencia en el mercado, siendo la mejor opción en renta de 
				autos a corto plazo</p>
				<p>SimpleCar tiene el firme propósito de lograr la satisfacción de sus clientes, proporcionándoles autos, 
				camionetas, camiones y servicios especializados de transporte terrestre y logística de mercancías 
				y productos, con altos niveles de calidad y seguridad.
				</p>
				
                
                <div class="clear"></div>
                <h3 class="h3">Síguenos en:</h3>
                <div class="soc-icons">
                	<a href="https://www.twitter.com/"><img src="images/icon-1.png" alt=""></a>
                    <a href="http://www.facebook.com/"><img src="images/icon-2.png" alt=""></a>
                </div>
            </div>  
            <div class="col-3">
            	<h2 class="h2 p2">Contáctanos</h2>
                <div class="adr">
                    <p class="p3"><strong>Local:</strong> <span class="clr-1">56789211</span><br>
                    <strong>Celular</strong> <span class="clr-1">5515141211</span><br>
                    <strong>E-mail:</strong> <a href="https://blu168.mail.live.com/default.aspx" class="clr-1">simplecar@gmail.com</a></p>
                    <p class="clr-1">Avenida México-Tacuba No 47<br>Miguel Hidalgo, Distrito Federal</p> 
                </div>
            </div>      
        </div>
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>