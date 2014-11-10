<?php
////////////////////////////
// config.php
////////////////////////////

// Base de Datos
mysql_connect('localhost','SYSMAN','SYSMAN')or die ('Ha fallado la conexi&oacute;n '.mysql_error());
mysql_select_db('SYSMAN')or die ('Error al seleccionar la base de datos '.mysql_error());

// Inicia la sesion
session_start();

// Query para buscar cosas simples
function search($id, $tb, $field){
   $query = "SELECT ".$field." FROM ".$tb." WHERE id='".$id."'";
   $result = mysql_query($query) or die(mysql_error());
   $output = mysql_fetch_assoc($result);
   return $output[$field];
}

?>