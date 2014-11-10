<!-- ODT -->
<div id="nuevoODTModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoODTModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
     <div class="bootbox-body">
      <h2>Nueva Orden de Trabajo #<span id="TitleEvidencias"></span></h2><br>
      <div class="panel-body">
       <div class="row">
        <div class="col-md-6">
         <label>Equipo</label>
          <select id="equipoODT" class="form-control" onchange="getEquipo();">
	   <option disabled selected>Seleccione</option>
       <?php 
         $output = mysql_query("SELECT id, nombre FROM EQUIPO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
         </select>
        </div>
        <div class="col-md-6">
         <label>Unidad</label>
         <select id="unidadODT" class="form-control">
	   <option disabled>Seleccione</option>
	 </select>
	</div>
       </div>
       <div class="row">
        <div class="col-md-6">
         <label>Fecha</label>
	    <div class='input-group date' >
            <input id="fechaODT"type='date' class="form-control" />
            <span id ="MostrarCalendario" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> 
            </div>
        </div>
        <div class="col-md-6">
         <label>Hora</label>
          <select id="horaODT" class="form-control" onchange="getEquipo();">
	   <option disabled selected>Seleccione</option>
	   <?php
	   for($i = 0; $i < 24; $i++){
	     echo '<option>'.$i.':00</option>';
	   }
?>
         </select>
        </div>
       </div>
       <div class="row">
        <div class="col-md-6">
         <label>Técnico</label>	  
          <select id="usuarioODT" class="form-control">
	   <option disabled selected>Seleccione</option>
       <?php 
         $output = mysql_query("SELECT id, nombre_usuario FROM USUARIO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre_usuario"].'</option>';
         }
       ?>
         </select>
        </div>
        <div class="col-md-6">
         <label>Rutina</label>	  
          <select id="rutinaODT" class="form-control">
	   <option disabled selected>Seleccione</option>
	  </select>
	</div>
       </div>	 
      </div>
     </div>
    </div>
   <div class="modal-footer">
    <button id="nuevoODTBoton" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo</button>
    <input type="button" onclick="$('#nuevoODTModal').modal('hide');" class="btn btn-danger" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="uploadEvidencias" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#uploadEvidencias').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
     <form action="php/ODT.php" method="post" enctype="multipart/form-data">
      <div class="bootbox-body">
       <h2>Subir evidencia mtto #<span id="TitleEvidencias"></span></h2><br>
       <div class="panel-body">
        <div class="row">
         <div class="col-md-12">
          <label>Selecciona el archivo</label>
          <input type="file" name="img" class="form-control">
          <input type="text" id="id_ODT" name="id_ODT" hidden>
          <input type="text" id="id_UQ" name="id_UQ" hidden>
          <input type="text" id="editor" name="editor" hidden>
         </div>
        </div>
       </div>
      </div>
     </div>
    <div class="modal-footer">
     <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Subir</button>
     <input type="button" onclick="$('#uploadEvidencias').modal('hide');" class="btn btn-danger" value="Cerrar">
    </div>
   </form>
  </div>
 </div>
</div>


<!-- Rutinas -->
<div id="verDetalles" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#verDetalles').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

   <h2>Detalle de Rutina #<span id="TitleRutinas"></span></h2><br>
     <div class="panel-body">
      <table class="table table-condensed table-hover">
       <thead>
        <tr>
	 <th>Paso #</th>
	 <th>Procedimiento</th>
	 <th>Tiempo</th>
	</tr>
       </thead>
       <tbody id="tablaRutinasDetalle">
       </tbody>
      </table>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input type="button" onclick="$('#verDetalles').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="actualizarRutina" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarRutina').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Rutina #<span id="TitleActualizarRutina"></span></h2><br>
     <div id="successEditRutina" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-6">
       <label>Equipo</label>
       <select id="equipoRutina" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM EQUIPO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
      <div class="col-md-6">
       <label>Tiempo de Rutina</label>
       <input id="tiempo_procedimiento" name="tiempo_procedimiento" class="form-control" placeholder="Tiempo">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionRutina" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarRutina" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <button id="" class="btn btn-info btn-lg" data-toggle="modal" data-target="#RutinaDetalleModal" onclick="mostrarEditarDetallesRutina();"><span class="glyphicon glyphicon-pencil"></span> Detalles</button>
    <input type="button" onclick="$('div#successEditRutina').hide();$('#actualizarRutina').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="RutinaDetalleModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#RutinaDetalleModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Detalles de Rutina #<span id="TitleRutinaDetalle"></span></h2><br>
     <div id="successEditRutinaDetalle" style="display:none;"></div>
      <table class="table table-condensed table-hover">
       <thead>
        <tr>
	 <th>Paso #</th>
	 <th>Procedimiento</th>
	 <th>Tiempo</th>
	 <th></th>
	</tr>
       </thead>
       <tbody id="tablaRutinasDetalleInputs">
        <tr>
	 <td><span id="pasoNuevo"></span></td>
	 <td><textarea id="procedimientoNuevo" placeholder="procedimiento" class="form-control"></textarea></td>
         <td><input id="tiempoNuevo" type="text" placeholder="tiempo" class="form-control"></td>
	 <td><button id="addPasoRutina" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></button></td>
	</tr>
       </tbody>
      </table>	   
    </div>
   </div>
   <div class="modal-footer">
    <button id="saveRutinaDetalle" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-saved"></span> Guardar</button>
    <input type="button" onclick="$('div#successEditRutinaDetalle').hide();$('#RutinaDetalleModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>


