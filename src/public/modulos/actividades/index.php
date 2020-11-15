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
      <h1 class="w3-text-teal" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Informacion del sistema</h1>
      <h3 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Actividades de la Organizacion</h3>
    </div>
  </div>

 <form action="../../php/nueva_actividad.php" method="POST">
    <label for="titular">Titulo</label><br>
    <input id='titular' class="w3-input w3-border" type="text">
      
    <label for="cuerpo">Descripción</label><br>
        <textarea name="" id="cuerpo" cols="30" rows="10"></textarea><br>
        <label for="imagen">Foto</label><br>
        <button id='imagen' type="file" class="w3-btn w3-gray w3-round-xlarge w3-border w3-hover-cyan">subir Archivo</button><br><br>
        <embed src="" type="" class="w3-border"> <br><br>
    <label for="epigrafe">Epígrafe</label><br>
        <input id='epigrafe' type="text"><br>
    <label for="fecha">Fecha</label><br>
        <input id='fecha' type="datetime-local">
        <button type="input" class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan">Enviar</button>

</form>

  
  <!-- Pagination -->
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

<script src="../../js/elementosHTML.js">

</script>
<?php


require "../../templates/footer.php";

?>
</body>
</html>