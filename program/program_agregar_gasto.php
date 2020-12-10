<?php
session_start();
include("../config/conexion.php");
include("../config/querys.php");

 $connection = conexion();
 $descripcion = $_POST['txt_descripcion'];
  $estado = $_POST['txt_estado'];
 $valor = $_POST['txt_valor'];

$ingreso=agregar_gasto($descripcion,$estado,$valor);
$executeModificicarRol = mysqli_query($connection,$ingreso) or die (mysqli_error($connection));

echo '<script language="javascript">
		alert("agregado correctamente");
		self.location="../form/form_efe_ingreso.php";
		</script>';
?>
