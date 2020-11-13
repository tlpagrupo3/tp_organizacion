$('.message a').click(function(){
    $('#primeraParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('.segundaParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    
 });

window.addEventListener('unload',(e)=>{
    
    window.open("www.google.com")
})
fetch('../../php/consultas/consulta_miembros.php')
.then(res=>res.json())
.then(miembros=>{
    let selectHTML
    miembros.forEach(miembro => {
        selectHTML+=
        `
    <option id='${miembro.id_miembros}>${miembro.apellido}, ${miembro.nombre}</option>
    `
    });
    
    document.querySelector('#id_miembros').innerHTML
})

fetch('../../php/consultas/consulta_nivel_acceso.php')
.then(res=>res.json())
.then(niveles=>{
    
    let selectHTML
    niveles.forEach(nivel => {
        selectHTML+=
        `
        <option id='${nivel.id_nivel_acceso}'>${nivel.nivel_acceso}</option>
        `
    });
    document.querySelector('#id_nivel_acceso').innerHTML= selectHTML
})

 