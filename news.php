<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	include("design.php");
	drawHeader("Terminos",null,4,$user);
?><section id="content"><div class="ic"></div>
    	<div class="pad-1">
            <div class="page5-row1">
            	<div class="col-12">
                    <h2 class="h2 p2">Condiciones de Alquiler</h2>
                    <p>
						1. Presentar cualquiera de estas tarjetas de crédito:<br>
						AMERICAN EXPRESS<br>
						VISA o MASTER CARD<br>
						BANAMEX<br>
						BANCOMER<br>
						2. Su licencia de conducir vigente.<br>
						3. Edad mínima 25 años.<br>
						4. Renta mínima de 1 día / 24 Hrs.<br>
						</p>
						<p>
						<h2 class="h2 p2">Términos Sobre el Alquiler de Autos</h2>
						1. Las tarifas no incluyen seguros, impuestos, gasolina, deducible ni cargos por dejar en otras ciudades.<br>
						2. Se solicitará una autorización a su tarjeta de crédito por el tiempo de renta más un 25% adicional.<br>
						3. El seguro contra accidentes le protege también en caso de robo del auto. Cuando usted lo acepta, su responsabilidad es cubrir el deducible aproximadamente el 10% del valor del automóvil. Si usted declina esta protección (CDW) se le requerirá a cubrir el valor total de los daños o del vehículo en su caso.<br>
						4. El costo por dejar el auto en una ciudad diferente a donde fue rentado es de $4.00 pesos por cada Km. existente entre ambas ciudades.<br>
						5. No todos los modelos están disponibles en todas las ciudades.<br>
						6. Existen cargos por conductores adicionales o menores de 25 años.<br>
						7. Tarifas sujetas a cambios.<br>
						8. La compañía se reserva el derecho de negar un alquiler según las reglas antes mencionadas.<br>
						9. Cuando exista una reservación previa y no se informe su cancelación de la misma, con 24 horas de anticipación a la hora reservada, se realizará un cargo por No Show de $200 MXN.<br>
					</p>
                </div>   
            </div>
        </div>           
    </section> 
<?php
	drawFooter();
?>