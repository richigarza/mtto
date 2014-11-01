$("input#actualizarEquipo").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarEquipos").text();
    datos['nombre'] = $("input#nombreEquipo").val();
    datos['descripcion'] = $("textarea#descripcionEquipo").val();
 $.ajax({
   url: "bah.php",
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

function eliminar(id, tb){
  if (confirm("Desea eliminar el "+ tb + " #" + id )){
    var datos = {};
    datos['id_eliminar'] = id;
    datos['tb_eliminar'] = tb;
    $.ajax({
      url: "eliminar.php",
	  type: "post",
	  datatype:"json",
	  data: datos,
	  success: function(response){
	  if(response.success){
	    $("span#TitleActualizarUnidad").html(id);
	    delete response.success;
	    $("textarea#descripcionUnidad").html(response["descripcion"]);
	    $("img#imgUnidad").attr("src", "img/"+response["imagen_equipo"]);
	    $("input#nombreUnidad").attr("value", response["ultimo_editor"]);
	    $("input#nombreUnidad").attr("disabled", "disabled");
	    $("select#estatusUnidad").val(response["estatus"]);	 
	  }else{
	    console.log(response.success);
	    console.log(response.msg);
	    delete response.msg;
	    delete response.success;
	  }
	}
      });
  }
}
function cargarActualizarUnidad(id){
  //$('div#verUnidades').modal('hide');
  var datos = {};
  datos['UE'] = id;
 $.ajax({
   url: "search.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarUnidad").html(id);
	 delete response.success;
	 $("textarea#descripcionUnidad").html(response["descripcion"]);
	 $("img#imgUnidad").attr("src", "img/"+response["imagen_equipo"]);
	 $("input#nombreUnidad").attr("value", response["ultimo_editor"]);
	 $("input#nombreUnidad").attr("disabled", "disabled");
	 $("select#estatusUnidad").val(response["estatus"]);	 
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
function cargarActualizarEquipo(id){
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
	   string += "<tr><td>" + response[key]['id'] + "</td><td>" + response[key]['departamento_id'] + "</td><td>" + response[key]['ultimo_mantenimiento'] + "</td><td>" + response[key]['id'] + "</td><td>" + response[key]['estatus'] + "</td><td><button type='button' data-toggle='modal' data-target='#actualizarUnidad' class='btn btn-default' onclick='cargarActualizarUnidad(" + response[key]['id'] + ")'><span class='glyphicon glyphicon-pencil'></span></button> <button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove-circle'></span></button></td></tr>";
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
