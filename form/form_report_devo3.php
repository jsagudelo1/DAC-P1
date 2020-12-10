<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone= conexion();
$documentos= obtener_report_entrega2($_SESSION['fecha'] , $_SESSION['id_vendedor']);
$iniciar= mysqli_query($idcone,$documentos);

$producto= obtener_vendedor($_SESSION['id_vendedor']);
$sql= mysqli_query($idcone,$producto);
$fila2=mysqli_fetch_array($sql);
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



<form method="POST" action="../program/program_report_devo3.php">

    <div>REPORTE DE DEVOLUCIÓN</div><br><div>
      <label><h4> Vendedor: <?php print_r($fila2['nom_vendedor']); ?> </h4><label>
      <label><h5> Fecha:    <?php print_r($_SESSION['fecha']); ?>   </h5><label>
        <td><input type="text" hidden placeholder="filas" name="id_vendedor" value="<?php echo $_SESSION['id_vendedor'] ?>"></td>

        <br>
        <table class="table">
            <thead   <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>COMISION</th>
                <th>DEVOLUCIÓN</th>
                <th>VENDIDO</th>
                <th>COMISIONXPRODUCTO</th>
                <th>VALOR</th>

            </tr>
            </thead>
            <tbody>
            <?php
$i=0;
$totalvalor=0;
$totalcomision=0;
            while($fila = Mysqli_fetch_array($iniciar)){
              $vendido=$fila['can_produc']-$fila['devolucion'];
              $comision= $vendido * $fila['comision_produc'];
              $valor=$vendido* $fila['costo_produc'];
      ?>
                <tr>
                    <td><input type="text" placeholder="ID" readonly name="id_pro<?php echo $i ?>" value="<?php echo $fila['id_producto'] ?> "></td>
                    <td> <input type="text" placeholder="PRODUCTO" readonly name="name_pro<?php echo $i ?>" value="<?php echo $fila['nom_produc'] ?> "> </center> </td>
                    <td><input type="text" placeholder="CANTIDAD" readonly name="cantidad_pro<?php echo $i ?>" value="<?php echo $fila['can_produc'] ?>" ></td>
                    <td> <input type="text" placeholder="PRECIO" readonly name="precio_pro<?php  echo $i ?>" value="<?php echo $fila['costo_produc'] ?>"></td>
                    <td><input type="text" placeholder="COMISION" readonly name="comision_pro<?php echo $i ?>"  value="<?php echo $fila['comision_produc'] ?>"> </td>
                    <td><input type="text" placeholder="DEVOLUON" readonly name="devolucion<?php echo $i ?>" value="<?php echo $fila['devolucion'] ?>" > </td>
                    <td><input type="text" placeholder="VENDIDO"  readonly name="vendido<?php echo $i ?>" value="<?php echo $vendido ?>" > </td>
                    <td><input type="text" placeholder="COMISION" readonly name="comisiontt<?php echo $i ?>" value="<?php echo $comision ?>" > </td>
                    <td><input type="text" placeholder="A PAGAR"  readonly name="valortt<?php echo $i ?>" value="<?php echo $valor ?>" > </td>
                    <td><input type="text" hidden  readonly name="identrega<?php echo $i ?>" value="<?php echo $fila['id_report_entrega'] ?>"></td>

                  <?php
                  $totalcomision=$comision+$totalcomision;
                  $totalvalor=$totalvalor+$valor;
                    $i++;
} ?>

<td><input type="text" hidden placeholder="filas" name="filas" value="<?php echo $i ?>"></td>

            </tbody>
        </div>
        </table>
        <td><input type="text" hidden placeholder="filas" name="comision_total" value="<?php echo $totalcomision ?>"></td>
        <td><input type="text" hidden placeholder="filas" name="valor_total" value="<?php echo $totalvalor ?>"></td>
        <label><h4> Total comsion: <?php echo $totalcomision ?></h4></label>
        <label><h4> Total Valor: <?php echo $totalvalor ?></h4></label>
        <td>
            <input class="boton" type="submit" value="PROCESAR" id="Grabar">
          </form>
            </body>
            </html>
