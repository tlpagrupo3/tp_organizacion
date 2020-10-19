let form = new FormData(document.getElementById('#usuario').value,document.getElementById('#contrasena').value)

fetch('buscaralumnos.php',{
        method:'POST',
        body: datos
    })