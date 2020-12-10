<?php
	$subtotal 	= 0;
	$iva 	 	= 0;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
 //print_r($configuracion); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php echo $anulada; ?>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img  src="img/logo.png">
				</div>
			</td>
			<td class="info_empresa">
				<?php
		#			if($result_config > 0){
				$iva = 7;
				 ?>
				<div>
					<span class="h2"><?php# echo strtoupper($configuracion['nombre']);  ?>DAC&P</span>
					<p><?php #echo $configuracion['razon_social']; ?></p>
					<p><?php# echo $configuracion['direccion'];  ?>San miguelito</p>
				<!--	<p>NIT: <?php# echo $configuracion['nit']; ?></p> -->
					<p>Teléfono: <?php #echo $configuracion['telefono']; ?>66087474</p>
					<p>Email: <?php #echo $configuracion['email']; ?>DAC&P@gmail.com</p>
				</div>
				<?php
				#}
				 ?>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: <strong><?php echo $factura['id_venta']; ?></strong></p>
					<p>Fecha: <?php echo $factura['fecha']; ?></p>
					<p>Vendedor: <?php echo $factura['vendedor']; ?></p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
								<td><label>Nombre:</label> <p><?php echo $factura['cliente']; ?></p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">producto</th>

					<th class="textleft">Descripción</th>

					<th class="textright" width="150px">Precio Unitario.</th>
<th width="50px">Cant.</th>
					<th class="textright" width="150px"> subtotal</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

			<?php

				if($result_detalle > 0){

					while ($row = mysqli_fetch_assoc($query_productos)){
			 ?>

				<tr>
					<td class="textcenter"><?php echo $row['nom_produc']; ?></td>
								<td><?php echo $row['des_produc']; ?></td>
					<td class="textcenter"><?php echo $row['can_producto']; ?></td>
					<td class="textright"><?php echo $row['costo_Producto']; ?></td>
					<td class="textright"><?php echo $row['subtotal_producto']; ?></td>
				</tr>
			<?php
						$precio_total = $row['total_venta'];
						$subtotal = round( $precio_total, 2);
					}
				}

				$impuesto 	= round($subtotal * ($iva / 100), 2);
				$tl_sniva 	= round($subtotal - $impuesto,2 );
				$total 		= round($tl_sniva + $impuesto,2);
			?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span><?php echo $tl_sniva; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>IVA (<?php echo $iva; ?> %)</span></td>
					<td class="textright"><span><?php echo $impuesto; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php echo $total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>
