<?php
header('Content-type: aplication/json');
include("config.php");

if (isset($_POST['EQ'])){
  $query = 'SELECT * FROM EQUIPO WHERE id="'.$_POST["EQ"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;
}else if (isset($_POST['id'])){
  $query = 'UPDATE EQUIPO SET nombre="'.$_POST["nombre"].'", descripcion="'.$_POST["descripcion"].'" WHERE id="'.$_POST["id"].'"';
  mysql_query($query) or die(mysql_error());
  $result['success'] = true;

}else{
  $result['success'] = false;
  $result['msg'] = "Error.";
}
echo json_encode($result);
exit();
?>