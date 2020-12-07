<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>
<!-- contenedor -->
<div class="main-content">


	<h2 class="text-primary">Usuarios registrados en el sistema</h2>
	<!-- contenedor para la tabla -->

	<div class="row" style="margin-left:30px;margin-top:30px;">
		<div class="col-xs-12">
			  <!-- contenedor del modal -->
	<div class="" style="margin-left:30px;margin-top:30px;">

	<!-- /contenedor del  modal -->
			<h3 class="header smaller lighter blue">Usuarios Actuales</h3>
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
				<!-- /.modal-dialog -->
									
			<a href="agregarUsuario" role="button" class="btn btn-primary" data-toggle="modal">
				&nbsp; Agregar Usuarios &nbsp;
			</a>

			<div id="agregarUsuario" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close red" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Ingresar datos del nuevo miembro</h3>
						</div>
						<div class="modal-body">
							<!-- form -->
							<form class="form-horizontal" role="form"action="../../php/usuarios_abm.php" method="POST">
									  <div id='primeraParte'>
                            <input type="text" name='accion' id='accion' value='agregar' hidden>
                            <input type="text" name='id_usuarios' id="id_usuarios" hidden>
							        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre de Usuario</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="nombre_usuario" name='nombre_usuario' />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contraseña</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5"id="contrasena" name='contrasena'/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email de recuperación</label>
										<div class="col-sm-9">
                                            <input type="text" class="col-xs-10 col-sm-5"name="email_recuperacion" id="email_recuperacion"/>
										
										</div>
									</div>
							        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tipo de usuario</label>
										<div class="col-sm-9">
                                            <select class="form-control" name="id_nivel_acceso" id="id_nivel_acceso"></select><br>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Miembro</label>
										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" name="id_miembros" id="id_miembros"></select><br>
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
			<br>
			<div class="table-header">
			Ultimos Agregados
			</div>
			<!-- div.table-responsive -->

				<!-- div.dataTables_borderWrap -->
			<div>
				<table style="display: block; overflow-x:auto" id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
                            <th>Acciones</th>
                            <th>Usuario</th>
                            <th>Tipo de Usuario</th>
                            <th>Nombre</th> 
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

<!-- END MAIN -->
</div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="../../js/elementosHTML.js"></script>
  <script src="../../js/usuarios.js"></script>
  
<?php
require "../../templates/footersistema.php";

?>