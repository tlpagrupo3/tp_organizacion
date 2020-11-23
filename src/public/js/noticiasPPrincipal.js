let noticiario
fetch('src/public/php/consultas/consulta_noticias_PP.php')
.then(res=>res.json())
.then(noticias=>{
    let recuadro=''
    
    noticias.forEach(noticia => {
        
        recuadro+=
        `
        <div class="row no-gutters" style="border: rgb(211, 203, 203) 3px solid;" onclick='mostrarNoticia(${noticia.id_noticias})'>
                      <div class="col-md-4">
                        <img src="http://localhost/sadop/src/public/${noticia.imagen}" class="card-img" alt="...">
                      </div>
                      <br>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">${noticia.titular.substr(0 , 23)+'...'}</h5>
                          <p class="card-text">${noticia.cuerpo.substr(0 , 20)+'...'}</p>
                          <p class="card-text"><small class="text-muted">${noticia.fecha}</small></p>
                        </div>
                      </div>
                    </div>
        `        
    });
    document.querySelector('.card.mb-3').innerHTML=recuadro
    let centro=`
        
            <small class="text-muted" style="margin-left:700px;">${noticias[0].fecha}</small>
            <h5>${noticias[0].volanta}</h5>
            <h1 class="tn-single-title" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">${noticias[0].titular}</h1>
            <img src="http://localhost/sadop/src/public/${noticias[0].imagen}" alt="imagen" style="margin-top: 3px;margin-left: 200px; width:300px;">
            <h4>${noticias[0].copete}</h4>
            <P>${noticias[0].cuerpo}</P>
            <p>Autor: ${noticias[0].apellido}, ${noticias[0].nombre}</p>
        
        
    `
    document.querySelector('article.col-md-7').innerHTML=centro

    

    
    

})
const mostrarNoticia = (id)=>{
    fetch('src/public/php/consultas/consulta_noticias_PP.php')
    .then(res=>res.json())
    .then(noticias=>{
        let noticia=noticias.find(noticia=>{
                        return noticia.id_noticias==id
                    })
        let centro=`

        <small class="text-muted" style="margin-left:700px;">${noticia.fecha}</small>
        <h5>${noticia.volanta}</h5>
        <h1 class="tn-single-title" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">${noticia.titular}</h1>
        <img src="http://localhost/sadop/src/public/${noticia.imagen}" alt="imagen" style="margin-top: 3px;margin-left: 200px; width:300px;">
        <h4>${noticia.copete}</h4>
        <P>${noticia.cuerpo}</P>
        <p>Autor: ${noticia.apellido}, ${noticia.nombre}</p>
        `
        document.querySelector('article.col-md-7').innerHTML=centro
    })
}