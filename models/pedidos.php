<?php

class Pedidos extends Conectar
{


    var $objetos;

    public function insertar_pedido($cliente_nombre, $total)
    {

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO pedidos (id,cliente_nombre,total,fecha,estado) 
        VALUES (null,?,?,now(),1)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cliente_nombre);
        $sql->bindValue(2, $total);
        $sql->execute();
        return $objetos = $sql->fetchAll();
    }
    function obtener_datos_pedido()
    {

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM pedidos WHERE id = (SELECT MAX(id) FROM pedidos)";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $objetos = $sql->fetchAll();
    }
    public function insertar_detalles_pedidos($pedido_id)
    {

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO detalles_pedidos (id,pedido_id,juego_id,titulo,precio,cantidad,estado) 
        VALUES (null,?,null,null,null,null,1)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pedido_id);
        $sql->execute();
        return $objetos = $sql->fetchAll();
    }

    public function delete_pedidos($id)
    {

        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE pedidos SET estado=0 WHERE id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll();

    }

    public function Listar($pedido_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM detalles_pedidos WHERE estado=1 AND pedido_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $pedido_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


}


?>