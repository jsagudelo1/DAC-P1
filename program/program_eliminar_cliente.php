<?php 
include ("../config/conexion.php");
include ("../config/querys.php");

$idcone= conexion();
$tipo = $_GET['cliente'];
$num = $_GET['contra'];

$activar= eliminar_cli($tipo, $num);
$sql= mysqli_query($idcone, $eliminar);

echo '<script language="javascript">
	alert("Cliente eliminado");
	self.location="../form/form_obtener_cli.php";
	</script>';




?>
