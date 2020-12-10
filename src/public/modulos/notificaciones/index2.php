<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:0px">
  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h2 align="center"class="text-primary"><i class="ace-icon fa fa-cog bigger-150"></i> Autorizaciones pendientes</h2>
    </div>
  </div>
<div>
  <p class="text-primary" align="center">En esta seccion se pueden autorizar o denegar las noticias que estan sujetas a aprobacion para el portal web</p>
  <div id='noticias' align="center">
  </div>
  <div id="actividades"></div>
</div><br><br>
 

<!-- END MAIN -->
</div><script src="../../js/elementosHTML.js"></script>
<script src="../../js/notificaciones.js"></script>






<?php
require "../../templates/footersistema.php";

?>