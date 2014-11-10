$("button#nuevoODTBoton").click(function(){
    var datos = {};
    datos["nuevo"] = 1;
    datos["equipo_id"] = $("select#equipoODT").val();
    datos["usuario_id"] = $("select#usuarioODT").val();
    datos["rutina_id"] = $("select#rutinaODT").val();
    datos["unidad_equipo_id"] = $("select#unidadODT").val();
    datos["hora"] = $("select#horaODT").val();
    datos["fecha"] = $("input#fechaODT").val();
    datos['editor'] = $('span#username').text();
 $.ajax({
   url: "php/get_ODT.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 window.location="index.php?p=ODT";
	 delete response.success;
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
});

function getEquipo(){
    var datos = {};
    datos["equipo_id"] = $("select#equipoODT").val();
 $.ajax({
   url: "php/get_ODT.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 delete response.success;
	 var string = "";
	 for (var key in response[0]){
	     string += "<option value='"+response[0][key]['id']+"'>"+response[0][key]['descripcion']+"</option>";
         }
	 $("select#rutinaODT").html(string);
	 var string = "";
	 for (var key in response[1]){
	     string += "<option value='"+response[1][key]['id']+"'>"+response[1][key]['descripcion']+"</option>";
         }
	 $("select#unidadODT").html(string);
       }else{
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
       }
     }
   });
}

function cargarODT(id, id_UQ){
    $("span#TitleEvidencias").html(id);
    $("input#id_ODT").attr("value", id);
    $("input#id_UQ").attr("value", id_UQ);
    $("input#editor").attr("value", $('span#username').text());
}
