<?php
// require "../../php/session.php";
require "../../templates/sidebar.php";
require "../../templates/head.php";

require "../../templates/navbar.php";
?>

<!DOCTYPE html>
<script>
function aver(){
    window.open("www.google.com",'ventana1')}
</script>
<body onunload="aver()">
<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Informacion del sistema</h1>
      <p></p>
    </div>
  </div>
  <div>
            <button class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan" onclick="document.getElementById('agregarUsuario').style.display='block'">Agregar Usuario</button>   
                <!-- The Modal -->
                <div id="agregarUsuario" class="w3-modal ">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <span onclick="document.getElementById('agregarUsuario').style.display='none'"
                        class="w3-button w3-display-topright">&times;</span>
                        <div class="w3-container w3-cyan">
                            <h2>Agregar Usuarios</h2>
                        </div>
                        <form action="../../php/usuarios_abm.php"  method='POST'class="w3-container">
                            <p>
                            <label>Nombre de Usuario</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Contraseña</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Email de recuperación</label>
                            <input class="w3-input" type="text"></p>
                            <label>Tipo de usuario</label>
                            <select name="id_nivel_acceso" id="id_nivel_acceso"></select></p>
                            <p>
                            <label>Miembro</label>
                            <select name="id_miembros" id="id_miembros"></select></p>
                            <button type="input" class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan">Enviar</button>
                        </form>
                        
                        </div>
                    </div>
                </div>
        </div>
    <div>
        
        <h2>Miembros que pertenecen a la organizacion</h2>
  <p>puede visualizar mas datos al seleccionar a los miembros</p>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-cyan">
        <th>Usuario</th>
        <th>Tipo de Usuario</th>
        <th>Nombre</th> 
         <th>Editar</th>
      </tr>
    </thead>
    <tr>
      <td>j.perez</td>
      <td>AD. noticias</td>
      <td>Juan Perez</td>
      <td>
        <!-- icono de Editar -->
           <i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></i>
        <!-- icono de Eliminar -->
           <i class="fa fa-trash"></i>
      </td>
    </tr>
    <tr>
      <td>B.Colman</td>
      <td>AD.Actividades</td>
      <td>Benito Colman</td>
      <td>
        <!-- icono de Editar -->
        <i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></i>
        <!-- icono de Eliminar -->
           <i class="fa fa-trash"></i>
      </td>
    </tr>
    <tr>
      <td>G.Eliana</td>
      <td>AD.miembros</td>
      <td>Eliana Gonzales</td>
      <td>
        <!-- icono de Editar -->
        <i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></i>
        <!-- icono de Eliminar -->
           <i class="fa fa-trash"></i>
      </td>
    </tr>
    
  </table>
      
    </div>


      <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a class="w3-button w3-dark-gray w3-hover-cyan" href="#">1</a>
      <a class="w3-button w3-dark-gray w3-hover-cyan" href="#">2</a>
      <a class="w3-button w3-dark-gray w3-hover-cyan" href="#">3</a>
      <a class="w3-button  w3-dark-gray w3-hover-cyan" href="#">»</a>
    </div>
  </div>



<!-- END MAIN -->
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="../../js/elementosHTML.js"></script>
    <script src="../../js/usuarios.js"></script>


<?php


require "../../templates/footer.php";

?>
</body>
</html>