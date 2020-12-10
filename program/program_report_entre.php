<?php
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
$filas=$_POST['filas'];
 $producto1=$_POST['id_vendedor'];
 $id_vendedor=explode(" ",$producto1);


for($i=0;$i<$filas;$i++){
echo $id= $_POST['id_pro'.$i];
echo $nombre=$_POST['name_pro'.$i];
echo $cantidad=$_POST['cantidad_pro'.$i];
echo $precio=$_POST['precio_pro'.$i];
echo $comision=$_POST['comision_pro'.$i];



$modifica =agregar_report_entrega($id_vendedor[0],$id,$cantidad,$precio,$comision);
$sql= mysqli_query($idcone,$modifica)or die (mysqli_error($idcone));
$entrega = RegistrarEntrega($id,$cantidad);
$executeentrega = mysqli_query($idcone,$entrega) or die (mysqli_error($idcone));



}
echo '<script language="javascript">
		alert("el reporte del vendedor fue  agregado exitosamente");
		self.location="../form/form_report_entre.php";
		</script>';
?>
