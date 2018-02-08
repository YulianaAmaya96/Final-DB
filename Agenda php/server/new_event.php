<?php
  require('lib.php');
  session_start();
  if(isset($_SESSION['username'])){
    $con = new ConectorBD('localhost','root','root');
    $response['conexion']= $con->initConexion('agendaNextU');
    $data['Usuario_correoElectronico']= ".$_SESSION['username'].";
    $data['tituloEvento'] = "'".$_POST['titulo']."'";
    $data['fechaInicio'] = "'".$_POST['start_date']."'";
    if($_POST['allDay'] == "true"){
      $data['horaInicio'] = "NULL";
      $data['fechaFin'] = "NULL";
      $data['horaFin'] = "NULL";
      $data['diaCompleto'] = '1';
    }else{
      $data['horaInicio'] = "'".$_POST['start_hour']."'";
      $data['fechaFin'] = "'".$_POST['end_date']."'";
      $data['horaFin'] = "'".$_POST['end_hour']."'";
      $data['diaCompleto'] = '0';
    }
    if($response['conexion']=='OK'){
        if($con->insertData('Evento', $data)){
          $data['msg']="OK";
        }else {
          $data['msg']= "No se pudo insertar registro";
        }
      }else{
        $data['msg']="no se pudo conectar con la DB";
      }
  }else{
    $data['msg']="No se ha iniciado sesion";
  }
  echo json_encode($data);
 ?>
