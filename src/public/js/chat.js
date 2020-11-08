fetch('http://localhost/sadop/src/public/php/consultas/consulta_sesion.php')
.then(res=>res.json())
.then(sesion=>{
    console.log(sesion)
})