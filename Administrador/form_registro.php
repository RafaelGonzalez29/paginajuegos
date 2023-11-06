<?php
include('../Administrador/modulosAdmin/header.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
  
  <title>Document</title>
</head>
<body>

<div class="container margindelformulario" id="main" >
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Datos del juego</legend>
            <form method="POST" action="acciones.php" id="form-registrar"  enctype="multipart/form-data">
              <div class="row" >
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Titulo</label>
                          <input type="text" class="form-control" name="titulo" id="titulo" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" name="descripcion" id="descripcion" id="" cols="3" required></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Categorias</label>
                          <select class="form-control select2" name="id_categoria" id="id_categoria" required>
                            
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Foto</label>
                          <input type="file" class="form-control" name="foto" id="foto" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Precio</label>
                          <input type="text" class="form-control" name="precio" id="precio" placeholder="0.00" required>
                      </div>
                  </div>
              </div>
              <button type="submit" id="btnregistrar" class="btn btn-primary">Registrar</button>
              <a href="index.php" class="btn btn-default">Cancelar</a>
            </form>
          </fieldset>
        
        </div>
      </div>

    </div> 
    
  


<?php
include('../views/modulos/footer.php');

?>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="./js/videojuegos.js"></script>

<script src="../html/dist/js/jquery.validate.min.js"></script>
<script src="../html/dist/js/additional-methods.min.js"></script>



  
</body>
</html>

