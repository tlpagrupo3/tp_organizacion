<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:50px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
     
     <h2 class="text-primary"><i class="ace-icon fa fa-bullhorn"> </i> Generador de Noticias</h2> 
    </div>
  </div>
    <!-- modificar noticia -->
    <form id="selectModificar">
      <h5 class="text-primary"><i class="ace-icon glyphicon glyphicon-edit"></i> Modificar una noticia</h5>
      <select name="id_noticias" id="selectNoticias"></select>
      <input type='submit' value='Seleccionar Noticia' class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan">
    </form>
    <br>
    <!-- formar la noticia -->
    <form id="generarNoticia"method="post" enctype="multipart/form-data">
        <input type="text" id='accion' value='agregar' name='accion' hidden>
        <input type="text" name='id_usuario' value='<?php echo $_SESSION['id_usuarios']?>' hidden>
        <input type="text" name='id_noticias' id="id_noticias" hidden>
        <!-- fecha -->
        <label for="fecha" >Fecha</label><br>
        <input class='fecha' type="datetime-local" name="fecha" placeholder="Ingrese la fecha en este formato DD/MM/AAAA">
        <br><br><br>
        <br><br>
        
        <!-- volanta -->
        <label for="volanta">Volanta</label><br>
        <input class='volanta' type="text" name="volanta" placeholder="Ingrese la volanta"><br><br><br>
        <!-- titular -->
        <br><br>
        <label for="titular">Titular</label><br>
        <input class='titular' type="text" name="titular" placeholder="Ingrese el Titular"><br><br><br>
        <!-- imagen -->
        <label for="imagen">Foto</label><br>
        <input type="file" name="imagen">
        <!-- epigrafe -->
        <label for="epigrafe">Epígrafe</label><br>
        <input class='epigrafe' type="text" name="epigrafe" placeholder="Breve descripcion de la imagen"><br><br><br>
        <!-- copete -->
        <label for="copete">Copete</label><br>
        <input class='copete' type="text" name="copete" placeholder="Párrafo intoductorio a la Noticia"><br><br><br>
        <!-- cuerpo -->
        <label for="cuerpo">Cuerpo</label><br>
        <textarea class="cuerpo" cols="30" rows="10" name="cuerpo" ></textarea>
        <br>
        <!-- boton de envio -->
        <button type="submit" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
        
    </form>



<!-- END MAIN -->
</div>
<script src="../../js/elementosHTML.js"></script>
<script src="../../js/noticias.js"></script>






<?php
require "../../templates/footersistema.php";

?>