<?php
require "../../php/session.php";
require "../../templates/headsistema.php";
require "../../templates/navarsistema.php";
require "../../templates/sidebarsistema.php";

?>
<!-- contenedor -->
<div class="main-content">
  <!-- contenedor del modal -->
<div class="" style="margin-left:30px;margin-top:30px;">
<!-- /.modal-dialog -->
								
								<a href="#my-modal" role="button" class="btn btn-primary" data-toggle="modal">
									&nbsp; Agregar Miembros &nbsp;
								</a>

								<div id="my-modal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close red" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">Ingresar datos del nuevo miembro</h3>
											</div>

											<div class="modal-body">
												Some content
												<br />
												<br />
												<br />
												<br />
												<br />
												1
												<br />
												<br />
												<br />
												<br />
												<br />
												2
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
<!-- /contenedor del  modal -->

<h2 class="text-primary">Miembros pertenecientes a la organizacion</h2>
<i class="ace-icon fa fa-users"> Puede visualizar mas datos al seleccionar a los miembros</i>
<!-- contenedor para la tabla -->

<div class="row" style="margin-left:30px;margin-top:30px;">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Miembros Actuales</h3>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
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