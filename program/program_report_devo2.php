<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$filas=$_POST['filas'];
 $producto1=$_POST['id_vendedor'];



for($i=0;$i<$filas;$i++){
 $identrega=$_POST['identrega'.$i];
 $devolucion=$_POST['devolucion'.$i];
 $idproducto = $_POST['id_pro'.$i];
$modifica=agregar_devo($devolucion,$identrega);
$sql= mysqli_query($idcone,$modifica)or die (mysqli_error());
$devolver = RegistrarDevolucion($idproducto,$devolucion);
$executedevolver = mysqli_query($idcone,$devolver) or die (mysqli_error($idcone));


}
echo '<script language="javascript">
		alert("el reporte del vendedor fue  agregado exitosamente");
		self.location="../form/form_report_devo3.php";
		</script>';


?>
