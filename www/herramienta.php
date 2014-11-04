<button class="btn btn-success" data-toggle="modal" data-target="#nuevoHerramientaModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Nombre</th>
   <th>Descripcion</th>
   <th data-toggle="tooltip" data-placement="top" title="Unidades Disponibles">UD</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT * FROM HERRAMIENTA";
   $output = mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["descripcion"].'</td><td>'.$lol["unidades_disponibles"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarHerramienta" onclick="cargarActualizarHerramienta('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar Unidad</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar Equipo</button></td></tr>';
   }
  ?>
 </tbody>
</table>
