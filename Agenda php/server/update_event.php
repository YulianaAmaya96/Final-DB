<?php

  require('lib.php');

  $id = "'".$_POST['id']."'";
  $data['fechaInicio'] = "'".$_POST['start_date']."'";
  $data['horaInicio'] = "'".$_POST['start_hour']."'";
  $data['fechaFin'] = "'".$_POST['end_date']."'";
  $data['horaFin'] = "'".$_POST['end_hour']."'";
  $con = new ConectorBD('localhost','root','root');
  $response['conexion']= $con->initConexion('agendaNextU');
  if($response['conexion']=='OK'){
    $con->actualizarRegistro('Evento',$data,'idEvento='.$id);
    $data['msg']="OK";
  }else{
    $data['msg']="Error ingresando a base de datos en crear nuevo evento :(";
  }
  echo json_encode($data);
 ?>
