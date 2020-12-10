<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$id= $_POST['txt_id_vend'];
$nom= $_POST['txt_nom_vend'];
$apellido=$_POST['txt_ape_vend'];
$direccion=$_POST['txt_dir_vend'];
$telefono=$_POST['txt_tel_vend'];
$correo=$_POST['txt_cor_vend'];



$modifica =modificar_vendedor($id, $nom,$apellido,$direccion,$telefono,$correo);
$sql= mysqli_query($idcone,$modifica) or die (mysqli_error($idcone));
$modificaLogin = modificarlogin($id,$correo);
$executeModificaLogin = mysqli_query($idcone,$modificaLogin) or die(mysqli_error($idcone));

echo '<script language="javascript">
		alert("Vendedor modificado");
		self.location="../form/maqueta.php";
		</script>';
?>
