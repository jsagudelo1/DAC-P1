<?php

session_start();
include ("../config/conexion.php");
include ("../config/querys.php");
$idcone=conexion();

$tipo = $_GET['cliente'];
$num = $_GET['contra'];

$valida= valida_cli($tipo,$num);
$documentos=documento();
$sql= mysqli_query($idcone,$valida);
$iniciar= mysqli_query($idcone,$documentos);

$ejecuta= mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>CLIENTES</title>
        <link rel="stylesheet" href="../css/estiloslogin.css"/>
		<link rel="icon" href="../imagenes/fondo.png"/>
	</head>
	<body>

		<header>
		</header>
		<form method="POST" action="../program/program_modifica_cliente.php">

		<div>BIENVENIDO</div><br></br><div>

		<input type="hidden" name="txt_id" value="<?php echo $ejecuta['id_cliente']; ?>" ></br>
		<select name="txt_tipo" id="txt_tipo" class="barra"></br>
		        echo "<option>Seleccione una opcion</option>";

				<?php
				while($recorrer= mysqli_fetch_array($iniciar)){
				echo "<option value=".$recorrer['id_doc'].">";
				echo $recorrer['nombre_doc'];
				echo "</option>";}
				?>
				</select></br>

        		<td><input type="text" placeholder="Numero De Documento" name= "txt_num_doc" id="txt_num_doc" value="<?php echo $ejecuta['num_doc']; ?>"></td>
				<td><input type="text" placeholder="Razon Social" name= "txt_razon" id="txt_razon" value="<?php echo $ejecuta['razon']; ?>"> </td>
				<td><input type="text" placeholder="Teléfono" name= "txt_telefono" id="txt_telefono" value="<?php echo $ejecuta['telefono']; ?>"></td>
				<td><input type="text" placeholder="Dirección" name= "txt_direccion" id="txt_direccion" value="<?php echo $ejecuta['direccion']; ?>" ></td>
				<td><input type="text" placeholder="Correo Electrónico" name= "txt_correo" id="txt_correo" value="<?php echo $ejecuta['correo']; ?>"></td>
				<input type="hidden" name="txt_est" value="<?php echo $ejecuta['estado_cli']; ?>" ></br>

       <td><input type="submit" value="Grabar"

			<input class="boton" type="submit" value="Ingresar" id="Grabar">
		</form>
	</body>
</html>
