

$(document).ready(function() {

  verificar_sesion();

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
             
              $('#avatar_nav').attr('src','../assets/imagenes/users_fotos/'+ sesion.imagen);
              
             
          }else{
              $('#nav_usuario').hide();
              

          }         

      })
  }

})



$(document).ready(function() {


  $('#id_categoria').select2({
    placeholder: 'Seleccione una categoria',
    language:{
        noResults: function() {
            return "No hay resultados";
        },
        searching: function() {
            return "Buscando... ";
        }
    }        
});

select_genero();

    
   
    
  function select_genero(){
    $.post("/tiendajuegos/controller/videojuegos.php?opc=mostrar_categorias", function(data){
        $('#id_categoria').html(data);
        console.log(data);
    });
  }


const paramURL = window.location.search
console.log(paramURL);

const parametrosURL = new URLSearchParams(paramURL);
console.log(parametrosURL);


for(let valoresURL of parametrosURL){
  console.log(valoresURL);
}

const id_juego = parametrosURL.get('id_juego');

console.log(id_juego);

$(document).ready(function(){

  $.post("/tiendajuegos/controller/videojuegos.php?opc=mostrar", {id_juego : id_juego}, function(data){ 
      data =JSON.parse(data);
      $('#titulo').val(data.titulo);
      $('#descripcion').val(data.descripcion);
      $('#id_categoria').val(data.nombre);
      $('#foto_mostrar').val(data.foto);
      $('#precio').val(data.precio);
      
  });
});



$(document).ready(function(){

  function init(){
    $("#form-registrar").on("submit",function(e){
        guardaryeditar(e);
      });
  }


function guardaryeditar(e){
  //console.log("prueba");
  e.preventDefault();
  
  console.log(id_juego);
  let datos = new FormData($('#form-registrar')[0]);
  datos.append("id_juego",id_juego)
          
  $.ajax({ 
      type: "POST",
      url: '/tiendajuegos/controller/videojuegos.php?opc=editar',
      data: datos,
      cache: false,
      processData: false,
      contentType: false,
      success: function(data){
        console.log(data);
        

      }
      
  })

  

  location.href= 'videojuegos.php';

}

 
init();


});

})