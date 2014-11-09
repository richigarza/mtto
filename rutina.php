<button class="btn btn-success" data-toggle="modal" data-target="#nuevoRutinaModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Equipo</th>
   <th>Descripcion</th>
   <th>Tiempo</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT RU.descripcion, RU.equipo_id, RU.id, RU.tiempo_procedimiento, EQ.nombre FROM RUTINA RU, EQUIPO EQ WHERE RU.equipo_id = EQ.id";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["descripcion"].'</td><td>'.$lol["tiempo_procedimiento"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarRutina" onclick="cargarActualizarRutina('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar</button> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verDetalles" onclick="mostrarDetallesRutina('.$lol["id"].')"><span class="glyphicon glyphicon-search"></span> Ver Detalles de Rutinas</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar</button></td></tr>';
   }
  ?>
 </tbody>
</table>
