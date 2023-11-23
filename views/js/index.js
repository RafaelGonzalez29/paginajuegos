
function nuevo() {
    
    $("#modalproductos").modal("show");
}

$(".cerrarmodal").click(function(){
    $("#modalproductos").modal('hide');
  });




function agregarAlcarrito(id_juego) {
    var ref = document.getElementById('ref' + id_juego).value;
    var cantidad = document.getElementById('cantidad' + id_juego).value;
    var precio = document.getElementById('precio' + id_juego).value;
    var titulo = document.getElementById('titulo' + id_juego).value;



    var xhr = new XMLHttpRequest();
    xhr.open('POST','/tiendajuegos/controller/agregar_al_carrito.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function(){
        if(xhr.readyState = 4 && xhr.status == 200){
            

            actualizarCarrito();
        }
    };
    xhr.send('ref=' + ref + '&cantidad=' + cantidad + '&titulo=' + titulo + '&precio=' + precio);
   
}

function actualizarCarrito() {
    
    var carritoContainer = document.getElementById('mi_carrito');


    var xhr = new XMLHttpRequest();
    xhr.open('GET','/tiendajuegos/controller/obtener_carrito.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function(){
        if(xhr.readyState = 4 && xhr.status == 200){
            carritoContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
   
    
}
function vaciarCarrito() {
    
   
    var xhr = new XMLHttpRequest();
    xhr.open('GET','/tiendajuegos/controller/vaciar_carrito.php',true);
    
    xhr.onreadystatechange = function(){
        if(xhr.readyState = 4 && xhr.status == 200){
            

            actualizarCarrito();
        }
    };
    xhr.send();
   
    
}
function eliminarDelCarrito(indice) {
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST','/tiendajuegos/controller/eliminar_del_carrito.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function(){
        if(xhr.readyState = 4 && xhr.status == 200){
            
            actualizarCarrito();
        }
    };
    xhr.send('indice=' + indice);
   
}


function insertar_pedido() {

    $.post(
      "/tiendajuegos/controller/pedidos.php?opc=insertar_pedido",{total: $("#total").val()},(data) => {
        
      }
     
    );
  
      $("#modalproductos").modal('hide');
      
      $("#modal_finalizar_pedido").modal("show");

      $(".cerrarmodal").click(function(){
        $("#modal_finalizar_pedido").modal('hide');
    });
      obtener_datos_pedido();
          
   
}

function obtener_datos_pedido () {
        
    $.post("/tiendajuegos/controller/pedidos.php?opc=obtener_datos_pedido", (response) => {
        
        console.log(response);

        let datos= JSON.parse(response);

        $('.id_del_pedido').val(datos.id);
        
    })

    
}


function insertar_detalles_pedidos () {
    
    
    $.post("/tiendajuegos/controller/pedidos.php?opc=insertar_detalles_pedidos", {pedido_id: $(".id_del_pedido").val()},(response) => {
        
       console.log(response);

       $("#modal_finalizar_pedido").modal('hide');
        
    })
}


$(document).ready(function() {

    verificar_sesion();
    peliculas();

    function verificar_sesion(){
       
        $.post('/tiendajuegos/controller/login.php?opc=verificar_sesion', (data)=> {
            console.log(data);
            console.log(Object.keys(data).length);
            if((Object.keys(data).length)>3 ){
                
                let sesion=JSON.parse(data);
                $('#nav_registro').hide();
                $('#nav_iniciarsesion').hide();
                $('#nav-separador').hide();

                $('#usuario_nav').text(sesion.nombre_usuario);
               
                $('#avatar_nav').attr('src','assets/imagenes/users_fotos/'+ sesion.imagen);
                
               
            }else{
                $('#nav_usuario').hide();
                $('#nav-carrito').hide();
                

            }         

        })
    }

    function peliculas(){
        
        $.post('/tiendajuegos/controller/videojuegos.php?opc=mostrarVideojuegos' , (response)=>{
            $('#contenedor-de-juegos').html(response);
        
            console.log(response);
            
    
        })     
    }

})