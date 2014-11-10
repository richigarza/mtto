      	<!-- Configuracion de estilos locales -->
	<style type="text/css">
	
	h1{
	
	font-size:3em;
	
	}

	p{
	text-align:center;
	}
		
	</style>

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
      <input onclick="login();" id="btn-iniciar-sesion" type="button" class="btn btn-primary btn-lg btn-block" value="Iniciar sesion">              
     </div>
     <div class="form-group">
      <div id="successLogin" style="display:none;">
      </div>
     </div>			
    </form>
   </div>        
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
