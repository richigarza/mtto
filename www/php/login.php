<?php
header('Content-type: application/json');
include("../config.php");

function quitar($mensaje)
{
  $nopermitidos = array("'",'\\','<','>',"\"");
  $mensaje = str_replace($nopermitidos, "", $mensaje);
  return $mensaje;
}      
 
if($_POST["usuario"] != "" && $_POST["password"] != ""){
    // Puedes utilizar la funcion para eliminar algun caracter en especifico
    $usuario = strtolower(quitar($_POST["usuario"]));
    $password = $_POST["password"];
    
    // o puedes convertir los a su entidad HTML aplicable con htmlentities
    //$usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));    
    //$password = $_POST["password"];
    $query = mysql_query('SELECT password, username FROM USUARIO WHERE username=\''.$usuario.'\'');
    if($row = mysql_fetch_array($query)){
      if($row["password"] == $password){
 
	$_SESSION["username"] = $row['username'];
	$result['msg'] = "Te has conectado correctamente ". $_SESSION["username"];
	$result['success'] = true;
      }else{
	$result['msg'] = 'Password incorrecto';
	$result['success'] = false;
      }
    }else{
      $result['msg'] = 'Usuario no existente en la base de datos';
      $result['success'] = false;
    }
    mysql_free_result($query);
}else{
  $result['msg'] = 'Debe especificar un usuario y password';
  $result['success'] = false;
}
//}else{
//  $result['msg'] = 'Error 500.';
//  $result['success'] = false;
//}
mysql_close();
echo json_encode($result);
exit();
?>