<?php
session_start();
include("../config/conexion.php");
include("../config/querys.php");

$connection = conexion();
$rol = $_POST['rol'];

$nuevoID = UltimoRol();
$executenuevoID = mysqli_query($connection,$nuevoID) or die (mysql_error($connection));
$rowNuevoID = mysqli_fetch_array($executenuevoID);
$nuevoID = $rowNuevoID['UltimoRol']+1;

$registraRol = RegistrarRol($nuevoID,$rol);
$executeRegistraRol = mysqli_query($connection,$registraRol) or die (mysqli_error($connection));

echo '<script language="javascript">
		alert("Rol Agregado");
		self.location="../form/maqueta.php";
		</script>';
?>
