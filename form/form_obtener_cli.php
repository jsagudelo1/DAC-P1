<?php 


include ("../Config/conexion.php");
include ("../Config/querys.php");

$idcone= conexion();
$Mostrar= obtener_cliente();
$sql= mysqli_query($idcone,$Mostrar);



?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<!--<link rel="icon" href="../imagenes/fondo.jpg"/>-->
		<title>DESARROLLO DE PÁGINA WEB</title>
	</head>
	
	<header>
		<nav class="amplitud">
			<!--<nav class="logo"><figure><img src="../imagenes/logo.jpg"/></figure></nav>-->
			<nav  class="Empresa"><h1><center>DOOR COMPANY</center></h1></nav>
<head>
<meta charset="UTF-B">
<link rel="stylesheet" type="text/css" href="../css/estilosobtener.css">
<link href="../js/css/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css">
<link href="../js/css/jquery.datatables.css" rel="stylesheet" type="text/css">
<link href="../js/css/demo_table.css" rel="stylesheet" type="text/css">
<link href="../js/css/demo_table_jui.css" rel="stylesheet" type="text/css">
</head>

<header>
<br><br>
<h2><center>OBTENER CLIENTE</center></h2>
<br> <br>
</header>

<body>
<table id="mi_tabla">
<thead>
<tr>

<th> TIPO DOCUMENTO </th>
<th> NUMERO DOCUMENTO </th>
<th> RAZON SOCIAL </th>
<th> TELEFONO</th>
<th> DIRECCION</th>
<th> CORREO</th>
<th> MODIFICAR </th>
<th> ACTIVAR </th>
<th> INACTIVAR </th>
<th> ELIMINAR </th>
<th> ESTADO </th>
</tr>
</thead>
<tbody>
<?php
while($fila = Mysqli_fetch_array($sql)){
?>
<tr>
<td> <center> <?php echo $fila ['docu']?> </center> </td>
<td> <center> <?php echo $fila ['num_doc']?> </center> </td>
<td> <center> <?php echo $fila ['razon']?> </center> </td>
<td> <center> <?php echo $fila['telefono'] ?>  </center> </td>
<td> <center> <?php echo $fila['direccion'] ?>  </center> </td>
<td> <center> <?php echo $fila['correo'] ?>  </center> </td>

<?php echo "<td> <center>  <a href='../form/form_modificar_cliente.php?cliente=".$fila['tipo_doc']."&contra=".$fila['num_doc']."'>" ?>
<img title="Modificar Usuario" src="../img/modificar.png" style="width:15px;height:15px;"></center></a></td>

<?php echo"<td align=center><a href='../program/program_activar_cliente.php?cliente=".$fila['tipo_doc']."&contra=".$fila['num_doc']."'>"?>
<img title="Activar" src="../img/activar.png" style="width:15px;height:15px;"></a></td>

<?php echo"<td align=center><a href='../Program/program_inactivar_cliente.php?cliente=".$fila['tipo_doc']."&contra=".$fila['num_doc']."'>"?>
<img title="Inactivar" src="../img/inactivar.png" style="width:15px;height:15px;"></a></td>
<?php echo"<td align=center><a href='../Program/eliminar_usuario.php?cliente=".$fila['tipo_doc']."&contra=".$fila['num_doc']."'>"?>
<img title="Inactivar" src="../img/inactivar.png" style="width:15px;height:15px;"></a></td>
<td> <center> <?php echo $fila ['estado'] ?> </center> </td>

</tr>
<?php
}
?>
</tbody>
</table>
</body>
<script type="text/javascript" src="../js/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="../js/js/jquery.datatables.min.js"></script>
<script type="text/javascript" language="JavaScript">
$(document).ready( function() {
$("#mi_tabla").dataTable();
});
</script>
</div>
</body>
</html>
