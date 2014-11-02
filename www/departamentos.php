<button class="btn btn-success" data-toggle="modal" data-target="#nuevoDepartamentoModal"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
<table class="table table-condensed table-hover">
 <thead>
  <tr>
   <th>ID</th>
   <th>Nombre</th>
   <th>Ubicacion</th>
   <th>Total de Equipos</th>
   <th>Acciones<th>
   </tr>
  </thead>
  <tbody>
  <?php
   function countUnidades($id){
   $query = "SELECT COUNT(UE.ID) AS total FROM DEPARTAMENTO DP, UNIDAD_EQUIPO UE WHERE DP.ID = UE.departamento_id AND DP.id = ".$id;
   $output = mysql_query($query) or die(mysql_error());
   $lol = mysql_fetch_assoc($output);
   return $lol['total'];	   
   }
   $query = "SELECT * FROM DEPARTAMENTO ";
   $output =  mysql_query($query) or die(mysql_error());
   while ($lol = mysql_fetch_assoc($output)){
    $UE = countUnidades($lol["id"]);
    echo '<tr><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["ubicacion"].'</td><td>'.$UE.'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarDepartamento" onclick="cargarActualizarDepartamento('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span>Modificar Departamento</button> </td></tr>';
   }
  ?>
 </tbody>
</table>
