<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SYSMAN::.</title>

    <!-- Bootstrap -->
	
    <script src="js/j.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sysman.css" rel="stylesheet">

   <!-- Scripts -->
	<?php
      include("config.php");
       ?>
  </head>
  
  <body>
    <!-- MODALS  -->
<div id="actualizarEquipo" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarEquipo').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Equipo #<span id="TitleActualizarEquipos"></span></h2><br>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreEquipo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <img id="imgEquipo">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionEquipo" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input type="button" onclick="$('#actualizarEquipo').modal('hide');" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('#actualizarEquipo').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<style>
#verUnidades .modal-dialog{
width: 900px;
}
</style>
<div id="verUnidades" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#verUnidades').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Ver Unidades de Equipo #<span id="TitleUnidadesEquipos"></span></h2><br>
     <div class="panel-body">
      <table class="table table-condensed table-hover">
       <thead>
        <tr>
	 <th>ID Unidad</th>
	 <th>Departamento</th>
	 <th>Ultimo Mtto.</th>
	 <th>Siguiente Prog.</th>
	 <th>Estado</th>
	 <th>Acciones<th>
	</tr>
       </thead>
       <tbody id="tablaUnidadesEquipos">
       </tbody>
      </table>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input type="button" onclick="$('#verUnidades').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>
    <!-- INICIO DE BARRA DE NAVEGACION -->
	<nav class="navbar navbar-default" role="navigation">
		<ul class="nav navbar-nav">
			<li><a href="#">SYSMAN</a></li>
			
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="departamentos" data-toggle="dropdown">
						Departamentos
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="departamentos">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Listado de Departamentos</a></li>
					</ul>
				</div>
			</li>
			
			<li>
			
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="equipos" data-toggle="dropdown">
						Equipos
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="equipos">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Inventario de Equipos</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Inventario de Refacciones</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Inventario de Herramientas</a></li>
					</ul>
				</div>
			
			</li>
			
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="personal" data-toggle="dropdown">
						Personal
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="personal">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Administración de Personal</a></li>
					</ul>
				</div>
			</li>
			
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="odt" data-toggle="dropdown">
						Ordenes de Trabajo
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="odt">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Ordenes de Trabajo</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Rutinas de Mantenimiento</a></li>
					</ul>
				</div>
			</li>
			
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="odt" data-toggle="dropdown">
						Reportes
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="odt">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Reportes</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Indicadores</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav> <!-- FIN DE LA BARRA DE NAVEGACION -->
	
	<div id="panelBusqueda" class="panel panel-default"> <!--PANEL DE BUSQUEDA-->
		<div class="panel-heading">
			<h3 class="panel-title">Panel de Búsqueda</h3>
		</div>
		<div class="panel-body">
			<form class="form-inline">
				<div class="form-group">
					<h5 class="espaciadorLateral">Nombre:</h5><input type="text" class="form-control" id="bNombre">
				</div>
				<div class="form-group">
					<h5 class="espaciadorLateral">Departamento:</h5><input type="text" class="form-control" id="bDepartamento">
				</div>
				<button type="submit" class="btn btn-primary">Buscar</button>
			</form>
		</div>
	</div>

	<div id="contenido" class="panel panel-default espaciadorVertical">
	<div class="panel-heading">
			<h3 class="panel-title">Listado de Resultados</h3>
	</div>
	<div class="panel-body">
	<div id="panelResultados" class="panel panel-default espaciadorVertical"> <!--PANEL DE Resultados-->
		<div class="panel-body">
		
			<table class="table table-condensed table-hover">
				<thead>
				<tr>
					<th>Equipo</th>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Total de Unidades</th>
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
  echo '<tr><td><img class="media-object" src="img/'.$lol["imagen_equipo"].'" alt="Impresora Canon" width="50px" height="50px"></td><td>'.$lol["id"].'</td><td>'.$lol["nombre"].'</td><td>'.$lol["descripcion"].'</td><td>'.$UE.'</td><td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#actualizarEquipo" onclick="actualizarEquipo('.$lol["id"].')"><span class="glyphicon glyphicon-pencil"></span>Modificar Unidad</button> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#verUnidades" onclick="mostrarUnidadesEquipos('.$lol["id"].')"><span class="glyphicon glyphicon-search"></span>Ver Unidades de Equipo</button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span>Eliminar Equipo</button></td></tr>';
}
?>

				</tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
<!-- SCRIPTS -->
<script>
function actualizarEquipo(id){
 var datos = {};
 datos["EQ"] = id;
 $.ajax({
   url: "bah.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarEquipos").html(id);
	 console.log(response.nombre);
	 delete response.success;
	 $("textarea#descripcionEquipo").html(response["descripcion"]);
	 $("img#imgEquipo").attr("src", "img/"+response["imagen_equipo"]);
	 $("input#nombreEquipo").attr("value", response["nombre"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}

function mostrarUnidadesEquipos(id){
 var datos = {};
 datos["EQ"] = id;
 $.ajax({
   url: "search.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 var string = "";
	 for (var key in response){
	   string += "<tr><td>" + response[key]['id'] + "</td><td>" + response[key]['departamento_id'] + "</td><td>" + response[key]['ultimo_mantenimiento'] + "</td><td>" + response[key]['id'] + "</td><td>" + response[key]['estatus'] + "</td><td>" + response[key]['id']  + "x</td></tr>";
	 }
	 $("span#TitleUnidadesEquipos").html(id);
	 $("tbody#tablaUnidadesEquipos").html(string);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
</script>


  </body>
  </html>