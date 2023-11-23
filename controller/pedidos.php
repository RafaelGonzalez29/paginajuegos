<?php
require_once("../Config/conex.php");
require_once("../models/pedidos.php");

$pedidos = new Pedidos();



switch ($_GET["opc"]) {

    case "insertar_pedido":

        $pedidos->insertar_pedido(
            $cliente_nombre = $_SESSION["nombre_usuario"],
            $total = $_POST["total"],
        );

        break;


    case "obtener_datos_pedido":

        $datos = $pedidos->obtener_datos_pedido();
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["id"] = $row["id"];
                $output["cliente_nombre"] = $row["cliente_nombre"];
                $output["total"] = $row["total"];
                $output["fecha"] = $row["fecha"];
                $output["estado"] = $row["estado"];
            }
            echo json_encode($output);
        }
        break;

    case "insertar_detalles_pedidos":

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tiendajuegos";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $pedido_id = $_POST["pedido_id"];
        $jsonarray = $_SESSION['carrito'];
        var_dump($jsonarray);


        foreach ($jsonarray as $row) {

            $pedido_id = $_POST["pedido_id"];
            $juego_id = $row['ref'];
            $titulo = $row['titulo'];

            $precio = $row['precio'];
            $cantidad = $row['cantidad'];

            $sql = "INSERT INTO detalles_pedidos (pedido_id,juego_id, titulo, precio, cantidad)
                   VALUES($pedido_id,$juego_id, '$titulo', '$precio', '$cantidad')";
            $conn->query($sql);
        }
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        break;

    case "eliminar":
        $pedidos->delete_pedidos($_POST["id"]);
        break;

    case "Listar":
        $datos = $pedidos->Listar($_POST["pedido_id"]);

        if (is_array($datos) == true and count($datos) > 0) {
            $html = '<thead class="">
            <tr id="tabla-pedidos">
                <th class="text-center ">id juego</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">Precio</th>
                <th class="text-center">cantidad</th>


                <th class="text-center"></th>
            </tr>
        </thead>';
            foreach ($datos as $row) {
                $html .= '
    
            <tbody>
                    <th class="text-center">
                        ' . $row['id'] . '
                    </th>
                    <th class="text-center">
                        
                    ' . $row['titulo'] . '
                    </th>
                    <th class="text-center">
                        
                    ' . $row['precio'] . '
                    </th>
                    <th class="text-center">
    
                    ' . $row['cantidad'] . '
                    </th>
    
                  
            </tbody>';
            }

            echo $html;
        }

        break;







}

?>