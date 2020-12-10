(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



function ModificarVendedor(){

  var documento = document.getElementById("documento");
  var nombre = document.getElementById("nombre");
  var apellido = document.getElementById("apellido");
  var direccion = document.getElementById("direccion");
  var telefono = document.getElementById("telefono");

  if(documento.value == "" || documento.value.indexOf(" ") == 0 || documento.value.trim() == ""){

      return false;
  }

  if(nombre.value == "" || nombre.value.indexOf(" ") == 0 || nombre.value.trim() == ""){

      return false;
  }

  if(apellido.value == "" || apellido.value.indexOf(" ") == 0 || apellido.value.trim() == ""){

      return false;
  }

  if(direccion.value == "" || direccion.value.indexOf(" ") == 0 || direccion.value.trim() == ""){

      return false;
  }

  if(telefono.value == "" || telefono.value.indexOf(" ") == 0 || telefono.value.trim() == ""){

      return false;
  }
}

function ModificarProducto(){

    var nombre = document.getElementById("nombre");
    var descripcion = document.getElementById("descripcion");
    var valorMayorista = document.getElementById("txt_valor");
    var cantidadMinima = document.getElementById("cantidadMin");

    if(nombre.value == "" || nombre.value.indexOf(" ") == 0 || nombre.value.trim() == ""){

        return false;
    }

    if(descripcion.value == "" || descripcion.value.indexOf(" ") == 0 || descripcion.value.trim() == ""){

        return false;
    }

    if(valorMayorista.value == "" || valorMayorista.value.indexOf(" ") == 0 || valorMayorista.value.trim() == ""){

        return false;
    }

    if(cantidadMinima.value == "" || cantidadMinima.value.indexOf(" ") == 0 || cantidadMinima.value.trim() == ""){

        return false;
    }

}

function ModiInve(){

  var cantidad = document.getElementById("cantidad");
  var precio = document.getElementById("precio");
  var fecha = document.getElementById("fecha");

  if(cantidad.value == "" || cantidad.value.indexOf(" ") == 0 || cantidad.value.trim() == ""){

      return false;
  }

  if(precio.value == "" || precio.value.indexOf(" ") == 0 || precio.value.trim() == ""){

      return false;
  }

  if(fecha.value == "" || fecha.value.indexOf(" ") == 0 || fecha.value.trim() == ""){

      return false;
  }

}

function CrearRol(){
  var rol = document.getElementById("rol");
  if(rol.value.trim() == ""){

    alert("El campo esta vacio");
    return false;
    $(rol).attr('required',true);

  }
}

function ValidaCantidad(id){

  var cantidadRetirada = document.getElementById("cantidad"+id);
  var devolucion = document.getElementById("devolucion"+id);

  var devo = devolucion.value;
   var reti = cantidadRetirada.value;
   let devolu = Number(devo);
   let retira = Number(reti);

  if(devolu>retira){
      alert("La cantidad devuelta no puede ser mayor a la retirada.");
      devolucion.value=null;
  }
}

function ReporteDecolucion(){

  var vendedor = document.getElementById("vendedor");
  var fecha = document.getElementById("fecha");

  if (vendedor.value == "" || vendedor.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(vendedor).attr('required',false);
  }
  if (fecha.value == "" || fecha.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(fecha).attr('required',false);
  }
}

function ReporteEntrega(){

  var vendedor = document.getElementById("id_vendedor");


  if (vendedor.value == "" || vendedor.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(vendedor).attr('required',false);
  }
}

/*
function Login() {

    var usuario = document.getElementById("txt_usu");
    var clave = document.getElementById("txt_clave");
    var correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;



    if (usuario.value == "" || usuario.value.indexOf(" ") == 0) {

        return false;
    }else{
      if (correo.test(usuario.value)){
        //console.log("Todo correcto");
      }else{
          console.log("Todo mal");
          $('.toast').toast('show');
          return false;
      }
      $(usuario).attr('required',false);
    }

    if (clave.value == "" || clave.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(clave).attr('required',false);
    }

  }
*/

  function VerificaUsuario(){
    event.preventDefault();
    let correo = $('#txt_usu').val();
    let clave =  $('#txt_clave').val();
    var dato = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

    if (correo== "" || correo.indexOf(" ") == 0 || clave == "" || clave.indexOf(" ") == 0) {


        var fromu = document.getElementById("login").className += " was-validated";
    }else{
         var fromu = document.getElementById("login").className = "needs-validation";
       }

       if (!dato.test(correo)){
         console.log("Todo mal");
         $('.toast').toast('show');
      }
    $.ajax({
      url: '../program/login.php',
      type : 'POST',
      data: {correo, clave},
      success: function(response){
        //console.log(response);
        //console.log(response.length);
        if(response == "  1"){
            window.location.href ='../form/inicio.php';

        }else{
          console.log("Todo Mal");
           $('.2').toast('show');
        }
      }
    });
  }



function AgregarAlInventario(){

  var codigo = document.getElementById("txt_num_doc");
  var producto = document.getElementById("txt_tipo");
  var fecha = document.getElementById("txt_fecha_ingreso");
  var cantidad = document.getElementById("txt_razon");

  if (codigo.value == "" || codigo.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(codigo).attr('required',false);
  }
  if (producto.value == "" || producto.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(producto).attr('required',false);
  }
  if (fecha.value == "" || fecha.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(fecha).attr('required',false);
  }
  if (cantidad.value == "" || cantidad.value.indexOf(" ") == 0) {

      return false;
  }else{
    $(cantidad).attr('required',false);
  }

}

function CrearProducto(){

    var codigo = document.getElementById("txt_num_doc");
    var nombre = document.getElementById("txt_razon");
    var descripcion = document.getElementById("txt_descripcion");
    var valor = document.getElementById("txt_valor");
    var cantidad = document.getElementById("txt_cantidad");

    if (codigo.value == "" || codigo.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(codigo).attr('required',false);
    }

    if (nombre.value == "" || nombre.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(nombre).attr('required',false);
    }

    if (descripcion.value == "" || descripcion.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(descripcion).attr('required',false);
    }

    if (valor.value == "" || valor.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(valor).attr('required',false);
    }

    if (cantidad.value == "" || cantidad.value.indexOf(" ") == 0) {

        return false;
    }else{
      $(cantidad).attr('required',false);
    }
}


// uso colocar en el input onkeypress="return soloNumeros(event)"
function soloNumerosypunto(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = ".0123456789";
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

function soloNumeros2(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = "0123456789.";
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

// uso colocar en el input onkeypress="return soloLetras(event)"
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloLetrasynumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " @.áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
