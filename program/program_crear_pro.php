<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$id= $_POST['txt_id_pro'];
$producto=$_POST['txt_nom_pro'];
$descripcion=$_POST['txt_des_pro'];
//$valor_mayor=$_POST['txt_valor_mayor'];
//$costo_pro=$_POST['txt_costo_pro'];

$can_min_bodega=$_POST['txt_valor_min'];
$estado = 1;



 $modifica =agregar_producto($id, $producto,$descripcion,$can_min_bodega,$estado);
$sql= mysqli_query($idcone,$modifica) or die (mysqli_error($idcone));


echo '<script language="javascript">
		alert("producto agregado");
		self.location="../form/form_crear_pro.php";
		</script>';
?>
