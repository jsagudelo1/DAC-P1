<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";
#include ("../Config/querys.php");
$id=$_GET['idve'];
$fecha=$_GET['fecha'];
$id_cone= conexion();
$Mostrar=obtener_detalles_reporte($id,$fecha);

$sql=mysqli_query($id_cone,$Mostrar);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!--  <link rel="stylesheet" href="../css/estilosmaq.css" >
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="icon" href="../imagenes/fondo.jpg"/>-->
    <title>DAC&P</title>
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <script src="../js/datatables.min.js"></script>
</head>
<body>
<header>
    <div class="consinventario">
        <h2 ><center>vendedores</center></h2>
    </div>
</header>
<div class="demo">
    <form method="POST" class="form-search" action="form_buscar_pro.php" >
        <!--<div class="input-group">
            <div>
                <input name="txt_producto" class="form-control form-text" maxlength="60" placeholder="Buscar producto" size="10" type="text" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-lg"> &nbsp; </i></button>
            </div>
        </div>-->
    </form>
</div>
<div class="table-responsive  table-hover" >
    <table class="table" id="tabla1">
        <thead   <thead class="thead-dark">
        <tr>
          <th>PRODUCTO </th>
            <th>CANTIDAD </th>
            <th>VALOR     </th>
            <th>COMISION     </th>
            <th>DEVOLUCION   </th>
            <th>VENDIDO </th>
            <th>COMISION DE PRODUCTO    </th>
            <th>VALOR POR PRODUCTO   </th>
            <th>COMISION TOTAL        </th>
            <th>VALOR TOTAL        </th>

        </tr>
        </thead>
        <tbody>
        <?php
        while($fila = Mysqli_fetch_array($sql)){
            ?>
            <tr>
              <td> <center> <?php echo $fila ['nom_produc']; ?>     </center> </td>
              <td> <center> <?php echo $fila ['can_produc']; ?>     </center> </td>
              <td> <center> <?php echo $fila ['costo_produc'];?>    </center> </td>
              <td> <center> <?php echo $fila ['comision_produc'];?> </center> </td>
              <td> <center> <?php echo $fila ['devolucion']; ?>     </center> </td>
              <td> <center> <?php echo $fila ['vendido']; ?>        </center> </td>
              <td> <center> <?php echo $fila ['comisionxproduc']; ?></center> </td>
              <td> <center> <?php echo $fila ['valorxproducto']; ?> </center> </td>
              <td> <center> <?php echo $fila ['comision_total']; ?> </center> </td>
              <td> <center> <?php echo $fila ['valor_total']; ?>    </center> </td>
            </tr>
            <?php
        }
        ?>
</tbody>
</div>
</table>
</body>
<!--<script type="text/javascript" src="../js/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="../js/js/jquery.datatables.min.js"></script>-->
<script>
  $(document).ready( function () {
    //$('#tabla1').DataTable();
  $('#tabla1').DataTable({
      "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
      "scrollY":        "400px",
        "scrollCollapse": true,
  });
  });
</script>
</div>
</body>
</html>
