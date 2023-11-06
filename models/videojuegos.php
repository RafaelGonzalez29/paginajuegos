<?php 

class Videojuegos extends Conectar{

   
    public function insert_videojuego($titulo,$descripcion,$id_categoria,$foto,$precio){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO juegos (id,titulo,descripcion,id_categoria,foto,precio,fecha,estado) 
        VALUES (null,?,?,?,?,?,now(),1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titulo);
        $sql->bindValue(2,$descripcion);
        $sql->bindValue(3,$id_categoria);
        $sql->bindValue(4,$foto);
        $sql->bindValue(5,$precio);
        $sql->execute();
        return $resultado=$sql->fetchAll(); 
    } 

    public function update_videojuego ($id,$nombre){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="UPDATE categoria SET nombre=? WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nombre);
        $sql->bindvalue(2,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(); 
        
    } 

    public function videojuego(){

        $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT 
            juegos.titulo,
            juegos.precio,
            juegos.id_categoria,
            juegos.foto,
            categorias.nombre
            FROM juegos INNER JOIN categorias ON juegos.id_categoria = categorias.nombre  WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(); 
    
    } 


    public function mostrarcategoria(){

        $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM categorias WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(); 
    
    } 

  
} 


?>