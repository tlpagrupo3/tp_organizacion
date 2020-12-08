fetch('src/public/php/consultas/consulta_actividades.php')
.then(res=>res.json())
.then(actividades=>{
    
    let lista= ''
    actividades.forEach(actividad => {
        lista+=
        `
        <li><a href="#eventos" onclick=cargarEvento(${actividad.id_actividades}) data-toggle="modal">${actividad.titular}</a></li>
        `

        document.querySelector('article ul').innerHTML= lista
    });
    
})


const cargarEvento= (id)=>{
    fetch('src/public/php/consultas/consulta_actividades.php')
    .then(res=>res.json())
    .then(actividades=>{
    let evento = actividades.find(actividad=>{return actividad.id_actividades == id}) 
    let mostrarEvento =
    `
    <div id='actividad${evento.id_actividades}' style='max-width:500px;max-height: 500px;
        overflow: auto;'>
            <div class='fecha'>${evento.fecha}</div>
            <div class='titular'>${evento.titular}</div>
            <div class='imagen' style='max-width=200px;'><img src='http://localhost/sadop/src/public/${evento.imagen}' ></div>
            <div class='epigrafe'>${evento.epigrafe}</div>
            <div class='cuerpo'>${evento.descripcion}</div>
            <p>Referente a Cargo: ${evento.apellido}, ${evento.nombre}</p>
            
        </div>
    `
    document.querySelector('div.modal-body').innerHTML= mostrarEvento
    })
}