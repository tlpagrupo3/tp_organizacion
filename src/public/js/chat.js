
    function nombre() {
        let lista = document.cookie.split(";");
        for (i in lista) {
            let busca = lista[i].search('PHPSESSID');
            if (busca > -1) {micookie=lista[i]}
            }
        let igual = micookie.indexOf("=");
        let valor = micookie.substring(igual+1);
        return valor;
        }
    let session=nombre()
    toString(session)

    let datos= new FormData()
    datos.append('session',session)
    fetch('http://localhost/sadop/src/public/php/consultas/consulta_session.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(session=>{
        if (typeof session[3] == 'undefined') {
            window.location.assign('http://localhost/sadop/')            
        }
    })






