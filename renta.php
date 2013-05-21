<?php
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
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Ingresa los siguientes datos:</h2>
					<form id="form" method="post" action="rentaCliente.php">
                      <fieldset>
                        
						Edad del Conductor<label><input type="number" name="edad" min="18" max="65" required="required"></label><br>


						Fecha de Contratación<label><input type="date" name="contrata" required="required"></label><br>
						Fecha de Entrega<label><input type="date" name="entrega" required="required"></label><br>
						Lugar de Entrega<label><select size="1" name="modelo"><br>
						<option selected="selected" required="required">Tacuba D.F.</option>
						<option></option>
						</select> 
						</label>
					
						<input type="submit" name="EnviarDatos" value="Registrarse" />
                        <div class="btns"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Rentar Auto</a></div>
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