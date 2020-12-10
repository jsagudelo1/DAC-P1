<?php
include ("../config/conexion.php");
include ("../config/querys.php");
include "cabecera.php";
include "maqueta.php";
$idcone= conexion();

$documentos1=obtener_vendedor_especifico1($_SESSION['id_usu']);
$iniciar1= mysqli_query($idcone,$documentos1);

$documentos= obtener_vendedor();
$iniciar= mysqli_query($idcone,$documentos);

$producto= obtener_producto();
$sql= mysqli_query($idcone,$producto);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>


</head>
<header>

</header>
<body>



<form method="POST" action="../form/form_cons_report2.php">

    <div>REPORTE DE ENTREGA</div><br><div>


        <select required name="id_vendedor"  id="txt_tipo" class="barra"><br>
            <?php if($_SESSION['usu_rol_id']==1){
            echo "<option selected disable value >Seleccione un vendedor</option><br>";
                while($recorrer= mysqli_fetch_array($iniciar)){
              echo '<option value='.$recorrer['id_vendedor'].'>'.$recorrer['nom_vendedor'].'</option>';
                }
            }else {
              while($recorrer1= mysqli_fetch_array($iniciar1)){
                echo '<option value='.$recorrer1['id_vendedor'].'>'.$recorrer1['nom_vendedor'].'</option>';
                }
}
            ?>
        </select>
        <br>
        <div class="form-row">
  <div class="col-md-4 mb-3">
    <label for="validationDefault01" >DESDE</label>
    <input type="date" class="form-control" id="validationDefault01" placeholder="fdesde"  name="dfecha" required>
  </div>
  <div class="col-md-4 mb-3">
    <label for="validationDefault02">HASTA</label>
    <input type="date" class="form-control" id="validationDefault02" placeholder="fhasta" name="hfecha" required>
  </div>
        <br>
            <input class="boton" type="submit" value="Ingresar" id="Grabar">
          </form>
            </body>
            </html>
