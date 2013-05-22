<?php
	session_start();
	include("dao/funcionesBD.php");
	
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
	drawHeader("Revisar Ventas",null,1,$user);
?>
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	
            
                    <h2 class="h2 p2">Ingresa el Periodo</h2>
                    <div class="wrap">
					<form id="form" method="get" action="revisaVentas.php" >                       
					   Del:<input type="date" name="a" /><br><br><br><br>
						Al:<input type="date" name="b" /><br><br><br><br><br><br><br>
						<BUTTON type="submit">Verificar</BUTTON
						</form>
                        <div class="wrap">
							
							
                        </div>
                    </div>
              
                	<table align="center" border="100">
							<thead border="10">
								<tr>
									<th>	Fecha de inicio</th>
									<th>	Fecha de término</th>
									<th>	Importe</th>
									<th>	Lugar</th>
									<th>	Cliente</th>
									<th>	Auto</th>
								</tr>
							</thead>
							<tbody>
								<?php echo(resumenRentas($_GET['a'],$_GET['b'])); ?>;
							</tbody>
						</table>

          
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>