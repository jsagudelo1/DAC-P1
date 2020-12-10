    <?php
session_start ();
include ("../config/conexion.php");
include ("../config/querys.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>
    <link rel="icon" href="../imagenes/fondo.png"/>

</head>
<header>
    <?php
    include_once 'cabecera.php';
    ?>
</header>
<body>



<form method="POST" action="../program/program_no_venta.php">

    <div></div><br><div>

        <td><input type="text" placeholder="Codigo de venta" name= "txt_id_venta" id="txt_num_doc"></td><br>

        <td><input type="text" placeholder="transporte" name= "txt_transporte" id="txt_razon"></td>
        <br>
        <td><input  placeholder="Fecha AA-MM-DD" name= "txt_fecha" id="txt" rows="10" cols="48"> </input></td>
        <BR>
        <td><input type="text" placeholder="Pagado o pendiente" name= "txt_pagado_pendiente" id="txt_razon" ></td>
        <BR>
        <td><input type="text" placeholder="fecha pendiente AA-MM-DD" name= "txt_fecha_pendiente" id="txt_razon" ></td>
        <BR>
        <br>

        <input class="boton" type="submit" value="Ingresar" id="Grabar">
</form>
</body>
</html>