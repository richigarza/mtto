<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SYSMAN::.</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sysman.css" rel="stylesheet">
 
    <?php
      include("config.php");
    ?>
  </head>
  
  <body>
    <!-- MODALS  -->
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

<div id="actualizarUnidad" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarUnidad').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Unidad #<span id="TitleActualizarUnidad"></span></h2><br>
     <div id="successEditUnidad" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-4">
       <label>Ultimo Editor</label>
       <input type="text" id="nombreUnidad" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Estatus</label>
       <select id="estatusUnidad" class="form-control"><option>I</option><option>A</option></select>
      </div>
      <div class="col-md-4">
       <img id="imgUnidad">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionUnidad" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarUnidad" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditUnidad').hide();$('#actualizarUnidad').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="actualizarEquipo" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarEquipo').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Equipo #<span id="TitleActualizarEquipos"></span></h2><br>
     <div id="successEditEquipo" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreEquipo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <img id="imgEquipo">
        <input type="file" id="uploadImgEquipo">
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
    <input id="actualizarEquipo" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditEquipo').hide();$('#actualizarEquipo').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
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
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="departamentos" data-toggle="dropdown" onclick="window.location.assign('index.php?p=Departamentos')">
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
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="equipos" data-toggle="dropdown" onclick="window.location.assign('index.php?p=Equipos')">
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
	</nav> 
<!-- FIN DE LA BARRA DE NAVEGACION -->

                  <!--PANEL DE BUSQUEDA-->	
	<div id="panelBusqueda" class="panel panel-default">
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
    <?php
     $page = $_GET['p'];
     switch($page){
     case "Equipos":
       include("equipos.php");
     break;
     case "Departamentos":
       include("departamentos.php");
     break;
     default:

     }
    ?>
		</div>
	</div>
	</div>
	</div>

<!-- SCRIPTS -->
    <!-- Bootstrap -->
	
    <script src="js/j.js"></script>	
    <script src="js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/min/jquery.form.min.js"></script>
   <!-- SYSMAN -->
    <script src="js/equipos.js"></script>

<script>
</script>


  </body>
  </html>