<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Iniciar sesion | SYSMAN </title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- <link href="css/styles.css" rel="stylesheet"> -->
	</head>
	
	
	
	
	
	<body>
            
	<!-- Configuracion de estilos locales -->
	<style type="text/css">
	
	h1{
	
	font-size:3em;
	
	}

	p{
	text-align:center;
	}
		
	</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
        
  $(document).ready(function () {    
     $("#btn-iniciar-sesion").click(function () {        
       //Obtenemos los valores de los campos
         var usuario = $("#txt-usuario").val();
         var password = $("#txt-password").val();                
         if(usuario == "")
         {
             $("#txt-usuario").css("border", "2px solid red");
         }
         if(password == "")
         {
	 $("#txt-password").css("border", "2px solid red");
         }        
        if(usuario == "" || password == "")
        {
            return;
        }        
     });
  });
</script>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" style="background-color:#F3F0F0;">
 <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h1 class="text-center">SYSMAN | Bienvenido</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input id="txt-usuario" type="text" class="form-control input-lg" placeholder="Usuario">
            </div>
            <div class="form-group">
              <input id="txt-password" type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button id="btn-iniciar-sesion" class="btn btn-primary btn-lg btn-block">Iniciar sesion</button>
              
            </div>
	
              
            <!-- Poner aqui validacion de PHP para mostrar error de login
            La funcion de login que retorne un valor booleano, y en base a este valor
            si el login es incorrecto, mostramos este div -->
            <div class="form-group">
	     <div id="successLogin" style="display:none;">
             </div>
            </div>
			
          </form>
      </div>
        
        
<script>
  $("button#btn-iniciar-sesion").click(function(){
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
	 setTimeout('window.location="index.php"', 35000);
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

  });
</script>	  
		
	
      <div class="modal-footer">
          <div class="col-md-12">
          <span class="pull-right"><a href="#">¿Olvidaste tu contraseña?</a></span>
	
		
	

		
		  </div>	
		   <div class="col-md-12" style="padding-top:50px;">
		   <span class="pull-right">&#169; 2014. Todos los derechos reservados. SYSMAN </span>
		   </div>
		  
		  
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
                <!-- <script src="js/vendor/jquery-1.11.1.js" type="text/javascript"></script>-->
	</body>
</html>
