<button class="btn btn-success" data-toggle="modal" data-target="#nuevoODTModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th data-toggle="tooltip" data-placement="top" title="Departamento">Dpto</th>
   <th>Equipo</th>
   <th>Unidad</th>
   <th>Usuario</th>
   <th>Estatus</th>
   <th>Fecha</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT * FROM ODT WHERE estatus='A'";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
     echo '<tr><td>'.$lol["id"].'</td><td>'.search(search($lol["unidad_equipo_id"],"UNIDAD_EQUIPO", "departamento_id"),"DEPARTAMENTO", "nombre").'</td><td>'.search($lol["equipo_id"], "EQUIPO", "nombre").'</td><td>'.$lol["unidad_equipo_id"].'</td><td>'.search($lol["usuario_id"], "USUARIO", "nombre_usuario").'</td><td>'.search($lol["odt_estatus_id"], "ODT_ESTATUS", "descripcion").'</td><td>'.$lol["fecha"].' '.$lol["hora"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#uploadEvidencias" onclick="cargarODT('.$lol["id"].', '.$lol["unidad_equipo_id"].')"><span class="glyphicon glyphicon-upload"></span> Subir evidencias</button> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verDetalles" onclick="mostrarDetallesRutina('.$lol["id"].')"><span class="glyphicon glyphicon-search"></span> Ver Rutina</button> <button type="button" class="btn btn-danger" onclick="eliminar('.$lol["id"].', \'RUTINA\');"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar</button></td></tr>';
   }
  ?>
 </tbody>
</table>
