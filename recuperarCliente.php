<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Datos Cliente",null,2,$user);
?><SCRIPT>
	function muestraContenido(campo,param)
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
  			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{
					document.getElementById(campo).innerHTML = xmlhttp.responseText;
    				}
  			}
			xmlhttp.open("GET",param,true);
			xmlhttp.send();
		}	
	function buscaCorreo(str)
	{
		if(muestraContenido("mail","servicioRecuperarClientes.php?campo=mail?correo="+str)==true){
			muestraContenido("nombre","servicioRecuperarClientes.php?campo=nombre?correo="+str);
			muestraContenido("apellidos","servicioRecuperarClientes.php?campo=apellidos?correo="+str);
			muestraContenido("tel","servicioRecuperarClientes.php?campo=tel?correo="+str);
			muestraContenido("dir","servicioRecuperarClientes.php?campo=dir?correo="+str);
			muestraContenido("nickname","servicioRecuperarClientes.php?campo=nickname?correo="+str);
			muestraContenido("password","servicioRecuperarClientes.php?campo=password?correo="+str);
			muestraContenido("id","servicioRecuperarClientes.php?id=password?correo="+str);
			document.getElementById("registrar").innerHTML = "0";
		}else
		{
			document.getElementById("registrar").innerHTML = "1";
		}
	}
	</script>
</SCRIPT>
<link href="css/valida.css" rel="stylesheet" type="text/css" />
<section id="content"><div class="ic"></div>
    	<div class="pad-1">
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Registro:</h2>
					<?php 
						if($_GET['error']==1){
							echo '<p> El nombre de usuario o email ya existen</p>';
						}
					?>
					<form action="registrar.php" method="post">
              <ul>
		 <li>
                        <label for="mail" onchange="">Email </label>
                        <input type="email" name="mail" id="mail" placeholder="name@example.com" required="required" autofocus="autofocus" maxlength="50" />
                </li>
                  <li>
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="name" placeholder="Nombre" required="required" autofocus="autofocus" maxlength="50"/>
                  </li>
                  
                  <li>
                      <label for="apellidos">Apellidos</label>
                      <input type="text" name="apellidos" id="name" placeholder="Paterno Materno" required="required" autofocus="autofocus" maxlength="50"/>
                  </li>
                  <li>
                        <label for="tel">Telefono</label>
                        <input type="text" name="tel" id="tel" placeholder="55555555" required="required" maxlength="10" pattern="[\d\ ]{8,}" />
                  </li>
                  <li>
                        <label for="dir">Direcion</label>
                        <textarea name="dir" id="dir" placeholder="Numero , Calle, Ciudad, Pais" required="required" maxlength="150"></textarea>
                </li>
				<li>
                      <label for="nick">Nickname</label>
                      <input type="text" name="nickname" id="nickname" placeholder="nickname" required="required" autofocus="autofocus" maxlength="50"/>
                  </li>
                  <li>
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="" required="required" " />
                  </li>
		<input type="hidden" name="id"/>
		<input type="hidden" name="registrar"/>
               

    </ul>

                <input type="submit" value="Registro"/>
             </form></p>
                </div>
            </div>
        </div>           
    </section> 