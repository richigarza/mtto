    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sysman.css" rel="stylesheet">
<div class="modal show" tabindex="-1" role="dialog" aria-hidden="true" style="background-color:#F3F0F0;">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h1 class="text-center">SYSMAN </h1>
   </div>
   <div class="modal-body">

<?php
/////////////////////////////
// upload_img_equipo.php
////////////////////////////
include("../config.php");

function upload($formato, $tmp, $editor, $id){
  $uploadfile = "../img/".$id."".$formato;
  if (move_uploaded_file($tmp, $uploadfile)) {
    $query = "UPDATE EQUIPO SET imagen_equipo='".$id."".$formato."', ultima_fecha_actualizacion='".date('Y-m-d H:i:s')."', ultimo_editor='".$editor."' WHERE id=".$id;
    mysql_query($query) or die(mysql_error());


    $result['success'] = true;    
    $result['msg'] = 'Archivo cargado correctamente';
  } else {
    $result['msg'] = "Error de conexión con el servidor.";
    $result['success'] = false;
  }
  return $result;
}

if (isset($_FILES['img'])){

  $max=3000000; 
  $filesize = $_FILES['img']['size'];
  $filename = trim($_FILES['img']['name']);
  $filename = substr($filename, -20);
  if($filesize < $max){
    if($filesize > 0){
      if(ereg(".jpg", $filename)){
	$result = upload(".jpg", $_FILES['img']['tmp_name'], $_POST['editor'], $_POST['id']);
      }else if (ereg(".png", $filename)){
	$result = upload(".png", $_FILES['img']['tmp_name'], $_POST['editor'], $_POST['id']);	  
      } else {
	$result['msg'] = "Sólo se permiten imágenes en formato jpg. y png., no se ha podido adjuntar.";
	$result['success'] = false;
      }
    } else {
      $result['msg'] = "Campo vacío, no ha seleccionado ninguna imagen";
      $result['success'] = false;
    }
  } else {
    $result['msg'] = "La imagen que ha intentado adjuntar es mayor de 3 Mb, cambie el tamaño del archivo y vuelva a intentarlo.";
    $result['success'] = false;
  }
}else{
  echo "<div class='alert alert-danger'>No se envio la imagen</div>";
}
echo "<div class='alert ";
if ($result["success"]){
  echo "alert-success'>";
}else{
  echo "alert-danger'>";
}
echo $result['msg']."</div>";
?>
<script>
setTimeout("window.location='../index.php?p=Equipos'", 2500);
</script>
   </div>        
   <div class="modal-footer">
    <div class="col-md-12" style="padding-top:50px;">
   <span class="pull-right">&#169; 2014. Todos los derechos reservados. SYSMAN </span>
   </div>    
   </div>
  </div>
 </div>
</div>
<!-- SCRIPTS -->

    <!-- Bootstrap -->
   <script src="../js/j.js"></script>
   <script src="../js/bootstrap.min.js"></script>
