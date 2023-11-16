
<?php
    require_once("../Config/conex.php");
    require_once("../models/registro.php");
    require_once("../models/login.php");

    session_start();

    $registro = new Registro();

    
    switch($_GET["opc"]){

        case "registrar_usuario":   
            $nombre_usuario = $_POST['nombre_usuario'];
            $clave = $_POST['clave'];
            $registro->registrar_usuario($nombre_usuario,$clave);
          
        break;
        
    }
  
?>