<?php

session_start();


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$ref = $_POST['ref'];
$cantidad = $_POST['cantidad'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];


$_SESSION['carrito'][] = array(
    'ref' => $ref,
    'cantidad' => $cantidad,
    'titulo' => $titulo,
    'precio' => $precio
);

echo 'Producto agregado al carrito correctamente.';

?>