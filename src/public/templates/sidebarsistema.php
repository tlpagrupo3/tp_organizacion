<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				
                <!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
                    <!-- inicio landing -->
					<li class="">
						<a href="../landing/">
                            <i class="ace-icon fa fa-home"></i>
							<span class="menu-text"> Inicio</span>
						</a>
						<b class="arrow"></b>
					</li>
					<!-- miembros -->
					<?php
	if ($_SESSION['codigo_acceso']==='WK90e'||$_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
		# code...
	?> 
					<li class="">
						<a href="../miembros/">
							<i class="ace-icon fa fa-users"></i>
							<span class="menu-text">Administrar Miembros</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	}
	?>
	<?php
	if ($_SESSION['codigo_acceso']==='NH5T1'||$_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
		# code...
	?>  
                    <!-- usuarios -->
                    <li class="">
						<a href="../usuarios/">
							<i class="ace-icon glyphicon glyphicon-user"></i>
							<span class="menu-text">Administrar Usuarios</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	}
	?> 				
                    <!-- calendario -->
					<li class="">
						<a href="#">
							<i class="ace-icon fa fa-calendar"></i>
							<span class="menu-text">Agenda<span class="badge badge-transparent tooltip-error" title="2 Important Events"></span></span>
						</a>
						<b class="arrow"></b>
					</li>
					<!--chat  -->
					<li class="">
						<a href="http://localhost:3000">
							<i class="ace-icon fa fa-envelope"></i>
							<span class="menu-text">Chat</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	if ($_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('RDO1')||$_SESSION['codigo_acceso']===('53C91')) {
		# code...
	?>
                    <!-- Actividades  -->
					<li class="">
						<a href="../actividades/" class="">
                        <i class="ace-icon glyphicon glyphicon-book"></i>
							<span class="menu-text">Generar de Actividades</span>
						</a>
					</li>
	<?php
	}
	?>
	<?php
	if ($_SESSION['codigo_acceso']==='76YP0'||$_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
		# code...
	?>   				
                  	<!-- noticias -->
                    <li class="">
						<a href="../noticias/">
							<i class="ace-icon glyphicon glyphicon-align-center"></i>
							<span class="menu-text">Generador de Noticias</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	}
	?>  
	<?php
	if ($_SESSION['codigo_acceso']==='WK90e'||$_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
		# code...
	?> 
					<!-- gestion documental -->
                    <li class="">
						<a href="../gestion_documental/">
							<i class="ace-icon fa fa-folder-open"></i>
							<span class="menu-text">Gestión Documental</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	}
	?>
	<?php
	if ($_SESSION['codigo_acceso']===('D53KP')||$_SESSION['codigo_acceso']===('53C91')){
		# code...
	?>
                    <!-- Notificaciones -->
					<li class="">
						<a href="../notificaciones/">
							<i class="ace-icon fa fa-bell-o"></i>
							<span class="menu-text">Notificaciones</span>
						</a>

						<b class="arrow"></b>
					</li>
	<?php
	}
	?> 
                    <!-- salir -->
                    <li class="">
						<a href="../../php/logout.php">
							<i class="ace-icon fa fa-power-off"></i>
							<span class="menu-text">Salir</span>
						</a>

						<b class="arrow"></b>
					</li>

					
                </ul>
                <!-- /.nav-list -->

                <!-- boton ocultar sidebar -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
            </div>
            <div class="main-content">