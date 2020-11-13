$('.message a').click(function(){
    $('#primeraParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('.segundaParte').animate({height: "toggle", opacity: "toggle"}, "slow");
    
 });


 let formulario= document.querySelector('div form.w3-container')

 formulario.addEventListener('submit',()=>{
     data= new FormData(formulario)

     fetch('../../php/miembros_abm.php',{
        method:'POST',
        body: data
     })
     .then(res=>res.json())
     .then(respuesta=>{
         alert(respuesta)
     })
 })
 fetch('../../php/consultas/consulta_provincias.php')
 .then(res=>res.json())
 .then(provincias=>{
    let selectHTML
    provincias.forEach(provincia => {
        selectHTML+=
        `<option value='${provincia.id_provincia}'>
        ${provincia.provincia}
    </option>`
    });
    
    formulario.querySelector('#id_provincias').innerHTML=selectHTML

 })
 formulario.querySelector('#id_provincias').addEventListener('change',(e)=>{
     e.preventDefault()
     let id=formulario.querySelector('#id_provincias').value
     let data= new FormData()
     data.append('id',id)
     fetch('../../php/consultas/consulta_departamentos.php',{
         method: 'POST',
         body: data
     })    
    .then(res=>res.json())
    .then(departamentos=>{
        let selectHTML
        departamentos.forEach(departamento => {
            selectHTML+=
            `<option value='${departamento.id_departamento}'>
            ${departamento.departamento}
        </option>`
        });
        
        formulario.querySelector('#id_departamentos').innerHTML=selectHTML
    })
 

 })
 formulario.querySelector('#id_departamentos').addEventListener('change',(e)=>{
    e.preventDefault()
    let id=formulario.querySelector('#id_departamentos').value
    let data= new FormData()
    data.append('id',id)
    fetch('../../php/consultas/consulta_localidades.php',{
        method: 'POST',
        body: data
    })    
   .then(res=>res.json())
   .then(localidades=>{
       let selectHTML
       localidades.forEach(localidad => {
           selectHTML+=
           `<option value='${localidad.id_localidad}'>
           ${localidad.localidad}
       </option>`
       });
       
       formulario.querySelector('#id_localidades').innerHTML=selectHTML
   })

})
  fetch('../../php/consultas/consulta_provincias.php')
   .then(res=>res.json())
   .then(provincias=>{
       
      let selectHTML
      provincias.forEach(provincia => {
          selectHTML+=
          `<option value='${provincia.id_provincia}'>
          ${provincia.provincia}
      </option>`
      });
      
      formulario.querySelector('#id_provincias_m_a').innerHTML=selectHTML
  
   })
   formulario.querySelector('#id_provincias_m_a').addEventListener('change',(e)=>{
       e.preventDefault()
       let id=formulario.querySelector('#id_provincias_m_a').value
       let data= new FormData()
       data.append('id',id)
       fetch('../../php/consultas/consulta_departamentos.php',{
           method: 'POST',
           body: data
       })    
      .then(res=>res.json())
      .then(departamentos=>{
          let selectHTML
          departamentos.forEach(departamento => {
              selectHTML+=
              `<option value='${departamento.id_departamento}'>
              ${departamento.departamento}
          </option>`
          });
          
          formulario.querySelector('#id_departamentos_m_a').innerHTML=selectHTML
      })
   
  
   })
   formulario.querySelector('#id_departamentos_m_a').addEventListener('change',(e)=>{
      e.preventDefault()
      let id=formulario.querySelector('#id_departamentos_m_a').value
      let data= new FormData()
      data.append('id',id)
      fetch('../../php/consultas/consulta_localidades.php',{
          method: 'POST',
          body: data
      })    
     .then(res=>res.json())
     .then(localidades=>{
         let selectHTML
         localidades.forEach(localidad => {
             selectHTML+=
             `<option value='${localidad.id_localidad}'>
             ${localidad.localidad}
         </option>`
         });
         
         formulario.querySelector('#municipio_alta').innerHTML=selectHTML
     })
})
fetch('../../php/consultas/consulta_provincias.php')
.then(res=>res.json())
.then(provincias=>{
   let selectHTML
   provincias.forEach(provincia => {
       selectHTML+=
       `<option value='${provincia.id_provincia}'>
       ${provincia.provincia}
   </option>`
   });
   
   formulario.querySelector('#id_provincias_m_d').innerHTML=selectHTML

})
formulario.querySelector('#id_provincias_m_d').addEventListener('change',(e)=>{
    e.preventDefault()
    let id=formulario.querySelector('#id_provincias_m_d').value
    let data= new FormData()
    data.append('id',id)
    fetch('../../php/consultas/consulta_departamentos.php',{
        method: 'POST',
        body: data
    })    
   .then(res=>res.json())
   .then(departamentos=>{
       let selectHTML
       departamentos.forEach(departamento => {
           selectHTML+=
           `<option value='${departamento.id_departamento}'>
           ${departamento.departamento}
       </option>`
       });
       
       formulario.querySelector('#id_departamentos_m_d').innerHTML=selectHTML
   })


})
formulario.querySelector('#id_departamentos_m_d').addEventListener('change',(e)=>{
   e.preventDefault()
   let id=formulario.querySelector('#id_departamentos_m_d').value
   let data= new FormData()
   data.append('id',id)
   fetch('../../php/consultas/consulta_localidades.php',{
       method: 'POST',
       body: data
   })    
  .then(res=>res.json())
  .then(localidades=>{
      let selectHTML
      localidades.forEach(localidad => {
          selectHTML+=
          `<option value='${localidad.id_localidad}'>
          ${localidad.localidad}
      </option>`
      });
      
      formulario.querySelector('#municipio_domicilio').innerHTML=selectHTML
  })
})
 fetch('../../php/consultas/consulta_generos.php')
 .then(res=>res.json())
 .then(generos=>{
    let selectHTML
    generos.forEach(genero => {
        selectHTML+=
        `<option value='${genero.id_tipo_genero}'>
        ${genero.tipo_genero}
    </option>`
    });
    
    formulario.querySelector('#id_tipo_genero').innerHTML=selectHTML

 })
 fetch('../../php/consultas/consulta_tipo_documento.php')
 .then(res=>res.json())
 .then(documentos=>{
    let selectHTML
    documentos.forEach(documento => {
        selectHTML+=
        `<option value='${documento.id_tipo_documento}'>
        ${documento.tipo_documento}
    </option>`
    });
    
    formulario.querySelector('#id_tipo_documento').innerHTML=selectHTML

 })
 formulario.querySelector('#id_rama_economia_popular').addEventListener('change',(e)=>{
    let id=formulario.querySelector('#id_rama_economia_popular').value
    let data= new FormData()
    data.append('id',id)
    fetch('../../php/consultas/consulta_actividad_economia_popular.php',{
        method: 'POST',
        body: data
    })    
    .then(res=>res.json())
    .then(actividades=>{
        let selectHTML
        actividades.forEach(actividad => {
            selectHTML+=
            `<option value='${actividad.id_actividad_economia_popular}'>
            ${actividad.actividad_economia_popular}
        </option>`
        });
        
        formulario.querySelector('#id_actividad_economia_popular').innerHTML=selectHTML

    })
})
 fetch('../../php/consultas/consulta_linea_programa.php')
 .then(res=>res.json())
 .then(programas=>{
    let selectHTML
    programas.forEach(programa => {
        selectHTML+=
        `<option value='${programa.id_linea_programa}'>
        ${programa.linea_programa}
    </option>`
    });
    
    formulario.querySelector('#id_linea_programa').innerHTML=selectHTML

 })

 fetch('../../php/consultas/consulta_origen.php')
 .then(res=>res.json())
 .then(origenes=>{
    let selectHTML
    origenes.forEach(origen => {
        selectHTML+=
        `<option value='${origen.id_tipo_origen}'>
        ${origen.tipo_origen}
    </option>`
    });
    
    formulario.querySelector('#id_tipo_origen').innerHTML=selectHTML

 })
 fetch('../../php/consultas/consulta_rama_economia_popular.php')
 .then(res=>res.json())
 .then(ramas=>{
     console.log(ramas)
    let selectHTML
    ramas.forEach(rama => {

        selectHTML+=
        `<option value='${rama.id_rama_economia_popular}'>
        ${rama.rama_economia_popular}
    </option>`
    });
    
    formulario.querySelector('#id_rama_economia_popular').innerHTML=selectHTML

 })