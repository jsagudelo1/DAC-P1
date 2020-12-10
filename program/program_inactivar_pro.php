<?php
include ("../config/conexion.php");
include ("../config/querys.php");

$idcone= conexion();
$id = $_GET['id_pro'];


$activar= inactivar_producto($id);
$sql= mysqli_query($idcone, $activar);

echo '<script language="javascript">
	alert("producto inactivado");
	self.location="../form/form_consul_pro.php";
	</script>';




?>
