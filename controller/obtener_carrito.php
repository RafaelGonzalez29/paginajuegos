<?php

session_start();


if (!isset($_SESSION['carrito'])) {
  $_SESSION['carrito'] = array();
}

$htmlCarrito = '<ul class="list-group mb-3"';


foreach ($_SESSION['carrito'] as $indice => $producto) {
  $htmlCarrito .=

    '<div class=row">
        <li class="list-group-item justify-content-between" style="list-style: none;">
    
      <div class="col-12" style="text-align: left; color:#000000;">
        <h5 class="my-0 margendelcarrito" style="text-align: center";>Cantidad: ' . $producto['cantidad'] . ' : ' . $producto['titulo'] . '</h5>
        <button class="btn-link" onclick="eliminarDelCarrito(' . $indice . ')">X</button>
     
      </div>
   
         
      <div class="col-0 p-0" style="text-align: right; color:#000000;">
        <span class="text-muted" style="text-align: right; color:#000000;"> ' . $producto['precio'] . ' </span>
        <input name="cantidad" class="id_del_pedido" value="" type="hidden">
      </div>
    </div>
  </li>
  </div>    ';

}


$totalCarrito = array_sum(array_column($_SESSION['carrito'], 'precio'));

$htmlCarrito .= ' <li class="list-group-item d-flex justify-content-between" style="list-style: none;">
<span style="text-align: left; color:#000000;">Total $</span>
<b style="text-align: left; color:#000000;"> ' . $totalCarrito . '<b>
<input name="total" id="total" value="' . $totalCarrito . '" type="hidden">

</li>
</ul>';




echo $htmlCarrito;

?>