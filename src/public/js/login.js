let login=document.querySelector('.form-login form')
$('#alert').hide();

login.addEventListener('submit',(e)=>{
    e.preventDefault();
    let datos= new FormData(login)
    
        fetch('../../php/login.php',{
            method:'POST',
            body:datos
        })
        .then(res=>res.json())
        .then(mensaje=>{
            console.log(mensaje)
            if (mensaje=='El usuario o la contraseña son erroneos'){
                console.log('h')
                function mostrar() {
                    $(`#alert`).show(); }
                mostrar()
        
            // document.querySelector('div.w3-panel').setAttribute('hidden',false)
            
            
            }
        })
    }
)

