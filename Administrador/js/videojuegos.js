

function eliminar(id_juego){
    swal.fire({
        title:'Eliminar!',
        text: 'Desear eliminar el registro?',   
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/paginajuegos/controller/videojuegos.php?opc=eliminar",{id_juego:id_juego},function (data){
                swal.fire({
                    title: 'Correcto!',
                    text: 'Se elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'

                }).then(function(){
                    location.reload();
                  })

                
            });
        }
    });   
  }