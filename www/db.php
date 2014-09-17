<?php
	mysql_connect('localhost','root','pass')or die ('Ha fallado la conexi&oacute;n '.mysql_error());
	mysql_select_db('mtto')or die ('Error al seleccionar la base de datos '.mysql_error());

?>