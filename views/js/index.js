
$(document).ready(function() {

    verificar_sesion();
    peliculas();

    function verificar_sesion(){
       
        $.post('/paginajuegos/controller/login.php?opc=verificar_sesion', (data)=> {
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
                

            }         

        })
    }

    function peliculas(){
        
        $.post('/paginajuegos/controller/videojuegos.php?opc=mostrarVideojuegos' , (response)=>{
            $('#contenedor-de-juegos').html(response);
        
            console.log(response);
            
    
        })     
    }

})