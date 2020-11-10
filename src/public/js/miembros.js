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
         if (respuesta=='El miembro se agregó correctamente') {
             alert(respuesta)
             
         }else{
             alert(respuesta)
         }
     })
 })
 