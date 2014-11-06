<?php
/////////////////////////////
// PE.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["PE"])){
  $query = 'SELECT * FROM USUARIO WHERE id="'.$_POST["PE"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;

}else if (isset($_POST['nuevo'])){
  $query = 'INSERT INTO USUARIO (departamento_id, nombre_usuario, username, password, estatus, ultima_fecha_actualizacion, ultimo_editor) VALUES("'.$_POST["departamento_id"].'","'.$_POST["nombre"].'","'.$_POST["username"].'","'.$_POST["password"].'", "A","'.date("Y-m-d H:i:s").'","'.$_POST["editor"].'")';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;
  $result['id'] = mysql_insert_id();

}else if (isset($_POST['id'])){
  $query = 'UPDATE USUARIO SET departamento_id="'.$_POST["departamento_id"].'", nombre_usuario="'.$_POST["nombre"].'",  username="'.$_POST["username"].'", password="'.$_POST["password"].'", ultima_fecha_actualizacion="'.date("Y-m-d H:i:s").'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>