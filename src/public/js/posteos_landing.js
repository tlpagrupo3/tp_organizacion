document.querySelector('div#form-posteos form').addEventListener('submit',(e)=>{
    e.preventDefault();
    let datos= new FormData(e.target)
    fetch('../../php/posteo_landing.php',{

        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(mensaje=>{
        alert(mensaje)
    })
})

fetch('../../php/consultas/consulta_posteos.php')
.then(res=>res.json())
.then(posteos=>{
    let listaPosteos= ''
    posteos.forEach(post=>{
        console.log(post)
        if (post.imagen=="../../media/") {
            listaPosteos+=
            `
            <div>
            <hr>
            <p>${post.posteo}</p>
            <p>${post.fecha}</p>
            </div>
            `
        } else {
            listaPosteos+=
            `
            <div>
            <hr>
            <img src="${post.imagen}" style="max-width:500px; max-height: 500px">
            <p>${post.posteo}</p>
            <p>${post.fecha}</p>
            </div>
            `
        }
        
    })
    document.querySelector('#posteos').innerHTML=listaPosteos
})