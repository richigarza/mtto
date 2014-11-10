$("button#nuevoEquipo").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['nombre'] = $("input#nombreEquipoNuevo").val();
    datos['tiempo_mantenimiento'] = $("input#tiempo_mantenimientoNuevo").val();
    datos['descripcion'] = $("textarea#descripcionEquipoNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/EQ.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 console.log(response);
	 delete response.success;
	 cargarActualizarEquipo(response['id']);
	 $('#nuevoEquipoModal').modal('hide');
	 $('#actualizarEquipo').modal('show');
         $("div#successEditEquipo").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego el equipo correctamente.');
	 $("div#successEditEquipo").show();
	 $("div#successEditEquipo").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddEquipo").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar el equipo.')
	 $("div#successAddEquipo").show();
	 $("div#successAddEquipo").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarEquipo").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarEquipos").text();
    datos['nombre'] = $("input#nombreEquipo").val();
    datos['tiempo_mantenimiento'] = $("input#tiempo_mantenimiento").val();
    datos['descripcion'] = $("textarea#descripcionEquipo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/EQ.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditEquipo").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico el equipo correctamente.');
	 $("div#successEditEquipo").show();
	 $("div#successEditEquipo").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditEquipo").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar el equipo.')
	 $("div#successEditEquipo").show();
	 $("div#successEditEquipo").attr("class", "alert alert-danger");
       }
     }
   });
});

function cargarActualizarUnidad(id){
  var datos = {};
  datos['UE'] = id;
 $.ajax({
   url: "php/UE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarUnidad").html(id);
	 delete response.success;
	 $("textarea#descripcionUnidad").html(response["descripcion"]);
	 $("select#departamento_idUnidad").val(response["departamento_id"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
$("input#unidadNueva").click(function(){
  var datos = {};
  datos['nueva'] = 1;
  datos['equipo_id'] = $("span#TitleUnidadesEquipos").text();
  datos['departamento_id'] = $("select#departamento_idUnidadNueva").val();
  datos['descripcion'] = $("textarea#descripcionUnidadNueva").val();
  datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/UE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 cargarActualizarUnidad(response['id']);
	 $('#nuevaUnidad').modal('hide');
	 $('#actualizarUnidad').modal('show');
         $("div#successEditUnidad").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego el equipo correctamente.');
	 $("div#successEditUnidad").show();
	 $("div#successEditUnidad").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditUnidad").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al agregar el equipo.')
	 $("div#successEditUnidad").show();
	 $("div#successEditUnidad").attr("class", "alert alert-danger");
       }
     }
   });    
});

function actualizarUnidad(){
  var datos = {};
  datos['id'] =  $("span#TitleActualizarUnidad").text();
  datos['departamento_id'] = $("select#departamento_idUnidad").val();
  datos['descripcion'] = $("textarea#descripcionUnidad").val();
  datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/UE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditUnidad").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico el equipo correctamente.');
	 $("div#successEditUnidad").show();
	 $("div#successEditUnidad").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditUnidad").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar el equipo.')
	 $("div#successEditUnidad").show();
	 $("div#successEditUnidad").attr("class", "alert alert-danger");
       }
     }
   });
}

function cargarActualizarEquipo(id){
 var datos = {};
 datos["EQ"] = id;
 $.ajax({
   url: "php/EQ.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarEquipos").html(id);
	 delete response.success;
	 $("textarea#descripcionEquipo").html(response["descripcion"]);
	 $("input#nombreEquipo").attr("value", response["nombre"]);
	 $("input#tiempo_mantenimiento").attr("value", response["tiempo_mantenimiento"]);
	 $("input#id_equipo_input").attr("value", id);
	 $("input#editor_equipo_input").attr("value", $('span#username').text());
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
   url: "php/UE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 img = "img/"+response["imagen_equipo"]+"";
	 delete response.success;
	 delete response.imagen_equipo;
	 var string = "";
	  var t = '"UNIDAD_EQUIPO"';
	 for (var key in response){
	   string += "<tr><td>" + response[key]['id'] + "</td><td>" + response[key]['departamento_id'] + "</td><td>" + response[key]['ultimo_mantenimiento'] + "</td><td>" + response[key]['proximo_mantenimiento'] + "</td><td><button type='button' data-toggle='modal' data-target='#actualizarUnidad' class='btn btn-default' onclick='cargarActualizarUnidad(" + response[key]['id'] + ")'><span class='glyphicon glyphicon-pencil'></span></button> <button type='button' class='btn btn-danger' onclick='eliminar(" + response[key]['id'] + ", "+t+");'><span class='glyphicon glyphicon-remove-circle'></span></button></td></tr>";
	 }
	 $("span#TitleUnidadesEquipos").html(id);
	 $("tbody#tablaUnidadesEquipos").html(string);
	 $("img#imgUnidad").attr("src", img);
	 $("img#imgUnidadNueva").attr("src", img);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
