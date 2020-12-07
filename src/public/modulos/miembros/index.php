<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>
<!-- contenedor -->
<div class="main-content">


	<h2 class="text-primary">Miembros pertenecientes a la organizacion</h2>
	<i class="ace-icon fa fa-users"> Puede visualizar mas datos al seleccionar a los miembros</i>
	<!-- contenedor para la tabla -->

	<div class="row" style="margin-left:30px;margin-top:30px;">
		<div class="col-xs-12">
			  <!-- contenedor del modal -->
	<div class="" style="margin-left:30px;margin-top:30px;">

	<!-- /contenedor del  modal -->
			<h3 class="header smaller lighter blue">Miembros Actuales</h3>
			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
				<!-- /.modal-dialog -->
									
			<a href="#agregarMiembro" role="button" class="btn btn-primary" data-toggle="modal">
				&nbsp; Agregar Miembros &nbsp;
			</a>

			<div id="agregarMiembro" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close red" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Ingresar datos del nuevo miembro</h3>
						</div>
						<div class="modal-body">
							<!-- form -->
							<form class="form-horizontal" role="form"action="../../php/miembros_abm.php" method="POST">
									  <div id='primeraParte'>
                            <input type="text" hidden id='accion' name="accion" value="agregar">
							<input type="text" hidden id='id_miembro' name="id_miembro">
							        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5"id="nombre" name="nombre" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Apellido</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5"id="apellido" name="apellido" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tipo de documento </label>
										<div class="col-sm-9">
										<select class="form-control" name="id_tipo_documento" id="id_tipo_documento"></select><br>
										</div>
									</div>
							        <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de documento </label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5"id="numero_documento" name="numero_documento"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sexo</label>
										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" name="id_tipo_genero" id="id_tipo_genero"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">CUIL</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="cuil" name="cuil"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fecha de nacimiento</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5"id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Localidad</label>
										<div class="col-sm-9">
											<select class="form-control" name="id_provincia" id="id_provincias"></select><br>
                                            <select class="form-control" name="id_departamento" id="id_departamentos"></select><br>
                                            <select class="form-control" name="id_localidad" id="id_localidades"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Calle</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="calle" name="calle"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="numero" name="numero"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de teléfono</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="numero_telefono" name="numero_telefono"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Correo Electrónico</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="email" name="email"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Código Postal</label>
										<div class="col-sm-9">
											<input type="text" class="col-xs-10 col-sm-5" id="codigo_postal" name="codigo_postal"/>
										</div>
									</div>
                            <p class="message">Siguiente <a href="#"> <i class="ace-icon glyphicon glyphicon-play"></i></a></p>
							</div>
							<!-- fin de la primera parte -->
							
							<!-- fin form -->
							
                        
                        <div class='segundaParte' hidden>
						           <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Municipio Alta</label>
										<div class="col-sm-9">
											 <select class="form-control" name="id_provincia_m_a" id="id_provincias_m_a"></select><br>
                                             <select class="form-control" name="id_departamento_m_a" id="id_departamentos_m_a"></select><br>
                                             <select class="form-control" name="municipio_alta" id="municipio_alta"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Municipio Domicilio</label>
										<div class="col-sm-9">
											 <select class="form-control" name="id_provincia_m_d" id="id_provincias_m_d" ></select><br>
                                             <select class="form-control" name="id_departamento_m_d" id="id_departamentos_m_d"></select><br>
                                             <select class="form-control" name="municipio_domicilio" id="municipio_domicilio"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Origen</label>
										<div class="col-sm-9">
                                            <select class="form-control"name="id_tipo_origen" id="id_tipo_origen"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Oficio</label>
										<div class="col-sm-9">						           
                                            <select  class="form-control"name="id_rama_economia_popular" id="id_rama_economia_popular"></select><br>
                                            <select class="form-control" name="id_actividad_economia_popular" id="id_actividad_economia_popular"></select><br>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Programa</label>
										<div class="col-sm-9">	
											<select class="form-control"name="id_linea_programa" id="id_linea_programa"></select><br>				           
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Monotributo</label>
										<div class="col-sm-9">	
										<input type="text" class="col-xs-10 col-sm-5"id="monotributo" name="monotributo" placeholder="S/N"/>					           
										</div>
									</div>
									                                                 
							<button type="input" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Enviar</button>
							<br>
                            <p class="message">Atrás <a href="#"> <i class="ace-icon glyphicon glyphicon-backward"></i></a></p>
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
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Tip de Doc</th>
							<th>Nº D.N.I</th>
							<th>Cuil</th>
							<th>Género</th>
							<th>Fecha de nac</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Provinvia</th>
							<th>Departamento</th>
							<th>Localidad</th>
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
							<td>perez</td>
							<td>arveja</td>
							<td>tipo ave</td>
							<td>001</td>
							<td>20013</td>
							<td>ave</td>
							<td>2013</td>
							<td>3704pico pico</td>
							<td>tucutu@gmail.com</td>
							<td>formosa</td>
							<td>formosa</td>
							<td>san hilario</td>
						</tr>
						</tbody>
					</table>
				</div>

				<div id="eliminarMiembro" class="modal fade" tabindex="-1">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Miembro</label>
										<div class="col-sm-9">
                                            <select class="form-control" name="id_miembro" id="id_miembroEliminar"></select><br>
											
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
  <script src="../../js/miembros.js"></script>
  
<?php
require "../../templates/footersistema.php";

?>