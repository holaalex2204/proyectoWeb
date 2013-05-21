<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	include("design.php");
	drawHeader("Contacto",null,3,$user);
?>
<section id="content"><div class="ic"></div>
    	<div class="pad-1">
            <div class="page6-row1">
            	<div class="col-14">
                    <h2 class="h2">Telefonos</h2>
					<dl>
                    	<dt class="clr-1"><strong >Avenida Mexico-Tacuba No 47</strong><br>Miguel Hidalgo, Distrito Federal</dt>
                        <dd><span>Telefono:</span>56789211</dd>
                        <dd><span>Celular:</span>5515141211</dd>
                        <dd class="p3"><span>Email:</span><a href="#" class="link">simplecar@hotmail.com</a></dd> 
                    </dl> 
                </div> 
                <div class="col-15">
                    <h2 class="h2 p2">Como Llegar</h2>
					<div class="map img-border">
					  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.mx/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=mexico+tacuba+47&amp;aq=&amp;sll=19.320099,-99.152184&amp;sspn=0.703696,1.352692&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=M%C3%A9xico-tacuba+47,+Un+Hogar+Para+Nosotros,+Miguel+Hidalgo,+Ciudad+de+M%C3%A9xico,+DF&amp;ll=19.444534,-99.167432&amp;spn=0.002909,0.005284&amp;z=14&amp;output=embed"></iframe><br /><a href="https://maps.google.com.mx/maps?f=q&amp;source=embed&amp;hl=es-419&amp;geocode=&amp;q=mexico+tacuba+47&amp;aq=&amp;sll=19.320099,-99.152184&amp;sspn=0.703696,1.352692&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=M%C3%A9xico-tacuba+47,+Un+Hogar+Para+Nosotros,+Miguel+Hidalgo,+Ciudad+de+M%C3%A9xico,+DF&amp;ll=19.444534,-99.167432&amp;spn=0.002909,0.005284&amp;z=14" class="link">Ver mapa más grande</a>
					</div>

                </div>
                <div class="col-16">
                    <h2 class="h2 p2">Envianos un comentario</h2>
					<form id="form" method="post" >
                      <fieldset>
                        <label><input type="text" value="Nombre Completo" onBlur="if(this.value=='') this.value='Nombre Completo'" onFocus="if(this.value =='Nombre Completo' ) this.value=''"></label>
                        <label><input type="text" value="Email" onBlur="if(this.value=='') this.value='Email'" onFocus="if(this.value =='Email' ) this.value=''"></label>
                        <label><textarea onBlur="if(this.value==''){this.value='Mensaje'}" onFocus="if(this.value=='Mensaje'){this.value=''}">Mensaje</textarea></label>
                        <div class="btns"><a href="#" class="link-1">Limpiar</a><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Enviar</a></div>
                      </fieldset>  
                    </form> 
                </div>
            </div>
        </div>           
    </section> 
<?php
	drawFooter();
?>