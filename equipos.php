<button class="btn btn-success" data-toggle="modal" data-target="#nuevoEquipoModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>Equipo</th>
   <th>ID</th>
   <th>Nombre</th>
   <th>Descripcion</th>
   <th data-toggle="tooltip" data-placement="top" title="Total de Unidades">TU</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   function countUnidades($id){
   $query = "SELECT COUNT(UE.ID) AS total FROM EQUIPO EQ, UNIDAD_EQUIPO UE WHERE EQ.ID = UE.equipo_id AND EQ.id = ".$id;
   $output = mysql_query($query) or die(mysql_error());
   $lol = mysql_fetch_assoc($output);
   return $lol['total'];	   
   }
   $query = "SELECT * FROM EQUIPO ";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    $UE = countUnidades($lol["id"]);
    echo '<tr><td><img class="media-object" src="img/'.$lol["imagen_equipo"].'" alt="Impresora Canon" width="50px" height="50px"></td><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["descripcion"].'</td><td>'.$UE.'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarEquipo" onclick="cargarActualizarEquipo('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span> Modificar Unidad</button> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verUnidades" onclick="mostrarUnidadesEquipos('.$lol["id"].')"><span class="glyphicon glyphicon-search"></span> Ver Unidades de Equipo</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Eliminar Equipo</button></td></tr>';
   }
  ?>
 </tbody>
</table>
