<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$filas=$_POST['filas'];
 $producto1=$_POST['id_vendedor'];
$valortotal=$_POST['valor_total'];
$comisiontotal=$_POST['comision_total'];

for($i=0;$i<$filas;$i++){
echo $identrega=$_POST['identrega'.$i];
echo $comisiontt=$_POST['comisiontt'.$i];
echo $valortt=$_POST['valortt'.$i];
echo $vendido=$_POST['vendido'.$i];
$modifica=agregar_devo_total($identrega,$valortotal,$comisiontotal,$vendido,$valortt,$comisiontt);
$sql= mysqli_query($idcone,$modifica)or die (mysqli_error());

}
$modifica=agregar_activo_venta($valortotal);
$sql= mysqli_query($idcone,$modifica)or die (mysqli_error());

echo '<script language="javascript">
		alert("el reporte del vendedor fue  agregado exitosamente");
		self.location="../form/form_report_devo3.php";
		</script>';
