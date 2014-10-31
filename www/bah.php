<?php
header('Content-type: aplication/json');
include("config.php");

if (isset($_POST['EQ'])){
  $query = 'SELECT * FROM EQUIPO WHERE id="'.$_POST["EQ"].'"';
  $output = mysql_query($query) or die(mysql_error());
  $result = mysql_fetch_assoc($output);
  $result['success'] = true;
}else{
  $result['success'] = false;
  $result['msg'] = "Error.";
}
echo json_encode($result);
exit();
?>