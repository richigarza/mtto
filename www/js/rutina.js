$("button#nuevoRutina").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['equipo_id'] = $("select#equipoRutinaNuevo").val();
    datos['tiempo_procedimiento'] = $("input#tiempo_procedimientoNuevo").val();
    datos['descripcion'] = $("textarea#descripcionRutinaNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/RU.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 console.log(response);
	 delete response.success;
	 cargarActualizarRutina(response['id']);
	 $('#nuevoRutinaModal').modal('hide');
	 $('#actualizarRutina').modal('show');
         $("div#successEditRutina").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego la rutina correctamente.');
	 $("div#successEditRutina").show();
	 $("div#successEditRutina").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddEquipo").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar la rutina.')
	 $("div#successAddEquipo").show();
	 $("div#successAddEquipo").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarRutina").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarRutina").text();
    datos['equipo_id'] = $("select#equipoRutina").val();
    datos['tiempo_procedimiento'] = $("input#tiempo_procedimiento").val();
    datos['descripcion'] = $("textarea#descripcionRutina").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/RU.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditRutina").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico el Rutina correctamente.');
	 $("div#successEditRutina").show();
	 $("div#successEditRutina").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditRutina").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar el Rutina.')
	 $("div#successEditRutina").show();
	 $("div#successEditRutina").attr("class", "alert alert-danger");
       }
     }
   });
});

function cargarActualizarRutina(id){
 var datos = {};
 datos["RU"] = id;
 $.ajax({
   url: "php/RU.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarRutina").html(id);
	 delete response.success;
	 $("input#tiempo_procedimiento").attr("value", response["tiempo_procedimiento"]);
	 $("select#equipoRutina").val(response["equipo_id"]);
	 $("textarea#descripcionRutina").html(response["descripcion"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}

function mostrarDetallesRutina(id){
 var datos = {};
 datos["RU_DE"] = id;
 $.ajax({
   url: "php/RU.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 var string = "";
	 for (var key in response){
	   string += "<tr><td>" + response[key]['numero_paso'] + "</td><td>" + response[key]['descripcion'] + "</td><td>" + response[key]['tiempo_ejecucion'] + "</td></tr>";
	     console.log(string);
	 }
	 $("span#TitleRutinas").html(id);
	 $("tbody#tablaRutinasDetalle").html(string);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
