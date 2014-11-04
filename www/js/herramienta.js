$("button#nuevoHerramienta").click(function(){
    var datos = {};
    datos['nuevo'] = 1;
    datos['nombre'] = $("input#nombreHerramientaNuevo").val();
    datos['unidades_disponibles'] = $("input#unidades_disponiblesHerramientaNuevo").val();
    datos['descripcion'] = $("textarea#descripcionHerramientaNuevo").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/HE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.success;
	 cargarActualizarHerramienta(response['id']);
	 $('#nuevoHerramientaModal').modal('hide');
	 $('#actualizarHerramienta').modal('show');
         $("div#successEditHerramienta").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se agrego el Herramienta correctamente.');
	 $("div#successEditHerramienta").show();
	 $("div#successEditHerramienta").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successAddHerramienta").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar agregar el Herramienta.')
	 $("div#successAddHerramienta").show();
	 $("div#successAddHerramienta").attr("class", "alert alert-danger");
       }
     }
   });
});

$("input#actualizarHerramienta").click(function(){
    var datos = {};
    datos['id'] = $("span#TitleActualizarHerramienta").text();
    datos['nombre'] = $("input#nombreHerramienta").val();
    datos['unidades_disponibles'] = $("input#unidades_disponiblesHerramienta").val();
    datos['descripcion'] = $("textarea#descripcionHerramienta").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/HE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
         $("div#successEditHerramienta").html('<strong class="glyphicon glyphicon-ok-circle"></strong> Se modifico la Herramienta correctamente.');
	 $("div#successEditHerramienta").show();
	 $("div#successEditHerramienta").attr("class", "alert alert-success");
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
         $("div#successEditHerramienta").html('<strong class="glyphicon glyphicon-warning-sign"></strong> Ocurrio un Error al intentar modificar la Herramienta.')
	 $("div#successEditHerramienta").show();
	 $("div#successEditHerramienta").attr("class", "alert alert-danger");
       }
     }
   });
});

function cargarActualizarHerramienta(id){
 var datos = {};
 datos["HE"] = id;
 $.ajax({
   url: "php/HE.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("span#TitleActualizarHerramienta").html(id);
	 delete response.success;
	 $("input#nombreHerramienta").attr("value", response["nombre"]);
	 $("input#unidades_disponiblesHerramienta").attr("value", response["unidades_disponibles"]);
	 $("textarea#descripcionHerramienta").html(response["descripcion"]);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}
