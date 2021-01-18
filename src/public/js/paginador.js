fetch('../../php/consultas/consulta_usuarios.php')
.then(res=>res.json())
.then(filas=>{
    usuarios=filas
    
    let numeroFilas= filas.length

    let elementosPagina=10

    let paginas= numeroFilas/elementosPagina
    
    let paginador=
    `<ul class="pagination pull-right no-margin">
        <li class="page-item disabled"><a class="page-link" href="#">&larr; Anterior</a></li>`
    for (let i = 0; i < paginas; i++) {
        let deshabilitar=''
        if (i==0) {
            deshabilitar='disabled active'
        }
        paginador+=
        `
        <li class="page-item ${deshabilitar}"><a class="page-link" href="#" onclick="mostrarPagina(${i+1})">${i+1}</a></li>
        `
        
    }
    paginador+=`
        <li class="page-item"><a class="page-link" href="#">Siguiente &rarr;</a></li>
    </ul>`
    document.getElementById('paginas').innerHTML=paginador

    // <nav>
    //     <ul class="pagination">
    //         <li class="page-item"><a class="page-link" href="#">&larr; Anterior</a></li>
    //         <li class="page-item"><a class="page-link" href="#">Siguiente &rarr;</a></li>

    //     </ul>
    // </nav>
})

const mostrarPagina=(id)=>{
    
    fetch('../../php/consultas/consulta_usuarios.php')
    .then(res=>res.json())
    .then(contenido=>{
        let minElement=(id*10)-10
        let maxElement=(id*10)-1
        let tabla=''
        for (let i = minElement; i < maxElement; i++) {
            let usuario = contenido[i];
            console.log(usuario)
            tabla+=
            `
                <tr id='usuario${usuarios.id_usuarios}'>
                <td>
                <a href="#agregarUsuario" data-toggle="modal"><i class="ace-icon fa fa-pencil bigger-130" onclick='cargarModificar(${usuario.id_usuarios})' style='color: blue'></i></a>
                <a href="#eliminarUsuario" data-toggle="modal"><i class="ace-icon fa fa-trash-o bigger-130" onclick='cargarEliminar(${usuario.id_usuarios})' style='color: green'></i></a></td></td>
                <td>${usuario.nombre_usuario}</td>
                <td>${usuario.nivel_acceso}</td>
                <td>${usuario.apellido}, ${usuario.nombre}</td>
                </tr>
            `
            
        }
        console.log(tabla)
        document.querySelector('tbody').innerHTML= tabla
    })
}
mostrarPagina(1);