<?php 
include ("../config/conexion.php");
include ("../config/querys.php");

$idcone= conexion();
$id = $_GET['id_inv'];


$activar= inactivar_inv($id);
$sql= mysqli_query($idcone, $activar);

echo '<script language="javascript">
	alert("registro inactivado");
	self.location="../form/form_cons_inv.php";
	</script>';




?>

