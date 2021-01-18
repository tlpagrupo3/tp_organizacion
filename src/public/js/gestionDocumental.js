fetch('../../php/consultas/consulta_tipo_documentacion.php')
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
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Codigo del Acta</label>
                    <div class="col-sm-9">
                    <input type='text' name='documento_nombre' placeholder='Ej: 25/2020'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fecha</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Intervinientes</label>
                    <div class="col-sm-9">
                        <input type='text'name='documento_intervinientes' placeholder='Ej: Juan Pérez, Robustiano Martinez, Jorge Rogelio'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tema</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_tema' placeholder='Ej: Reunion para planificar el presupuesto' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Provincia</label>
                    <div class="col-sm-9">
                    <select id='id_provincia' name='id_provincia'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Departamento</label>
                    <div class="col-sm-9">
                    <select id='id_departamento' name='id_departamento'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
                    <div class="col-sm-9">
                    <select id='id_localidad' name='id_localidad'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto/Escaneo del Acta</label>
                    <div class="col-sm-9">
                        <input type='file' class="col-xs-10 col-sm-5" name='archivo' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Referente</label>
                    <div class="col-sm-9">
                    <select <select id='id_usuarios' name='id_usuarios'></select></select>
                    </div>
                </div>
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
                        
                        <option value='${usuario.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                        `
                    })
                    document.querySelector('#id_usuarios').innerHTML= select
                })
            break;
        case '2':
            //Grilla
            inputs+=
                `
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre de la Grilla</label>
                    <div class="col-sm-9">
                    <input type='text' name='documento_nombre' placeholder='Ej: Presupuesto 07/2020'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fecha</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tema</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_tema' placeholder='Ej: Cálculo del presupuesto para Julio 2020' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Provincia</label>
                    <div class="col-sm-9">
                    <select id='id_provincia' name='id_provincia'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Departamento</label>
                    <div class="col-sm-9">
                    <select id='id_departamento' name='id_departamento'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
                    <div class="col-sm-9">
                    <select id='id_localidad' name='id_localidad'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Archivo</label>
                    <div class="col-sm-9">
                        <input type='file' class="col-xs-10 col-sm-5" name='archivo' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Referente</label>
                    <div class="col-sm-9">
                    <select <select id='id_usuarios' name='id_usuarios'></select></select>
                    </div>
                </div>
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
                    
                    <option value='${usuario.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                    `
                })
                document.querySelector('#id_usuarios').innerHTML= select
            })
            
            break;
        case '3':
            //Documento de texto
            inputs+=
                `
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre del Documento</label>
                    <div class="col-sm-9">
                    <input type='text' name='documento_nombre' placeholder='Ej: Circular Covid'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fecha</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tema</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_tema' placeholder='Ej: Acciones a tomar para el cuidado del personal' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Provincia</label>
                    <div class="col-sm-9">
                    <select id='id_provincia' name='id_provincia'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Departamento</label>
                    <div class="col-sm-9">
                    <select id='id_departamento' name='id_departamento'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
                    <div class="col-sm-9">
                    <select id='id_localidad' name='id_localidad'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Archivo</label>
                    <div class="col-sm-9">
                        <input type='file' class="col-xs-10 col-sm-5" name='archivo' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Referente</label>
                    <div class="col-sm-9">
                    <select <select id='id_usuarios' name='id_usuarios'></select></select>
                    </div>
                </div>
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
                    
                    <option value='${usuario.id_usuarios}'>${usuario.apellido}, ${usuario.nombre}</option>
                    `
                })
                document.querySelector('#id_usuarios').innerHTML= select
            })
            break;
        case '4':
            //Documento personal
            inputs+=
                `
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre del Documento</label>
                    <div class="col-sm-9">
                    <input type='text' name='documento_nombre' placeholder='Ej: Foto DNI Juan Quintana'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fecha</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_fecha' placeholder='dd/mm/aaaa'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tema</label>
                    <div class="col-sm-9">
                        <input type='text' name='documento_tema' placeholder='Ej: Actualización de datos' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Provincia</label>
                    <div class="col-sm-9">
                    <select id='id_provincia' name='id_provincia'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Departamento</label>
                    <div class="col-sm-9">
                    <select id='id_departamento' name='id_departamento'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
                    <div class="col-sm-9">
                    <select id='id_localidad' name='id_localidad'></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Archivo</label>
                    <div class="col-sm-9">
                        <input type='file' class="col-xs-10 col-sm-5" name='archivo' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
                    <div class="col-sm-9">
                    <select id='id_miembros' name='id_miembros'></select>
                    </div>
                </div>
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
                document.querySelector('#id_miembros').innerHTML=select
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
        <td>
        <a href="#agregarUsuario" data-toggle="modal"><i class="ace-icon fa fa-pencil bigger-130"  style='color: blue'></i></a>
        <a href="#eliminarUsuario" data-toggle="modal"><i class="ace-icon fa fa-trash-o bigger-130"  style='color: green'></i></a>
        </td>
        <td>${documento.tipo_documento}</td>
        <td>${documento.documento_nombre}</td>
        <td>${documento.documento_tema}</td>
        <td>${documento.documento_fecha}</td>
        <td>${documento.localidad}, ${documento.provincia}</td>
        <td>${documento.apellido}, ${documento.nombre}</td>
        <td><a href="${documento.documento_direccion}" download><i class="ace-icon fa fa-download"></i></a></td>
        </tr>
        `
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>
        // <td>${miembro.}</td>

    })
    document.querySelector('tbody').innerHTML=tabla
})

// document.querySelector('#buscador').addEventListener('submit',(e)=>{
//     e.preventDefault()
//     let buscador= document.querySelector('#buscador')
//     let data= new FormData(buscador)

//     fetch('../../php/consultas/consulta_buscador_documentos.php',{
//         method: 'GET',
//         body: data
//     })
//     .then(res=>res.json())
//     .then(resultados=>{
//         let tabla=''
//         if (resultado=='') {
//             tabla+=`No hay documentos que respondan a los parametros solicitados`
//             document.querySelector('tbody').innerHTML=tabla
//         }else{
//             resultados.forEach(resultado=>{
//                 tabla+=
//                     `
//                     <tr id='documento${resultado.id_documento}'>
//                     <td><i class="fas fa-edit"></i><i class="far fa-trash-alt"></i></td>
//                     <td>${resultado.tipo_documento}</td>
//                     <td>${resultado.documento_nombre}</td>
//                     <td>${resultado.documento_tema}</td>
//                     <td>${resultado.documento_fecha}</td>
//                     <td>${resultado.id_localidad}</td>
//                     <td>${resultado.id_usuarios}</td>
//                     </tr>
//                     `
//                     document.querySelector('tbody').innerHTML=tabla
//             })
//         }
//     })
// })

document.querySelector('form#nuevoDocumento').addEventListener('submit',(e)=>{
    e.preventDefault()
    datos= new FormData(e.target)
    fetch('../../php/gestion_documental.php',{
        method:'POST',
        body:datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        alert(respuesta)
        document.location.reload()
    })
})
