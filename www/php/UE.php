<?php
/////////////////////////////
// UE.php
/////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["EQ"])){
  $result['success'] = true;

  $query = 'SELECT imagen_equipo FROM EQUIPO WHERE id="'.$_POST["EQ"].'" AND estatus="A"';
  $output = mysql_query($query) or die(mysql_error());
  $output = mysql_fetch_assoc($output);
  $result["imagen_equipo"] = $output["imagen_equipo"];

  $query = 'SELECT * FROM UNIDAD_EQUIPO WHERE equipo_id="'.$_POST["EQ"].'" AND estatus="A"';
  $output =  mysql_query($query) or die(mysql_error());

  while ($lal = mysql_fetch_assoc($output)){
    $lal["departamento_id"] = search($lal["departamento_id"], "DEPARTAMENTO", "nombre");
    array_push($result, $lal);
  }
}else if (isset($_POST["UE"])){
  $query = 'SELECT * FROM UNIDAD_EQUIPO WHERE id="'.$_POST["UE"].'" AND estatus="A"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);

  $result['success'] = true;

}else if (isset($_POST["id"])){
  $query = 'UPDATE UNIDAD_EQUIPO SET departamento_id="'.$_POST["departamento_id"].'", descripcion="'.$_POST["descripcion"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id='.$_POST["id"];
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;

}else if (isset($_POST["nueva"])){
  $query = mysql_query("SELECT EQ.tiempo_mantenimiento FROM EQUIPO EQ WHERE EQ.ID=".$_POST["equipo_id"]) or die(mysql_error());
  $query = mysql_fetch_assoc($query);
  $proximo_mtto = date_format(date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string($query["tiempo_mantenimiento"].' days')), 'Y-m-d');

  $query = 'INSERT INTO UNIDAD_EQUIPO (equipo_id, departamento_id, descripcion, ultimo_mantenimiento, proximo_mantenimiento, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["equipo_id"].'", "'.$_POST["departamento_id"].'", "'.$_POST["descripcion"].'", "'.date("Y-m-d H:i:s").'", "'.$proximo_mtto.'", "A", "'.date("Y-m-d H:i:s").'", "'.$_POST["editor"].'")';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>