
<?php
    require_once("../Config/conex.php");
    require_once("../models/login.php");

  
    $login = new Login();
    


    
    
    switch($_GET["opc"]){

        case "verificar_sesion":   

            if(!empty($_SESSION['id'])){
            $json[]=array(
            'id'=>$_SESSION['id'],
            'nombre_usuario'=>$_SESSION['nombre_usuario'],
            'clave'=>$_SESSION['clave'],
            'imagen'=>$_SESSION['imagen'],
            
            'estado'=>$_SESSION['estado']
            );

            $jsonstring = json_encode($json[0]);
            echo $jsonstring;     
    
        }else{
            echo '';
        }
          
        break;
        
    }
  
?>