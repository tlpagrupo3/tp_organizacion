fetch('../../php/consultas/consulta_noticias_sin_autorizar.php')
.then(res=>res.json())
.then(datos=>{
    let select=`<option selected disabled>Seleccione una noticia para modificar</option>`
    datos.forEach(noticias => {
        select+=
        `        
        <option value='${noticias.id_noticias}'>${noticias.titular}</option>
        `

    })
    document.querySelector('#selectNoticias').innerHTML=select
})
document.querySelector('#selectModificar').addEventListener('submit',(e)=>{
    e.preventDefault()
    let selector =document.querySelector('#selectModificar')
    let datos = new FormData(selector)
    fetch('../../php/consultas/consulta_modificar_noticia.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(noticia=>{
        noticia.forEach(noticias => {
        
            document.querySelector('#id_noticias').value=noticias.id_noticias
            document.querySelector('#accion').value='modificar'
            document.querySelector('.volanta').value=noticias.volanta
            document.querySelector('.titular').value=noticias.titular
            document.querySelector('.copete').value=noticias.copete
            document.querySelector('.cuerpo').value=noticias.cuerpo
            document.querySelector('.epigrafe').value=noticias.epigrafe
            document.querySelector('.fecha').value=noticias.fecha
            document.querySelector('#id_noticias').value=noticias.id_noticias
            document.querySelector('.imagen').value=`../../${noticias.imagen}`
        });
    })
})