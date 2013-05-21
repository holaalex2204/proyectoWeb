<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])&&$_SESSION["perm"]==0){
		$session=true;
		$user=$_SESSION["nom"];
	}
	else{
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Perfil",null,4,$user);
?>
<section id="content"><div class="ic"></div>
    	<div class="pad-1">
            <div class="page2-row1">
                <div class="col-4">
                    <h2 class="h2 p2">Esteban Ruiz Miranda</h2>
                    <div class="wrap">
                        <img src="images/page2-img1.jpg" alt="" class="img-border img-indent">
                        <div class="extra-wrap">
                            <h2 class="h2 p2">Datos Generales</h2>
					<form id="form" method="post" >
                      <fieldset>
                        <label><input type="text" value="Esteban Ruiz Miranda" ></label>
						<label><input type="text" value="56575859" ></label>
                        <label><input type="text" value="Av. Rio Mayo No 27 Delegación Miguel Hidalgo" ></label>
						<label><input type="text" value="esrumiranda@hotmail.com" ></label>
						<label><input type="text" value="31 Años" ></label>
						<label><input type="text" value="56575859" ></label>
						</fieldset>  
                    </form>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <h3 class="h3 p2">Autos Rentados en el último año</h3>
					<form id="form" method="post" >
                      <fieldset>
                        <label><input type="text" value="Mazda 6" ></label>
						<label><input type="text" value="Chevrolet Spark" ></label>
                        <label><input type="text" value="Aveo" ></label>
						<label><input type="text" value="Focus" ></label>
						</fieldset>  
                    </form>
					
                </div> 
            </div>


        </div>           
</section> 
<?php
	drawFooter();
?>