<div id="nuevoRutinaModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoRutinaModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Nueva Rutina</h2><br>
     <div class="row">
      <div class="col-md-6">
       <label>Equipo</label>
       <select id="equipoRutinaNuevo" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM EQUIPO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
      <div class="col-md-6">
       <label>Tiempo de Rutina</label>
       <input id="tiempo_procedimientoNuevo" name="tiempo_procedimiento" class="form-control" placeholder="Tiempo">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionRutinaNuevo" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoRutina" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successEditRutina').hide();$('#nuevoRutinaModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- Unidades -->
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
    <button data-toggle="modal" data-target="#nuevaUnidad" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-plus-sign"></span> Agregar Unidad</button>    
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
       <img id="imgUnidad" width="190px">
      </div>
      <div class="col-md-6">
       <label>Departamento</label>
       <select id="departamento_idUnidad" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM DEPARTAMENTO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
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
    <input onclick="actualizarUnidad();" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditUnidad').hide();$('#actualizarUnidad').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="nuevaUnidad" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevaUnidad').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Nueva Unidad</span></h2><br>
     <div class="row">
      <div class="col-md-4">
       <img id="imgUnidadNueva" width="190px">
      </div>
      <div class="col-md-6">
       <label>Departamento</label>
       <select id="departamento_idUnidadNueva" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM DEPARTAMENTO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionUnidadNueva" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="unidadNueva" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditUnidad').hide();$('#nuevaUnidad').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- Equipo -->
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
      <div class="col-md-4">
       <img id="imgEquipo" width="190">
      </div>
	<form action="php/upload_img_equipo.php" method="post" enctype="multipart/form-data">
	 <div class="col-md-8">
	  <label>Selecciona una imagen</label>
          <input type="file" name="img" class="form-control"> <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Subir</button>
          <input type="text" id="id_equipo_input" name="id" hidden>
          <input type="text" id="editor_equipo_input" name="editor" hidden>
	 </div>
	</form>
     </div>
     <div class="row">
      <div class="col-md-6">
       <label>Nombre</label>
       <input type="text" id="nombreEquipo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-6">
       <label>Días para mtto preventivo</label>
       <input type="number" min="1" class="form-control" id="tiempo_mantenimiento" placeholder="número de días para el mtto">
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

<div id="nuevoEquipoModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoEquipoModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Equipo Nuevo</h2><br>
     <div id="successAddEquipo" style="display:none;"></div>
     <div class="row">
      <div class="col-md-6">
       <label>Nombre</label>
       <input type="text" id="nombreEquipoNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-6">
       <label>Días para mtto preventivo</label>
       <input type="number" min="1" class="form-control" id="tiempo_mantenimientoNuevo" placeholder="número de días para el mtto">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionEquipoNuevo" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoEquipo" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successAddEquipo').hide();$('#nuevoEquipoModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- Departamento -->   
<div id="actualizarDepartamento" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarDepartamento').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Modificar Departamento #<span id="TitleActualizarDepartamento"></span></h2><br>
     <div id="successEditEquipo" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Nombre</label>
       <input type="text" id="nombreDepartamento" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Ubicación</label>
       <input type="text" id="ubicacionDepartamento" name="Ubicacion" class="form-control" placeholder="Ubicacion">
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarDepartamento" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditDepartamento').hide();$('#actualizarDepartamento').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>


<div id="nuevoDepartamentoModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoDepartamentoModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Departamento Nuevo</h2><br>
     <div id="successAddDepartamento" style="display:none;"></div>
     <div class="row">
      <div class="col-md-12">
       <label>Nombre</label>
       <input type="text" id="nombreDepartamentoNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Ubicación</label>
       <input type="text" id="ubicacionDepartamentoNuevo" name="Ubicacion" class="form-control" placeholder="Ubicacion">
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoDepartamento" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successAddDepartamento').hide();$('#nuevoDepartamentoModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- REFACCION -->   
<div id="actualizarRefaccion" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarRefaccion').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Modificar Refaccion #<span id="TitleActualizarRefaccion"></span></h2><br>
     <div id="successEditRefaccion" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreRefaccion" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Equipo</label>
       <select id="equipo_idRefaccion" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM EQUIPO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionRefaccion" name="descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>
     <div class="row">
      <div class="col-md-4">
       <label>Costo</label>
       <input type="text" id="costo_refaccionRefaccion" name="costo" class="form-control" placeholder="Costo">
      </div>
      <div class="col-md-4">
       <label>Unidades Disponibles</label>
       <input type="text" id="unidades_disponiblesRefaccion" name="unidadesdisponibles" class="form-control" placeholder="Unidades Disponibles">
      </div>
      <div class="col-md-4">
       <label>Unidades por Equipo</label>
       <input type="text" id="unidades_por_equipoRefaccion" name="unidadesporequipo" class="form-control" placeholder="Unidades por Equipo">
      </div>
     </div>
    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarRefaccion" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditRefaccion').hide();$('#actualizarRefaccion').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>


