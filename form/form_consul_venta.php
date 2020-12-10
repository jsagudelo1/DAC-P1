<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
#include ("../Config/querys.php");

$id_cone= conexion();
$Mostrar= obtener_ventas();
$sql= mysqli_query($id_cone,$Mostrar);



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/estilosmaq.css" >
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
    <title>DAC&P</title>
</head>

<body>
<header>

    <div class="consinventario">
        <h2 ><center>numero de ventas</center></h2>
    </div>
</header>

<div class="demo">

    <form method="POST" class="form-search" action="form_buscar_pro.php" >
        <div class="input-group">
            <div>
                <input name="txt_producto" class="form-control form-text" maxlength="60" placeholder="Buscar producto" size="10" type="text" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-lg"> &nbsp; </i></button>

            </div>
        </div>
    </form>
</div>



<div class="table-responsive  table-hover" >
    <table class="table">
        <thead   <thead class="thead-dark">
        <tr>

            <th>CODIGO VENTA</th>
            <th>TRANSPORTE</th>
            <th>FECHA VENTA </th>
            <th>PAGADO O PENDIENTE</th>
            <th>FECHA PENDIENTE</th>
            <th>MODIFICAR</th>
            <th>ACTIVAR</th>
            <th>INACTIVAR</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while($fila = Mysqli_fetch_array($sql)){

            ?>
            <tr>


                <td> <center> <?php echo $fila ['id_venta'] ?> </center> </td>
                <td> <center> <?php echo $fila['transporte'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['fecha_venta']?> </center> </td>
                <td> <center> <?php echo $fila ['pagado_pendiente']?> </center> </td>
                <td> <center> <?php echo $fila['fecha_pago'] ?>  </center> </td>


            </tr>
            <?php
        }
        ?>
        </tbody>
</div>

</table>
</body>
<script type="text/javascript" src="../js/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="../js/js/jquery.datatables.min.js"></script>
<script type="text/javascript" language="JavaScript">
    $(document).ready( function() {
        $("#mi_tabla").dataTable();
    });
</script>
</div>
</body>
</html>
