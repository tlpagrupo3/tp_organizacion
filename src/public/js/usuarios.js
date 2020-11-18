$('.message a').click(function(){
    $('#primeraParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('.segundaParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    
 });

window.addEventListener('unload',(e)=>{
    
    window.open("www.google.com")
})
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
    let tabla
    usuarios.forEach(usuario=>{
        tabla+=
        `
        <tr id='usuario${usuarios.id_usuarios}'>
        <td><i class="fas fa-edit"></i><i class="far fa-trash-alt"></td>
        <td>${usuario.nombre_usuario}</td>
        <td>${usuario.nivel_acceso}</td>
        <td>${usuario.apellido}, ${usuario.nombre}</td>
        </tr>
        `
    })
    document.querySelector('tbody').innerHTML= tabla
})
 