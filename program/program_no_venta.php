<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$id= $_POST['txt_id_venta'];
$transporte=$_POST['txt_transporte'];
$fecha=$_POST['txt_fecha'];
$pagadopendiente=$_POST['txt_pagado_pendiente'];
$fecha_pendiente=$_POST['txt_fecha_pendiente'];





$modifica =agregar_no_venta($id, $transporte,$fecha,$pagadopendiente,$fecha_pendiente);
$sql= mysqli_query($idcone,$modifica);


echo '<script language="javascript">
		alert("venta agregada");
		self.location="../form/maqueta.php";
		</script>';
?>