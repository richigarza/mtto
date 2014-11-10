<?php
/////////////////////////////
// eliminar.php
/////////////////////////////
header('Content-type: application/json');
include("../config.php");

if (isset($_POST["id_eliminar"])){
  $query = 'UPDATE '.$_POST["tb_eliminar"].' SET estatus="I" WHERE id="'.$_POST["id_eliminar"].'" AND estatus="A"';
  $output =  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error."; 
}
echo json_encode($result);
exit();
?>