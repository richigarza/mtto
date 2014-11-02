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
<style>
#verUnidades .modal-dialog{
width: 900px;
}
</style>
 
  </head>
  <?php 
      include("config.php");
      include("modals.php");
  if (isset($_SESSION['username'])) {
  ?>
  <body>

    <!-- INICIO DE BARRA DE NAVEGACION -->
	<nav class="navbar navbar-default" role="navigation">
		<ul class="nav navbar-nav">
      <li><a href="#">SYSMAN | <?php echo $_SESSION['username']; ?></a> </li>
			
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
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="equipos" data-toggle="dropdown">
						Equipos
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="equipos">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#"  onclick="window.location.assign('index.php?p=Equipos')">Inventario de Equipos</a></li>
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
			<li>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="odt" data-toggle="dropdown" onclick="window.location.assign('php/logout.php')">
						Salir
					</button>
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
		   <div class="col-md-12" style="padding-top:50px;">
		   <span class="pull-right">&#169; 2014. Todos los derechos reservados. SYSMAN </span>
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
  <?php 
       }else{
	  include("login.php");
	}
?>
  </html>