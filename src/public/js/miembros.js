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
    let selectHTML=`<option selected disabled>Seleccione una Provincia</option>`
    // n asig a obj del array
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
     //resp a la pet
    .then(res=>res.json())
    .then(departamentos=>{
        let selectHTML=`<option selected disabled>Seleccione un Departamento</option>`
        departamentos.forEach(departamento => {
            selectHTML+=
            `<option value='${departamento.id_departamento}'>
            ${departamento.departamento}
        </option>`
        });
        //renderiza la resp dentro del select
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
       let selectHTML=`<option selected disabled>Seleccione una Localidad</option>`
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
       
      let selectHTML=`<option selected disabled>Seleccione una Provincia</option>`
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
          let selectHTML=`<option selected disabled>Seleccione un Departamento</option>`
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
         let selectHTML=`<option selected disabled>Seleccione una Localidad</option>`
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
   let selectHTML=`<option selected disabled>Seleccione una Provincia</option>`
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
       let selectHTML=`<option selected disabled>Seleccione un Departamento</option>`
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
      let selectHTML=`<option selected disabled>Seleccione una Localidad</option>`
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

fetch('../../php/consultas/consulta_miembros.php')
.then(res=>res.json())
.then(miembros=>{
    console.log(miembros)
    let tabla=''
    miembros.forEach(miembro=>{
        tabla+=
        `
        <tr id='miembro${miembro.id_miembros}'>
        <td>
        <a onclick="document.getElementById('agregarMiembro').style.display='block'"><i class="fas fa-edit" onclick='cargarModificar(${miembro.id_miembros})' style='color: blue'></i></a>
        <a onclick="document.getElementById('eliminarMiembro').style.display='block'"><i class="far fa-trash-alt" onclick='cargarEliminar(${miembro.id_miembros})' style='color: green'></i></a></td>
        <td>${miembro.apellido}</td>
        <td>${miembro.nombre}</td>
        <td>${miembro.tipo_documento}</td>
        <td>${miembro.numero_documento}</td>
        <td>${miembro.cuil}</td>
        <td>${miembro.tipo_genero}</td>
        <td>${miembro.fecha_nacimiento}</td>
        <td>${miembro.numero_telefono}</td>
        <td>${miembro.email}</td>
        <td>${miembro.provincia}</td>
        <td>${miembro.departamento}</td>
        <td>${miembro.localidad}</td>
        
        </tr>
        `
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>

    })
    document.querySelector('tbody').innerHTML=tabla
})


const cargarModificar= (id)=>{
    fetch('../../php/consultas/consulta_miembros.php')
    .then(res=>res.json())
    .then(miembros=>{
        let miembro = miembros.find(miembro=>{return miembro.id_miembros ==id})
        
        document.querySelector('#accion').value='modificar'
        document.querySelector('#id_miembro').value=miembro.id_miembros
        document.querySelector('#nombre').value=miembro.nombre
        document.querySelector('#apellido').value=miembro.apellido
        document.querySelector('#id_tipo_documento').value=miembro.id_tipo_documento
        document.querySelector('#numero_documento').value=miembro.numero_documento
        document.querySelector('#id_tipo_genero').value=miembro.id_tipo_genero
        document.querySelector('#cuil').value=miembro.cuil
        document.querySelector('#fecha_nacimiento').value=miembro.fecha_nacimiento
        document.querySelector('#id_provincias').value=miembro.id_provincia
        document.querySelector('#id_departamentos').value=miembro.id_departamento
        document.querySelector('#id_localidades').value=miembro.id_localidad
        document.querySelector('#calle').value=miembro.calle
        document.querySelector('#numero').value=miembro.numero
        document.querySelector('#numero_telefono').value=miembro.numero_telefono
        document.querySelector('#email').value=miembro.email
        document.querySelector('#codigo_postal').value=miembro.codigo_postal
        document.querySelector('#id_provincias_m_a').value=miembro.id_provincia_m_a
        document.querySelector('#id_departamentos_m_a').value=miembro.id_departamento_m_a
        document.querySelector('#municipio_alta').value=miembro.municipio_alta
        document.querySelector('#id_provincias_m_d').value=miembro.id_provincia_m_d
        document.querySelector('#id_departamentos_m_d').value=miembro.id_departamento_m_d
        document.querySelector('#id_tipo_origen').value=miembro.id_tipo_origen
        document.querySelector('#id_rama_economia_popular').value=miembro.id_rama_economia_popular
        document.querySelector('#id_actividad_economia_popular').value=miembro.id_actividad_economia_popular
        document.querySelector('#monotributo').value=miembro.monotributo
        document.querySelector('#id_linea_programa').value=miembro.id_linea_programa

        console.log(miembro)
    })
    
}

const cargarEliminar=(id)=>{
    fetch('../../php/consultas/consulta_miembros.php')
    .then(res=>res.json())
    .then(miembros=>{
        let select=''
        let miembro = miembros.find(miembro=>{return miembro.id_miembros ==id})
        

            select+=
            `
            <option value="${miembro.id_miembros}">${miembro.apellido}, ${miembro.nombre}</option>
            `
        

        document.getElementById('id_miembroEliminar').innerHTML=select
    })
}