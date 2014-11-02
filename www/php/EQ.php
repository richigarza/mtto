<?php
/////////////////////////////
// EQ.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST['EQ'])){
  $query = 'SELECT * FROM EQUIPO WHERE id="'.$_POST["EQ"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;
}else if (isset($_POST['id'])){
  $max=1500000; 
  $filesize = $_FILES['img']['size'];
  $filename = trim($_FILES['img']['name']);
  $filename = substr($filename, -20);
  if($filesize < $max){
    if($filesize > 0){
      if((ereg(".jpg", $filename)) || (ereg(".gif", $filename)) || (ereg(".JPG", $filename))|| (ereg(".GIF", $filename)) || (ereg(".PNG", $filename))|| (ereg(".png", $filename))){
	$uploadfile = "img/" . $filename;
	if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile)) {

	  $query = 'UPDATE EQUIPO SET nombre="'.$_POST["nombre"].'", descripcion="'.$_POST["descripcion"].'" WHERE id="'.$_POST["id"].'"';
	  mysql_query($query) or die(mysql_error());
	  $result['success'] = true;

	  $result['msg'] = 'Archivo cargado correctamente';
	} else {
	  $result['msg'] = "Error de conexión con el servidor.";
	  $result['success'] = false;
	}
      } else {
	$result['msg'] = "Sólo se permiten imágenes en formato jpg. y gif., no se ha podido adjuntar.";
	$result['success'] = false;
      }
    } else {
      $result['msg'] = "Campo vacío, no ha seleccionado ninguna imagen";
      $result['success'] = false;
    }
  } else {
    $result['msg'] = "La imagen que ha intentado adjuntar es mayor de 1.5 Mb, si desea cambie el tamaño del archivo y vuelva a intentarlo.";
    $result['success'] = false;
  }
}else{
  $result['success'] = false;
  $result['msg'] = "Error 500.";
}
echo json_encode($result);
exit();
?>