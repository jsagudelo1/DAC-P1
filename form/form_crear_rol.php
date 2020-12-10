<?php
include "cabecera.php";
include "maqueta.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>


</head>
<header>

</header>
<body>



<form method="POST" action="../program/program_crear_rol.php" onsubmit="return CrearRol()" class="needs-validation" novalidate>

    <div>Roles</div><br><div>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre del rol</span>
          </div>
          <input type="text" name= "rol" id="rol" maxlength="20" onkeypress="return soloLetras(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el nombre del rol.
          </div>
        </div>

      </td>

        <input class="boton btn btn-light" type="submit" value="Ingresar" id="Grabar">
</form>
<script src="../js/Funciones.js"></script>
</body>
</html>
