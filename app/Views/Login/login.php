<!DOCTYPE html>
<html>
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
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url() ?>/img/fondo/chevere2.jpg)">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Solo personas Autorizadas</a>
  </div>
  <hr>
  <div class="d-flex justify-content-center" style="opacity: 0.9" >
  <!-- /.login-logo -->
  <div class="card rounded">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar session para acceder</p>

      <form action="<?php echo base_url().'/iniciar'?>" method="post">
        <div class="input-group mb-3">
          <input type="Text" class="form-control" id="Dni" name="Dni" placeholder="Dni">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="Descripcion" name="Descripcion" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
    <!-- /.login-card-body -->
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
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
    

</body>
</html>