

const nombre_usuario = document.getElementById("nombre_usuario");
const clave = document.getElementById("clave");
const formulario_registro = document.getElementById("formulario_registro");
const parrafo = document.getElementById("warning");
const parrafo2 = document.getElementById("warnings");




formulario_registro.addEventListener("submit", e=>{
    e.preventDefault();
    
    let entrar= false
    let warning=""
    let warnings=""
    
    parrafo.innerHTML =""
    parrafo2.innerHTML= ""
    if(nombre_usuario.value.length<6){
        warning += `<i class="bi bi-exclamation-circle"> El nombre no es valido </i> `
        entrar = true
    }
    if(clave.value.length<8){
        warnings += `<i class="bi bi-exclamation-circle"> La contraseña no es valida </i>`
        entrar = true
    }
    if(entrar){
        parrafo.innerHTML = warning;
        parrafo2.innerHTML = warnings;
    }

    console.log(entrar);

    if(entrar==false){
       
        registrar_usuario();

        function registrar_usuario(e){
        
        let nombre_usuario = $('#nombre_usuario').val();
        let clave= $('#clave').val();

        console.log(clave);
       
        $.post('/tiendajuegos/controller/registro.php?opc=registrar_usuario', {nombre_usuario,clave},(data)=>{

            location.href= 'login.php';

        })
        };
             
        
    }
      
})


