
$(document).ready(function() {

  verificar_sesion();

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
    $.post("/paginajuegos/controller/videojuegos.php?opc=mostrar_categorias", function(data){
        $('#id_categoria').html(data);
        console.log(data);
    });
  }
  
  
    $.validator.setDefaults({
      submitHandler: function () {
          
          let datos = new FormData($('#form-registrar')[0]);
          
          $.ajax({ 
              type: "POST",
              url: '/paginajuegos/controller/videojuegos.php?opc=insertvideojuego',
              data: datos,
              cache: false,
              processData: false,
              contentType: false,
              success: function(data){
                console.log(data);
                location.href= 'videojuegos.php';
      
              }
          })
      }
    });
  
    
    jQuery.validator.addMethod("letras",
    function(value,element) {
        return /^[A-Za-z    ]+$/.test(value); 
    }
    ,"Este campo solo permite letras");
  
    $('#form-registrar').validate({
    rules: {   
      titulo: {
        required: true,
        
      },
      descripcion: {
        required: true,
        maxlength: 255,
       
      },
      id_categoria: {
        required: true,
        
      }, 
      foto: {
          required: true,
          
        },
      precio: {
        required: true,
        
      }
      
    },
    messages: {
      titulo: {
        required: "Este campo es obligatorio",
      },
      descripcion: {
        required: "Este campo es obligatorio",
        maxlength: "La descripcion no debe superar los 255 caracteres",
      },
      id_categoria: {
        required: "Este campo es obligatorio",
        
      },
      foto: {
        required: "Este campo es obligatorio",
        
      },
      precio: {
        required: "Este campo es obligatorio",
        
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
      $(element).removeClass('is-valid');
  
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
      $(element).addClass('is-valid');
    }
  });
  
  })