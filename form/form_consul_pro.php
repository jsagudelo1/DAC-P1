<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";
#include ("../Config/querys.php");

$id_cone= conexion();
$Mostrar= obtener_producto();
$sql= mysqli_query($id_cone,$Mostrar);



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/estilosmaq.css" >
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <script src="../js/datatables.min.js"></script>
    <meta charset="UTF-8">
    <!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
    <title>DAC&P</title>
</head>

<body>
<header>

    <div class="consinventario">
        <h2 ><center>PRODUCTOS</center></h2>
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

            <th> CODIGO PRODUCTO </th>
            <th> PRODUCTO</th>
            <th> DESCRIPCIÓN </th>
              <?php
            if($_SESSION['usu_rol_id']==1){
            echo "<th>MODIFICAR</th>
            <th>ESTADO</th>";
            }
            ?>

        </tr>
        </thead>
        <tbody>
        <?php

        while($fila = Mysqli_fetch_array($sql)){

            ?>
            <tr>
                <td> <center> <?php echo $fila ["id_producto"]?> </center> </td>
                <td> <center> <?php echo $fila['nom_produc'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['des_produc']?> </center> </td>


                    <?php
                   	if($_SESSION['usu_rol_id']==1){
                    echo "<td> <center>  <a href='../form/form_modificar_pro.php?id_producto=".$fila['id_producto']."&producto=".$fila['nom_produc']."'>" ?>
                    <img title="Modificar Usuario" src="../img/modificar.png" style="width:15px;height:15px;"></center></a></td>

                <?php  if($fila['id_estado']==2){
                     echo"<td align=center><a href='../program/program_activar_pro.php?id_pro=".$fila['id_producto']."'>"?>
                        <img title="Activar" src="../img/activar.png" style="width:15px;height:15px;"></a></td>
                   <?php  }else {
                     echo"<td align=center><a href='../Program/program_inactivar_pro.php?id_pro=".$fila['id_producto']."'>"?>
                        <img title="Inactivar" src="../img/inactivar.png" style="width:15px;height:15px;"></a></td>
            <?php }
          } ?>

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
<script>
  $(document).ready( function () {
    //$('#tabla1').DataTable();
  $('#tabla1').DataTable();
  });
</script>
</html>
