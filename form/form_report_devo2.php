<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone= conexion();
$documentos= obtener_report_entrega ($_SESSION['fecha'] , $_SESSION['id_vendedor']);
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



<form method="POST" action="../program/program_report_devo2.php" class="needs-validation" novalidate>

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

            </tr>
            </thead>
            <tbody>
            <?php
$i=0;
            while($fila = Mysqli_fetch_array($iniciar)){

                ?>
                <tr>

                    <td><input type="text" readonly class="form-control" placeholder="ID" name="id_pro<?php echo $i ?>" value="<?php echo $fila['id_producto'] ?> "></td>
                    <td> <input type="text" readonly class="form-control" placeholder="PRODUCTO" name="name_pro<?php echo $i ?>" value="<?php echo $fila['nom_produc'] ?> "> </center> </td>
                    <td><input type="text" readonly class="form-control" placeholder="CANTIDAD" id="cantidad<?php echo $i; ?>" name="cantidad_pro<?php echo $i ?>" value="<?php echo $fila['can_produc'] ?>" ></td>
                    <td> <input type="text" readonly class="form-control" placeholder="PRECIO" name="precio_pro<?php  echo $i ?>" value="<?php echo $fila['costo_produc'] ?>"></td>
                    <td><input type="text" readonly class="form-control" placeholder="COMISION" name="comision_pro<?php echo $i ?>"  value="<?php echo $fila['comision_produc'] ?>"> </td>
                    <td><input type="text" placeholder="DEVOLUCION" id="devolucion<?php echo $i; ?>" class="form-control" name="devolucion<?php echo $i ?>"  onkeypress="return soloNumeros(event)" onkeyup="ValidaCantidad(<?php echo $i;?>)" required>
                      <div class="invalid-feedback">
                        Por favor ingrese la cantidad.
                      </div> </td>

                    <td><input type="text" hidden  name="identrega<?php echo $i ?>" value="<?php echo $fila['id_report_entrega'] ?>"></td>


                  <?php      $i++;


} ?>
<td><input type="text" hidden placeholder="filas" name="filas" value="<?php echo $i ?>"></td>

            </tbody>
        </div>
        </table>
        <td>
            <input class="boton" type="submit" value="PROCESAR" id="Grabar">
          </form>
            </body>
            <script src="../js/Funciones.js"></script>
            </html>
