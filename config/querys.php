  <?php
  function buscar_gastosgenerales($dfecha,$hfecha){
    $sql= "SELECT sum(valor) as costo_venta from pasivo where descripcion not in ('costo producto') and fecha >= '$dfecha' and fecha <='$hfecha'";
    return $sql;
  }
  function  buscar_costoproducto($dfecha,$hfecha){
    $sql= "SELECT distinct a.id,sum(valor) as costo_venta
    from pasivo a join bodega b on a.id_bodega=b.id_bodega
   join producto c on b.id_producto=c.id_producto
     where a.descripcion='costo producto' and a.fecha >= '$dfecha'
     and a.fecha <='$hfecha' and  b.id_estado=1 and c.id_estado=1 ;";

  return $sql;
  }
  function buscar_costogenerales($dfecha,$hfecha){
    $sql= "SELECT sum(valor) as costo_venta1 from activo where detalle not in ('venta') and fecha >= '$dfecha' and fecha <='$hfecha'";
    return $sql;
  }
  function buscar_costoactivo($dfecha,$hfecha){
    $sql= "SELECT sum(valor) as costo_venta from activo where detalle='venta' and  fecha >= '$dfecha' and fecha <='$hfecha'";
    return $sql;
  }

   function InsertarPasivo($fecha,$valor,$descripcion,$id){

     $sql = "INSERT INTO pasivo (fecha,id_estado,valor,descripcion,id_bodega)
     VALUES ('$fecha',6,$valor,'$descripcion',$id)";
     return $sql;
   }  function agregar_activo_venta($total){
       $sql= "INSERT into activo(valor,estado,detalle)
        VALUES ($total,3,'venta');";
       return $sql;
     }
  function insertar_venta_activo($total,$fechapago,$id){
    $sql= "INSERT into activo(valor,estado,detalle,id_factura)
     VALUES ($total,3,'venta',$id);";
    return $sql;
  }
  function consultar_pasivos($dfecha,$hfecha){
  $sql="SELECT distinct id,descripcion,valor,fecha,estad from pasivo a join bodega b on a.id_bodega=b.id_bodega join producto c on b.id_estado=c.id_estado join estado on a.id_estado=estado.id_estado where fecha >= '$dfecha' and fecha <='$hfecha' and b.id_estado=1 and c.id_estado=1 ;";
  return $sql;

}
  function consultar_activos($dfecha,$hfecha){
    $sql="SELECT id,detalle,valor,fecha,estad from activo join estado on activo.estado=estado.id_estado where fecha >= '$dfecha' and fecha <='$hfecha' ";
    return $sql;

  }
  function agregar_gasto($des,$estado,$valor){
    $sql= "INSERT into pasivo(descripcion,id_estado,valor)
     VALUES ('".$des."',$estado,$valor);";
    return $sql;
  }

  function modificarlogin($id,$correo){

    $sql = "UPDATE login
    SET user_correo = '$correo'
    WHERE id_vendedor = $id";
    return $sql;
  }

  function ObtenerVendedorEspeifico2($id){

      $sql = "SELECT * FROM vendedor
      WHERE id_vendedor = $id";
      return $sql;
  }

  function OptenerProducto2($id){

    $sql = "SELECT * FROM producto
    WHERE id_producto = $id";
    return $sql;
  }
  function obtener_estado_ingreso(){
    $sql="SELECT * FROM estado where id_estado=4 or id_estado=3";
return $sql;
  }
  function obtener_estado_gasto(){
    $sql="SELECT * FROM estado where id_estado=5 or id_estado=6";
return $sql;
  }
  function agregar_ingreso($des,$estado,$valor){
    $sql= "INSERT into activo(detalle,estado,valor)
     VALUES ('".$des."',$estado,$valor);";
    return $sql;
  }

  function obtener_detalles_reporte($id,$fecha){
    $sql="SELECT b.nom_produc,a.can_produc,a.costo_produc,a.comision_produc,a.devolucion,a.vendido,a.comisionxproduc,a.valorxproducto,a.comision_total,a.valor_total
     from report_entrega_vendedor a
     join producto b
     on b.id_producto=a.id_producto
     where fecha_entrega =$fecha and id_vendedor =$id";

    return $sql;
  }

  function ModificarBodega($id,$cantidad,$costo,$fecha){

      $sql ="UPDATE bodega
      SET bodega.can_dispo =$cantidad,
      bodega.costo_produc = $costo,
      bodega.valor_produc = can_dispo*costo_produc,
      bodega.fecha_ingreso = '$fecha'
      WHERE id_bodega = $id";
      return $sql;
  }

  function ModificarRol($id,$rol){

    $sql ="UPDATE roll_user
    SET roll = '$rol'
    WHERE id_roll = $id";
    return $sql;
  }

  function consultar_reporte_venta($dfecha,$hfecha,$idvendedor){
    $sql="SELECT DISTINCT id_report_entrega,fecha_entrega,comision_total,valor_total,sum(vendido) as vendido1 from report_entrega_vendedor
    where fecha_entrega >= '$dfecha' and fecha_entrega <='$hfecha' and id_vendedor=$idvendedor GROUP BY fecha_entrega ASC";
    return $sql;
  }

  function RegistraLogin($idUsuario,$idVendedor,$correo,$clave,$rol){

    $sql = "INSERT INTO login (id_user, id_vendedor, user_correo, user_password, user_roll)
    VALUES ($idUsuario, $idVendedor, '$correo', '$clave',$rol)";
    return $sql;
  }

  function ObtenerRoles(){

    $sql = "SELECT * FROM roll_user";
    return $sql;
  }

  function RegistrarRol($id,$rol){

    $sql = "INSERT INTO roll_user (id_roll, roll)
     VALUES ($id, '$rol')";
    return $sql;
  }

  function UltimoRol(){

    $sql = "SELECT MAX(id_roll) AS UltimoRol FROM roll_user";
    return $sql;
  }

  function UltimoUsu(){

    $sql ="SELECT MAX(id_user) AS UltimoID FROM login";
    return $sql;
  }

  function ConsultarMinimoProducto(){
  $sql = "SELECT bodega.id_producto,producto.nom_produc,SUM(can_dispo) AS cantidad_disponible,producto.can_min_bod
  FROM bodega,producto WHERE bodega.id_producto = producto.id_producto
  GROUP BY id_producto
  HAVING sum(can_dispo)<=producto.can_min_bod";
  return $sql;
}

  function RegistrarEntrega($idproducto,$devolucion){

    $sql = "UPDATE bodega
    SET bodega.can_dispo = can_dispo-$devolucion
    WHERE bodega.id_producto = $idproducto
    AND bodega.fecha_ingreso =
    (SELECT MAX(fecha_ingreso) FROM
    (SELECT * FROM bodega) AS bodega2 WHERE bodega2.id_producto = $idproducto)";
    return $sql;
  }

  function RegistrarDevolucion($idproducto,$devolucion){

    $sql = "UPDATE bodega
    SET bodega.can_dispo = can_dispo+$devolucion
    WHERE bodega.id_producto = $idproducto
    AND bodega.fecha_ingreso =
    (SELECT MAX(fecha_ingreso) FROM
    (SELECT * FROM bodega) AS bodega2 WHERE bodega2.id_producto = $idproducto)";
    return $sql;
  }

  function agregar_devo_total($identrega,$valortotal,$comisiontotal,$vendido,$valortt,$comisiontt){
    $sql = "UPDATE report_entrega_vendedor set valor_total=$valortotal,comision_total=$comisiontotal,vendido=$vendido,valorxproducto=$valortt,comisionxproduc=$comisiontt
    where id_report_entrega='".$identrega."';";
    return $sql;
}
  function obtener_report_entrega2($fecha,$id){
    $sql="SELECT a.devolucion,a.id_report_entrega,b.nom_vendedor,a.fecha_entrega,a.id_producto,c.nom_produc,a.can_produc, a.costo_produc,a.comision_produc
    from report_entrega_vendedor a
    join vendedor b on a.id_vendedor=b.id_vendedor
    join producto c on a.id_producto=c.id_producto
    where a.fecha_entrega='$fecha' and b.id_vendedor=$id;";
    return $sql;
  }
  function agregar_devo($devo,$identrega){
    $sql = "UPDATE report_entrega_vendedor set devolucion='".$devo."',
    report_entrega_vendedor.can_produc = can_produc-$devo
    where id_report_entrega='".$identrega."';";
    return $sql;
  }
  function obtener_report_entrega($fecha,$id){
    $sql="SELECT a.id_report_entrega,b.nom_vendedor,a.fecha_entrega,a.id_producto,c.nom_produc,a.can_produc, a.costo_produc,a.comision_produc
    from report_entrega_vendedor a
    join vendedor b on a.id_vendedor=b.id_vendedor
    join producto c on a.id_producto=c.id_producto
    where a.fecha_entrega='$fecha' and b.id_vendedor=$id;";
    return $sql;
  }
  function valida_report_devo($fecha,$id){
    $sql= "SELECT * from report_entrega_vendedor where fecha_entrega='".$fecha."' AND id_vendedor='".$id."';";
    return $sql;
  }

