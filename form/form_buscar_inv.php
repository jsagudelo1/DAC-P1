<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
#include ("../Config/querys.php");
$producto= $_POST['txt_producto'];
$id_cone= conexion();
$Mostrar=buscar_producto_inv();
$sql= mysqli_query($id_cone,$Mostrar);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
  <script src="../js/datatables.min.js"></script>
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
        <h2 ><center>INVENTARIO</center></h2>
    </div>
</header>

<div class="demo">
<!--    <form class="form-search" action="../program/program_buscar_inv.php" method="POST" >
        <div class="input-group">
            <div>
                <input name="txt_producto" class="form-control form-text" maxlength="60" placeholder="Buscar producto" size="10" type="text" />
            </div>
            <div>
                <span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-search fa-lg">&nbsp;</i></button></span>
            </div>
        </div>
    </form>-->
</div>
<div class="demo">
    <form method="POST" class="form-search" action="form_buscar_inv.php" >
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
      <thead class="thead-dark">
        <tr>
            <th> CODIGO </th>
            <th> FECHA</th>
            <th> PRODUCTO </th>
            <th> CANTIDAD TOTAL</th>
            <th> COSTO MAYORISTA</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($fila = Mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td> <center> <?php echo $fila ["id_bodega"]?> </center> </td>
                <td> <center> <?php echo $fila['fecha_ingreso'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['nom_produc']?> </center> </td>
                <td> <center> <?php echo $fila ['cantidad_total']?> </center> </td>
                <td> <center> <?php echo $fila['valor_mayorista'] ?>  </center> </td>
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
