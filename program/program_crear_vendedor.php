<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$id= $_POST['txt_id_vend'];
$nombre=$_POST['txt_nom_vend'];
$apellido=$_POST['txt_ape_vend'];
$telefono=$_POST['txt_tel_vend'];
$direccion=$_POST['txt_dir_vend'];
$correo=$_POST['txt_cor_vend'];
$rol=$_POST['txt_nom_roll'];
$clave = $_POST['txt_pass'];
//$id_roll=explode(" ",$roll);



$idUsu = UltimoUsu();
$executeIdUsu = mysqli_query($idcone,$idUsu) or die (mysqli_error($idcone));
$rowExecute = mysqli_fetch_array($executeIdUsu);
$nuevoId = $rowExecute['UltimoID']+1;


$modifica = agregar_vendedor($id,$nombre,$apellido,$telefono,$direccion,$correo,$rol);
$sql= mysqli_query($idcone,$modifica) or die(mysqli_error($idcone));

$registraLogin = RegistraLogin($nuevoId,$id,$correo,$clave,$rol);
$executeRegistra = mysqli_query($idcone,$registraLogin) or die (mysqli_error($idcone));


echo '<script language="javascript">
		alert("vendedor agregado");
		self.location="../form/maqueta.php";
		</script>';

?>
