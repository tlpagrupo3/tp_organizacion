
    function nombre() {
        let lista = document.cookie.split(";");
        for (i in lista) {
            let busca = lista[i].search('PHPSESSID');
            if (busca > -1) {micookie=lista[i]}
            }
        let igual = micookie.indexOf("=");
        let valor = micookie.substring(igual+1);
        return valor;
        }
    let session=nombre()
    toString(session)

    let datos= new FormData()
    datos.append('session',session)
    fetch('http://localhost/sadop/src/public/php/consultas/consulta_session.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(session=>{
        let sidebar=""
        if (session.id_tipo_genero==undefined) {
            window.location.assign('http://localhost/sadop/')
        }
        document.getElementById('usuario').innerHTML=session.nombre + ' '+ session.apellido+`<p id='usuarioActual' hidden>${session.id_usuarios}</p>`
        if(session.codigo_acceso==='WK90e'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')){
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/miembros/" class="nav-link">Administración de Miembros</a>`      
        }
        if (session.codigo_acceso==='NH5T1'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/usuarios/" class="nav-link">Administración de Usuarios</a>`
        }
        sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="#" class="nav-link"> Chat</a>`
        if (session.codigo_acceso===('RDO1')||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/actividades/" class="nav-link">Generador de Actividades</a>`
        }
        if (session.codigo_acceso==='76YP0'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/noticias/" class="nav-link">Generador de Noticias</a>`
        }
        if (session.codigo_acceso==='WK90e'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/gestion_documental/" class="nav-link"> Gestion Documental</a>`
        }
        if (session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<a class="w3-bar-item w3-button w3-hover-black" href="http://localhost/sadop/src/public/modulos/notificaciones/" class="nav-link">Notificaciones</a>`
        }
        document.querySelector('nav div').innerHTML=sidebar
        
        let datos= new FormData()
        datos.append('accion', 'cargar')
        fetch('http://localhost/sadop/src/public/php/agregarHistorialChat.php',{
            method: 'POST',
            body: datos
        })
        .then(res=>res.json())
        .then(mensajes=>{
            let listaMensajes=''
            mensajes.forEach(mensaje => {
                listaMensajes+=
                `
                <li>${mensaje.mensaje}</li>
                `
            });
            document.querySelector('#messages').innerHTML= listaMensajes
        })
    
    })

document.querySelector('form').addEventListener('submit',(e)=>{
    e.preventDefault();
    let usuario= document.querySelector('#usuarioActual').innerText
    let mensaje= document.querySelector('#m').value
    let datos= new FormData(e.target)
    datos.append('id_usuarios',usuario)
    datos.append('mensaje',mensaje)
    datos.append('accion','agregar')
    fetch('http://localhost/sadop/src/public/php/agregarHistorialChat.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        alert(respuesta)
    })
})

