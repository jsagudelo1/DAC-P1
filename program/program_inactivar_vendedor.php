<?php
include ("../config/conexion.php");
include ("../config/querys.php");

$idcone= conexion();
$id = $_GET['id_vendedor'];


$activar= inactivar_vendedor($id);
$sql= mysqli_query($idcone, $activar);

echo '<script language="javascript">
	alert("usuario inactivado");
	self.location="../form/form_con_vend.php";
	</script>';




?>
