<?php

include "../config/querys.php";
include "../config/conexion.php";
include "cabecera.php";
include "maqueta.php";

$connection = conexion();
$query = ConsultarMinimoProducto();

$executequery = mysqli_query($connection,$query) or die (mysqli_error($connection));
?>
<html>
<head>
</head>
<body>

   <h3><?php echo " Roll :"." ". $_SESSION['roll'];?> </h3>

<?php
    while($viewquery = mysqli_fetch_array($executequery)){
      //print_r($viewquery);
      echo "<div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-autohide='false'>
    <div class='toast-header'>

      <strong class='mr-auto text-danger'>Alerta</strong>
      <small class='text-muted'>".idate("H").":".idate("m").":".idate("s")."</small>
      <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    <div class='toast-body text-danger'>
      El producto " .$viewquery['nom_produc']." ha alcanzado la cantidad minima en bodega, cantidad minima=".$viewquery['can_min_bod']." cantidad en existencia=".$viewquery['cantidad_disponible'].".
    </br>Sugerencia : reponer en bodega</div>
  </div>
  "."</br>";
    }

?>
</body>
<script>
  $(document).ready(function(){
    $('.toast').toast('show');
  });
</script>
</html>
