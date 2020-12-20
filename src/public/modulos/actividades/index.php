<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>

<div class="w3-main" style="margin-left:50px; overflow-x:auto;" >

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">     
      <h3 class="text-primary" ><i class="ace-icon fa fa-calendar"> </i>  Actividades de la Organizacion</h3>
    </div>
  </div>
  <h3>Modificar Actividad</h3>
  <!-- seleccionar actividad para modificar -->

 <div action=""class="form-group"id="selectModificar" >
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">seleccione la Actividad</label>
    <div class="col-sm-4">
        <select class="form-control"  name="id_actividades" id="selectActividades"></select>
        
    </div>
 </div><button type="submit" class="w3-button w3-round-xlarge w3-dark-gray w3-hover-cyan">Elegir</button> 
 <br>

 <form id="actividades" method="POST" enctype="multipart/form-data">
    <input type="text" name='accion' id="accion" value='agregar' hidden><br>
    <input type="text" name='id_actividades' id="id_actividades"hidden><br>
    <input type="text" name="id_usuario" id="id_usuario" value='<?php echo $_SESSION['id_usuarios']?>' hidden><br>
    <!-- titulo -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="titular"> Titulo </label>
        <div class="col-sm-9">
         <input type="text" name='titular' id='titular'class="col-xs-10 col-sm-5"  >   
        </div>
    </div><br>
    
    <!-- descripcion -->
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="titular">Descripción</label>
    </div>  
    <div style="overflow-x: auto;"><textarea name="descripcion" id="descripcion" cols="50" rows="10" ></textarea></div>
    <br> <br>
        <!-- foto -->

        <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right"for="imagen" >Foto  </label>
        <div class="col-sm-9">
           <input type="file" id='imagen' name='imagen'>
        </div>
    </div><br> <br>
        <!-- epigrafe -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="epigrafe"> Epígrafe</label>
            <div class="col-sm-9">
             <input type="text" name='epigrafe' id='epigrafe' class="col-xs-10 col-sm-5"  >   
            </div>
       </div><br><br>
 
        <!-- fecha -->
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"for="fecha" >Fecha </label>
            <div class="col-sm-9">
               <input class="col-xs-10 col-sm-5" type="text" name='fecha' id='fecha'>
            </div>
       </div><br><br>

       <button type="input" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
       
        

 </form>

</div>


<?php
require "../../templates/footersistema.php";

?>