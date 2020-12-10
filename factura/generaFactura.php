<?php

	//print_r($_REQUEST);
	//exit;
	//echo base64_encode('2');
	//exit;
	session_start();

	include "../config/conexion.php";
	require_once '../pdf/vendor/autoload.php';
	include ("../config/querys.php");

	use Dompdf\Dompdf;
$conection=conexion();
	if(empty($_REQUEST['f']))
	{
		echo "No es posible generar la factura.";
	}else{
		$noFactura = $_REQUEST['f'];
		$anulada = '';

		//$query_config   = mysqli_query($conection,"SELECT * FROM configuracion");
		//$result_config  = mysqli_num_rows($query_config);
		//if($result_config > 0){
		//	$configuracion = mysqli_fetch_assoc($query_config);
		}

		$queryfactura=obtener_dfactura($noFactura);
		$query = mysqli_query($conection,$queryfactura);
		$result = mysqli_num_rows($query);
		if($result > 0){

			$factura = mysqli_fetch_assoc($query);
			$no_factura = $factura['id_venta'];

			if($factura['id_estado'] == 2){
				$anulada = '<img class="anulada" src="img/anulado.png" alt="Anulada">';
			}
			$queryproductos=detalles_productos($noFactura);
			$query_productos= mysqli_query($conection,$queryproductos);
			$result_detalle = mysqli_num_rows($query_productos);

			ob_start();
		    include(dirname('__FILE__').'/factura.php');
		    $html = ob_get_clean();

			// instantiate and use the dompdf class
			$dompdf = new Dompdf();

			$dompdf->loadHtml($html);
			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('letter', 'portrait');
			// Render the HTML as PDF
			$dompdf->render();
			// Output the generated PDF to Browser
			$dompdf->stream('factura_'.$noFactura.'.pdf',array('Attachment'=>0));
			exit;
		}


?>
