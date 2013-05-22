<?php 
	include("dao/funcionesBD.php");
	$img_type="";
function upload_image($destination_dir,$name_media_field){
	global $img_type;
        $tmp_name = $_FILES[$name_media_field]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
        echo("b");
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name)) 
        {        
	echo("b");
            $img_file  = $_FILES[$name_media_field]['name'] ;                      
            $img_type  = $_FILES[$name_media_field]['type'];   
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type,"jpg")) || strpos($img_type,"png") )){
	echo("b");
                if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){                
                   echo("b");
		 return true ;
		
                }
            }
        }
        return false; 
    }
	if(!empty($_POST)){
		echo('c');
      		$aux =  true;//upload_image('images',$_POST['modelo']);
	}
	if($aux==true)
	{
		if(insertaModelo($_POST['modelo'],$_POST['capacidad'],$_POST['rendimiento'], $_POST['cat'],'images/'.$_POST['modelo'],$_POST['precio'])!=0){
		//header("Location: AltaModelo.php?error=0");
		}
		else{
		//header("Location: AltaModelo.php?error=1");
		}
	}
	