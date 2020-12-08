fetch('../../php/consultas/consulta_notas_version.php')
.then(res=>res.json())
.then(notas=>{
    let mostrarNotas=''
    notas.forEach(nota => {
        mostrarNotas+=
        `
        <div><p>Fecha: ${nota.fecha}</p>
        <p>${nota.notas_version}</p>
        </div>
        `
        document.querySelector('.modal-body').innerHTML= mostrarNotas
    });
})


    $(window).on('load',function(){
        $('#version').modal('show');
    });
