<?php
	include("dao/funcionesBD.php");
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	include("design.php");
	drawHeader("Galeria",null,1,$user);
?>
<body>  
<link href="css/valida.css" rel="stylesheet" type="text/css" />
<STYLE>
.encabezaOpcion
{
	background-color:#330000;
	border-radius:6px;
	margin-bottom:30px;
	text-align:center;
	opacity:1;
	margin:9px 6px 9px 6px;
}

.opcion 
{
	margin-top:30px;
	background-color:#cccccc;
	border-radius:6px;
	border:1px solid #ffff66;
	font-size:15px;
	padding:6px 24px 20px 24px;
	font-family:Oldtown, fantasy;
	width:500px;
}
.opcion:hover 
{
	background-color:#ffffff;
}
</style>

<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Gracias por tu preferencia:</h2>
		<h3>Confirmación</h3>
				<?php
					$a = datosUltimaRenta($_GET['cliente']);
					echo("Felicidades ".$a['cliente']." acabas de rentar un ".$a['carro']." durante el periodo del ".$a['fecha'].". <br> Te recordamos que el lugar pactado para la entrega y devolución es ".$a['sitio']."<br> El valor de tu compra fue: $".$a['importe']);
				?>
				
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