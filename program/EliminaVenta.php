<?php
session_start();

unset($_SESSION['carrito']);
unset($_SESSION['total']);
header("Location: ../form/form_crear_venta.php");
 ?>
