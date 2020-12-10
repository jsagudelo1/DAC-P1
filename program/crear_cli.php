 
 <?php
 //$id_clientes=$_POST[''];
 
 include '../config/conexion.php';
 include '../config/querys.php';
 
 $idcone= conexion();
 $tipo=$_POST['txt_tipo'];
 $num=$_POST['txt_num_doc'];
 $razon=$_POST['txt_razon'];
 $telefono=$_POST['txt_telefono'];
 $direccion=$_POST['txt_direccion'];
 $correo=$_POST['txt_correo'];
 
 if(empty($tipo) || empty ($num) || empty($razon) || empty ($telefono) || empty ($direccion) || empty($correo)){
			echo '<script Lenguaje="javaScript">
			alert ("Existen campos vacíos");
			self.location="../form/form_crear_cli.php";
			</script>';
		}else{
			$sql=valida_cli($tipo,$num);
			$valida_cli=mysqli_query($idcone, $sql);
			$fila=mysqli_fetch_array($valida_cli);
			if($fila[0]){
				echo'<script Lenguaje="javaScript">
				alert("cliente ya existe");
				self.location="../form/form_crear_cli.php";
				</script>';
			}else {
			$inserta=inserta_cliente($tipo,$num,$razon,$telefono,$direccion,$correo);
			$crear=mysqli_query($idcone,$inserta);
			echo'<script Lenguaje="javaScript">
				alert("cliente creado");
				self.location="../form/maqueta.html";
				</script>'; 
		}
	}
 ?>
