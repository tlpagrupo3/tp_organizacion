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
      <p>En esta seccion se pueden autorizar o denegar las noticias que estan sujetas a aprobacion para el portal web</p>
    </div>
  </div>
<div>
  <h3>Autorizaciones pendientes</h3>
  <div id='noticias'>
  </div>
  <div id="actividades"></div>
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
</div><script src="../../js/elementosHTML.js"></script>
<script src="../../js/notificaciones.js"></script>

<?php
require "../../templates/footer.php";
?>  
</body>
</html>