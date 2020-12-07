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
                          <p class="card-text" font-family: Georgia, 'Times New Roman', Times, serif;>${noticia.cuerpo.substr(0 , 20)+'...'}</p>
                          <p class="card-text">${noticia.fecha}</p>
                        </div>
                      </div>
                    </div>
        `        
    });
    document.querySelector('.card.mb-3').innerHTML=recuadro
    let centro=`
        
            <p class="fecha">${noticias[0].fecha}</p>
            <h5 class='volanta'>${noticias[0].volanta}</h5>
            <h1 class='titular'>${noticias[0].titular}</h1>
            <img src="http://localhost/sadop/src/public/${noticias[0].imagen}" alt="imagen" style=" margin: auto;display: block;margin-left: auto;margin-right: auto;margin-top: 20px;margin-bottom: 20px;width: 50%;border: 1px solid black;padding: 5px;">
            <h4 class='copete'>${noticias[0].copete}</h4>
            <P class="cuerpo">${noticias[0].cuerpo}</P>
            <p class="autor">Autor: ${noticias[0].apellido}, ${noticias[0].nombre}</p>
        
        
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
        <p class='fecha'>${noticia.fecha}</p>
        <h5 class='volanta'>${noticia.volanta}</h5>
        <h1 class='titular'>${noticia.titular}</h1>
        <img src="http://localhost/sadop/src/public/${noticia.imagen}" alt="imagen"style=" margin: auto;display: block;margin-left: auto;margin-right: auto;margin-top: 20px;margin-bottom: 20px;width: 50%;border: 1px solid black;padding: 5px;" >
        <h4 class='copete'>${noticia.copete}</h4>
        <P class='cuerpo'>${noticia.cuerpo}</P>
        <p class='autor'>Autor: ${noticia.apellido}, ${noticia.nombre}</p>
        `
        document.querySelector('article.col-md-7').innerHTML=centro
    })
}