<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";
#include ("../Config/querys.php");
$id_cone= conexion();
$Mostrar= obtener_facturas();
$sql= mysqli_query($id_cone,$Mostrar);
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
            <th>CODIGO VENTA</th>
            <th>VENDEDOR</th>
            <th>CLIENTE </th>
            <th>TRANSPORTE</th>
            <th>FECHA VENTA</th>
            <th>ESTADO</th>
            <th>FECHA PAGO</th>
            <th>PRODUCTOS</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($fila = Mysqli_fetch_array($sql)){
            ?>
            <tr>

                <td> <center> <?php echo $fila ['id_venta'] ?> </center> </td>
                <td> <center> <?php echo $fila['nom_vendedor'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['cliente']?> </center> </td>
                <td> <center> <?php echo $fila ['transporte']?> </center> </td>
                <td> <center> <?php echo $fila['fecha_venta'] ?>  </center> </td>
                <td> <center> <?php echo $fila['pagado_pendiente'] ?>  </center> </td>
                <td> <center> <?php echo $fila['fecha_pago'] ?>  </center> </td>
                <td><div class="table-responsive  table-hover" >
                    <table class="table">
                        <thead   <thead class="thead-dark ">
                        <tr>
                          <th>PRODUCTO</th>
                          <th>CANTIDAD</th>
                          <th>COSTO</th>
                          <th>SUBTOTAL</th>
                         </tr>
                         <?php
                         $Mostrar1= obtener_productos_venta($fila['id_venta']);
                         $sql1= mysqli_query($id_cone,$Mostrar1);
                         while($fila1 = Mysqli_fetch_array($sql1)){
                         ?>
                         </thead>
                         <tbody>
                          <tr>
                             <td> <center> <?php echo $fila1 ['nom_produc'] ?> </center> </td>
                             <td> <center> <?php echo $fila1['can_producto'] ?>  </center> </td>
                             <td> <center> <?php echo $fila1 ['costo_Producto']?> </center> </td>
                             <td> <center> <?php echo $fila1 ['subtotal_producto']?> </center> </td>
                           </tr>
                           <?php
                       }
                       ?>
                       </tbody>
                       </div>

                       </table>
                         </td>

                <td> <center> <?php echo $fila['total_venta'] ?>  </center> </td>


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
