<?php
session_start();
include ("../config/conexion.php");
include ("../config/querys.php");
$idcone=conexion();
/*Valida si existe el carrito y si estan enviando la informacion del vendedor(id)*/
if(isset($_POST['vendedor']) & isset($_SESSION['carrito'])){
  $id_venta=$_POST['id_venta'];
  $vendedor = $_POST['vendedor'];
  $cliente = $_POST['cliente'];
  $estado = $_POST['estado'];
  $fechaventa = date('Y-m-d');
  $fechapago = $_POST['fechapago'];
  $total = $_SESSION['total'];
  $transporte = $_POST['transporte'];


//aqui inserta primero en la tabla no_ventas
echo $query = insertarVenta($id_venta,$total,$transporte,$fechaventa,$estado,$fechapago,$vendedor,$cliente);
$execute = mysqli_query($idcone,$query) or die (mysqli_error());
//luego traigoel ultimo id registrado en no_ventas para agregarlo al detalle

   $query1 = insertar_venta_activo($total,$fechaventa,$id_venta);
  $execute = mysqli_query($idcone,$query1) or die (mysqli_error());


    //$id['id_venta'];
  $arreglo = $_SESSION['carrito'];

//guarda el carrito en otra variable, lo recorre y mientras lo recorre guarda en la tabla detalle los productos del Carro y descuenta
//los valores que se sacaron de ese producto en la bodega que se haya registrado el producto primero.
  for($i = 0; $i<count($arreglo);$i++){
    $fechaComparar= date('Y-m-d');
        echo $queryDetalle = insertaDetalleVenta($id_venta,$arreglo[$i]['Id'],$arreglo[$i]['Costo'],$arreglo[$i]['Cantidad'],$arreglo[$i]['Subtotal']);
        $executeDetalle = mysqli_query($idcone,$queryDetalle) or die (mysqli_error());

        $fechasquery = seleccionarFechasBodega($arreglo[$i]['Id'] , $arreglo[$i]['Cantidad']);
        $executefechasquery = mysqli_query($idcone,$fechasquery) or die (mysqli_error());

        $fechasarray=array();

        while($row = mysqli_fetch_array($executefechasquery)){
          array_push($fechasarray,$row['fecha_ingreso']);
        }


        for($j = 0; $j<count($fechasarray);$j++){
          if($fechasarray[$j]<$fechaComparar){
              $fechaComparar = $fechasarray[$j];
          }
      }

      $descontarBodega = DescontarBodega( $arreglo[$i]['Id'] , $arreglo[$i]['Cantidad'] , $fechaComparar);
      //print_r($descontarBodega);
      $executeDescontar = mysqli_query($idcone,$descontarBodega) or die (mysqli_error());


  }

    unset($_SESSION['carrito']);
    unset($_SESSION['total']);

}
 ?>
