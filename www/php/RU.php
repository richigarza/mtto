<?php
/////////////////////////////
// RU.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["RU"])){
  $query = 'SELECT * FROM RUTINA WHERE id="'.$_POST["RU"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;

}else if(isset($_POST["rm_id"])){
  function countPaso($id){
    $query = "SELECT COUNT(numero_paso) AS total FROM RUTINA_DETALLE WHERE estatus = 'A' AND rutina_id = ".$id;
    $output = mysql_query($query) or die(mysql_error());
    $lol = mysql_fetch_assoc($output);
    return $lol['total'];	   
  }
  for($i = $_POST['numero_paso']; $i < countPaso($_POST['rutina_id']); $i++){
    $query = 'UPDATE RUTINA_DETALLE SET numero_paso='.$i.', ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE estatus="A" AND numero_paso="'.++$i.'"';
    mysql_query($query) or die(mysql_error());    
  }
  $query = 'UPDATE RUTINA_DETALLE SET estatus="I", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST['rm_id'].'"';
  mysql_query($query) or die(mysql_error());    
  $result['success'] = true;

}else if(isset($_POST["rutina_idModificar"])){
  $query = 'UPDATE RUTINA_DETALLE SET descripcion="'.$_POST['descripcion'].'", tiempo_ejecucion="'.$_POST['tiempo_ejecucion'].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE numero_paso="'.$_POST['numero_paso'].'" AND rutina_id="'.$_POST['rutina_idModificar'].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else if(isset($_POST["rutina_id"])){
  $query = 'INSERT INTO RUTINA_DETALLE (rutina_id, numero_paso, descripcion, tiempo_ejecucion, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST['rutina_id'].'","'.$_POST['numero_paso'].'","'.$_POST['descripcion'].'","'.$_POST['tiempo_ejecucion'].'", "A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else if (isset($_POST["RU_DE"])){
  $result['success'] = true;
  $query = 'SELECT * FROM RUTINA_DETALLE WHERE rutina_id="'.$_POST["RU_DE"].'" AND estatus="A"';
  $output =  mysql_query($query) or die(mysql_error());
  while ($lal = mysql_fetch_assoc($output)){
    array_push($result, $lal);
  }
}else if (isset($_POST['nuevo'])){
  $query = 'INSERT INTO RUTINA (equipo_id, descripcion, tiempo_procedimiento, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["equipo_id"].'","'.$_POST["descripcion"].'","'.$_POST["tiempo_procedimiento"].'", "A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else if (isset($_POST['id'])){
  $query = 'UPDATE RUTINA SET equipo_id="'.$_POST["equipo_id"].'", descripcion="'.$_POST["descripcion"].'", tiempo_procedimiento="'.$_POST["tiempo_procedimiento"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>