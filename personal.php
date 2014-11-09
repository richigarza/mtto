<button class="btn btn-success" data-toggle="modal" data-target="#nuevoUsuarioModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Nombre</th>
   <th>Usuario</th>
   <th>Depa</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   $query = "SELECT * FROM USUARIO ";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["nombre_usuario"].'</td><td>'.$lol["username"].'</td><td>'.$lol["departamento_id"].'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarUsuario" onclick="cargarActualizarUsuario('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Eliminar</button></td></tr>';
   }
  ?>
 </tbody>
</table>
