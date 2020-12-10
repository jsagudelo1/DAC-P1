<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
#include ("../Config/querys.php");
include "cabecera.php";
include "maqueta.php";
$id_cone= conexion();
$Mostrar= buscar_producto_inv();
$sql= mysqli_query($id_cone,$Mostrar);



?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
    <title>DAC&P</title>
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <script src="../js/datatables.min.js"></script>
</head>

     <body>
        <header>

<div class="consinventario">
            <h2 ><center>INVENTARIO</center></h2>
</div>
        </header>

        <div class="demo">
            <form method="POST" class="form-search" action="form_buscar_inv.php" >

              <!--  <div class="input-group">
                    <div>
                    <input name="txt_producto" class="form-control form-text" maxlength="60" placeholder="Buscar producto" size="10" type="text" />
                        </div>
                    <div>
                   <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-lg"> &nbsp; </i></button>
                </div>
              </div> -->

            </form>
        </div>


        <div class="table-responsive  table-hover" >
        <table class="table" id="tabla1">
            <thead   <thead class="thead-dark">
            <tr>
              <th> CODIGO </th>
              <th> FECHA</th>
              <th> PRODUCTO </th>
              <th> CANTIDAD TOTAL</th>
                <?php if($_SESSION['usu_rol_id']==1){
              echo "
              <th> COSTO </th>

              <th> MODIFICAR </th>
                <th> ESTADO </th>";
              } ?>
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
                    <?php 	if($_SESSION['usu_rol_id']==1){
                                  ?>
                       <td> <center><?php echo $fila['costo_produc'] ?>  </center> </td>
                      <?php
                      echo "<td> <center>  <a href='../form/form_modificar_linea_bodega.php?id_bodega=".$fila['id_bodega']."&nom_pro=".$fila['nom_produc']."' >"
                       ?>
                    <img title="Modificar  INV" src="../img/modificar.png" style="width:15px;height:15px;"></center></a></td>

                    <?php
                    if ($fila['id_estado']==2){
                    echo"<td align=center><a href='../program/program_activar_inv.php?id_inv=".$fila['id_bodega']."'>"?>
                        <img title="Activar" src="../img/activar.png" style="width:15px;height:15px;"></a></td>
                        <?php
                    }else{
                    ?>
                     <td align=center>
                      <?php   echo" <a href='../Program/program_inactivar_inv.php?id_inv=".$fila['id_bodega']."'> " ?>
                    <img title="Inactivar" src="../img/inactivar.png" style="width:15px;height:15px;"></a></td>
                   <?php
                    }
                  }
                    ?>

                </tr>
                <?php
            }
            ?>
            </tbody>
            </div>

        </table>
        </body>

        <script>
          $(document).ready( function () {
            //$('#tabla1').DataTable();
          $('#tabla1').DataTable();
          });
        </script>
        </div>
        </body>
</html>
