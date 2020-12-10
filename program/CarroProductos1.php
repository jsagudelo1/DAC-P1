<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<?php
session_start();
include ("../config/conexion.php");
include ("../config/querys.php");
include "../form/cabecera.php";

$idcone=conexion();
$vendedores = obtener_vendedorIDNombre();
$vendedorConsulta = mysqli_query($idcone,$vendedores);
$venta = obtener_venta();
$id_venta = mysqli_query($idcone,$venta);
$_SESSION['total']=0;
//$iniciar= mysqli_query($idcone,$documentos);
//$producto=mysqli_fetch_array($iniciar);
//$granTotal = 0;

/*En este archivo se crea todo el carrito en una variable de sesion, primero verifica si existe,
si existe se va a buscar el producto y si lo encuentra, aumenta la cantidad de ese que ya exitia
y la multiplica de nuevo por el precio para actualizarlo, si no existe crea el registro por primera vez
y al final lo guarda en la variable de session, si no existe la variable de sesion en el else la crea y registra
el primer producto en la variable, de aqui ya solo queda hacer 4 cosas mas, eliminar un producto con el boton, registrar,
cancelar la venta o volver y registrar mas productos, si cancela la venta simplemente destruye las variables de sesion y ya en el archivo eliminarVenta.php.
si registra se va a la funcion registratVenta() del archivo validacion.js linea 116 y si le da registrar mas productos solo se devuelve al archivo form_crear_venta
para seguir registrando productos en ese formulario coloque un contador para saber el numero de productos que tiene el carro y siempre puede volver al detalle*/

if(isset($_SESSION['carrito'])){
  //si existe buscar si ya esta agregado ese producto
  if(isset($_POST['id'])){
  $id = $_POST['id'];
  $cantidad = $_POST['cantidad'];
  $costo = $_POST['costo'];

  if(isset($_POST['id'])){
    $arreglo = $_SESSION['carrito'];
    $encontrar = false;
    $numero = 0;
    for($i = 0; $i<count($arreglo);$i++){
      if($arreglo[$i]['Id'] == $_POST['id']){
        $encontrar = true;
        $numero = $i;
      }
    }

    if($encontrar == true){
      $arreglo[$numero]['Cantidad'] += $cantidad;
      $costo2 = $arreglo[$numero]['Cantidad']*$arreglo[$numero]['Costo'];
       $arreglo[$numero]['Subtotal'] = $costo2;
      $_SESSION['carrito'] = $arreglo;

    }else{
        //no estaba el registro
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $costo = $_POST['costo'];
        $documentos=obtener_producto_especifico($id);
        $iniciar= mysqli_query($idcone,$documentos);
        $row = mysqli_fetch_array($iniciar);
        $nombre = "";
        $subtotal = "";

        $nombre = $row['nom_produc'];
        $subtotal = $cantidad *$costo;
        $arregloNuevo = array(
          'Id'=> $id,
          'Nombre'=> $nombre,
          'Cantidad'=> $cantidad,
          'Costo' => $costo,
          'Subtotal' => $subtotal
        );
        //
        array_push($arreglo,$arregloNuevo);
        $_SESSION['carrito'] =$arreglo;
    }
  }
}
}else{
  //crear la variable de session
  if(isset($_POST['id'])){

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $documentos=obtener_producto_especifico($id);
    $iniciar= mysqli_query($idcone,$documentos);
    $row = mysqli_fetch_array($iniciar);
    $nombre = "";
    $subtotal = "";

    $nombre = $row['nom_produc'];
    $subtotal = $cantidad *$costo;
    $arreglo[] = array(
      'Id'=> $id,
      'Nombre'=> $nombre,
      'Cantidad'=> $cantidad,
      'Costo' => $costo,
      'Subtotal' => $subtotal
    );
    $_SESSION['carrito'] =$arreglo;
  }
}


//echo $cantidad . $costo;
?>
<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="../css/estilosmaq.css" >
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="../css/bootstrap-4.4.1-dist/js/bootstrap.min.js"  ></script>-->

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title></title>


</head>
<header>
<?php
include_once '../form/cabecera.php';
?>
</header>

<body>

<div class="col-xs-12">
    <h1 class="text-center">Carro</h1>
    <label for="vendedor">Vendedor</label>
    <select class="custom-select" id="vendedor" name="vendedor" required>
      <option selected disabled value >...</option>
      <?php
      while($vendedorows = mysqli_fetch_array($vendedorConsulta)){
        echo '<option  value='.$vendedorows['id_vendedor'].'>'.$vendedorows['nom_vendedor'].'</option>';
      }
       ?>
    </select></br></br>

    <label for="vendedor">codigo de venta</label>
    <input type="text"  class="form-control" id="id_venta" name="id_venta" maxlength="60" required>

      <label for="cliente">Cliente</label>
      <input type="text" class="form-control" id="cliente"name="cliente" maxlength="60" required>
    <label for="transporte">transporte</label>
    <input type="text" class="form-control" id="transporte"name="transporte" maxlength="60" required>

    <label for="estado">Estado</label>
      <select class="custom-select" id="estado" name="estado" required>
        <option>...</option>
        <option>Pago</option>
        <option>Debe</option>
        </select></br></br>
        <label for="fechapago">Fecha pago</label>
        <input type="date" class="form-control" id="fechapago" name="fechapago" maxlength="60" required>

    <table class="table table-bordered">
          <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Costo</th>
              <th>subTotal</th>

          </tr>
          </thead>

            <?php if(isset($_SESSION['carrito'])){

              $arregloCarrito = $_SESSION['carrito'];
              for($i = 0; $i<count($arregloCarrito); $i++){
                $_SESSION['total']= $_SESSION['total']+$arregloCarrito[$i]['Subtotal'];
              ?>
              <tbody>
          <td><?php echo $arregloCarrito[$i]['Id'];?></td>
          <td><?php echo $arregloCarrito[$i]['Nombre'];?> </td>
          <td><?php echo $arregloCarrito[$i]['Cantidad'];?></td>
          <td><?php echo $arregloCarrito[$i]['Costo'];?></td>
          <td><?php echo $arregloCarrito[$i]['Subtotal'];?></td>
          <td><a href="#" class="btn btn-danger btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id']?>">Remover</a></td>

<?php
}

echo '</tbody></table>
</div>';}else{
//  echo"<script> alert(No existen productos para registrar la venta) </script>";
  header('Location: ../form/form_crear_venta.php');
}

?>
<h3>Total: <?php  echo $_SESSION['total']; ?></h3>
<a href="#" class="btn btn-success" onclick="registrarVenta()" id="registrar" name="registrar">Registrar Venta</a>
<a href="EliminaVenta.php" class="btn btn-danger" onclick="cancelarVenta()" id="cancelar" name ="cancelar">Cancelar venta</a>
<a href="../form/form_crear_venta.php" class="btn btn-info">Registrar mas productos</a>


    <script src="../js/validacion.js"></script>
    </body>

    </html>
