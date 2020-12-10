<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();

$producto= $_POST['txt_producto'];


$id_producto=buscar_producto($producto);
$sql= mysqli_query($idcone,$id_producto);
$recorrer= mysqli_fetch_array($sql);





echo '<script language="javascript">
		self.location="../form/form_buscar_inv.php";
		</script>';
?>