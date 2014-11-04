<?php
/////////////////////////////
// HE.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["HE"])){
  $query = 'SELECT * FROM HERRAMIENTA WHERE id="'.$_POST["HE"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;

}else if (isset($_POST['nuevo'])){
  $query = 'INSERT INTO HERRAMIENTA (nombre, descripcion, unidades_disponibles, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["nombre"].'","'.$_POST["descripcion"].'", "'.$_POST["unidades_disponibles"].'","A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else if (isset($_POST['id'])){
  $query = 'UPDATE HERRAMIENTA SET nombre="'.$_POST["nombre"].'", descripcion="'.$_POST["descripcion"].'", unidades_disponibles="'.$_POST["unidades_disponibles"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>