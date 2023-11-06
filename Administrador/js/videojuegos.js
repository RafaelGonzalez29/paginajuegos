


$(document).ready(function() {

  select_genero();

  
function select_genero(){
  $.post("/paginajuegos/controller/videojuegos.php?opc=mostrar_categorias", function(data){
      $('#id_categoria').html(data);
  });
}



$(document).ready(function(){


  $('#videojuegos_data').DataTable({
      "aProcessing": true,
      "aServerSide": true,
      dom: 'Bfrtip',
      buttons: [
          'excelHtml5',
          'csvHtml5',
      ],
      "ajax":{
          url:"/paginajuegos/controller/videojuegos.php?opc=listar",
          type:"post"
      },
      "bDestroy": true,
      "responsive": true,
      "bInfo":true,
      "iDisplayLength": 15,
      "order": [[ 0, "desc" ]],
      "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar MENU registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del START al END de un total de TOTAL registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de MAX registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
  });

});


  $.validator.setDefaults({
    submitHandler: function () {
        funcion="insert_videojuego";
        let datos = new FormData($('#form-registrar')[0]);
        datos.append("funcion",funcion)
        $.ajax({ 
            type: "POST",
            url: '/paginajuegos/controller/videojuegos.php',
            data: datos,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response){ 
                console.log(response);
                if(response=='success'){ 
                    toastr.success('Se han editado sus datos');
                    verificar_sesion();
                    obtener_datos();
                }else{ 
                    toastr.error(' Hubo un conflicto al editar sus datos');
                }
                
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