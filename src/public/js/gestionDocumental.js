fetch('../../php/consultas/consulta_tipo_documento.php')
.then(res=>res.json())
.then(tipos=>{
    let select=`<option selected disabled>Seleccione el tipo de documento a cargar</option>`
    tipos.forEach(tipo => {
        select+=
        `
        <option value='${tipo.id_tipo_documento}'>${tipo.tipo_documento}</option>
        `
        
    });
    document.querySelector('#id_tipo_documento').innerHTML= select
    
})

document.querySelector('#id_tipo_documento').addEventListener('change',()=>{
    let valor=document.querySelector('#id_tipo_documento').value
    console.log(valor)
    let inputs=''
    
    switch (valor) {
        case '1':
            //Acta
            inputs+=
                `
                <label>Codigo del Acta</label><br>
                <input type='text' name='documento_nombre' placeholder='Ej: 25/2020'><br>
                <label>Fecha</label><br>
                <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'><br>
                <label>Intervinientes</label><br>
                <input type='text' name='documento_intervinientes' placeholder='Ej: Juan Pérez, Robustiano Martinez, Jorge Rogelio'><br>
                <label>Tema</label><br>
                <input type='text' name='documento_tema' placeholder='Ej: Reunion para planificar el presupuesto'><br>
                <label>Localidad</label><br>
                <select id='id_provincia' name='id_provincia'></select><br>
                <select id='id_departamento' name='id_departamento'></select><br>
                <select id='id_localidad' name='id_localidad'></select><br>
                <label>Foto/Scaneo del Acta</label><br>
                <input type='file' name='archivo'><br>
                <label>Referente</label><br>
                <select id='id_usuario' name='id_usuario'></select><br>
                `
                document.querySelector('#inputs').innerHTML= inputs

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
                    
                    document.querySelector('#id_provincia').innerHTML=selectHTML

                })
                document.querySelector('#id_provincia').addEventListener('change',(e)=>{
                    e.preventDefault()
                    let id=document.querySelector('#id_provincia').value
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
                        
                        document.querySelector('#id_departamento').innerHTML=selectHTML
                    })
                

                })
                document.querySelector('#id_departamento').addEventListener('change',(e)=>{
                    e.preventDefault()
                    let id=document.querySelector('#id_departamento').value
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
                    
                    document.querySelector('#id_localidad').innerHTML=selectHTML
                })

                })

                fetch('../../php/consultas/consulta_usuarios.php')
                .then(res=>res.json())
                .then(usuarios=>{
                    let select='<option selected disabled>Seleccione el usuario a cargo</option>'
                    usuarios.forEach(usuario=>{
                        select+=
                        `
                        
                        <option value='${usuarios.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                        `
                    })
                    document.querySelector('#id_usuario').innerHTML= select
                })
            break;
        case '2':
            //Grilla
            inputs+=
                `
                <label>Nombre de la grilla</label><br>
                <input type='text' name='documento_nombre' placeholder='Ej: Presupuesto 07/2020'><br>
                <label>Fecha</label><br>
                <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'><br>
                <label>Tema</label><br>
                <input type='text' name='documento_tema' placeholder='Ej: Cálculo del presupuesto para Julio 2020'><br>
                <label>Localidad</label><br>
                <select id='id_provincia' name='id_provincia'></select><br>
                <select id='id_departamento' name='id_departamento'></select><br>
                <select id='id_localidad' name='id_localidad'></select><br>
                <label>Archivo</label><br>
                <input type='file' name='archivo'><br>
                <label>Referente</label><br>
                <select id='id_usuario' name='id_usuario'></select><br>
                `
            document.querySelector('#inputs').innerHTML= inputs

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
                
                document.querySelector('#id_provincia').innerHTML=selectHTML

            })
            document.querySelector('#id_provincia').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_provincia').value
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
                    
                    document.querySelector('#id_departamento').innerHTML=selectHTML
                })
            

            })
            document.querySelector('#id_departamento').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_departamento').value
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
                
                document.querySelector('#id_localidad').innerHTML=selectHTML
            })

            })
            fetch('../../php/consultas/consulta_usuarios.php')
            .then(res=>res.json())
            .then(usuarios=>{
                let select='<option selected disabled>Seleccione el usuario a cargo</option>'
                usuarios.forEach(usuario=>{
                    select+=
                    `
                    
                    <option value='${usuarios.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                    `
                })
                document.querySelector('#id_usuario').innerHTML= select
            })
            
            break;
        case '3':
            //Documento de texto
            inputs+=
                `
                <label>Nombre del documento</label><br>
                <input type='text' name='documento_nombre' placeholder='Ej: Circular Covid'><br>
                <label>Fecha</label><br>
                <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'><br>
                <label>Tema</label><br>
                <input type='text' name='documento_tema' placeholder='Ej: Acciones a tomar para el cuidado del personal'><br>
                <label>Localidad</label><br>
                <select id='id_provincia' name='id_provincia'></select><br>
                <select id='id_departamento' name='id_departamento'></select><br>
                <select id='id_localidad' name='id_localidad'></select><br>
                <label>Documento</label><br>
                <input type='file' name='archivo'><br>
                <label>Referente</label><br>
                <select id='id_usuario' name='id_usuario'></select><br>
                `
            document.querySelector('#inputs').innerHTML= inputs
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
                
                document.querySelector('#id_provincia').innerHTML=selectHTML

            })
            document.querySelector('#id_provincia').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_provincia').value
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
                    
                    document.querySelector('#id_departamento').innerHTML=selectHTML
                })
            

            })
            document.querySelector('#id_departamento').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_departamento').value
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
                
                document.querySelector('#id_localidad').innerHTML=selectHTML
            })

            })
            fetch('../../php/consultas/consulta_usuarios.php')
            .then(res=>res.json())
            .then(usuarios=>{
                let select='<option selected disabled>Seleccione el usuario a cargo</option>'
                usuarios.forEach(usuario=>{
                    select+=
                    `
                    
                    <option value='${usuarios.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                    `
                })
                document.querySelector('#id_usuario').innerHTML= select
            })
            break;
        case '4':
            //Documento personal
            inputs+=
                `
                <label>Nombre del documento</label><br>
                <input type='text' name='documento_nombre' placeholder='Ej: Foto DNI Juan Quintana'><br>
                <label>Fecha</label><br>
                <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'><br>
                <label>Tema</label><br>
                <input type='text' name='documento_tema' placeholder='Ej: Actualización de datos'><br>
                <label>Localidad</label><br>
                <select id='id_provincia' name='id_provincia'></select><br>
                <select id='id_departamento' name='id_departamento'></select><br>
                <select id='id_localidad' name='id_localidad'></select><br>
                <label>Imagen</label><br>
                <input type='file' name='archivo'><br>
                <label>Miembro</label><br>
                <select id='id_miembro' name='id_miembro'></select><br>
                `
            document.querySelector('#inputs').innerHTML= inputs

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
                
                document.querySelector('#id_provincia').innerHTML=selectHTML

            })
            document.querySelector('#id_provincia').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_provincia').value
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
                    
                    document.querySelector('#id_departamento').innerHTML=selectHTML
                })
            

            })
            document.querySelector('#id_departamento').addEventListener('change',(e)=>{
                e.preventDefault()
                let id=document.querySelector('#id_departamento').value
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
                
                document.querySelector('#id_localidad').innerHTML=selectHTML
            })

            })

            fetch('../../php/consultas/consulta_miembros.php')
            .then(res=>res.json())
            .then(miembros=>{
                console.log(miembros)
                let select='<option selected disabled>Seleccione un Miembro</option>'
                miembros.forEach(miembro=>{
                    select+=
                    `
                    <option value='${miembro.id_miembros}'>${miembro.apellido}, ${miembro.nombre}</option>
                    `

                })
                document.querySelector('#id_miembro').innerHTML=select
            })

            break;
        default:
            break;
    }
})

