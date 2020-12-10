<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone=conexion();
$documentos=obtener_producto();
$iniciar= mysqli_query($idcone,$documentos);
$producto=mysqli_fetch_array($iniciar);

$venta=obtener_venta();
$consulta= mysqli_query($idcone,$venta);
$vendedor=obtener_vendedor();
$consulta1= mysqli_query($idcone,$vendedor);

?>
<!DOCTYPE html>
<html lang="es">
<head>


    <link rel="stylesheet" href="../css/Carrito.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- <link rel="stylesheet" href="../css/estiloslogin.css" >
      <link rel="stylesheet" href="../css/estilosmaq.css" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js"  ></script>
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    --><meta charset="UTF-8">
    <meta charset="UTF-8">
    <title></title>


</head>
<header>
<?php
include_once 'cabecera.php';
?>
</header>

<body>

<div class="form-small">
    <h2 class="text-center" >Crear Factura</h2>
    <body>

    <div class="col-xs-12">


        <br>
        <label for="codigo">Código de barras:</label>
        <input autocomplete="off" autofocus class="form-control" name="cod_producto" id="cod_producto" required type="text" placeholder="Escribe el código" onkeypress="return soloNumeros(event)">
    <br>

    <div id="resultado" name = "resultado">

    </div>

<div class="alert alert-info" hidden role="alert" id="mensaje"></div></br>

<a href="../program/CarroProductos1.php" class="btn btn-success">Ver detalle de venta</a>
        <span class="glyphicon glyphicon-shopping-cart ico"></span>
            <span class ="count">
            <?php
            if(isset($_SESSION['carrito'])){
                echo count($_SESSION['carrito']);
            }else{
                echo 0;
            }
            ?>
          </span>
</div>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/validacion.js"></script>

    </body>

    </html>

<?php
/**
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";

$idcone= conexion();
$documentos= obtener_vendedor();
$iniciar= mysqli_query($idcone,$documentos);

$producto= obtener_producto_entrega();
$sql= mysqli_query($idcone,$producto);

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



<form method="POST" action="../program/program_report_entre.php" onsubmit="return ReporteEntrega()" class="needs-validation" novalidate>

    <div>REPORTE DE ENTREGA</div><br><div>


        <select  name="id_vendedor"  id="id_vendedor" class="barra form-control" required><br>
            <?php  echo "<option selected disabled value>Seleccione un vendedor</option><br>";


            while($recorrer= mysqli_fetch_array($iniciar)){
                echo "<option>";
                echo $recorrer['id_vendedor']."  ".$recorrer['nom_vendedor'];
                echo "</option>";}

            ?>
        </select>
        <div class="invalid-feedback">
          Por favor seleccione un vendedor.
        </div>
        <br>
        <table class="table">
            <thead   <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>COMISION</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $i=0;
            while($fila = Mysqli_fetch_array($sql)){
                ?>
                <tr>
                  <td><input type="text" placeholder="CANTIDAD" readonly class="form-control" name="id_pro<?php echo $i ?>" value="<?php  echo $fila['id_producto']    ?> " required></td>
                    <td> <input type="text" placeholder="CANTIDAD" readonly class="form-control" name="name_pro<?php echo $i ?>" value="<?php echo $fila['nom_produc']  ?> " required></td>
                    <td>
                      <input type="text" placeholder="CANTIDAD" class="form-control" name="cantidad_pro<?php echo $i ?>" onkeypress="return soloNumeros(event)" required>
                      <div class="invalid-feedback">
                        Por favor ingrese la cantidad.
                      </div>
                    </td>
                    <td>
                       <input type="text" placeholder="PRECIO" class="form-control" name="precio_pro<?php  echo $i ?>" onkeypress="return soloNumeros(event)" required>
                       <div class="invalid-feedback">
                         Por favor ingrese el precio.
                       </div>
                     </td>
                    <td>
                      <input type="text" placeholder="COMISION" class="form-control" name="comision_pro<?php echo $i ?>" onkeypress="return soloNumeros(event)" required>
                      <div class="invalid-feedback">
                        Por favor ingrese la comision.
                      </div>
                    </td>

                  <?php      $i++;


} ?>
<td><input type="text" hidden placeholder="filas" name="filas" value="<?php echo $i ?>"></td>

            </tbody>
        </div>
        </table>
        <td>
            <input class="boton" type="submit" value="Ingresar" id="Grabar">
          </form>
            </body>
            <script src="../js/Funciones.js"></script>
            </html>
          **/
