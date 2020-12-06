fetch("../../php/consultas/consulta_session.php")
.then(res=>res.json())
.then(session=>{
    console.log(session)
    localStorage.setItem("nombre",session.nombre)
    localStorage.setItem("apellido",session.apellido)
    localStorage.setItem("codigo_acceso",session.codigo_acceso)
    localStorage.setItem("id_tipo_genero",session.id_tipo_genero)
    localStorage.setItem("id_usuarios",session.id_usuarios)
})



