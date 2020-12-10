<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$idBodega= $_POST['id_bodega'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];
$fecha=$_POST['fecha'];
$valorProducto = $precio * $cantidad;


$modifica = ModificarBodega($idBodega,$cantidad,$precio,$fecha);
$sql= mysqli_query($idcone,$modifica) or die (mysqli_error($idcone));

$descripcion="Costo Producto";

$insertarPasivo = InsertarPasivo($fecha,$valorProducto,$descripcion,$idBodega);
$executeInsertarPasivo = mysqli_query($idcone,$insertarPasivo) or die (mysqli_error($idcone));

echo '<script language="javascript">
		alert("producto modificado");
		self.location="../form/form_cons_inv.php";
		</script>';
?>
