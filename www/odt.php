<button class="btn btn-success" data-toggle="modal" data-target="#nuevoRutinaModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Equipo</th>
   <th>Rutina</th>
   <th>Usuario</th>
   <th>Estatus</th>
   <th>Fecha</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT * FROM ODT";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["equipo_id"].'</td><td>'.$lol["rutina_id"].'</td><td>'.$lol["usuario_id"].'</td><td>'.$lol["odt_estatus_id"].'</td><td>'.$lol["fecha"].' '.$lol["hora"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarRutina" onclick="cargarActualizarRutina('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar</button> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verDetalles" onclick="mostrarDetallesRutina('.$lol["id"].')"><span class="glyphicon glyphicon-search"></span> Ver Detalles de Rutinas</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar</button></td></tr>';
   }
  ?>
 </tbody>
</table>
