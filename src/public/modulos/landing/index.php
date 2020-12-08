<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";


if ($_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
    # code...
?>
<div id="form-posteos" style="display:block; max-width: 500px; max-height: 500px; text-align:center; margin-left: 50px;">
    <form action="../../php/posteo_landing.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label" for="form-field-1"><b>Imagen</b></label>
            <input type="file" class="form-control" id="imagen" name='imagen' />
        </div>
        <div class="form-group">
            <label class="control-label" for="form-field-1"><b>¿Qúe quiere publicar?</b></label>
            <input type="text" class="form-control" id="posteo" name='posteo' placeholder="Lo publicado se mostrará en la en ésta sección para todos los usuarios" />
        </div>
        <button type="input" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
    </form>
</div>
<?php
}
?>
<hr>
<div id="posteos"></div>
<div id="version" class="modal fade" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="smaller lighter blue no-margin">Notas de Versión</h3>
            </div>

            <div class="modal-body">
                
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->

</div></div><!-- /.modal-dialog -->
</div>






<?php
require "../../templates/footersistema.php";

?>
<script src="../../js/notas_version.js"></script>
<script src="../../js/posteos_landing.js"></script>