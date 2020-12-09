<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>
<div class="main-content">


<h2 class="text-primary">Sistema de Gestión documental</h2>
<!-- contenedor para la tabla -->

<div class="row" style="margin-left:30px;margin-top:30px;">
    <div class="col-xs-12">
          <!-- contenedor del modal -->
<div class="" style="margin-left:30px;margin-top:30px;">

<!-- /contenedor del  modal -->
        <h3 class="header smaller lighter blue">Documentos cargados actualmente</h3>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
            <!-- /.modal-dialog -->
                                
        <a href="#agregarDocumento" role="button" class="btn btn-primary" data-toggle="modal">
            &nbsp; Agregar documentación &nbsp;
        </a>

        <div id="agregarDocumento" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close red" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Cargar nuevo documento</h3>
                    </div>
                    <div class="modal-body">
                        <!-- form -->
                        <form id='nuevoDocumento' class="form-horizontal" role="form"action="../../php/gestion_documental.php" method="POST" enctype="multipart/form-data">
                                  <div id='primeraParte'>
                        <input type="text" name='accion' id='accion' value='agregar' hidden>
                        <input type="text" name='id_documento' id="id_documento" hidden>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tipo de usuario</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_tipo_documento" id="id_tipo_documento"></select><br>
                                    </div>
                                </div>
                                <div id='inputs'></div>
                        <button type="input" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
                        <br>
                        
                    </div>
                    </form>
                    </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Cerrar
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
        <br>
        <div class="table-header">
        Ultimos Agregados
        </div>
        <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
        <div>
            <table style=" overflow-x:auto" id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Tipo de Documento</th>
                        <th>Nombre del archivo</th>
                        <th>Tema</th>
                        <th>Fecha</th> 
                        <th>Localidad relacionada</th>
                        <th>Cargado por</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php
        if ($_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
            # code...
        ?>
            <div id="eliminarUsuario" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close red" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Seguro que quiere eleminar al miembro...</h3>
                    </div>
                    <div class="modal-body">
                        <!-- form -->
                        <form class="form-horizontal" role="form"action="../../php/miembros_abm.php" method="POST">
                            <div id='primeraParte'>
                                <input type="text" name='accion' id='accion' value='eliminar' hidden>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Usuario</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_usuarios" id="id_usuariosEliminar"></select><br>
                                        
                                    </div>
                                </div>
                                
                                                                                 
                        <button type="input" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
                        <br>
                        
                        </div>
                        </form>
                        </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                    <i class="ace-icon fa fa-times"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
        <?php
        }
        ?> 

                <div class="modal-footer no-margin-top">
                

                    <ul class="pagination pull-right no-margin">
                        <li class="prev disabled">
                            <a href="#">
                                <i class="ace-icon fa fa-angle-double-left"></i>
                            </a>
                        </li>

                        <li class="active">
                            <a href="#">1</a>
                        </li>

                        <li>
                            <a href="#">2</a>
                        </li>

                        <li>
                            <a href="#">3</a>
                        </li>

                        <li class="next">
                            <a href="#">
                                <i class="ace-icon fa fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div>

</div>
<!-- /gran contenedor -->


<script src="../../js/gestionDocumental.js"></script>




<?php
require "../../templates/footersistema.php";

?>