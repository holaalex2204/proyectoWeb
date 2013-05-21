<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Registro",null,2,$user);
?>
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
					<form action="registrar.php" method="post" onsubmit="valida()">
              <ul>
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
                      <label for="nombre">Nickname</label>
                      <input type="text" name="nickname" id="nickname" placeholder="alex" required="required" autofocus="autofocus" maxlength="50"/>
                  </li>
                  <li>
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="" required="required" " />
                  </li>

                <li>
                        <label for="mail">Email </label>
                        <input type="email" name="mail" id="mail" placeholder="name@example.com" required="required" autofocus="autofocus" maxlength="50" />
                </li>

    </ul>

                <input type="submit" value="Registro"/>
             </form></p>
                </div>
            </div>
        </div>           
    </section> 