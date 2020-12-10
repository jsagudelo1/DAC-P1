<?php


include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone=conexion();

$id_bodega= $_GET['id_bodega'];
$id_nom_pro=$_GET['nom_pro'];


$valida= obtener_regis_pro($id_bodega);
$sql= mysqli_query($idcone,$valida);
$ejecuta = Mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CLIENTES</title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>
    <link rel="icon" href="../imagenes/fondo.png"/>
</head>
<body>

<header>
</header>
<form method="POST" action="../program/program_modifica_inv.php" onsubmit="return ModiInve()" class="needs-validation" novalidate>

    <div>MODIFICAR INVENTARIO </div><br></div>


        <div class="input-group  mb-3">
          <div class="input-group-prepen">
            <span class="input-group-text" id="inputGroup-sizing-sm">Codigo/bodega</span>
          </div>
          <input type="text" name="id_bodega" class="form-control" readonly onmousedown="return false" value="<?php echo $id_bodega; ?>"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el codigo.
          </div>
        </div>

        <div class="input-group  mb-3">
          <div class="input-group-prepen">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre producto</span>
          </div>
          <input type="text" name="nombre" readonly  value="<?php echo $id_nom_pro; ?>"  class="form-control" readonly value="<?php echo $id_bodega; ?>"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el nombre.
          </div>
        </div>

        <div class="input-group  mb-3">
          <div class="input-group-prepen">
            <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad disponible</span>
          </div>
          <input type="text" placeholder="cantidad disponible" name= "cantidad" onkeypress="return soloNumeros(event)" id="cantidad" value="<?php echo $ejecuta['can_dispo']; ?>"  class="form-control"  value="<?php echo $id_bodega; ?>"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese la cantidad.
          </div>
        </div>


        <div class="input-group  mb-3">
          <div class="input-group-prepen">
            <span class="input-group-text" id="inputGroup-sizing-sm">Precio</span>
          </div>
          <input type="text" placeholder="" name= "precio"  onkeypress="return soloNumeros2(event)" id="precio" value="<?php echo $ejecuta['costo_produc'] ?>"  class="form-control"  value="<?php echo $id_bodega; ?>"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el costo.
          </div>
        </div>

        <div class="input-group  mb-3">
          <div class="input-group-prepen">
            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha ingreso</span>
          </div>
          <input type="date"  name= "fecha" id="fecha" value="<?php echo $ejecuta['fecha_ingreso']; ?>"   class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          <div class="invalid-feedback">
            Por favor ingrese el costo.
          </div>
        </div>

      <!--  <input type="hidden" name="txt_est" value="<?php #echo $ejecuta['estado_cli']; ?>" ></br>|-->

            <input class="boton" type="submit" value="Modificar" id="Grabar">
</form>
</body>
<script src="../js/Funciones.js"></script>
</html>
