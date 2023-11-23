<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendajuegos";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$jsonarray = $_SESSION['carrito'];
var_dump($jsonarray);


foreach ($jsonarray as $row) {
    $juego_id = $row['ref'];
    $titulo = $row['titulo'];

    $precio = $row['precio'];
    $cantidad = $row['cantidad'];

    $sql = "INSERT INTO detalles_pedidos (juego_id, titulo, precio, cantidad)
           VALUES($juego_id, '$titulo', '$precio', '$cantidad')";
    $conn->query($sql);
}
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>