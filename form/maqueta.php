<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="../css/estilosmaq.css"/>

		<title>DAC&P</title>
		<?php
		session_start();
		include_once 'cabecera.php';
		?>
	</head>

    <body>
    <header>

    </header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <img src="../imagenes/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inicio
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="form_mision.php">Mision</a>
          <!--<a class="dropdown-item" href="form_vision.php">Vision</a>-->
          <!--<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        --></div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion de bodega
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<?php if($_SESSION['usu_rol_id']==1){
					echo '<a class="dropdown-item" href="form_agre_inv.php">Agregar Inventario</a>';
				} ?>
					<a class="dropdown-item" href="form_cons_inv.php">Consultar Inventario por fecha</a>
					<a class="dropdown-item" href="form_buscar_inv2.php">Consultar Inventario</a>
				</div>

      </li>
			<!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion de usuario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="form_crear_usu.php">Crear Usuario</a>
          <a class="dropdown-item" href="form_consul_usu.php">Consultar Usuario</a>

      </li>-->

			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion de producto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php if($_SESSION['usu_rol_id']==1){
						echo '<a class="dropdown-item" href="form_crear_pro.php">Crear Producto</a>';
					} ?>


          <a class="dropdown-item" href="form_consul_pro.php">Consultar Producto</a>
				</div>
      </li>

			<?php if($_SESSION['usu_rol_id']==1){
				echo '	<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Gestion de rol
		        </a>

		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="form_crear_rol.php">Crear Rol</a>
		          <a class="dropdown-item" href="form_consul_rol.php">Consultar Rol</a>
						</div>
		      </li>';
			} ?>

			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gention de venta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="form_crear_venta.php">Procesar Factura</a>
					<?php if($_SESSION['usu_rol_id']==1){
						echo '<a class="dropdown-item" href="form_consul_factura.php">Consultar Factura</a>';
					} ?>
				</div>
      </li>
			<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gestion de vendedor
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">

			<?php if($_SESSION['usu_rol_id']==1){
				echo '
				<a class="dropdown-item" href="form_crear_vendedor.php">Crear Vendedor</a>
			          <a class="dropdown-item" href="form_con_vend.php">Consultar Vendedor</a>
			          <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="form_report_entre.php">Reporte de entrega</a>
								<a class="dropdown-item" href="form_report_devo.php">Reporte Devolucion</a>
								';


							} ?>

								<a class="dropdown-item" href="form_cons_report_vend.php">Consultar Reportes</a>
							</div>
						</li>';


<?php if($_SESSION['usu_rol_id']==1){
	echo '
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 Flujo
				</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="form_efe_ingreso.php">efectuar ingeso</a>
			    <a class="dropdown-item" href="form_cons_balance2.php">consultar balance</a>

								<a class="dropdown-item" href="form_efe_gasto.php">tramitar gasto</a>
								</div>
								</li>';
				}

				?>



			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <?php echo $_SESSION['usu_login'];?>
				</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../program/logout.php">Salir</a>
			</div>
			</li>

    </ul>

</div>
</nav>
	</body>
</html>
