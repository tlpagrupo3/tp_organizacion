fetch('../../php/consultas/consulta_noticias_sin_autorizar.php')
.then(res=>res.json())
.then(noticias=>{
    let news=''
    noticias.forEach(noticia => {
        news+=
        `        
        <div id='noticia${noticia.id_noticia}' style='max-width:500px;max-height: 500px;
        overflow: auto;'>
            <div class='fecha'>${noticia.fecha}</div>
            <div class='volanta'>${noticia.volanta}</div>
            <div class='titutar'>${noticia.titular}</div>
            <div class='imagen' style='max-width=200px;'><img src='http://localhost/sadop/src/public/${noticia.imagen}' ></div>
            <div class='epigrafe'>${noticia.epigrafe}</div>
            <div class='copete'>${noticia.copete}</div>
            <div class='cuerpo'>${noticia.cuerpo}</div>
            
        </div>
        <div>
            <form action=''>
                <select>
                    <option selected disabled>Seleccione una opción</option>
                    <option value='n'>No autorizar</option>
                    <option value='s'>Autorizar</option>
                </select>
                <input type='submit' value='Enviar'>
            </form>
        </div>
        `
    });
    document.querySelector('#noticias').innerHTML= news
})