<?php
// require "../../php/session.php";
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
      <p></p>
    </div>
  </div>
  <div>
            <button class="w3-button w3-border w3-hover-cyan" onclick="document.getElementById('agregarUsuario').style.display='block'">Agregar Usuario</button>   
                <!-- The Modal -->
                <div id="agregarUsuario" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <span onclick="document.getElementById('agregarUsuario').style.display='none'"
                        class="w3-button w3-display-topright">&times;</span>
                        <div class="w3-container w3-blue">
                            <h2>Input Form</h2>
                        </div>
                        <form id='primeraParte' class="w3-container">
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
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Miembro</label>
                            <input class="w3-input" type="text"></p>
                            <input type="submit">
                        </form>
                        
                        </div>
                    </div>
                </div>
        </div>
    <div>
        <table>
            <th>
                <td>#</td>
                <td>Usuario</td>
                <td>Nivel de acceso</td>
                <td>Nombre</td>
            </th>
            <tr></tr>
            <th>
                <td>#</td>
                <td>Usuario</td>
                <td>Nivel de acceso</td>
                <td>Nombre</td>
            </th>
        </table>
    </div>


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
    <script src="../../js/elementosHTML.js">

</script>
<?php


require "../../templates/footer.php";

?>
</body>
</html>