function agregar_report_entrega($id,$id_pro,$cantidad,$precio,$comision){
  $sql= "INSERT into report_entrega_vendedor(id_vendedor,	id_producto,	can_produc,	costo_produc	,comision_produc)
   VALUES ('".$id."',$id_pro,$cantidad,$precio,$comision);";
  return $sql;

}
  function activar_vendedor($id){
    $sql= "UPDATE  vendedor SET  id_estado = 1 WHERE id_vendedor= '".$id."';";
    return $sql;
  }
  function inactivar_vendedor($id){
    $sql= "UPDATE vendedor SET  id_estado = 2  WHERE id_vendedor= '".$id."';";
    return $sql;
  }

function modificar_vendedor($id, $nom,$apellido,$direccion,$telefono,$correo){
  $sql = "UPDATE vendedor set id_vendedor='".$id."',apelli_vendedor='".$apellido."',nom_vendedor='".$nom."' ,tel_vendedor='" . $telefono . "',dire_vendedor='" . $direccion . "',correo_vendedor='" . $correo . "'
  where id_vendedor='".$id."';";
  return $sql;
  }

  function   obtener_vendedor_especifico1($id){
      $sql = "SELECT * FROM vendedor WHERE id_vendedor=$id";

      return $sql;
}

function   obtener_vendedor_especifico($id){
    $sql = "SELECT * FROM vendedor";

    return $sql;
  }
