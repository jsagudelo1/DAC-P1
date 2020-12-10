<?php
session_start ();
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
    <!--<link rel="icon" href="../imagenes/fondo.png"/>-->

</head>
<header>

</header>
<body>



<form method="POST" action="../program/program_crear_pro.php" onsubmit="return CrearProducto()" class="needs-validation" novalidate>

    <div>CREAR PRODUCTO</div>
    <br>

    <div>

        <td>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Codigo producto</span>
              </div>
              <input type="text" class="form-control" name= "txt_id_pro" id="txt_num_doc" maxlength="2" onkeypress="return soloNumeros(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              <div class="invalid-feedback">
                Por favor ingrese el codigo del producto.
              </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
              </div>
              <input type="text" class="form-control" name= "txt_nom_pro" id="txt_razon" onkeypress="return soloLetras(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              <div class="invalid-feedback">
                Por favor ingrese el nombre del producto.
              </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Descripcion</span>
              </div>
              <textarea class="form-control" name= "txt_des_pro" id="txt_descripcion" rows="5" cols="48"  maxlength="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required></textarea>
              <div class="invalid-feedback">
                Por favor ingrese la descripcion del producto.
              </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Valor</span>
              </div>
              <input type="text" class="form-control" name= "txt_valor_mayor" id="txt_valor" onkeypress="return soloNumeros(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              <div class="invalid-feedback">
                Por favor ingrese el valor.
              </div>
          </div>
        </td>

        <td>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad</span>
              </div>
              <input type="text" class="form-control" name= "txt_valor_min" id="txt_cantidad" maxlength="10" onkeypress="return soloNumeros(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              <div class="invalid-feedback">
                Por favor ingrese La cantidad.
              </div>
          </div>
        </td>

        <td>
            <input class="boton btn btn-light" type="submit" value="Ingresar" id="Grabar">
        </td>
        <!--<td>
          <input type="text" placeholder="Codigo producto" name= "txt_id_pro" id="txt_num_doc" maxlength="2" onkeypress="return soloNumeros(event)">
        </td><br>

        <td>
          <input type="text" placeholder="Producto" name= "txt_nom_pro" id="txt_razon" onkeypress="return soloLetras(event)">
        </td>
        <br>

        <td>
          <textarea  placeholder="Descripcion del producto" name= "txt_des_pro" id="txt_razon" rows="10" cols="48"  maxlength="100"> </textarea>
        </td>
        <br>

        <td>
          <input type="text" placeholder="Valor al por mayor" name= "txt_valor_mayor" id="txt_razon" onkeypress="return soloNumeros(event)">
        </td>
        <br>

        <td>
          <input type="text" placeholder="cantidad min en bodega" name= "txt_valor_min" id="txt_razon" maxlength="10" onkeypress="return soloNumeros(event)">
        </td>
        <br>-->



</form>
<script src="../js/Funciones.js"></script>
</body>
</html>
