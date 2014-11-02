$("button#nuevoDepartamento").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['nombre'] = $("input#nombreDepartamentoNuevo").val();
    datos['ubicacion'] = $("input#ubicacionDepartamentoNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/DP.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 cargarActualizarDepartamento(response['id']);
	 $('#nuevoDepartamentoModal').modal('hide');
	 $('#actualizarDepartamento').modal('show');
         $("div#successEditDepartamento").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego el Departamento correctamente.');
	 $("div#successEditDepartamento").show();
	 $("div#successEditDepartamento").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddDepartamento").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar el Departamento.')
	 $("div#successAddDepartamento").show();
	 $("div#successAddDepartamento").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarDepartamento").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarDepartamento").text();
    datos['nombre'] = $("input#nombreDepartamento").val();
    datos['ubicacion'] = $("input#ubicacionDepartamento").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/DP.php",
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

function cargarActualizarDepartamento(id){
 var datos = {};
 datos["DP"] = id;
 $.ajax({
   url: "php/DP.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarDepartamento").html(id);
	 delete response.success;
	 $("input#nombreDepartamento").attr("value", response["nombre"]);
	 $("input#ubicacionDepartamento").attr("value", response["ubicacion"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
