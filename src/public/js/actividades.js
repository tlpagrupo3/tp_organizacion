fetch('../../php/consultas/consulta_actividades_sin_autorizar.php')
.then(res=>res.json())
.then(datos=>{
    let select=`<option selected disabled>Seleccione una noticia para modificar</option>`
    datos.forEach(actividades => {
        select+=
        `        
        <option value='${actividades.id_actividades}'>${actividades.titular}</option>
        `

    })
    document.querySelector('#selectActividades').innerHTML=select
})
document.querySelector('#selectModificar').addEventListener('submit',(e)=>{
    e.preventDefault()
    let selector =document.querySelector('#selectModificar')
    let datos = new FormData(selector)
    fetch('../../php/consultas/consulta_modificar_actividad.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(actividades=>{
        actividades.forEach(actividad => {
        
            document.querySelector('#id_actividades').value=actividad.id_actividades
            document.querySelector('#accion').value='modificar'
            document.querySelector('#titular').value=actividad.titular
            document.querySelector('#descripcion').value=actividad.descripcion
            document.querySelector('#epigrafe').value=actividad.epigrafe
            document.querySelector('#fecha').value=actividad.fecha
        });
    })
})

document.querySelector('#generarActividad').addEventListener('submit',(e)=>{
    e.preventDefault()
    datos= new FormData(e.target)
    fetch('../../php/actividad_abm.php',{
        method:'POST',
        body:datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        alert(respuesta)
        document.location.reload()
    })
})