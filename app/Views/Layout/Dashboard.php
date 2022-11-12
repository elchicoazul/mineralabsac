<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Caja</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="<?php echo base_url();?>/assets/js/jquery-3.1.1.js"></script>
	<!-- JS file -->
	<script src="<?php echo base_url();?>/assets/js/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script> 

	<!-- CSS file -->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/js/EasyAutocomplete/easy-autocomplete.min.css"> 

	<!-- Additional CSS Themes file - not required-->
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/js/EasyAutocomplete/easy-autocomplete.themes.min.css"> 
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mineralab<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li  class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr hidden class="sidebar-divider">

            <!-- Heading -->
            <div hidden class="sidebar-heading">
                Caja
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li hidden  class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ingresos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipos de Ingresos</h6>
                        <?php foreach (session('MenuDashboardCliente')as $key): ?>
                            <?php
                            if ( $key->tipo=="Ingreso") {?>
                                <a class="collapse-item" href="<?php echo base_url()?>/Cajas/<?php echo $key -> id_categoria?>"><?php echo $key->nombre ?></a>
                            <?php }?>
                        <?php endforeach; ?>
                                            
                       
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li hidden class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Egresos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tipos de Egresos:</h6>
                        <?php foreach (session('MenuDashboardCliente')as $key): ?>
                            <?php
                            if ( $key->tipo=="Egreso") {?>
                                <a class="collapse-item" href="<?php echo base_url()?>/Cajas/<?php echo $key -> id_categoria?>"><?php echo $key->nombre ?></a>
                            <?php }?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <li hidden class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>/kardex">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Kardex</span></a>
            </li>
            <hr hidden class="sidebar-divider">

<!-- Heading -->
<div hidden class="sidebar-heading">
    Programaciones
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li hidden  class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ProIngre"
        aria-expanded="true" aria-controls="ProIngre">
        <i class="fas fa-fw fa-cog"></i>
        <span>Ingresos</span>
    </a>
    <div id="ProIngre" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Programar Ingresos</h6>
            <?php foreach (session('MenuDashboardCliente')as $key): ?>
                <?php
                if ( $key->tipo=="Ingreso") {?>
                    <a class="collapse-item" href="<?php echo base_url()?>/Programados/<?php echo $key -> id_categoria?>"><?php echo $key->nombre ?></a>
                <?php }?>
            <?php endforeach; ?>
                                
           
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li hidden class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ProEgre"
        aria-expanded="true" aria-controls="ProEgre">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Egresos</span>
    </a>
    <div id="ProEgre" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Programar Egresos:</h6>
            <?php foreach (session('MenuDashboardCliente')as $key): ?>
                <?php
                if ( $key->tipo=="Egreso") {?>
                    <a class="collapse-item" href="<?php echo base_url()?>/Programados/<?php echo $key -> id_categoria?>"><?php echo $key->nombre ?></a>
                <?php }?>
            <?php endforeach; ?>
        </div>
    </div>
