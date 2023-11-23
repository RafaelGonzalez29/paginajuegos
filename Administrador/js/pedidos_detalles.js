const paramURL = window.location.search
console.log(paramURL);

const parametrosURL = new URLSearchParams(paramURL);
console.log(parametrosURL);


for(let valoresURL of parametrosURL){
  console.log(valoresURL);
}

const pedido_id = parametrosURL.get('id');

console.log(pedido_id);


$(document).ready(function(){

    $.post("/tiendajuegos/controller/pedidos.php?opc=listar", {pedido_id : pedido_id}, function(data){ 

        $('#tabla_detalles').html(data);
        
    });
  });
  