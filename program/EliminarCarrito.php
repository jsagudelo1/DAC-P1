<?php
session_start();
$arreglo = $_SESSION['carrito'];

for($i = 0; $i<count($arreglo);$i++){
  if($arreglo[$i]['Id'] != $_POST['id']){
    $arregloNuevo []= array(
      'Id'=> $arreglo[$i]['Id'],
      'Nombre'=> $arreglo[$i]['Nombre'],
      'Cantidad'=> $arreglo[$i]['Cantidad'],
      'Costo' => $arreglo[$i]['Costo'],
      'Subtotal' => $arreglo[$i]['Subtotal']
    );
  }
}

if(isset($arregloNuevo)){
  $_SESSION['carrito'] = $arregloNuevo;
}else{
  //el registro a eliminar es el unico que habia
  unset($_SESSION['carrito']);
}
 echo "Eliminado";
?>
