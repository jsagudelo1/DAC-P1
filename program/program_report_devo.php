<?php
session_start();
include("../config/conexion.php");
include("../config/querys.php");

$idcone=conexion();
   $fecha_devo=$_POST['fecha_devo'];
  $producto1=$_POST['id_vendedor'];
 $id_vendedor=explode(" ",$producto1);
 $modifica =valida_report_devo($fecha_devo,$id_vendedor[0]);
$sql= mysqli_query($idcone,$modifica)or die (mysqli_error($idcone));
$fila=mysqli_fetch_array($sql);
	if(empty($_REQUEST ['fecha_devo']) || empty($_REQUEST ['id_vendedor'])){
			echo '<script Lenguaje="javaScript">
			alert ("Existen campos vacíos");
			self.location="../form/form_report_devo.php"
			</script>';
		}else{
			if(empty($fila[0])){
				echo'<script Lenguaje="javaScript">
				alert("este vendedor no cuenta con un reporte disponible para este dia");
		    self.location="../form/form_report_devo.php"
				</script>';
			}else{
				echo'<script Lenguaje="javaScript">
				self.location="../form/form_report_devo2.php"
				</script>';
        $_SESSION['id_vendedor']=$id_vendedor[0];
        $_SESSION['fecha']=$fecha_devo;

}
}
#if ($array)

//echo '<script language="javascript">
//		alert("el reporte del vendedor fue  agregado exitosamente");
	//	self.location="../form/form_report_entre.php";
		//</script>';


?>
