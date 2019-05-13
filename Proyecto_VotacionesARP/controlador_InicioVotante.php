<?php

  include 'conex_bd.php';

  $nif = $_REQUEST['nif'];
  $pass = $_REQUEST['pass'];


  //Terminar comprobacion
  /*if(empty($nif) || empty($pass)) {
    header("Location: index.html");
  }*/


  $orden = ("SELECT * FROM votantes WHERE NIF = '$nif' AND '$pass' = AES_DECRYPT(PASSWORD, 'alejandro')");

  $resultado = $conexion -> query($orden);

  if($resultado && $resultado -> num_rows == 1) {
    $ArrayLogIn = array();
    $ArrayLogIn = $resultado -> fetch_array();
    if($ArrayLogIn['PASSWORD'] = $pass) {
        session_start();
        $_SESSION['nif'] = $nif;
        $_SESSION['pass'] = $pass;
        $_SESSION['rol'] = $ArrayLogIn['ROL'];

        if($ArrayLogIn['ROL'] == "NORMAL") {
          header("Location: Vista_Menu.php");
        } else {
          header("Location: Vista_MenuAdmin.php");
        }
    } elseif($ArrayLogIn['PASSWORD'] != $pass) {
      $MensError = "La contraseña es incorrecta, pruebe de nuevo";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
        //header("Location: index.html");
    } else {
      $MensError = "Ese usuario no existe, por favor regístrese";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
        //header("Location: index.html");
    }    
  } else {
      $MensError = "Ese usuario no existe, por favor regístrese";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
  }

  /*if ($resultado && $resultado -> num_rows == 1) {
    $filaVotante = $resultado -> fetch_array();
    header("Location: control_Baja.php");
  } else {
    echo "No puedes dar de baja ese usuario o no existe.";
  }*/


?>
