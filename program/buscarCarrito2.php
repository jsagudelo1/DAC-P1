<?php
session_start();
include ("../config/conexion.php");
include ("../config/querys.php");

$codigo = $_POST['codigo'];
$idcone=conexion();
$subto = 0;
/*En este archivo no hay mucho que explicar solo hace una consulta
la guarda en un objeto JSON y al darle echo la puede capturar de nuevo
la funcion del javascript en la parte de success: linea 15, esta parte
recibe la respuesta del servidor que es la consulta dentro del objeto JSON*/
if(!empty($codigo)){

  $documentos=obtener_producto_especifico($codigo);
  $iniciar= mysqli_query($idcone,$documentos);
  $json = array();

  while($row = mysqli_fetch_array($iniciar)){
    $json[]= array(
        'codigo' => $row['id_producto'],
        'nombre' => $row['nom_produc'],
        'descripcion' => $row['des_produc']
    );
  }
  $jsonString = json_encode($json);
  echo $jsonString;

  //$producto= mysqli_fetch_assoc($iniciar);

}



 ?>
