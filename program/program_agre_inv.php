<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();

$id= $_POST['txt_codigo'];
$producto=$_POST['txt_producto'];
$can_dispo=$_POST['txt_can_dispo'];
$fecha_ingreso=$_POST['txt_fecha_ingreso'];
$costoProducto = $_POST['precio'];
$valorProducto = $costoProducto * $can_dispo;
//echo $id_producto=obtener_idproducto($producto);
//$sql= mysqli_query($idcone,$id_producto) or die (mysqli_error($idcone));
//print_r($recorrer= mysqli_fetch_array($sql));
$descripcion="Costo Producto";



 $modifica = agregar_inven($id, $can_dispo,$producto,$fecha_ingreso,$costoProducto,$valorProducto);
$sql= mysqli_query($idcone,$modifica) or die (mysqli_error($idcone));

$insertarPasivo = InsertarPasivo($fecha_ingreso,$valorProducto,$descripcion,$id);
$executeInsertarPasivo = mysqli_query($idcone,$insertarPasivo) or die (mysqli_error($idcone));


echo '<script language="javascript">
		alert("registro agregado");
		self.location="../form/form_agre_inv.php";
		</script>';
?>
