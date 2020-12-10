
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>INICIAR SESION</title>
    <link rel="stylesheet" href="../css/estiloslogin.css"/>
    <link rel="stylesheet" href="../css/estiloslogin2.css"/>
    <script src="../js/Funciones.js"></script>
</head>


<body>

<header>
    <?php
    include_once 'cabecera.php';
    ?>
</header>
<form autocomplete="off" id="login" class="needs-validation" novalidate>

    <div>BIENVENIDO</div><br><br><div>

        <!--<td><input type="text" placeholder="&#128272;Usuario"></td><br><br>-->
        <td>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
              <input type="text" autocomplete="off" class="form-control" placeholder="Usuario"  name= "txt_usu" id="txt_usu" aria-label="Username" aria-describedby="basic-addon1"required maxlength="30" onkeypress="return soloLetrasynumeros(event)">

              <div class="invalid-feedback">
                Por favor ingrese el correo de usuario.
              </div>

          </div>
      </td>

      <td>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">&#128272;</span>
          </div>
          <input type="password" autocomplete="off" placeholder="Clave" name= "txt_clave" id="txt_clave" class="form-control" placeholder="Usuario"  name= "txt_usu" id="txt_usu" aria-label="Username" aria-describedby="basic-addon1" required maxlength="15" onkeypress="return soloLetrasynumeros(event)">
          <div class="invalid-feedback">
            Por favor ingrese la clave.
          </div>
        </div>
      </td>

        <td><!--<input >--></td><br><br>


            <input class="boton" onclick="VerificaUsuario()" type="submit"  value="Ingresar" id="enviar">
</form>
<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">

  <!-- Then put toasts within -->
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
      <strong class="mr-auto text-danger">Alertar</strong>
      <small>Just Now</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body alert-danger">
      ¡Por favor ingrese un correo valido!.
    </div>
  </div>
</div>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">

  <!-- Then put toasts within -->
  <div class="toast 2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header">
      <strong class="mr-auto text-danger">Alertar</strong>
      <small>Just Now</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body alert-danger">
      ¡El usuario no existe o la clave es incorrecta!.
    </div>
  </div>
</div>


</body>

</html>