fetch('../../php/consultas/consulta_documentos.php')
.then(res=>res.json())
.then(documentos=>{
    console.log(documentos)
    let tabla=''
    documentos.forEach(documento=>{
        tabla+=
        `
        <tr id='documento${documento.id_documento}'>
        <td><i class="fas fa-download"></i><i class="fas fa-edit"></i><i class="far fa-trash-alt"></i></td>
        <td>${documento.tipo_documento}</td>
        <td>${documento.documento_nombre}</td>
        <td>${documento.documento_tema}</td>
        <td>${documento.documento_fecha}</td>
        <td>${documento.localidad}, ${documento.provincia}</td>
        <td>${documento.apellido}, ${documento.nombre}</td>
        <td><embed src="${documento.documento_direccion}" type="jpg"></td>
        </tr>
        `
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>

    })
    document.querySelector('tbody').innerHTML=tabla
})

document.querySelector('#buscador').addEventListener('submit',(e)=>{
    e.preventDefault()
    let buscador= document.querySelector('#buscador')
    let data= new FormData(buscador)

    fetch('../../php/consultas/consulta_buscador_documentos.php',{
        method: 'GET',
        body: data
    })
    .then(res=>res.json())
    .then(resultados=>{
        let tabla=''
        if (resultado=='') {
            tabla+=`No hay documentos que respondan a los parametros solicitados`
            document.querySelector('tbody').innerHTML=tabla
        }else{
            resultados.forEach(resultado=>{
                tabla+=
                    `
                    <tr id='documento${resultado.id_documento}'>
                    <td><i class="fas fa-edit"></i><i class="far fa-trash-alt"></i></td>
                    <td>${resultado.tipo_documento}</td>
                    <td>${resultado.documento_nombre}</td>
                    <td>${resultado.documento_tema}</td>
                    <td>${resultado.documento_fecha}</td>
                    <td>${resultado.id_localidad}</td>
                    <td>${resultado.id_usuarios}</td>
                    </tr>
                    `
                    document.querySelector('tbody').innerHTML=tabla
            })
        }
    })
})

// document.getElementById('nuevoDocumento').addEventListener('submit',(e)=>{
//     e.preventDefault();
//     let form =document.getElementById('nuevoDocumento')
//     let data = new FormData(form)
//     fetch('../../php/gestion_documetal.php',{
        
//         method: 'POST',
//         enctype: 'multipart/form-data',
//         body: data
//     })
//     .then(res=>res.json())
//     .then(respuesta=>{
//         alert(respuesta)
//     })
// })
