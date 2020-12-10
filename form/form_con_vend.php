<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
#include ("../Config/querys.php");
include "cabecera.php";
include "maqueta.php";
$id_cone= conexion();
$Mostrar= obtener_vendedor();
$sql= mysqli_query($id_cone,$Mostrar);



?>
<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
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

            <th>DOCUMENTO DE IDENTIDAD</th>
            <th>NOMBRES</th>
            <th>APELLIDOS </th>
            <th>TELEFONO</th>
            <th>DIRECCIÓN </th>
            <th>CORREO</th>
            <th>CAUSA RETIRO</th>
            <th>ROLL</th>
            <th>MODIFICAR</th>
            <th>ESTADO</th>

        </tr>
        </thead>
        <tbody>
        <?php

        while($fila = Mysqli_fetch_array($sql)){

            ?>
            <tr>


                <td> <center> <?php echo $fila ['id_vendedor'] ?> </center> </td>
                <td> <center> <?php echo $fila['nom_vendedor'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['apelli_vendedor']?> </center> </td>
                <td> <center> <?php echo $fila ['tel_vendedor']?> </center> </td>
                <td> <center> <?php echo $fila['dire_vendedor'] ?>  </center> </td>
                <td> <center> <?php echo $fila['correo_vendedor'] ?>  </center> </td>
                <td> <center> <?php echo $fila['causa_retiro'] ?>  </center> </td>
                <td> <center> <?php echo $fila['user_roll'] ?>  </center> </td>


                <?php  echo "<td> <center>  <a href='../form/form_modifica_vendedor.php?id_vendedor=".$fila['id_vendedor']."'>" ?>
                <img title="Modificar Usuario" src="../img/modificar.png" style="width:15px;height:15px;"></center></a></td>

                  <?php   if($fila['id_estado']==2){ ?>
                  <?php  echo"<td align=center><a href='../program/program_activar_vendedor.php?id_vendedor=".$fila['id_vendedor']."'>"?>
                    <img title="Activar" src="../img/activar.png" style="width:15px;height:15px;"></a></td>
<?php }else { ?>
                    <?php echo"<td align=center><a href='../Program/program_inactivar_vendedor.php?id_vendedor=".$fila['id_vendedor']."'>"?>
                    <img title="Inactivar" src="../img/inactivar.png" style="width:15px;height:15px;"></a></td>
                  <?php } ?>

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
<script>
  $(document).ready( function () {
    //$('#tabla1').DataTable();
  $('#tabla1').DataTable();
  });
</script>
</div>
</body>
</html>
