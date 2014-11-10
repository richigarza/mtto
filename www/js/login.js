function login(){
   var datos = {};
   datos['usuario'] = $('input#txt-usuario').val();
   datos['password'] = $('input#txt-password').val();
   $.ajax({
    url: "php/login.php",
       type: "post",
       datatype:"json",
       data: datos,
       success: function(response){
       if(response.success){
	 $("div#successLogin").html('<strong class="glyphicon glyphicon-ok-circle"></strong> ' + response.msg);
	 $("div#successLogin").show();
	 $("div#successLogin").attr("class", "alert alert-success");
	 delete response.msg;
	 delete response.success;
	 setTimeout("window.location='index.php'", 2000);
       }else{
	 $("div#successLogin").html('<strong class="glyphicon glyphicon-warning-sing"></strong> ' + response.msg);
	 $("div#successLogin").show();
	 $("div#successLogin").attr("class", "alert alert-danger");
	 console.log(response.success);
	 console.log(response.msg);
	 delete response.msg;
	 delete response.success;
	 $("#txt-usuario").css("border", "2px solid red");
	 $("#txt-password").css("border", "2px solid red");
       }
     }
   });
}
