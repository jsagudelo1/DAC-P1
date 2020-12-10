<?php
include_once '../Config/conexion.php';
include_once  '../Config/querys.php';
include "cabecera.php";
include "maqueta.php";

$connection= conexion();
$consultaRoles= ObtenerRoles();
$executeConsultaRoles= mysqli_query($connection,$consultaRoles) or die (mysqli_error($connection));
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
            <h2 ><center>Roles</center></h2>
</div>
        </header>

        <div class="demo">
            <form method="POST" class="form-search" action="form_buscar_inv.php" >
            </form>
        </div>


        <div class="table-responsive  table-hover" >
        <table class="table" id="tabla1">
            <thead   <thead class="thead-dark">
            <tr>

                <th> ID ROL </th>
                <th> NOMBRE </th>
                <th> MODIFICAR </th>


            </tr>
            </thead>
            <tbody>
            <?php

            while($fila = Mysqli_fetch_array($executeConsultaRoles)){

                ?>
                <tr>
                    <td> <center> <?php echo $fila ["id_roll"]?> </center> </td>
                    <td> <center> <?php echo $fila['roll'] ?>  </center> </td>
                    <?php  echo "<td> <center>  <a href='../form/form_modificar_rol.php?id_rol=".$fila['id_roll']."&rol=".$fila['roll']."'>" ?>
                    <img title="Modificar  INV" src="../img/modificar.png" style="width:15px;height:15px;"></center></a></td>
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