<div id="nuevoRefaccionModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoRefaccionModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Refaccion Nueva</h2><br>
     <div id="successAddRefaccion" style="display:none;"></div>

     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreRefaccionNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Equipo</label>
       <select id="equipo_idRefaccionNuevo" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM EQUIPO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionRefaccionNuevo" name="descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>
     <div class="row">
      <div class="col-md-4">
       <label>Costo</label>
       <input type="text" id="costo_refaccionRefaccionNuevo" name="costo" class="form-control" placeholder="Costo">
      </div>
      <div class="col-md-4">
       <label>Unidades Disponibles</label>
       <input type="text" id="unidades_disponiblesRefaccionNuevo" name="unidadesdisponibles" class="form-control" placeholder="Unidades Disponibles">
      </div>
      <div class="col-md-4">
       <label>Unidades por Equipo</label>
       <input type="text" id="unidades_por_equipoRefaccionNuevo" name="unidadesporquipo" class="form-control" placeholder="Unidades por Equipo">
      </div>
     </div>
    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoRefaccion" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successAddRefaccion').hide();$('#nuevoRefaccionModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- Herramienta -->
<div id="actualizarHerramienta" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarHerramienta').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Herramienta #<span id="TitleActualizarHerramienta"></span></h2><br>
     <div id="successEditHerramienta" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreHerramienta" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Numero Unidades</label>
       <input type="text" id="unidades_disponiblesHerramienta" name="unidades_disponibles" class="form-control" placeholder="Número de unidades">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionHerramienta" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarHerramienta" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditHerramienta').hide();$('#actualizarHerramienta').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="nuevoHerramientaModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoHerramientaModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Herramienta Nueva</h2><br>
     <div id="successAddHerramienta" style="display:none;"></div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreHerramientaNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Numero Unidades</label>
       <input type="text" id="unidades_disponiblesHerramientaNuevo" name="unidades_disponibles" class="form-control" placeholder="Número de unidades">
      </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <label>Descripción</label>
       <textarea id="descripcionHerramientaNuevo" name="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoHerramienta" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successAddHerramienta').hide();$('#nuevoHerramientaModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<!-- USUARIOS -->
<div id="actualizarUsuario" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#actualizarUsuario').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">

     <h2>Modificar Usuario #<span id="TitleActualizarUsuario"></span></h2><br>
     <div id="successEditUsuario" style="display:none;">
     </div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreUsuario" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Departamento</label>
       <select id="departamento_idUsuario" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM DEPARTAMENTO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
     </div>
     <div class="row">
      <div class="col-md-6">
       <label>Usuario</label>
       <input type="text" id="usuarioUsuario" name="usuario" class="form-control" placeholder="Usuario">
      </div>
      <div class="col-md-6">
       <label>Password</label>
       <input type="password" id="passwordUsuario" name="password" class="form-control" placeholder="Password">
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <input id="actualizarUsuario" type="button" class="btn btn-primary btn-lg" value="Actualizar">
    <input type="button" onclick="$('div#successEditUsuario').hide();$('#actualizarUsuario').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>

<div id="nuevoUsuarioModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoUsuarioModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Usuario Nuevo</h2><br>
     <div id="successAddUsuario" style="display:none;"></div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreUsuarioNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
       <label>Departamento</label>
       <select id="departamento_idUsuarioNuevo" class="form-control">
       <?php 
         $output = mysql_query("SELECT id, nombre FROM DEPARTAMENTO WHERE estatus='A'") or die(mysql_error());
         while ($lista = mysql_fetch_assoc($output)){
          echo '<option value="'.$lista["id"].'">'.$lista["nombre"].'</option>';
         }
       ?>
       </select>
      </div>
     </div>
     <div class="row">
      <div class="col-md-6">
       <label>Usuario</label>
       <input type="text" id="usuarioUsuarioNuevo" name="usuario" class="form-control" placeholder="Usuario">
      </div>
      <div class="col-md-6">
       <label>Password</label>
       <input type="password" id="passwordUsuarioNuevo" name="password" class="form-control" placeholder="Password">
      </div>
     </div>

    </div>
   </div>
   <div class="modal-footer">
    <button id="nuevoUsuario" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo</button>
    <input type="button" onclick="$('div#successAddUsuario').hide();$('#nuevoUsuarioModal').modal('hide');" class="btn btn-danger btn-lg" value="Cerrar">
   </div>
  </div>
 </div>
</div>
