<?php

  require('lib.php');

  $id = "'".$_POST['id']."'";
  $con = new ConectorBD('localhost','root','root');
  $response['conexion']= $con->initConexion('agendaNextU');
  if($response['conexion']=='OK'){
    $data['msg']="OK";
    $con->eliminarRegistro('Evento','idEvento = '.$id);
  }else{
    $data['msg']="No se pudo eliminar el registro";
  }
  echo json_encode($data);
 ?>
