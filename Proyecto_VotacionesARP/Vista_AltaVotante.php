<html>
  <head>
    <link rel="stylesheet" type="text/css" href="CSS/VistaAltaVotante.css"/>
    <style>
      select, option {
        width: 250px;
      }
        
    </style>

    <?php

    include 'conex_bd.php';

    $ordenEscrutinio = "SELECT * FROM convocatoria";

    $Escrutinio = $conexion -> query($ordenEscrutinio);

    if ($Escrutinio && $Escrutinio -> num_rows > 0) {
      $FilaEscrutinio = $Escrutinio -> fetch_array();
    }

    if ($FilaEscrutinio['ESCRUTINIO'] == "ABIERTO") {
      $MensError = "El escrutinio está abierto, esto no se puede realizar";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }

    if ($FilaEscrutinio['REALIZADO'] == "SI") {
      $MensError = "Las votaciones han acabado, esta acción no puede ser realizada.";
      header("Location: PaginaErrorVotar.php?ERROR=$MensError");
    }


    

    ?>


  </head>
  <body>

    <script type='text/javascript'>
    /*var fecha = {
      año: 0,
      mes: 0,
      dia: 0
    }*/
    function validar(){
      var fecha_n = document.getElementById("fecha_nac").value;
      var d = new Date();
      var año_n = "";
      var mes_n = "";
      var dia_n = "";
      for (var i = 0; i < 4; i++) {
        año_n += fecha_n[i];
      }
      for (var i = 5; i < 7; i++) {
        mes_n += fecha_n[i];
      }
      for (var i = 8; i < 10; i++) {
        dia_n += fecha_n[i];
      }
      console.log(año_n);
      console.log(mes_n);
      console.log(dia_n);
      if (parseInt(año_n) + 18 < parseInt(d.getFullYear())){
        console.log("MAYOR DE EDAD");
      } else if (parseInt(año_n) + 18 === parseInt(d.getFullYear())){
        if (parseInt(mes_n) <= parseInt(d.getMonth()) + 1){
          if (parseInt(dia_n) <= parseInt(d.getDate())){
            console.log("MAYOR DE EDAD");
            return true;
          } else {
            alert("Debes de ser mayor de edad");
            return false;
          }
        } else {
          alert("Debes de ser mayor de edad");
          return false;
        }
      } else {
        alert("Debes de ser mayor de edad");
        return false;
      }
    }

    </script>
    
    <div class="caja">
        <div class="titulin">
        <h2>Registro <span>De</span> Votantes</h2></div>
    <form id="formulario" method="post" action="controlador_AltaVotante.php">
    
      <input class="input" id="nombre" type="text" name="nombre" placeholder="Nombre:" required></input>
        <br/>
      <input class="input" id="apellidos" type="text" name="apellidos" placeholder="Apellidos:" required></input>
        <br/>
      <input class="input" id="nif" type="text" name="nif" maxlength="9" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" placeholder="NIF:" required></input>
        <br/>
      <input class="input" id="pass" type="password" name="pass" minlength="8" placeholder="Password:" required></input>
        <br/>
      <input class="input" id="domicilio" type="text" name="domicilio" placeholder="Domicilio:" required></input>
        <br/>
      <input class="input" id="fecha_nac" type="date" name="fecha_nac" min="1900-01-01" placeholder="Fecha de nacimiento" required></input>
        <br/>
        
      <input class="submit" type="submit" name="submit" onclick="return validar()" value="Finaliza el registro"></input>
    </form >

    

    </div>
  </body>
</html>