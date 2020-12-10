<?php
session_start();

include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();

$usuario=$_POST['correo'];
$clave=$_POST['clave'];

$sql=valida_usuario($usuario, $clave);
$validauser=mysqli_query($idcone, $sql) or die (mysqli_error());
$fila= mysqli_fetch_array ($validauser);

if(!$fila){
	echo $var = "0";
}else{
	echo $var = "1";
	$_SESSION['id_usu']=$fila['id_vendedor'];
	$_SESSION['usu_login']=$fila['user_correo'];
	$_SESSION['usu_rol_id']=$fila['id_roll'];
	$_SESSION['roll']=$fila['roll'];
}
	/*
	if(empty($_REQUEST ['txt_usu']) || empty($_REQUEST ['txt_clave'])){
			echo '<script Lenguaje="javaScript">
			alert ("Existen campos vacíos");
			self.location="../form/login.php"
			</script>';
		}else{
			if(!$fila[0]){
				echo'<script Lenguaje="javaScript">
				alert("Usuario no existe");
				self.location="../form/login.php"
				</script>';
			}else{

				$_SESSION['usu_rol_id']=$fila['user_password'];
				echo'<script Lenguaje="javaScript">
				self.location="../form/inicio.php"
				</script>';

			}
		}


*/
?>
