

function eliminar(id){
    swal.fire({
        title:'Eliminar!',
        text: 'Desear eliminar el registro?',   
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/tiendajuegos/controller/pedidos.php?opc=eliminar",{id:id},function (data){
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