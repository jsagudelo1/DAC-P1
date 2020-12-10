<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone=conexion();
$documentos=obtener_estado_ingreso();
$iniciar= mysqli_query($idcone,$documentos);

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



<form method="POST" action="../program/program_agre_ingreso.php" onsubmit="return AgregarAlInventario()" class="needs-validation" novalidate>

    <div>Efectuar Ingreso</div><br><div>

        <td>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepen">
              <span class="input-group-text" >Descripcion</span>
            </div>
            <input type="text" name= "txt_descripcion"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese el la descripcion
            </div>
          </div>
        </td>

        <td>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Estado</label>
            </div>
            <select class="custom-select" name="txt_estado" id="inputGroupSelect01 txt_tipo" required>
              <option selected disabled value >Seleccione un Estado</option>
              <?php
                while($recorrer= mysqli_fetch_array($iniciar)){
                  echo '<option value='.$recorrer['id_estado'].'>'.$recorrer['estad'].'</option>';
                }
              ?>
            </select>
            <div class="invalid-feedback">
              Por favor selecciones un estado.
            </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">valor</span>
            </div>
            <input type="text" name= "txt_valor"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese un valor.
            </div>
          </div>
        </td>



      <!--  <td><input type="text" placeholder="codigo" name= "txt_codigo" id="txt_num_doc"maxlength="2" onkeypress="return soloNumeros(event)"></td>-->

        <!--<select required name="txt_producto"  id="txt_tipo" class="barra">
            <option >Seleccione un producto</option>
              <?php
                /*while($recorrer= mysqli_fetch_array($iniciar)){
                  echo '<option value='.$recorrer['nom_produc'].'>'.$recorrer['nom_produc'].'</option>';
                }*/
              ?>
        </select>-->

        <!--<td><input type="date" placeholder="fecha AAAA-MM-DD" name= "txt_fecha_ingreso">-->
        <!--<td><input type="text" placeholder="cantidad disponible" name= "txt_can_dispo" id="txt_razon" maxlength="10" onkeypress="return soloNumeros(event)"></td>-->
         <br  id="txt_razon"></td>
        <td>
            <input class="boton btn btn-light" type="submit" value="Ingresar" id="Grabar">
</form>
<script src="../js/Funciones.js"></script>
</body>
</html>
