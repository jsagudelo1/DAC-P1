
$(document).ready(function (){

  console.log('jquery esta funcionando');

    $('#cod_producto').keyup(function(e){ //esta funcion se activa despues de oprimir una tecla sobre el campo de codigo de barras
      if($('#cod_producto').val()){
        let codigo = $('#cod_producto').val();/*Guarda lo que digita en esta variable*/
        let cantidad = $('#cantidad').val();
        let costo = $('costo').val();
        $.ajax({  //y con un metodo ajax lo envia al siguiente archivo de abajo
          url: '../program/buscarCarrito2.php',
          type: 'POST',
          data: { codigo },
          success: function(response){
                /*Despues de recibirla le cambia el formato json y la muestra en un foreach
                junto a los campo de cantidad y precio, cuando se llenan el boton agregar ejecuta
                la funcion que tiene en el evento onclick en la linea 41(yo no valide que no enviara cantidades vacias
                me dio pereza, pero lo puede hacer ud :v) y la funcion esta en la linea 100*/
          let producto = JSON.parse(response);
          let template = '';
          //console.log(producto);
          producto.forEach(producto=>{
              template += `
              <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Costo</th>

                    </tr>
                    </thead>
                    <tbody>
                    <td>${producto.codigo}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.descripcion}</td>
                    <td><form  id="produForm"><input type = "text" id="cantidad" name = "cantidad" onkeyup="bot2()" onkeypress="return soloNumeros(event)"></td>
                    <td><input type = "text" id = "costo" name = "costo" onkeyup="bot()" onkeypress="return soloNumerosypunto(event)"></td>
                    <td><a id="agregar"  href="" onclick="sub()"  class="btn btn-success" hidden>Agregar producto</a></form></td>

                    </tbody>
                    </table>`
          });
                    //../program/CarroProductos.php?id=${producto.codigo}
          $('#resultado').html(template);
          //alert(response.length);
          if(response.length==4){
            $('#mensaje').attr('hidden',false);
            $('#mensaje').html('No se encontro el producto');
          }else{
            $('#mensaje').attr('hidden',true);
          }
          }



        })
      }

      //console.log(cantidad);
    });

    /*$('#cantidad').keyup(function(e){
        let cantidad = $('#cantidad').val();
        //console.log(cantidad);
        //console.log('enviando');
        //event.preventDefault();
    });*/

    $('.btnEliminar').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);
        //alert(id);
        if(confirm('Esta seguro que desea eliminar este producto')){
          $.ajax({
            method: 'POST',
            url: '../program/EliminarCarrito.php',
            data:{
              id: id
            }
          }).done(function(response){
              alert('Producto eliminado');
              boton.parent('td').parent('tr').remove();

          });
          window.location.reload();
        }

    });


});


function bot() {
  //alert("J");
 var cantidad = document.getElementById("cantidad");
 var costo = document.getElementById("costo");
  //console.log(nombre.value.length);
  //console.log(apellido.value.length);


  if((costo.value.length<=0 || costo.value.indexOf(" ") == 0) || (cantidad.value.length<=0)){
        $('#agregar').attr('hidden',true);
  }else{
      $('#agregar').attr('hidden',false);
  }
}

function bot2(){
  var cantidad = document.getElementById("cantidad");
  var costo = document.getElementById("costo");

  if((cantidad.value.length<=0 || cantidad.value.indexOf(" ") == 0) || (costo.value.length<=0)){
        $('#agregar').attr('hidden',true);
    }else{
      $('#agregar').attr('hidden',false);
    }
}

function sub(){
  //alert('hola');
/*Cuando llega aqui captura los datos de los campos cantidad,costo y el id que estaba en el campo de codigo de barras
y los envia por metodo post al archivo que esta abajo en la linea 109*/
  let cantidad = $('#cantidad').val();
  let  costo = $('#costo').val();
  let id = $('#cod_producto').val();
  //alert(cantidad+costo);
  //console.log(cantidad);
  $.post('../program/CarroProductos.php', {cantidad,costo,id}, function(response){
      console.log(response);
      alert('Producto agregado');
  });
  window.location.reload();
}function generapdf(id_venta){
  var ancho =1000;
  var alto =800;
   //calcular posicion x.y para centrar la centana
   var x=parseInt((window-screen.width/2)-(ancho/2));
   var y=parseInt((window-screen.height/2)-(alto/2));

   $url = '../factura/generafactura.php?f='+id_venta;
   window.open($url,"factura","left="+x+",top="+y+",height="+alto+",width"+ancho+",scrolbar=su,location=no,resizable=si,menubar=no");
}

function registrarVenta(){
  //alert('Esta registrando');
  /*Aqui no hay nada fuera de lo normal, solo guarda los datos del formulario
  y los envia a registrarventa.php por metodo post*/
  let estado = $('#estado').val();
  let vendedor =  $('#vendedor').val();
  let cliente = $('#cliente').val();
  let fechapago = $('#fechapago').val();
  let transporte=$('#transporte').val();
  let id_venta=$('#id_venta').val();
  if(!estado || !vendedor || !cliente || !fechapago || !transporte || !id_venta){
      alert('Por favor rellene los campos');
  }else{

    $.post('../program/RegistraVenta.php', {estado,vendedor,cliente,fechapago,transporte,id_venta},
    function(response){
        generapdf(id_venta);
        alert('Venta registrada');
        window.location.href ='../form/form_crear_venta.php';
    });
  }
  console.log(estado+vendedor+cliente+fechapago+id_venta+transporte);

  //console.log(estado+vendedor+cliente);
}

function cancelarVenta(){
  alert('Venta cancelada');
}

// uso colocar en el input onkeypress="return soloNumeros(event)"
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = "0123456789";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
