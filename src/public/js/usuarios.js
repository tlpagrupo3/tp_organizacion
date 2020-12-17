$('.message a').click(function(){
    $('#primeraParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('.segundaParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    
 });

 fetch('../../php/consultas/consulta_miembros_no_usuarios.php')
 .then(res=>res.json())
 .then(miembros=>{
     let selectHTML    
     miembros.forEach(miembro => {
         selectHTML+=
         `
     <option value='${miembro.id_miembros}'>${miembro.apellido}, ${miembro.nombre}</option>
     `
     
     });
     
     document.querySelector('#id_miembros').innerHTML=selectHTML
 })
fetch('../../php/consultas/consulta_nivel_acceso.php')
.then(res=>res.json())
.then(niveles=>{
    
    let selectHTML
    niveles.forEach(nivel => {
        selectHTML+=
        `
        <option value='${nivel.id_nivel_acceso}'>${nivel.nivel_acceso}</option>
        `
    });
    document.querySelector('#id_nivel_acceso').innerHTML= selectHTML
})

fetch('../../php/consultas/consulta_usuarios.php')
.then(res=>res.json())
.then(usuarios=>{
    let tabla=''
    usuarios.forEach(usuario=>{
        tabla+=
        `
        <tr id='usuario${usuarios.id_usuarios}'>
        <td>
        <a href="#agregarUsuario" data-toggle="modal"><i class="ace-icon fa fa-pencil bigger-130" onclick='cargarModificar(${usuario.id_usuarios})' style='color: blue'></i></a>
        <a href="#eliminarUsuario" data-toggle="modal"><i class="ace-icon fa fa-trash-o bigger-130" onclick='cargarEliminar(${usuario.id_usuarios})' style='color: green'></i></a></td></td>
        <td>${usuario.nombre_usuario}</td>
        <td>${usuario.nivel_acceso}</td>
        <td>${usuario.apellido}, ${usuario.nombre}</td>
        </tr>
        `
    })
    document.querySelector('tbody').innerHTML= tabla
})


const cargarModificar= (id)=>{
    fetch('../../php/consultas/consulta_usuarios.php')
    .then(res=>res.json())
    .then(usuarios=>{
        let usuario = usuarios.find(usuario=>{return usuario.id_usuarios ==id})
        console.log(usuario)
        document.getElementById('contrasena').setAttribute('disabled','true')
        document.getElementById('accion').value= 'modificar'
        document.getElementById('id_usuarios').value= usuario.id_usuarios
        document.getElementById('nombre_usuario').value= usuario.nombre_usuario
        document.getElementById('email_recuperacion').value= usuario.email_recuperacion
        document.getElementById('id_nivel_acceso').value= usuario.id_nivel_acceso
        document.getElementById('id_miembros').innerHTML= `<option value="${usuario.id_miembros}">${usuario.apellido}, ${usuario.nombre}</option>`

    })
}
const cargarEliminar= (id)=>{
    fetch('../../php/consultas/consulta_usuarios.php')
    .then(res=>res.json())
    .then(usuarios=>{
        let usuario = usuarios.find(usuario=>{return usuario.id_usuarios ==id})
        document.getElementById('id_usuariosEliminar').innerHTML= `<option value="${usuario.id_usuarios}">${usuario.nombre_usuario}</option>`
    })
}

document.querySelector('div#agregarUsuario form').addEventListener('submit',(e)=>{
    e.preventDefault()
    datos= new FormData(e.target)
    fetch('../../php/usuarios_abm.php',{
        method:'POST',
        body:datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        alert(respuesta)
        document.location.reload()
    })
})

document.querySelector('div#eliminarUsuario form').addEventListener('submit',(e)=>{
    e.preventDefault()
    datos= new FormData(e.target)
    fetch('../../php/usuarios_abm.php',{
        method:'POST',
        body:datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        alert(respuesta)
        document.location.reload()
    })
})