<?php
include_once '../Config/conexion.php';
# include ("../Config/conexion.php");
include_once  '../Config/querys.php';
#include ("../Config/querys.php");
include "cabecera.php";
include "maqueta.php";
$id_cone= conexion();
 $id=$_POST['id_estado'];
 $dfecha=$_POST['dfecha'];
 $hfecha=$_POST['hfecha'];
 $Mostrar= consultar_activos($dfecha,$hfecha);
 $mostrar1= consultar_pasivos($dfecha,$hfecha);
 $sql= mysqli_query($id_cone,$Mostrar);
 $sql1= mysqli_query($id_cone,$mostrar1);

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
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css">
    <script src="../js/datatables.min.js"></script>
</head>

<body>
  <?php

    if($id==1){





    ?>
<header>

    <div class="consinventario">
        <h2 ><center>Ingresos</center></h2>
      </header>
    </div>

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
        <thead   thead class="thead-dark">
        <tr>
            <th></th>
            <th>COMISION DEL DIA</th>
            <th>VALOR PAGADO</th>
            <th>PRODUCTOS VENDIDOS</th>
            <th>DETALLES</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while($fila = Mysqli_fetch_array($sql)){

            ?>
            <tr>


                <td> <center> <?php echo $fila ['id'] ?> </center> </td>
                <td> <center> <?php echo $fila['fecha'] ?>  </center> </td>
                <td> <center> <?php echo $fila ['detalle']?> </center> </td>
                <td> <center> <?php echo $fila ['estad']?> </center> </td>
                <td> <center> <?php echo $fila ['valor']?> </center> </td>

              </tr>

            <?php

        }

         ?>
        </tbody>
</div>
</table>
<?php
}if($id==2){





  ?>
<header>

  <div class="consinventario">
      <h2 ><center>Egresos</center></h2>
    </header>
  </div>

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
      <thead   thead class="thead-dark">
      <tr>
          <th></th>
          <th>COMISION DEL DIA</th>
          <th>VALOR PAGADO</th>
          <th>PRODUCTOS VENDIDOS</th>
          <th>DETALLES</th>
      </tr>
      </thead>
      <tbody>
      <?php

      while($fila1 = Mysqli_fetch_array($sql1)){

          ?>
          <tr>


              <td> <center> <?php echo $fila1 ['id'] ?> </center> </td>
              <td> <center> <?php echo $fila1['fecha'] ?>  </center> </td>
              <td> <center> <?php echo $fila1 ['descripcion']?> </center> </td>
              <td> <center> <?php echo $fila1 ['estad']?> </center> </td>
              <td> <center> <?php echo $fila1 ['valor']?> </center> </td>

            </tr>

          <?php

      }

       ?>
      </tbody>
</div>
</table>
<?php
}if($id==3){


    $Mostrar3= buscar_costogenerales($dfecha,$hfecha);
    $sql3= mysqli_query($id_cone,$Mostrar3);
    $fila3 = Mysqli_fetch_array($sql3);

  $Mostrar2= buscar_costoactivo($dfecha,$hfecha);
  $sql2= mysqli_query($id_cone,$Mostrar2);
  $fila2 = Mysqli_fetch_array($sql2);

  $Mostrar4= buscar_costoproducto($dfecha,$hfecha);
  $sql4 = mysqli_query($id_cone,$Mostrar4);
  $fila4 = Mysqli_fetch_array($sql4);

  $Mostrar5= buscar_gastosgenerales($dfecha,$hfecha);
  $sql5 = mysqli_query($id_cone,$Mostrar5);
  $fila5 = Mysqli_fetch_array($sql5);

  ?>
<header>

  <div class="consinventario">
      <h2 ><center> Estado de resultados</center></h2>
    </header>
  </div>

<div class="demo">


<div class="table-responsive  table-hove" >

  <table style="width:50%" class="table" id="tabla1">
    <tr>
      <th>INGRESOS<th>
      </tr>
      <tr>
        <th>Ventas:</th>
      <td><?php  echo $fila2['costo_venta'];?></td>
    </tr>
    <tr>
    </tr>
    <th>Ingresos Generales:</th>

    <td><?php echo $fila3['costo_venta1'];?></td>
    <tr>
      <th>Total Ingresos:</th>
      <td><?php echo $ingresos=$fila2['costo_venta']+$fila3['costo_venta1'];?></td>
    </tr>
    <tr>
    <th><br></th>
    <td>
    </td>
    </tr>
    <tr>
      <th>COSTOS Y GASTOS:</th>
      <td></td>
    </tr>
    <tr>
      <th>Costo De Mercaderias:</th>
      <td><?php echo $fila4['costo_venta']?></td>
    </tr>
    <tr>
      <th>Gastos Generales:</th>
      <td><?php echo $fila5['costo_venta']?></td>
    </tr>
    <tr>
      <th>Total Costos:</th>
      <td><?php echo $gastos=$fila4['costo_venta']+ $fila5['costo_venta']?></td>
    </tr>
    <tr>
    <th><br></th>
    <td>
    </td>
    </tr>
    <tr>
      <th BGCOLOR="YELLOW">Utilidad De Operaciones:</th>
      <td BGCOLOR="YELLOW"><?php echo $ingresos-$gastos ?></td>
    </tr>
    <tr>
    <th><br></th>
    <td>
    </td>
    </tr>

  </table>

<?php } ?>


</body>

<script type="text/javascript" src="../js/js/jquery-1.8.0.min.js"></script>
<script type= "text/javascript" src="../js/js/jquery-ui-1.8.22.custom.min.js"></script>
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