function detalles_productos($id){
$sql="SELECT p.nom_produc,p.des_produc,f.can_producto,f.costo_Producto,f.subtotal_producto,dt.total_venta
                        FROM factura1 f
                        JOIN no_ventas dt
                        ON f.id_venta = dt.id_venta
                        JOIN producto p
                        ON f.id_producto = p.id_producto
                        WHERE f.id_venta = $id";

  return $sql;
}

    function obtener_dfactura($id){
  $sql="SELECT b.id_estado,a.id_venta, DATE_FORMAT(b.fecha_venta, '%d/%m/%Y') as fecha, b.cliente, b.pagado_pendiente,
  												 c.nom_vendedor as vendedor,b.transporte,b.total_venta,b.fecha_pago
  											FROM factura1 a
  											 JOIN no_ventas b
  											ON a.id_venta =b.id_venta
  											 JOIN vendedor c
  											ON b.id_vendedor = c.id_vendedor
  											WHERE b.id_venta= $id ";
      return $sql;
    }
  function obtener_productos_venta($id){
$sql="SELECT  b.subtotal_producto,c.nom_produc,b.can_producto,b.costo_Producto from factura1 b
    join producto c on (c.id_producto= b.id_producto) where b.id_venta=$id ";
    return $sql;
  }

function obtener_facturas(){
$sql="SELECT DISTINCT a.id_venta,c.nom_vendedor,a.cliente,a.transporte,a.fecha_venta,a.pagado_pendiente,a.fecha_pago,a.total_venta
FROM  no_ventas a  join factura1 b  on ( a.id_venta =b.id_Venta)
join vendedor c on (c.id_vendedor= a.id_vendedor)";
  return $sql;
}


   function obtener_producto_especifico($id){

       $sql = "SELECT * FROM producto WHERE id_producto = $id and id_estado = 1";
       return $sql;

   }
   function seleccionarFechasBodega($id , $cantidad){

       $sql ="SELECT fecha_ingreso FROM bodega WHERE id_producto = $id AND can_dispo > $cantidad" ;

       return $sql;
   }   function seleccionarcantidad($id){

          $sql ="SELECT can_dispo FROM bodega WHERE $id_producto = $id";

          return $sql;
      }


   function DescontarBodega($id,$cantidad,$fecha){

       $sql = "UPDATE bodega SET bodega.can_dispo = can_dispo-$cantidad
      WHERE id_producto = $id AND fecha_ingreso ='$fecha'";

       return $sql;
   }

   function valida_usuario($login,$clave){

       $sql="SELECT id_vendedor,user_correo, user_password,id_roll,roll
       FROM login
       join roll_user on login.user_roll=roll_user.id_roll
       where user_correo='".$login."'
	     and user_password='".$clave."';";
       return $sql;
   }

   function obtener_producto (){

       $sql="select  *	from  producto;";

       return $sql;
   }   function obtener_producto_entrega(){

          $sql="select  *	from  producto where nom_produc like '%mas%' or nom_produc like '%care%';";

          return $sql;
      }


   function insertarVenta($id_venta,$total,$transporte,$fechaVenta,$estado,$fechapago,$vendedor,$cliente){

       $sql ="INSERT INTO no_ventas (id_venta,total_venta,transporte,fecha_venta,pagado_pendiente,fecha_pago,id_vendedor,cliente)
      VALUES ($id_venta,$total,'$transporte','$fechaVenta','$estado','$fechapago',$vendedor,'$cliente')";

       return $sql;
   }

   function insertaDetalleVenta($idV,$idP,$costo,$cantidad,$subtotal){

       $sql = "INSERT INTO factura1(id_venta,id_producto,costo_Producto,can_producto,subtotal_producto)
     VALUES ($idV,$idP,$costo,$cantidad,$subtotal)";

       return $sql;
   }

   function Ultimoid(){

       $sql = "SELECT id_venta FROM no_ventas WHERE id_venta=(SELECT max(id_venta) FROM no_ventas)";
       return $sql;
   }

   function obtener_vendedorIDNombre()
   {

       $sql = "SELECT id_vendedor,nom_vendedor FROM vendedor";

       return $sql;
   }function obtener_idproducto ($producto){

       $sql="SELECT  id_producto
           FROM  producto
            WHERE nom_produc='$producto'";

       return $sql;

   }
   function agregar_inven($id,$can_dispo,$id_producto,$fecha_ingreso,$costo,$valor){

       $sql="insert into bodega(id_bodega, can_dispo, id_producto,fecha_ingreso,can_calle,costo_produc,valor_produc)
	    values ($id,$can_dispo,$id_producto,'".$fecha_ingreso."',0,$costo,$valor);";
       return $sql;
   } function obtener_inventario(){

	  $sql="select b.id_estado,b.id_producto,a.nom_produc,b.id_bodega,b.can_calle,b.costo_produc,b.valor_produc,b.can_egresa,b.can_devo,a.valor_mayorista,b.can_dispo,b.fecha_ingreso
              from bodega b
              join producto a
              on a.id_producto=b.id_producto order by b.fecha_ingreso;";
	  return $sql;
   }function buscar_producto_inv()
   {
      $sql = "SELECT DISTINCT b.id_estado,b.id_producto,a.nom_produc,b.id_bodega,b.can_calle,b.costo_produc,b.valor_produc,sum(b.can_egresa) as can_total,b.can_devo,a.valor_mayorista,b.fecha_ingreso,sum(b.can_dispo) AS cantidad_total from bodega b join producto a on a.id_producto=b.id_producto and a.id_estado=1 group by nom_produc ORDER BY id_bodega ASC;";

       return $sql;

   }
   function agregar_producto($id,$producto,$descripcion,$can_min_bod,$estado)
   {

       $sql = "insert into producto(id_producto,nom_produc, des_produc,can_min_bod,id_estado)
	    values ($id,'$producto','".$descripcion."',$can_min_bod,$estado)";

       return $sql;
   }function buscar_producto($producto){

       $sql = "select * from producto
       where nom_produc like '%" . $producto . "%' ;";

       return $sql;

   } function obtener_regis_pro($id_bodega){
   $sql="select b.id_producto,a.nom_produc,b.id_bodega,b.can_calle,b.costo_produc,b.valor_produc,b.can_egresa,b.can_devo,a.valor_mayorista,b.can_dispo,b.fecha_ingreso
              from bodega b
              join producto a
              on a.id_producto=b.id_producto
            where b.id_bodega= '" . $id_bodega . "' ;";
              return $sql;
              }function buscar_idproducto($id_produc){

       $sql = "select * from producto
       where id_producto='".$id_produc ."' ;";
       return $sql;
   } function modificar_producto($id,$producto,$descripcion,$can_min_bod)
   {

       $sql = "update producto set nom_produc='".$producto."',des_produc='".$descripcion."',can_min_bod='" . $can_min_bod . "'
       where id_producto='".$id."';";

       return $sql;
   }function agregar_vendedor($id,$nombres,$apellidos,$telefono,$direccion,$correo,$roll){

       $sql = "insert into vendedor (id_vendedor,nom_vendedor, apelli_vendedor,tel_vendedor,dire_vendedor,correo_vendedor,user_roll)
	    values ('" . $id . "','" . $nombres . "','" . $apellidos . "','" . $telefono . "','" . $direccion . "','" . $correo . "','".$roll."');";

       return $sql;
   } function obtener_roll(){

       $sql = "select * from  roll_user;";

       return $sql;
   } function obtener_vendedor(){

     $sql="select  *  from  vendedor;";

        return $sql;
   }function obtener_venta(){

       $sql="select  *  from  no_ventas;";

       return $sql;
   }function agregar_no_venta($id, $transporte,$fecha,$pagadopendiente,$fecha_pendiente){

       $sql="insert into   no_ventas (id_venta,transporte,fecha_venta,fecha_pago,pagado_pendiente)
        values ('" . $id . "','" . $transporte . "','" . $fecha. "','" . $fecha_pendiente . "','".$pagadopendiente."');";


       return $sql;
   }function obtener_ventas()
   {

       $sql = "select * from no_ventas;";

       return $sql;
   }function activar_inv ($id) {
       $sql= "UPDATE bodega SET  id_estado = 1 WHERE id_bodega= '".$id."';";
       return $sql;
   }
   function inactivar_inv($id) {
       $sql= "UPDATE bodega SET id_estado = 2 WHERE id_bodega= '".$id."';";
       return $sql;
   }
   function activar_producto ($id) {

	    $sql= "UPDATE producto SET  id_estado = 1 WHERE id_producto= '".$id."';";
       return $sql;
   }
   function inactivar_producto($id) {

       $sql= "UPDATE producto SET id_estado = 2 WHERE id_producto='".$id."';";
       return $sql;
   }

   /**

	function valida_cli($tipo,$num){
		$sql="select*
		from clientes
		where tipo_doc='".$tipo."'
		and num_doc='".$num."';";
		return $sql;

	}

	function inserta_cliente($tipo, $num, $razon, $telefono, $direccion, $correo){
		$sql="insert into clientes (tipo_doc, num_doc, razon, telefono, direccion, correo,estado_cli)
		values ('".$tipo."','".$num."','".$razon."','".$telefono."','".$direccion."','".$correo."',1);";

    return $sql;
   	}
	function documento () {
		$sql= "SELECT * FROM documentos;";
	return $sql;}


	function modifica_cli ($id,$tipo, $num, $razon, $telefono, $direccion, $correo){
		$sql= "UPDATE clientes SET id_cliente = '".$id."', tipo_doc = '".$tipo."', num_doc = '".$num."', razon ='".$razon."', telefono='".$telefono."',
		direccion='".$direccion."',correo='".$correo."' WHERE id_cliente = '".$id."'  AND estado_cli = 1;";
		return $sql;
	}

	function eliminar_cli ($tipo, $num) {
		$sql= "UPDATE clientes SET estado_cli = 2 WHERE tipo_doc= '".$tipo."' AND num_doc= '".$num."' AND estado_cli = 1;";
		return $sql;
	}
      **/
	?>
