$("button#nuevoRefaccion").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['nombre'] = $("input#nombreRefaccionNuevo").val();
    datos['equipo_id'] = $("select#equipo_idRefaccionNuevo").val();
    datos['descripcion'] = $("textarea#descripcionRefaccionNuevo").val();
    datos['costo_refaccion'] = $("input#costo_refaccionRefaccionNuevo").val();
    datos['unidades_disponibles'] = $("input#unidades_disponiblesRefaccionNuevo").val();
    datos['unidades_por_equipo'] = $("input#unidades_por_equipoRefaccionNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/RF.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 cargarActualizarRefaccion(response['id']);
	 $('#nuevoRefaccionModal').modal('hide');
	 $('#actualizarRefaccion').modal('show');
         $("div#successEditRefaccion").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego la refacción correctamente.');
	 $("div#successEditRefaccion").show();
	 $("div#successEditRefaccion").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddRefaccion").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar la refaccion.')
	 $("div#successAddRefaccion").show();
	 $("div#successAddRefaccion").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarRefaccion").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarRefaccion").text();
    datos['nombre'] = $("input#nombreRefaccion").val();
    datos['equipo_id'] = $("select#equipo_idRefaccion").val();
    datos['descripcion'] = $("textarea#descripcionRefaccion").val();
    datos['costo_refaccion'] = $("input#costo_refaccionRefaccion").val();
    datos['unidades_disponibles'] = $("input#unidades_disponiblesRefaccion").val();
    datos['unidades_por_equipo'] = $("input#unidades_por_equipoRefaccion").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/RF.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditRefaccion").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico la refacción correctamente.');
	 $("div#successEditRefaccion").show();
	 $("div#successEditRefaccion").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditRefaccion").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar la refacción.')
	 $("div#successEditRefaccion").show();
	 $("div#successEditRefaccion").attr("class", "alert alert-danger");
       }
     }
   });
});

function cargarActualizarRefaccion(id){
 var datos = {};
 datos["RF"] = id;
 $.ajax({
   url: "php/RF.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarRefaccion").html(id);
	 delete response.success;
	 $("input#nombreRefaccion").attr("value", response["nombre"]);
	 $("select#equipo_idRefaccion").val(response["equipo_id"]);
	 $("textarea#descripcionRefaccion").html(response["descripcion"]);
	 $("input#costo_refaccionRefaccion").attr("value", response["costo_refaccion"]);
	 $("input#unidades_disponiblesRefaccion").attr("value", response["unidades_disponibles"]);
	 $("input#unidades_por_equipoRefaccion").attr("value", response["unidades_por_equipo"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
