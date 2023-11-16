
<?php
    require_once("../Config/conex.php");
    require_once("../models/videojuegos.php");

    $videojuegos = new Videojuegos();

    

    switch($_GET["opc"]){

        case "insertvideojuego":

            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id_categoria = $_POST['id_categoria'];
            $foto = $_FILES['foto']['name'];
            
    
                $ruta = '../assets/imagenes/juegos/' .$foto;
                move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);
                
                $precio = $_POST['precio'];
               
            $videojuegos->insert_videojuego($titulo,$descripcion,$id_categoria,$foto,$precio);
          
    
        break;

        

        case "editar":
            $id_juego = $_POST['id_juego'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id_categoria = $_POST['id_categoria'];
            $foto = $_FILES['foto']['name'];

                if($foto!=''){
                    $ruta = '../assets/imagenes/juegos/' .$foto;
                    move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);
                
                }else {
                    $foto='';
                }

                $precio = $_POST['precio'];  
                $videojuegos->update_videojuego($id_juego,$titulo,$descripcion,$id_categoria,$foto,$precio);


                
                break;

        case "eliminar":
            $videojuegos->delete_videojuego($_POST["id_juego"]);
            break;

        case "mostrar":
            $datos = $videojuegos->mostrar($_POST["id_juego"]);
            if(is_array($datos)==true and count($datos)<>0) {
               foreach($datos as $row){
                 $output["id_juego"] = $row["id_juego"];
                 $output["titulo"] = $row["titulo"];
                 $output["descripcion"] = $row["descripcion"];
                 $output["id_categoria"] = $row["id_categoria"];
                 $output["nombre"] = $row["nombre"];
                 $output["foto"] = $row["foto"];
                 $output["precio"] = $row["precio"];
                
             }
    
             echo json_encode($output);    
            }
            
            break;
       
        case "mostrar_categorias":

            $datos=$videojuegos->mostrarcategoria();
            
            if(is_array($datos)== true and count ($datos) >0){
                $html= "<option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.="<option value='".$row['id']."'>".$row['nombre']."</option>";
                }
    
                echo $html;
            }
    
            break;

        case "mostrarVideojuegos":
            $datos=$videojuegos->mostrarVideojuegos();

            if(is_array($datos)== true and count ($datos) >0){
                $html= "";

                foreach($datos as $row){
                    $html.="<div class='col-md-3'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <h1 class='text-center titulo-pelicula'>".$row['titulo']."</h1>  
                                    </div>
                                    <div class='panel-body'>
                                        <img src='".$row['foto']='assets/imagenes/juegos/'.$row['foto']."' class='img-responsive'>
                                    </div>
                                    <div class='panel-footer'>
                                        <a href='carrito.php?id=".$row['id_juego']."' class='btn btn-success btn-block'>
                                            <span class=' glyphicon glyphicon-shopping-cart'> <span class='letra-compra'> Comprar</span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>";
                }
    
                echo $html;
            }
    
            break;


        
}
  
?>