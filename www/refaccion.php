<button class="btn btn-success" data-toggle="modal" data-target="#nuevoRefaccionModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Nombre</th>
   <th>Descripcion</th>
   <th data-toggle="tooltip" data-placement="top" title="Total de Unidades">TU</th>
   <th data-toggle="tooltip" data-placement="top" title="Total por Equipo">TxE</th>
   <th>Costo</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT * FROM REFACCION WHERE estatus='A'";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["descripcion"].'</td><td>'.$lol["unidades_disponibles"].'</td><td>'.$lol["unidades_por_equipo"].'</td><td>$ '.$lol["costo_refaccion"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarRefaccion" onclick="cargarActualizarRefaccion('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar</button> <button type="button" class="btn btn-danger" onclick="eliminar('.$lol["id"].', \'REFACCION\');"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar</button></td></tr>';
   }
  ?>
 </tbody>
</table>
