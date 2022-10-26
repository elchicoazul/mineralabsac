<?php foreach (session('Cliente')as $key): ?>
<?php $dash=$key->rol;?>
<?php endforeach; ?>

<?= $this->extend('Layout/'.$dash)?>
<?= $this->section('contenido')?>
<!-- DataTales Example -->
<body  id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div hidden id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div hidden id="content">

                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Categoria</th>
                                            <th>Sub-Categoria</th>
                                            <th>Fecha</th>
                                            <th>Soles</th>
                                            <th>Dolares</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                            <th>Sub-Categoria</th>
                                            <th>Fecha</th>
                                            <th>Soles</th>
                                            <th>Dolares</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($caja as $key): ?>
                                            
                                        <tr>
                                            <td><?php echo $key->suti ?></td>
                                            <td><?php echo $key->cat ?></td>
                                            <td><?php echo $key->sub ?></td>
                                            <td><?php echo $key->fecha ?></td>
                                            <td><?php echo $key->importes ?></td>
                                            <td><?php echo $key->imported ?></td>
                                            <td>
                                                <a class="btn btn-success btn-sm actualizar_po " href="<?php echo base_url() ?>/actualizar/<?php echo $key->id_caja ?>" data-toggle="modal" data-target="#modal_editar"><i class="material-icons">mode_edit</i></a>
                                                <a class="btn btn-primary btn-sm mi_popup" href="<?php echo base_url() ?>/impresion/<?php echo $key->id_caja ?>" value="1" data-toggle="modal" data-target="#modal_contrato" ><i class="material-icons" >picture_as_pdf</i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <!-- modal impresion -->
    <div class="modal fade" id="modal_contrato" >
  <div class="modal-dialog" style="max-width: 60% !important;">
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Impresion</h4>
      </div>
      <div class="modal-body" id="imp">
                                               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print" onclick="printDiv()"><span class="fa fa-print"> </span> Imprimir</button>
      </div>
    </div>
  </div>
</div>
    <!-- modal editar -->
    <div class="modal fade" id="modal_editar" >
  <div class="modal-dialog" style="max-width: 60% !important;">
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar</h4>
      </div>
      <div class="modal-body" id="editar">
                                               
      </div>
      
    </div>
  </div>
</div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script >
     $(document).on("click",".mi_popup", function(){
         
        valor_IDcontrato = $(this).val();
        valor_IDcontrato = 1;
        var  esperar = 1;
        
        $.ajax({
            
            url: $(this).attr('href'),
            
            beforeSend: function(){
                $("#modal_contrato .modal-body").text('Cargando');
            },
            //type:"POST",
            //dataType:"html",
            //data:{id:valor_IDcontrato},
            success : function(data){
                setTimeout(function(){
                    $("#modal_contrato .modal-body").html(data);
                },esperar
                );
            
            
        }
        }).success(function(data) {
            $("#modal_contrato .modal-body").html(data);
            
        });
    });
</script>
<script >
     $(document).on("click",".actualizar_po", function(){
         
        valor_IDcontrato = $(this).val();
        valor_IDcontrato = 1;
        var  esperar = 1;
        
        $.ajax({
            
            url: $(this).attr('href'),
            
            beforeSend: function(){
                $("#modal_editar .modal-body").text('Cargando');
            },
            //type:"POST",
            //dataType:"html",
            //data:{id:valor_IDcontrato},
            success : function(data){
                setTimeout(function(){
                    $("#modal_editar .modal-body").html(data);
                },esperar
                );
            
            
        }
        }).success(function(data) {
            $("#modal_contrato .modal-body").html(data);
            
        });
    });
</script>

<script>
        function printDiv() {
            var divContents = document.getElementById("imp").innerHTML;
            var a = window.open('', '', 'height=800, width=800');
           
            a.document.write(divContents);
            
            a.document.close();
            a.print();
        }
    </script>
</body>

<?= $this->endSection()?>