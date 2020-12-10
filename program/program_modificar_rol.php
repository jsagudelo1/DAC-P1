<?php
session_start();
include("../config/conexion.php");
include("../config/querys.php");

$connection = conexion();
$rol = $_POST['rol'];
$idRol = $_POST['id_rol'];


$modificarRol = ModificarRol($idRol,$rol);
$executeModificicarRol = mysqli_query($connection,$modificarRol) or die (mysqli_error($connection));

echo '<script language="javascript">
		alert("Rol Modificado");
		self.location="../form/form_consul_rol.php";
		</script>';
?>
