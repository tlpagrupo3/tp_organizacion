<!-- Sidebar Barra lateral izquierda-->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <?php
if (isset($_SESSION)) {
  # code...
?>
  <h4 class="w3-bar-item"><b>Menu</b></h4>
  <?php
  if ($_SESSION['codigo_acceso']===('D55KP')||$_SESSION['codigo_acceso']===('RDO1')||$_SESSION['codigo_acceso']===('53C91')) {
    # code...
  ?>
    <a class="w3-bar-item w3-button w3-hover-black" href="../actividades/" class="nav-link">Actividades</a>
    <?php
  }
  ?>
         
  <a class="w3-bar-item w3-button w3-hover-black" href="http://localhost:3000" class="nav-link"> Chat</a>
  <?php
  if ($_SESSION['codigo_acceso']==='WK90e'||$_SESSION['codigo_acceso']===('D55KP')||$_SESSION['codigo_acceso']===('53C91')){
    # code...
  ?> 
  <a class="w3-bar-item w3-button w3-hover-black" href="../gestion_documental/" class="nav-link"> Gestion Documental</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="../miembros/" class="nav-link">Miembros</a>  
  <?php
  }
  ?>
  <?php
  if ($_SESSION['codigo_acceso']==='76YP0'||$_SESSION['codigo_acceso']===('D55KP')||$_SESSION['codigo_acceso']===('53C91')){
    # code...
  ?>   
  <a class="w3-bar-item w3-button w3-hover-black" href="../noticias/" class="nav-link">Noticias</a>
  <?php
  }
  ?>  
  <?php
  if ($_SESSION['codigo_acceso']===('D55KP')||$_SESSION['codigo_acceso']===('53C91')){
    # code...
  ?>
  <a class="w3-bar-item w3-button w3-hover-black" href="../notificaciones/" class="nav-link">Notificaciones</a>
  <?php
  }
  ?>
  <?php
  if ($_SESSION['codigo_acceso']==='NH5T1'||$_SESSION['codigo_acceso']===('D55KP')||$_SESSION['codigo_acceso']===('53C91')){
    # code...
  ?>    
  <a class="w3-bar-item w3-button w3-hover-black" href="../usuarios/" class="nav-link">Usuarios</a>
  <?php
  }
  ?>  
  <a class="w3-bar-item w3-button w3-hover-black" href="../login/" class="nav-link">Salir</a>
</nav>
<?php
}

?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>