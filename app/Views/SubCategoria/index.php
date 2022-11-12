<?php foreach (session('Cliente')as $key): ?>
<?php $dash=$key->rol;?>
<?php endforeach; ?>
<?= $this->extend('Layout/'.$dash)?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear SubCategoria</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/SubCategoria/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="Tipo">Sub Categoria</label>
                                        <select class="form-control" id="Tipo" name="Tipo">
                                            <?php foreach ($datos as $key): ?>
                                            <option value="<?php echo $key->id_categoria ?>"><?php echo $key->nombre ?>-<?php echo $key->tipo ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="Nombre">Sub Categoria</label>
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre">
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Cear Sub Categoria</button>
                                </div>
                                
                               
                            </form>
                            <hr>
                            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Predeterminado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Subdatos as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_subcategoria?></th>
                                    <td><?php echo  $key->nombre?></td>
                                    <td><?php echo $key->id_categoria?></td>
                                
                                    <td><a href="<?php echo base_url().'/SubCategoria/'.$key->id_subcategoria?>" class="btn btn-info btn-sm">editar</a></td>
                                    <td><a href="#" class="btn btn-danger btn-sm">eliminar</a></td>
                                    <td><a class="btn btn-success btn-sm actualizar_po" href="<?php echo base_url() ?>/Pres/<?php echo $key->id_subcategoria ?>" data-toggle="modal" data-target="#modal_editar"><i class="material-icons">mode_edit</i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                        </div>
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
        <h4 class="modal-title">Predeterminado</h4>
      </div>
      <div class="modal-body" id="editar">
                                               
      </div>
      
    </div>
  </div>
</div>
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
            $("#modal_editar .modal-body").html(data);
            
        });
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
let mensaje = '<?php echo $mensaje ?>';

if (mensaje == '1') {
    swal(':D', 'Creado con éxito', 'success');
} else if (mensaje == '0') {
    swal(':(', 'Fallo al agregar!', 'error');
} else if (mensaje == '2') {
    swal(':D', 'Actualizado con exito', 'success');
} else if (mensaje == '3') {
    swal(':(', 'Fallo al Actualizar!', 'error');
} else if (mensaje == '4') {
    swal(':D', 'Eliminado con exito!', 'success');
} else if (mensaje == '5') {
    swal(':(', 'Fallo al eliminar!', 'error');
}
</script>         

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
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

<?= $this->endSection()?>