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

<div id="nuevoEquipoModal" class="bootbox modal fade bootbox-alert in" tabindex="-1" role="dialog" aria-hidden="false">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <button onclick="$('#nuevoEquipoModal').modal('hide');" type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true" style="margin-top: -10px;">×</button>
    <div class="bootbox-body">
     <h2>Equipo Nuevo</h2><br>
     <div id="successAddEquipo" style="display:none;"></div>
     <div class="row">
      <div class="col-md-8">
       <label>Nombre</label>
       <input type="text" id="nombreEquipoNuevo" name="Nombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="col-md-4">
        <input type="file" id="uploadImgEquipoNuevo">
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