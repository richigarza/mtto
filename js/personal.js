$("button#nuevoUsuario").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['nombre'] = $("input#nombreUsuarioNuevo").val();
    datos['departamento_id'] = $("select#departamento_idUsuarioNuevo").val();
    datos['username'] = $("input#usuarioUsuarioNuevo").val();
    datos['password'] = $("input#passwordUsuarioNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/PE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 cargarActualizarUsuario(response['id']);
	 $('#nuevoUsuarioModal').modal('hide');
	 $('#actualizarUsuario').modal('show');
         $("div#successEditUsuario").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego la refacción correctamente.');
	 $("div#successEditUsuario").show();
	 $("div#successEditUsuario").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddUsuario").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar la Usuario.')
	 $("div#successAddUsuario").show();
	 $("div#successAddUsuario").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarUsuario").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarUsuario").text();
    datos['nombre'] = $("input#nombreUsuario").val();
    datos['departamento_id'] = $("select#departamento_idUsuario").val();
    datos['username'] = $("input#usuarioUsuario").val();
    datos['password'] = $("input#passwordUsuario").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/PE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditUsuario").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico el usuario correctamente.');
	 $("div#successEditUsuario").show();
	 $("div#successEditUsuario").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditUsuario").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar el usuario.')
	 $("div#successEditUsuario").show();
	 $("div#successEditUsuario").attr("class", "alert alert-danger");
       }
     }
   });
});

function cargarActualizarUsuario(id){
 var datos = {};
 datos["PE"] = id;
 $.ajax({
   url: "php/PE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarUsuario").html(id);
	 delete response.success;
	 $("input#nombreUsuario").attr("value", response["nombre_usuario"]);
	 $("select#departamento_idUsuario").val(response["departamento_id"]);
	 $("input#usuarioUsuario").attr("value", response["username"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
