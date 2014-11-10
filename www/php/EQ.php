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
}else if (isset($_POST['nuevo'])){
  $query = 'INSERT INTO EQUIPO (nombre, descripcion, tiempo_mantenimiento, imagen_equipo, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["nombre"].'","'.$_POST["descripcion"].'","'.$_POST["tiempo_mantenimiento"].'","no-img.png","A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();
	  
}else if (isset($_POST['id'])){

  $query = 'UPDATE EQUIPO SET nombre="'.$_POST["nombre"].'", descripcion="'.$_POST["descripcion"].'", tiempo_mantenimiento="'.$_POST["tiempo_mantenimiento"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error 500.";
}
echo json_encode($result);
exit();
?>