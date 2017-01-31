<?php
include(dirname(__FILE__).'/ImageManipulator.php');
  
class Imgutils {
 const UPLOAD_PATH = 'uploads/'; // ruta de carga de imagenes.
 
 public function up_image($img) {

      $file_types = array('.jpg', '.jpeg', '.png', '.gif');
      $up_path = 'uploads/';

      $name = $img['name'];

      $newname = time();
      $newname .= rand();
      $ext = substr($name, strpos($name, '.'), strlen($name) - 1);

      if (!in_array($ext, $file_types)) { 
        die('up_image: La extensión del archivo '. $name .' no es valido.');
      }
      if (!is_writable($up_path)) {
        die('La carpeta especificada no es accesible.');
      }

      if (move_uploaded_file($img['tmp_name'], $up_path . $newname . $ext)) {
  		$im = new ImageManipulator($up_path . $newname . $ext);
  		$im->resample(750, 750); // cambiar tamaño a 120, 140
  		$im->save(self::UPLOAD_PATH.$newname . $ext, IMAGETYPE_JPEG);
      return $newname . $ext;
      }
      return false;

  } 

     /**
    carga una lista de imagenes predeterminadas
   **/
   function listarImagenes(){
     $permitidos = array( '.jpg', '.png', '.gif' );
     $l = array_diff(scandir(self::UPLOAD_PATH), array('..', '.')); 
     $res = array();
     
     if(count($l)==0){return $res;}

    foreach($l as $i){

      $ext = substr($i, strpos($i, '.'), strlen($i) - 1);
      if(in_array( $ext, $permitidos )){
        $res[]=$i;
      }

    }
    
    
    return $res;
  }
  
   
}


