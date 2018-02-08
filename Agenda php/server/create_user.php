<?php
  require('lib.php');
  $con = new ConectorBD('localhost','root','root');
  if ($con->initConexion('agendaNextU')=='OK') {
    $datos1['correoElectronico'] = "usuario1@mail.com";
    $datos2['correoElectronico'] = "usuario2@mail.com";
    $datos3['correoElectronico'] = "usuario3@mail.com";
    $datos1['nombreCompleto'] = "Pepito Perez";
    $datos2['nombreCompleto'] = "Fulanito de tal";
    $datos3['nombreCompleto'] = "Paco Florez";
    $datos1['contrasena'] = "'".password_hash('12345', PASSWORD_DEFAULT)."'";
    $datos2['contrasena'] = "'".password_hash('54321', PASSWORD_DEFAULT)."'";
    $datos3['contrasena'] = "'".password_hash('56789', PASSWORD_DEFAULT)."'";
    $datos1['fechaNacimiento'] = "1996-05-22'";
    $datos2['fechaNacimiento'] = "1994-12-04";
    $datos3['fechaNacimiento'] = "1997-08-09";
    try{
      $con->insertData('Usuario', $datos1)
      $con->insertData('Usuario', $datos3)
      $con->insertData('Usuario', $datos2)
      echo "Se insertaron los datos correctamente";
    }catch(Exception $e){
      else echo "Se ha producido un error en la inserción",  $e->getMessage();
    }
    $con->cerrarConexion();
  }else {
    echo "Se presentó un error en la conexión";
  }
 ?>
