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


<div class="container" id="main">
        <div class="row margindelboton">
          <div class="col-md-12">
              <div class="pull-left">
                <a href="form_registro.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
             <fieldset>
              <legend>Listado de Videojuegos</legend>
                <table class="table table-bordered" id="videojuegos_data">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titulo</th>
                      <th>Categoria</th>
                      <th>Precio</th>
                      <th class="text-center">Imagen</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center"></td>
                      <td class="text-center">
                        
                      </td>
                      <td class="text-center">
                        
                        </td>
                      
                    
                    </tr>
                  
                  
                  </tbody>

                </table>
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
  
</body>
</html>

