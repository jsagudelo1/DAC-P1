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

<a href="../program/CarroProductos.php" class="btn btn-success">Ver detalle de venta</a>
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
