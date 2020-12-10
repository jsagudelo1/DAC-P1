<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone= conexion();
$documentos= obtener_vendedor();
$iniciar= mysqli_query($idcone,$documentos);

$producto= obtener_producto();
$sql= mysqli_query($idcone,$producto);

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



<form method="POST" action="../program/program_report_devo.php" onsubmit="return ReporteDecolucion()" class="needs-validation" novalidate>

    <div>REPORTE DE ENTREGA</div><br><div>


        <select  name="id_vendedor"  id="vendedor" class="form-control" required><br>
            <?php  echo "<option selected disables value>Seleccione un vendedor</option><br>";


            while($recorrer= mysqli_fetch_array($iniciar)){
                echo "<option>";
                echo $recorrer['id_vendedor']."  ".$recorrer['nom_vendedor'];
                echo "</option>";}

            ?>
        </select>
        <div class="invalid-feedback">
          Por favor seleccione un vendedor.
        </div>
        <div class="valid-feedback">

        </div>
        <br>
        <td>
          <input type="date" placeholder="AÑO/MES/DIA"  class="form-control" id="fecha" name="fecha_devo" required>
          <div class="invalid-feedback">
            Por favor seleccione la fecha.
          </div>
        </td>
        <br>
            <input class="boton" type="submit" value="Ingresar"  id="Grabar">
          </form>
            </body>
            <script src="../js/Funciones.js"></script>
            </html>
