<?php
include_once '../Config/conexion.php';
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";

$id = $_GET['id_vendedor'];

$id_cone= conexion();
$Mostrar= ObtenerVendedorEspeifico2($id);
$sql= mysqli_query($id_cone,$Mostrar);
$fila = Mysqli_fetch_array($sql)


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" href="../css/estiloslogin.css"/>

    <meta charset="UTF-8">
    <!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
    <title>DAC&P</title>
</head>

<body>
<header>

</header>


  <form method="POST" action="../program/program_modifica_vendedor.php" onsubmit="return ModificarVendedor()" class="needs-validation" novalidate>

      <div>MODIFICAR VENDEDOR</div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Cedula o pasaporte</span>
        </div>
        <input type="text" name= "txt_id_vend" id="documento" maxlength="15" value="<?php echo  $fila ['id_vendedor'] ?>" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese el numero de cedula o pasaporte.
        </div>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Nombres</span>
        </div>
        <input type="text" name= "txt_nom_vend" id="nombre" maxlength="40" VALUE="<?php echo $fila['nom_vendedor'] ?>" onkeypress="return soloLetras(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese el nombre.
        </div>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Apellidos</span>
        </div>
        <input type="text" name= "txt_ape_vend" id="apellido" rows="10" cols="48" maxlength="40" value="<?php echo $fila ['apelli_vendedor'] ?>" onkeypress="return soloLetras(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese el apellido.
        </div>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
        </div>
        <input type="text" class="form-control" name= "txt_dir_vend" id="direccion" value="<?php echo $fila['dire_vendedor'] ?>" maxlength="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese la direccion.
        </div>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
        </div>
        <input type="text" name= "txt_tel_vend" id="telefono" maxlength="10" value="<?php echo $fila['tel_vendedor'];?>" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese el telefono.
        </div>
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Correo</span>
        </div>
        <input type="text" name= "txt_cor_vend" id="correo" maxlength="100" value = "<?php echo $fila['correo_vendedor'];?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
        <div class="invalid-feedback">
          Por favor ingrese el correo.
        </div>
      </div>

          <input class="boton" type="submit" value="Modificar" id="Grabar">
  </form>

</body>
<script src="../js/Funciones.js"></script>
</html>
