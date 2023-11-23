<?php

session_start();


if (isset($_POST['indice'])) {
    $indice = $_POST['indice'];


    unset($_SESSION['carrito'][$indice]);


    $_SESSION['carrito'] = array_values($_SESSION['carrito']);

    echo 'Articulo eliminado del carrito correctamente';

} else {
    echo 'Error al intentar eliminar el articulo del carrito';
}

?>