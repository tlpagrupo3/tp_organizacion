fetch('../../php/consultas/consulta_noticias_sin_autorizar.php')
.then(res=>res.json())
.then(noticias=>{
    let news=''
    noticias.forEach(noticia => {
        news+=
        `        
        <div id='noticia${noticia.id_noticias}' style='max-width:500px;max-height: 500px;
        overflow: auto; border:solid 1px silver;'>
            <div class='fecha'>${noticia.fecha}</div>
            <div class='volanta'>${noticia.volanta}</div>
            <div class='titular'>${noticia.titular}</div>
            <div class='imagen' style='max-width=200px;'><img src='http://localhost/sadop/src/public/${noticia.imagen}' ></div>
            <div class='epigrafe'>${noticia.epigrafe}</div>
            <div class='copete'>${noticia.copete}</div>
            <div class='cuerpo'>${noticia.cuerpo}</div>
            <p>Autor: ${noticia.apellido}, ${noticia.nombre}</p>
            
        </div>
        <div>
            <h3 class="text-primary">Autorizar Noticia</h3>
            <form action='../../php/noticia_abm.php' method='POST'>
                <input type='text' value='${noticia.id_noticias}' hidden name='id_noticias'>
                <input type='text' value='autorizar' hidden name='accion'>
                <select name='autorizacion'>
                    
                    <option selected disabled>Seleccione una opción</option>
                    <option value='n'>No autorizar</option>
                    <option value='s'>Autorizar</option>
                </select>
                <input type='submit' value='Enviar'class="btn btn-white btn-info btn-bold">
            </form>
        </div>
        <div>
        <h3 class="text-primary">Eliminar Noticia</h3>
        <form action='../../php/noticia_abm.php' method='POST'>
            <input type='text' value='eliminar' hidden name='accion'>
            <select name='id_noticias'>                
                <option selected disabled>Seleccione una opción</option>
                <option value='n'>No Eliminar</option>
                <option value='${noticia.id_noticias}'>Eliminar</option>
            </select>
            <input type='submit' value='Enviar' class="btn btn-white btn-info btn-bold">
        </form>
    </div>
        `
    });
    document.querySelector('#noticias').innerHTML= news
})

fetch('../../php/consultas/consulta_actividades_sin_autorizar.php')
.then(res=>res.json())
.then(actividades=>{
    let actis=''
    actividades.forEach(actividad => {
        actis+=
        `        
        <div id='actividad${actividad.id_actividades}' style='max-width:500px;max-height: 500px;
        overflow: auto;'>
            <div class='fecha'>${actividad.fecha}</div>
            <div class='titular'>${actividad.titular}</div>
            <div class='imagen' style='max-width=200px;'><img src='http://localhost/sadop/src/public/${actividad.imagen}' ></div>
            <div class='epigrafe'>${actividad.epigrafe}</div>
            <div class='cuerpo'>${actividad.descripcion}</div>
            <p>Referente a Cargo: ${actividad.apellido}, ${actividad.nombre}</p>
            
        </div>
        <div>
            <h3 class="text-primary">Autorizar Actividad</h3>
            <form action='../../php/actividad_abm.php' method='POST'>
                <input type='text' value='${actividad.id_actividades}' hidden name='id_actividades'>
                <input type='text' value='autorizar' hidden name='accion'>
                <select name='autorizacion'>
                    
                    <option selected disabled>Seleccione una opción</option>
                    <option value='n'>No autorizar</option>
                    <option value='s'>Autorizar</option>
                </select>
                <input type='submit' value='Enviar' class="btn btn-white btn-info btn-bold">
            </form>
        </div>
        <div>
        <h3 class="text-primary">Eliminar Actividad</h3>
        <form action='../../php/actividad_abm.php' method='POST'>
            <input type='text' value='eliminar' hidden name='accion'>
            <select name='id_actividades'>                
                <option selected disabled>Seleccione una opción</option>
                <option value='n'>No Eliminar</option>
                <option value='${actividad.id_actividades}'>Eliminar</option>
            </select>
            <input type='submit' value='Enviar' class="btn btn-white btn-info btn-bold">
        </form>
    </div>
        `
    });
    document.querySelector('#actividades').innerHTML= actis
})