<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";

$idcone=conexion();
$documentos=obtener_roll();
$iniciar= mysqli_query($idcone,$documentos);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>
    <link rel="icon" href="../imagenes/fondo.png"/>

</head>
<header>

</header>
<body>



<form method="POST" action="../program/program_crear_vendedor.php" class="needs-validation" novalidate>

    <div>PERFIL VENDEDOR</div><br><div>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Cedula o pasaporte</span>
          </div>
          <input type="text" name= "txt_id_vend" id="txt_num_doc" maxlength="15" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el numero de cedula o pasaporte.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nombres</span>
          </div>
          <input type="text" name= "txt_nom_vend" id="txt_razon" maxlength="40" onkeypress="return soloLetras(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el nombre.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Apellidos</span>
          </div>
          <input type="text" name= "txt_ape_vend" id="txt" rows="10" cols="48" maxlength="40" onkeypress="return soloLetras(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el apellido.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
          </div>
          <input type="text" class="form-control" name= "txt_dir_vend" id="txt_razon" maxlength="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese la direccion.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
          </div>
          <input type="text" name= "txt_tel_vend" id="txt_razon" maxlength="12" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el telefono.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Correo</span>
          </div>
          <input type="text" name= "txt_cor_vend" id="txt_razon" maxlength="100" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el correo.
          </div>
        </div>

      </td>

      <td>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Rol</label>
          </div>
            <select class="custom-select" id="inputGroupSelect01 txt_tipo" name="txt_nom_roll" required>
              <option selected disabled value>Seleccione un rol</option>
              <?php
                while($recorrer= mysqli_fetch_array($iniciar)){
                  echo '<option value='.$recorrer['id_roll'].'>'.$recorrer['roll'].'</option>';
                }
              ?>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione un rol.
            </div>
          </div>

      </td>

      <td>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Clave</span>
          </div>
          <input type="password" name= "txt_pass" id="txt_pass" maxlength="40" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese una clave.
          </div>
        </div>

      </td>

        <!--<td><input type="text" placeholder="cedula o pasaporte " name= "txt_id_vend" id="txt_num_doc" maxlength="15" onkeypress="return soloNumeros(event)"></td><br>

        <td><input type="text" placeholder="Nombres" name= "txt_nom_vend" id="txt_razon" maxlength="40" onkeypress="return soloLetras(event)"></td>
        <br>
        <td><input  placeholder="Apellidos" name= "txt_ape_vend" id="txt" rows="10" cols="48" maxlength="40" onkeypress="return soloLetras(event)"> </input></td>
        <BR>
        <td><input type="text" placeholder="Direccion" name= "txt_dir_vend" id="txt_razon" maxlength="100"></td>
        <BR>
        <td><input type="text" placeholder="Telofono" name= "txt_tel_vend" id="txt_razon" maxlength="12" onkeypress="return soloNumeros(event)"></td>
        <BR>
        <td><input type="text" placeholder="Correo" name= "txt_cor_vend" id="txt_razon" maxlength="100"></td>
        <br>
        <select name="txt_nom_roll" id="txt_tipo" class="barra" value=""><br>
            echo "<option>Seleccione un roll</option><br>";

            <?php
            /*while($recorrer= mysqli_fetch_array($iniciar)){
                echo "<option>";
               echo $recorrer['id_roll']."  ".$recorrer['roll'];
                echo "</option>";
                ?>
               <?php
               }*/


            ?>
        </select>

<br>-->

        <input class="boton btn btn-light" type="submit" value="Ingresar" id="Grabar">
</form>
<script src="../js/Funciones.js"></script>
</body>
</html>
