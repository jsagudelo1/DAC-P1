<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$producto=$_POST['txt_producto'];





$modifica = buscar_producto($producto);
$sql= mysqli_query($idcone,$modifica);


echo '<script language="javascript">
		alert("producto agregado");
		self.location="../form/form_buscar_pro.php";
		</script>';
?>