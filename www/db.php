<?php
////////////////////////////
// db.php
////////////////////////////
	mysql_connect('localhost','SYSMAN','SYSMAN')or die ('Ha fallado la conexi&oacute;n '.mysql_error());
	mysql_select_db('SYSMAN')or die ('Error al seleccionar la base de datos '.mysql_error());

?>