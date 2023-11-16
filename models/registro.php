<?php 

class Registro extends Conectar{

   
    public function registrar_usuario($nombre_usuario,$clave){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO usuarios (id,nombre_usuario,clave,estado) 
        VALUES (null,?,?,1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nombre_usuario);
        $sql->bindValue(2,$clave);
        $sql->execute();
        return $resultado=$sql->fetchAll(); 
    } 

  
} 


?>