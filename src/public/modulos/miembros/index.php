<?php
require "../../php/session.php";
require "../../templates/sidebar.php";
require "../../templates/head.php";

require "../../templates/navbar.php";
?>

<!DOCTYPE html>
<body >

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
            <button class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan" onclick="document.getElementById('agregarMiembro').style.display='block'">Agregar Miembro</button>   
                <!-- The Modal -->
                <div id="agregarMiembro" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                        <span onclick="document.getElementById('agregarMiembro').style.display='none'"
                        class="w3-button w3-display-topright">&times;</span>
                        <div class="w3-container w3-cyan">
                            <h2>Ingresar datos del miembro nuevo</h2>
                        </div>
                        <form  class="w3-container" action="../../php/miembros_abm.php" method="POST">
                          <div id='primeraParte'>
                            <input type="text" hidden id='accion' name="accion" value="agregar">
                            <input type="text" hidden id='id_miembro' name="id_miembro">
                          
                            <label>Nombre</label><br>
                            <input class="w3-input" type="text" id="nombre" name="nombre"><br>

                          
                            <label>Apellido</label><br>
                            <input class="w3-input" type="text" id="apellido" name="apellido"><br>
                          
                            <label>Tipo de documento</label><br>
                            <select name="id_tipo_documento" id="id_tipo_documento"></select><br>
                          
                            <label>Número de documento</label><br>
                            <input class="w3-input" type="text" id="nuemro_documento" name="numero_documento" placeholder="Sin puntos ni espacios"><br>
                          
                            <label>Sexo</label><br>
                            <select name="id_tipo_genero" id="id_tipo_genero"></select><br>
                          
                            <label>CUIL</label><br>
                            <input class="w3-input" type="text" id="cuil" name="cuil"><br>
                            <label>Fecha de nacimiento</label><br>
                            <input class="w3-input" type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa"><br>
                            
                            <label>Localidad</label><br>
                            <select name="id_provincia" id="id_provincias"></select><br>
                            <select name="id_departamento" id="id_departamentos"></select>
                            <select name="id_localidad" id="id_localidades"></select><br>

                            <label>Calle</label><br>
                            <input class="w3-input" type="text" id="calle" name="calle"><br>

                            <label>Número</label><br>
                            <input class="w3-input" type="text" id="numero" name="numero"><br>
                          
                            <label>Número de teléfono</label><br>
                            <input class="w3-input" type="text" id="numero_telefono" name="numero_telefono"><br>
                          
                            <label>Correo Electrónico</label><br>
                            <input class="w3-input" type="text" id="email" name="email"><br>
                            <label>Código Postal</label><br>
                            <input class="w3-input" type="text" id="codigo_postal" name="codigo_postal"><br>
                            <p class="message">Siguiente <a href="#"> ></a></p>
                            </div>
                        <div class='segundaParte' hidden>
                      
                            <label>Municipio Alta</label><br>
                            <select name="id_provincia_m_a" id="id_provincias_m_a"></select><br>
                            <select name="id_departamento_m_a" id="id_departamentos_m_a"></select>
                            <select name="municipio_alta" id="municipio_alta"></select><br>

                            <label>Municipio Domicilio</label><br>
                            <select name="id_provincia_m_d" id="id_provincias_m_d"></select><br>
                            <select name="id_departamento_m_d" id="id_departamentos_m_d"></select>
                            <select name="municipio_domicilio" id="municipio_domicilio"></select><br>

                            <label>Origen</label><br>
                            <select name="id_tipo_origen" id="id_tipo_origen"></select><br>
                          
                            <label>Oficio</label><br>
                            <select name="id_rama_economia_popular" id="id_rama_economia_popular"></select><br>
                            <select name="id_actividad_economia_popular" id="id_actividad_economia_popular"></select><br>
                          
                            <label>Monotributo</label><br>
                            <input class="w3-input" type="text" id="monotributo" name="monotributo" placeholder="S/N"><br>
                            <label>Programa</label><br>
                            <select name="id_linea_programa" id="id_linea_programa"></select><br>
                            <button type="input" class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan">Enviar</button><br>
                            <p class="message">Atrás <a href="#"> <</a></p>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
        <table>
        <div class="w3-container">
  <h2>Miembros que pertenecen a la organizacion</h2>
  <p>puede visualizar mas datos al seleccionar a los miembros</p>

  <table class="w3-table-all" style="display: block; overflow-x:auto">
    <thead>
      <tr class="w3-cyan">
        <th>Acciones</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Tipo de Doc</th> 
         <th>Nº D.N.I</th>
        <th>CUIL</th>
        <th>Género</th>
        <th>Fecha de nac</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Provinvia</th>
        <th>Departamento</th>
        <th>Localidad</th>
      </tr>
    </thead>
    <tr>
      <td></td>
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
    
  </table>
</div>

            <!-- <thead>
                <td>#</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>CUIL</td>
                <td>Tipo de Documento</td>
                <td>Número de documento</td>
                <td>Género</td>
                <td>Fecha de nacimiento</td>
                <td>Localidad</td>
                <td>Teléfono</td>
                <td>Email</td>
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
                <td>Localidad</td>
                <td>Teléfono</td>
                <td>Email</td>
            </tfoot>
        </table> -->
    </div>



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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/elementosHTML.js"></script>
    <script src="../../js/miembros.js"></script>
    
<?php


require "../../templates/footer.php";


?>
</body>
</html>