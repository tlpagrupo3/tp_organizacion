<?php
// require "../php/session.php";
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
        
        <div>
            <button class="w3-btn w3-black w3-round-xlarge w3-border w3-hover-cyan" onclick="document.getElementById('agregarMiembro').style.display='block'">Agregar Miembro</button>   
                <!-- The Modal -->
                <div id="agregarMiembro" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <span onclick="document.getElementById('agregarMiembro').style.display='none'"
                        class="w3-button w3-display-topright">&times;</span>
                        <div class="w3-container w3-cyan">
                            <h2>Ingresar datos del miembro nuevo</h2>
                        </div>
                        <form id='primeraParte' class="w3-container">
                            <p>
                            <label>Nombre</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Apellido</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Tipo de documento</label>
                            <input class="w3-input" type="text"></p>
                            <label>Número de documento</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Sexo</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>CUIL</label>
                            <input class="w3-input" type="text"></p>
                            <label>Fecha de nacimiento</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Número de teléfono</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Correo Electrónico</label>
                            <input class="w3-input" type="text"></p>
                            <label>Código Postal</label>
                            <input class="w3-input" type="text"></p>
                            <p class="message">Siguiente <a href="#"><i class="fa fa-arrow-right"></i></a></p>
                        </form>
                        <form class='segundaParte' hidden>
                        <p>
                            <label>Origen</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Oficio</label>
                            <input class="w3-input" type="text"></p>
                            <p>
                            <label>Monotributo</label>
                            <input class="w3-input" type="text"></p>
                            <label>Programa</label>
                            <input class="w3-input" type="text"></p>
                            <button type="input"class="w3-btn w3-black w3-round-large w3-hover-cyan ">Enviar</button>
                            <p class="message">Atrás <a href="#"> <</a></p>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
        <table>
        <div class="w3-container">
  <h2>Miembros que pertenecen a la organizacion</h2>
  <p>puede visualizar mas datos al seleccionar a los miembros</p>

  <table class="w3-table-all">
    <thead>
      <tr class="w3-cyan">
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Tipo de Doc</th> 
         <th>Número de documento</th>
        <th>CUIL</th>
        <th>Género</th>
        <th>Fecha de nacimiento</th>
        <th>Teléfono</th>
        <th>Email</th>
      </tr>
    </thead>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
    <tr>
      <td>Benitez</td>
      <td>Rojelio</td>
      <td>DNi</td>
      <td>11.316.231</td>
      <td>07-11316231-4</td>
      <td>M</td>
      <td>01/02/1953</td>
      <td>3704-225633</td>
      <td>B_rj@gmail.com</td>
    </tr>
   
    
  </table>
</div>

            <!-- <thead>
                <td>#</td>
                <td>Apellido</td>
                <td></td>
                <
            </thead>
            <tr></tr>

            <tfoot>
                <td>#</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>CUIL</td>
                <td>Tipo de Documento</td>
                <td>Número de documento</td>
                <td>Género</td>
                <td>Fecha de nacimiento</td>
                <td>Teléfono</td>
                <td>Email</td>
            </tfoot>
        </table> -->
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/elementosHTML.js"></script>
    <script src="../../js/miembros.js"></script>
    
<?php


require "../../templates/footer.php";


?>
</body>
</html>