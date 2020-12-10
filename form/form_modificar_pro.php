<?php
include_once '../Config/conexion.php';
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";

$id_pro= $_GET['id_producto'];
$id_nom_pro=$_GET['producto'];
$id_cone= conexion();
 $Mostrar= OptenerProducto2($id_pro);
$sql= mysqli_query($id_cone,$Mostrar);
$ejecuta = Mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>CLIENTES</title>
<link rel="stylesheet" href="../css/estiloslogin.css"/>
</head>
<body>

<header>
</header>
<form method="POST" action="../program/program_modifica_pro.php" onsubmit="return ModificarProducto()" class="needs-validation" novalidate>

            <div>MODIFICAR PRODUCTO </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Codigo producto</span>
                </div>
                <input type="text" class="form-control" name= "txt_id_pro" id="idpro" value ="<?php echo $ejecuta['id_producto'];?>" readonly maxlength="2" onkeypress="return soloNumeros(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                <div class="invalid-feedback">
                  Por favor ingrese el codigo del producto.
                </div>
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                </div>
                <input type="text" class="form-control" name= "txt_nom_produc" id="nombre" value="<?php echo $ejecuta['nom_produc'];?>" onkeypress="return soloLetras(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                <div class="invalid-feedback">
                  Por favor ingrese el nombre del producto.
                </div>
            </div>

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Descripcion</span>
                </div>
                <textarea class="form-control" name= "txt_des_pro" id="descripcion"  rows="5" cols="48"  maxlength="100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required><?php echo $ejecuta['des_produc']; ?>  </textarea>
                <div class="invalid-feedback">
                  Por favor ingrese la descripcion del producto.
                </div>
            </div>


            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad minima en bodega</span>
                </div>
                <input type="text" class="form-control" name= "txt_valor_min" id="cantidadMin" maxlength="10" value="<?php echo $ejecuta['can_min_bod']; ?>" onkeypress="return soloNumeros(event)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                <div class="invalid-feedback">
                  Por favor ingrese La cantidad.
                </div>
            </div>


<!--  <input type="hidden" name="txt_est" value="<?php #echo $ejecuta['estado_cli']; ?>" ></br>|-->
<input class="boton" type="submit" value="Modificar" id="Grabar">
</form>



</body>
<script src="../js/Funciones.js"></script>
</html>