</li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Usuarios
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sobre Usuarios</h6>
                       
                        <a class="collapse-item" href="<?php echo base_url()?>/Cliente">Registrar Usuario</a>
                        <a class="collapse-item" href="<?php echo base_url()?>/Tipocliente">Tipos de Usuario</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Cate"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Categorias</span>
                </a>
                <div id="Cate" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sobre Categorias</h6>
                        <a class="collapse-item" href="<?php echo base_url()?>/Categoria">Categoria</a>
                        <a class="collapse-item" href="<?php echo base_url()?>/SubCategoria">Sub Categoria</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            

            <!-- Nav Item - Tables -->
            <li hidden class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="user" action="<?php echo base_url().'/BuscarCliente'?>" method="post">
                        <div class="input-group">
                        <input required type="Text"  name="Clientes" id="Clientes" class="form-control">
                                        <input required hidden type="Text" name="Id_Clientes" id="Id_Clientes" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-primary" >
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <a class="btn btn-success btn-sm actualizar_po " href="" data-toggle="modal" data-target="#Calculadora"><i class="material-icons">mode_edit</i></a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar Persona" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li hidden class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li hidden class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url() ?>/img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url() ?>/img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo base_url() ?>/img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php foreach (session('Cliente')as $key): ?>
                                                                                            <?php $nombre=$key->nombre;
                                                                                            echo $nombre?>
                                                                                            <?php endforeach; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?= $this->renderSection('contenido') ?>

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                    

                    

                    <!-- Content Row -->
                  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mineralab 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
 <!-- modal editar -->
 <div class="modal fade" id="Calculadora" >
  <div class="modal-dialog" style="max-width: 60% !important;">
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Calculadora</h4>
      </div>
      <div class="modal-body" id="calcular">
        
      <table id="tables" class="table  table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">moneda</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total <input id="resultado" name="resultado" value="0" disabled type="text"></th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>100</td>
                                        <td><input id="cien" type="text" onchange="suma()" onkeyup="ucien()"></td>
                                        <td><input id="rcien" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>50</td>
                                        <td><input id="cincuenta" type="text" onchange="suma()" onkeyup="ucincuenta()"></td>
                                        <td><input id="rcincuenta"  type="text" value="0"></td>
                                    </tr>
                                        
                                    <tr>
                                        <td>20</td>
                                        <td><input id="veinte" type="text" onchange="suma()" onkeyup="uveinte()"></td>
                                        <td><input id="rveinte" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><input id="diez" type="text" onchange="suma()" onkeyup="udiez()"></td>
                                        <td><input id="rdiez" type="text" value="0"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><input id="cinco" type="text" onchange="suma()" onkeyup="ucinco()"></td>
                                        <td><input id="rcinco" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input id="dos" type="text" onchange="suma()" onkeyup="udos()"></td>
                                        <td><input id="rdos" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><input id="sol" type="text" onchange="suma()" onkeyup="usol()"></td>
                                        <td><input id="rsol" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>0.5</td>
                                        <td><input id="china" type="text" onchange="suma()" onkeyup="uchina()"></td>
                                        <td><input id="rchina" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>0.2</td>
                                        <td><input id="vecentavo" type="text" onchange="suma()" onkeyup="uvecentavo()"></td>
                                        <td><input id="rvecentavo" type="text" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td>0.1</td>
                                        <td><input id="dicentavo" type="text" onchange="suma()" onkeyup="udicentavo()"></td>
                                        <td><input id="rdicentavo" type="text" value="0" ></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><input id="dicentavo" value="Limpiar" type="button" class="btn btn-primary"  onclick="limpiar()"></td>
                                    </tr>
                                </tbody>
                            </table>
                                                           
      </div>
      
    </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript-->
    
    <script src="<?php echo base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>/js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">

	var ValoresA = {
		//url: "<?php echo base_url();?>js/countries.json",
		url: '<?php echo base_url('ClienteController/getClientes');?>',
		
		getValue: "nombre",
		
		theme:"blue-light",

		// template: {
		// 	type: "description",
		// 	fields: {
		// 		description: "cantHabit"
		// 	}
		// },

		// template: {
		// 	type: "custom",
		// 	method: function(value, item) {
		// 		return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
		// 	}
		// },

		template: {
		    type: "description",
		    fields: {
			    description: "dni"
		    }
	    },

		list: {
			maxNumberOfElements: 5,
			match: {
				enabled: true
			},
			// onClickEvent: function(value, item) {
			// 	alert('seleccionado');
			// },
            

            
			onClickEvent: function() {
				var value = $("#Clientes").getSelectedItemData().id_cliente;
                
				$("#Id_Clientes").val(value).trigger("change");
				
                
			},
			onKeyEnterEvent: function(){
				var value = $("#Id_Clientes").getSelectedItemData().idCiudad;

				$("#Id_Clientes").val(value).trigger("change");
			}
		}
	};

	$("#Clientes").easyAutocomplete(ValoresA);
</script> 
<script>
    function ucien(){
        
     
       
       rcien.value=cien.value*100;
        
    }
    function ucincuenta(){
        rcincuenta.value=cincuenta.value*50;
    }
    function uveinte(){
        rveinte.value=veinte.value*20;
    }
    function udiez(){
        rdiez.value=diez.value*10;
    }
    function ucinco(){
        rcinco.value=cinco.value*5;
    }
    function udos(){
        rdos.value=dos.value*2;
    }
    function usol(){
        rsol.value=sol.value*1;
    }
    function uchina(){
        rchina.value=china.value*0.5;
    }
    function uvecentavo(){
        rvecentavo.value=vecentavo.value*0.2;
    }
    function udicentavo(){
        rdicentavo.value=parseFloat(dicentavo.value)*0.1; 
    }
    function limpiar(){
        table.reset(); 
    }
    function suma(){
        
        resultado.value=parseFloat(rcien.value)+parseFloat(rcincuenta.value)+parseFloat(rveinte.value)+parseFloat(rdiez.value)+parseFloat(rcinco.value)+parseFloat(rdos.value)+parseFloat(rsol.value)+parseFloat(rchina.value)+parseFloat(rvecentavo.value)+parseFloat(rdicentavo.value); 
        
    }

</script>
</body>

</html>