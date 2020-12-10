<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone=conexion();
$documentos=obtener_producto();
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



<form method="POST" action="../program/program_agre_inv.php" onsubmit="return AgregarAlInventario()" class="needs-validation" novalidate>

    <div>AGREGAR AL INVENTARIO</div><br><div>

        <td>
          <div class="input-group  mb-3">
            <div class="input-group-prepen">
              <span class="input-group-text" id="inputGroup-sizing-sm">Codigo/bodega</span>
            </div>
            <input type="text" name= "txt_codigo" id="txt_num_doc"maxlength="5" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese el codigo.
            </div>
          </div>
        </td>

        <td>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Producto</label>
            </div>
            <select class="custom-select" name="txt_producto" id="inputGroupSelect01 txt_tipo" required>
              <option selected disabled value >Seleccione un producto</option>
              <?php
                while($recorrer= mysqli_fetch_array($iniciar)){
                  echo '<option value='.$recorrer['id_producto'].'>'.$recorrer['nom_produc'].'</option>';
                }
              ?>
            </select>
            <div class="invalid-feedback">
              Por favor selecciones un producto.
            </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
            </div>
            <input type="date" name= "txt_fecha_ingreso" id= "txt_fecha_ingreso" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese la fecha.
            </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad disponible</span>
            </div>
            <input type="text" name= "txt_can_dispo" id="txt_razon" maxlength="10" onkeypress="return soloNumeros(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese la cantidad.
            </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Precio</span>
            </div>
            <input type="text" name= "precio" id="precio" maxlength="10" onkeypress="return soloNumeros2(event)" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            <div class="invalid-feedback">
              Por favor ingrese el precio.
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
