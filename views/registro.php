<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../html/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../html/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../assets/css/registro.css">
</head>
<body class="hold-transition register-page">
  
<div class="register-box">
  <div class="card ">
    <div class="card-header text-center">
      <a href="registro.php" class="h2 tituloregistro"><b>Crear una cuenta</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">¿Ya tienes una cuenta? <a class="accede-hover" href="login.php">Accede</a></p>

      <form action="../../index.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control colordelinput" placeholder="Nombre de usuario" required>
          
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control colordelinput" placeholder="Contraseña" required>
          
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control colordelinput" placeholder="Repetir contraseña" required>
          
        </div>
        
        <div class="row">
          <div class="col-12">
            <div class="form-check">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms" class="agreeTerms">
               Acepto los terminos
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-warning btn-block letracrear">Crear una cuenta</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="text-left quitarespacios">Al crear una cuenta, confirmo que tengo al menos</p><p class="text-left quitarespacios2"> 16 años y <a href="">acepto los Términos y Condiciones</a></p><p class="text-left quitarespacios3"> y el <a href="">Aviso de Privacidad</a> de gameflip.</p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../html/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../html/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../html/dist/js/adminlte.min.js"></script>
</body>
</html>
