<?php
/////////////////////////////
// get_ODT.php
/////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["nuevo"])){
  $query = 'INSERT INTO ODT (equipo_id, rutina_id, usuario_id, unidad_equipo_id, odt_estatus_id, fecha, hora, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["equipo_id"].'", "'.$_POST["rutina_id"].'", "'.$_POST["usuario_id"].'", "'.$_POST["unidad_equipo_id"].'", "1", "'.$_POST["fecha"].'", "'.$_POST["hora"].'", "A", "'.date("Y-m-d H:i:s").'", "'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else if (isset($_POST["equipo_id"])){
  $RU = array();
  $UE = array();
  $query = "SELECT id, descripcion FROM RUTINA WHERE estatus='A' AND equipo_id='".$_POST['equipo_id']."'";
  $output = mysql_query($query) or die(mysql_error());
  while($lal = mysql_fetch_assoc($output)){
    array_push($RU, $lal);    
  }
  $query = "SELECT id, descripcion FROM UNIDAD_EQUIPO WHERE estatus='A' AND equipo_id='".$_POST['equipo_id']."'";
  $output = mysql_query($query) or die(mysql_error());
  while($lal = mysql_fetch_assoc($output)){
    array_push($UE, $lal);    
  }
  $result['success'] = true;
  array_push($result, $RU);
  array_push($result, $UE);

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>