<?php
/////////////////////////////
// RF.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["RF"])){
  $query = 'SELECT * FROM REFACCION WHERE id="'.$_POST["RF"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;

}else if (isset($_POST['nuevo'])){
  $query = 'INSERT INTO REFACCION (equipo_id, nombre, descripcion, unidades_disponibles, unidades_por_equipo, costo_refaccion, imagen_equipo, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["equipo_id"].'","'.$_POST["nombre"].'","'.$_POST["descripcion"].'","'.$_POST["unidades_disponibles"].'","'.$_POST["unidades_por_equipo"].'","'.$_POST["costo_refaccion"].'","impresora.jpeg", "A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else if (isset($_POST['id'])){
  $query = 'UPDATE REFACCION SET equipo_id="'.$_POST["equipo_id"].'", nombre="'.$_POST["nombre"].'",  descripcion="'.$_POST["descripcion"].'", unidades_disponibles="'.$_POST["unidades_disponibles"].'", unidades_por_equipo="'.$_POST["unidades_por_equipo"].'", costo_refaccion="'.$_POST["costo_refaccion"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>