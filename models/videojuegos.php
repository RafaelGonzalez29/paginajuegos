<?php 

class Videojuegos extends Conectar{


    var $objetos;

    public function insert_videojuego($titulo,$descripcion,$id_categoria,$foto,$precio){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO juegos (id_juego,titulo,descripcion,id_categoria,foto,precio,fecha,estado) 
        VALUES (null,?,?,?,?,?,now(),1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titulo);
        $sql->bindValue(2,$descripcion);
        $sql->bindValue(3,$id_categoria);
        $sql->bindValue(4,$foto);
        $sql->bindValue(5,$precio);
        $sql->execute();
        return $objetos=$sql->fetchAll(); 
    } 

    
    public function videojuego(){

        $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT 
            juegos.id_juego,
            juegos.titulo,
            juegos.precio,
            juegos.id_categoria,
            juegos.foto,
            categorias.nombre 
            FROM juegos INNER JOIN categorias ON juegos.id_categoria = categorias.id WHERE juegos.estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(); 
    
    } 

    public function mostrarVideojuegos(){

        $conectar=parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM juegos WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(); 
    
    } 


    public function update_videojuego($id_juego,$titulo,$descripcion,$id_categoria,$foto,$precio){

        if($foto!=''){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="UPDATE juegos SET titulo=?,descripcion=?,id_categoria=?,foto=?,precio=? WHERE id_juego=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titulo);
        $sql->bindValue(2,$descripcion);
        $sql->bindValue(3,$id_categoria);
        $sql->bindValue(4,$foto);
        $sql->bindValue(5,$precio);
        $sql->bindValue(6,$id_juego);
    
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

        }else{
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="UPDATE juegos SET titulo=?,descripcion=?,id_categoria=?,precio=? WHERE id_juego=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$titulo);
            $sql->bindValue(2,$descripcion);
            $sql->bindValue(3,$id_categoria);
            $sql->bindValue(4,$precio);
            $sql->bindValue(5,$id_juego);
        
            
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }

    } 

    public function delete_videojuego($id_juego){

        $conectar=parent::Conexion();
        parent::set_names();
        $sql="UPDATE juegos SET estado=0 WHERE id_juego=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_juego);
        $sql->execute();
        return $resultado=$sql->fetchAll(); 

    } 

    public function mostrar($id_juego){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="SELECT 
          juegos.id_juego,
          juegos.titulo,
          juegos.descripcion,
          juegos.id_categoria,
          juegos.foto,
          juegos.precio,
          categorias.nombre FROM juegos INNER JOIN categorias ON juegos.id_categoria = categorias.id  WHERE juegos.estado=1 AND id_juego=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_juego);
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