<?php
/////////////////////////////
// DP.php
////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["DP"])){
  $query = 'SELECT * FROM DEPARTAMENTO WHERE id="'.$_POST["DP"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;
}else if (isset($_POST['id'])){
  $query = 'UPDATE DEPARTAMENTO SET nombre="'.$_POST["nombre"].'", ubicacion="'.$_POST["ubicacion"].'", ultimo_editor="'.$_POST["editor"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>