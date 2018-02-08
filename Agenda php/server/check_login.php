<?php

  require('lib.php');
  $conexion = new ConectorBD('localhost','root','root');
  $response['conexion']= $conexion->initConexion('agendaNextU');
  if( $response['conexion'] =='OK'){
    $respuesta_consulta = $conexion->consultar(['usuarios'], ['email', 'psw'], 'WHERE email="'.$_POST['username'].'"');
    if ($respuesta_consulta->num_rows != 0) {
      $fila = $respuesta_consulta->fetch_assoc();
      if (password_verify($_POST['passw'], $fila['psw'])) {
        $response['acceso'] = 'concedido';
        session_start();
        $_SESSION['username']=$fila['email'];
      }else {
        $response['mensaje'] = 'Contraseña incorrecta';
        $response['acceso'] = 'rechazado';
      }
    }else{
      $response['mensaje'] = 'Email incorrecto';
      $response['acceso'] = 'rechazado';
    }
  }
  echo json_encode($response);
  $conexion->cerrarConexion();
 ?>
