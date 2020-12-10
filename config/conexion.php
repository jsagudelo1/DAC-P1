<?php

	function conexion(){

		$host="localhost";
		$usu="root";
		$clave="";
		$basedatos="dacp";

		$id_cone=mysqli_connect($host, $usu, $clave) or die("Error conectando");
		mysqli_select_db($id_cone, $basedatos) or die("Error base de datos");

		return $id_cone;
	}

?>
