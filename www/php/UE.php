<?php
/////////////////////////////
// search.php
/////////////////////////////
header('Content-type: application/json');
include("config.php");

if (isset($_POST["EQ"])){
	 $result['success'] = true;
         $query = 'SELECT * FROM UNIDAD_EQUIPO WHERE equipo_id="'.$_POST["EQ"].'"';
         $output =  mysql_query($query) or die(mysql_error());
	 while ($lal = mysql_fetch_assoc($output)){
	   array_push($result, $lal);
	 }
}else if (isset($_POST["UE"])){
  $query = 'SELECT * FROM UNIDAD_EQUIPO WHERE id="'.$_POST["UE"].'"';
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