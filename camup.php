<?php
//error_reporting(E_ALL);
include(dirname(__FILE__).'/imgutils.php');


if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['archivoImagen']) ) {

		
		$img = ($_FILES['archivoImagen']['error'] == 0) ? $_FILES['archivoImagen'] : false;


		if (!$img){ echo "No se logro cargar la imagen"; die();}


		if ($_FILES["archivoImagen"]["size"] > 300000) {
			$errorMessagesImagen[] = "La imagen es demasiado grande. tamaño máximo 300k";
			$uploadOk = 0;
		}
		
		$img_util = new Imgutils();
		$cargada = $img_util->up_image($img);

		if(isset($cargada)){
			echo '<img style="width:300px;" src="http://gus.chrosoftweb.com/camup/uploads/'. $cargada .'">'; 
			//exit();
		}

		echo "<hr>";
 

		foreach ($img_util->listarImagenes() as $key => $value) {
			echo '<a href="http://gus.chrosoftweb.com/camup/uploads/'. $value.'">'. $value.' </a><br><br>'; 
		}

		exit();
	}    

echo "no se ha cargado ninguna imagen";	