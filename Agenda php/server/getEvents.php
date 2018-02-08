<?php

require('lib.php');
session_start();

  if(isset($_SESSION['username'])){
    $con = new ConectorBD('localhost','root','root');
    $response['conexion']= $con->initConexion('agendaNextU');

    if($response['conexion']=='OK'){
      $consulta = $con->consultar(['Evento'], [*], "WHERE Usuario_correoElectronico = '".$_SESSION['username']."'");
      $i=0;

       while($eventos = $consulta->fetch_assoc()){
         foreach ($eventos as $key => $value) {
           $data['Evento'][$i][$key] = $eventos[$key];
         }
         $i++;
       }
      $data['msg']='OK';
    }else{
      $data['msg']="Error al conectar con la base de datos";
    }
  }
  echo json_encode($data);
 ?>
