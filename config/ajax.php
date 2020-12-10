<?php
include_once ("conexion.php");
session_start();
$id_cone=conexion();
if(!empty($_POST)){
    if($_POST['action']=='infoproducto'){
        $producto_id=$_POST['producto'];
        $query=mysqli_query($id_cone,"select * from producto where id_producto=$producto_id");
        mysqli_Close($id_cone);
        $result=mysqli_num_rows($query);
        if($result>0){
            $data=mysqli_fetch_array($query);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);

        }
        echo 'no data';
        exit;
    }
}
?>