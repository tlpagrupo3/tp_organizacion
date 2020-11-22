<?php
require "../../php/session.php";
require "../../templates/sidebar.php";
require "../../templates/head.php";
require "../../templates/navbar.php";
?>

<!DOCTYPE html>

<body>


<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Informacion del sistema</h1>
      <p> </p>
    </div>
  </div>
  <div>
            <button class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan" onclick="document.getElementById('agregarDocumento').style.display='block'">Nuevo Documento</button>   
                <!-- The Modal -->
                <div id="agregarDocumento" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <span onclick="document.getElementById('agregarDocumento').style.display='none'"
                        class="w3-button w3-display-topright">&times;</span>
                        <div class="w3-container w3-cyan">
                            <h2>Cargar nuevo documento</h2>
                        </div>
                        <form action='../../php/gestion_documental.php'id='nuevoDocumento' method="POST" enctype="multipart/form-data">
                            <input type="text" name='id_documento' hidden>
                            <input type="text" name='accion' value='agregar' hidden>
                            <select name="id_tipo_documento" id="id_tipo_documento"></select>
                            <div id='inputs'>

                            </div>
                            <input type="submit" value='Enviar'>

                        </form>
                        </div>
                    </div>
                </div>
        </div>

        <table class="w3-table-all" style="display: block; overflow-x:auto">
    <thead>
      <tr class="w3-cyan">
        <th>Acciones</th>
        <th>Tipo de Documento</th>
        <th>Nombre del archivo</th>
        <th>Tema</th>
        <th>Fecha</th> 
        <th>Localidad relacionada</th>
        <th>Referente a cargo</th>
        <th>Archivo</th>
        

      </tr>
    </thead>
    <tbody>

    </tbody>
    
  </table>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a class="w3-button w3-black" href="#">1</a>
      <a class="w3-button w3-hover-black" href="#">2</a>
      <a class="w3-button w3-hover-black" href="#">3</a>
      <a class="w3-button w3-hover-black" href="#">4</a>
      <a class="w3-button w3-hover-black" href="#">5</a>
      <a class="w3-button w3-hover-black" href="#">»</a>
    </div>
  </div>



<!-- END MAIN -->
</div>

<script src="../../js/elementosHTML.js"></script>
<script src="../../js/gestionDocumental.js"></script>
<?php


require "../../templates/footer.php";

?>
</body>
</html>