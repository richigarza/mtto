$("button#saveRutinaDetalle").click(function(){
    var datos = {};
    datos['rutina_idModificar'] = $("span#TitleActualizarRutina").text();
    datos['numero_paso'] = $("span#pasoModificar").text();
    datos['tiempo_ejecucion'] = $("input#tiempoModificar").val();
    datos['descripcion'] = $("textarea#procedimientoModificar").val();
    datos['editor'] = $('span#username').text();
    if ( !datos['tiempo_ejecucion'] || !datos['descripcion'] || !datos['numero_paso'] || !datos['editor'] ){
	alert("Un campo esta Nulo o no estas modificando un Paso que ya existe");
    }else{
	$.ajax({
	    url: "php/RU.php",
	    type: "post",
	    datatype:"json",
	    data: datos,
	    success: function(response){
		if(response.success){
		    delete response.success;
		    mostrarEditarDetallesRutina();
		}else{
		    console.log(response.success);
		    console.log(response.msg);
		    delete response.msg;
		    delete response.success;
		} 
	    }
	});
    }
    
});
function eliminarPasoRutina(id, num){
    if(confirm("Seguro que deseas borrar el paso #" + num)){
	var datos = {};
	datos['rm_id'] = id;
	datos['rutina_id'] = $("span#TitleActualizarRutina").text();
	datos['numero_paso'] = num;
	datos['editor'] = $('span#username').text();
	$.ajax({
	    url: "php/RU.php",
	    type: "post",
	    datatype:"json",
	    data: datos,
	    success: function(response){
		if(response.success){
		    delete response.success;
		    mostrarEditarDetallesRutina();
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

function addPasoRutina(){
    var datos = {};
    datos['rutina_id'] = $("span#TitleActualizarRutina").text();
    datos['numero_paso'] = $("span#pasoNuevo").text();
    datos['tiempo_ejecucion'] = $("input#tiempoNuevo").val();
    datos['descripcion'] = $("textarea#procedimientoNuevo").val();
    datos['editor'] = $('span#username').text();
    if ( !datos['tiempo_ejecucion'] || !datos['descripcion'] || !datos['numero_paso'] || !datos['editor'] ){
	alert("Un campo esta nulo");
    }else{
	$.ajax({
	    url: "php/RU.php",
	    type: "post",
	    datatype:"json",
	    data: datos,
	    success: function(response){
		if(response.success){
		    delete response.success;
		    mostrarEditarDetallesRutina();
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

function mostrarEditarDetallesRutina(act){
 var datos = {};
 var id = $("span#TitleActualizarRutina").text();
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
	 var num = 0;
	 for (var key in response){
	   num = response[key]['numero_paso'];
	   if(response[key]['id'] == act){
	       string += '<tr><td><span id="pasoModificar">' + num +'</span></td><td><textarea id="procedimientoModificar" placeholder="procedimiento" class="form-control">'+ response[key]["descripcion"] +'</textarea></td><td><input id="tiempoModificar" value="'+ response[key]["tiempo_ejecucion"] + '" type="number" min="1" placeholder="tiempo" class="form-control"></td><td><button type="button" onclick="eliminarPasoRutina('+ response[key]["id"] + ', ' +num+');" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></button></td></tr>';
	   }else{
	       string += "<tr><td>" + num + "</td><td>" + response[key]['descripcion'] + "</td><td>" + response[key]['tiempo_ejecucion'] + "</td><td><button class='btn btn-default' onclick='mostrarEditarDetallesRutina("+ response[key]['id']+");'><span class='glyphicon glyphicon-pencil'></span></button></td></tr>";
	   }
	 }
	 $("span#TitleRutinaDetalle").html(id);
	 if (!act){
	 string += '<tr><td><span id="pasoNuevo">' + ++num +'</span></td><td><textarea id="procedimientoNuevo" placeholder="procedimiento" class="form-control"></textarea></td><td><input id="tiempoNuevo" type="number" min="1" placeholder="tiempo" class="form-control"></td><td><button type="button" onclick="addPasoRutina();" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></button></td></tr>';
	 }
	 $("tbody#tablaRutinasDetalleInputs").html(string);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}

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
