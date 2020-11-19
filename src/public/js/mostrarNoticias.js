fetch('src/public/php/consultas/consulta_noticias.php')
.then(res=>res.json())
.then(noticias=>{
    let news
    noticias.forEach(noticia => {
        news+=
        `        
        <div id='noticia${noticia.id_noticia}'>
            <div class='fecha'>${noticia.fecha}</div>
            <div class='volanta'>${noticia.volanta}</div>
            <div class='titular'>${noticia.titular}</div>
            <div class='imagen'><img src='http://localhost/sadop/src/public/${noticia.imagen}'></div>
            <div class='epigrafe'>${noticia.epigrafe}</div>
            <div class='copete'>${noticia.copete}</div>
            <div class='cuerpo'>${noticia.cuerpo}</div>
            
        </div>
        `
    });
    document.querySelector('#noticias').innerHTML= news
})