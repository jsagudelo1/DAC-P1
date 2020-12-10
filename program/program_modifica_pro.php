<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$id_producto= $_POST['txt_id_pro'];
$nom_pro= $_POST['txt_nom_produc'];
$descripcion=$_POST['txt_des_pro'];
$can_min_bodega=$_POST['txt_valor_min'];

$modifica = modificar_producto($id_producto, $nom_pro,$descripcion,$can_min_bodega);
$sql= mysqli_query($idcone,$modifica) or die (mysqli_error($idcone));


// echo '<script language="javascript">
	//	alert("producto modificado");
//		self.location="../form/maqueta.php";
	//	</script>';
?>
