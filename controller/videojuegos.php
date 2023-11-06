
<?php
    require_once("../Config/conex.php");
    require_once("../models/videojuegos.php");

    $videojuegos = new Videojuegos();

    if($_POST['funcion']=='insert_videojuego'){ 
        
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $id_categoria = $_POST['id_categoria'];
        $foto = $_FILES['foto']['name'];
        

            $ruta = '../assets/imagenes/juegos/' .$foto;
            move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);
            
            $precio = $_POST['precio'];
           
           
       
        $videojuegos->insert_videojuego($titulo,$descripcion,$id_categoria,$foto,$precio);
        echo 'success';
    
    
    }

    switch($_GET["opc"]){

        case "listar":
            $datos=$videojuegos->videojuego();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["titulo"];
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["precio"];          
                $sub_array[] = $row["foto"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');" id="'.$row["id"].'" class="btn btn-outline-success">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id"].');" id="'.$row["id"].'" class="btn btn-outline-danger">Borrar</button>';
                
                $data[] = $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
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

        
    }
  
?>