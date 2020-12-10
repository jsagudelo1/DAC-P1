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



<form method="POST" action="../form/form_consul_balance.php">

    <div>REPORTE DE ENTREGA</div><br><div>


        <select required name="id_estado"  id="txt_tipo" class="barra"><br>
            <option selected disable value >Seleccione una opcion</option><br>
            <option value="1">Ingresos</option>'
            <option value="2">Egresos</option>'
            <option value="3">balance</option>'
          
        </select>
        <br>
        <div class="form-row">
  <div class="col-md-4 mb-3">
    <label for="validationDefault01" >DESDE</label>
    <input type="date" class="form-control" id="validationDefault01" placeholder="fdesde"  name="dfecha" required>
  </div>
  <div class="col-md-4 mb-3">
    <label for="validationDefault02">HASTA</label>
    <input type="date" class="form-control" id="validationDefault02" placeholder="fhasta" name="hfecha" required>
  </div>
        <br>
            <input class="boton" type="submit" value="Ingresar" id="Grabar">
          </form>
            </body>
            </html>
