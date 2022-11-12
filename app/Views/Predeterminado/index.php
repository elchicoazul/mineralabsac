
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Texto Predeterminado</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Pre/insertar'?>" method="post">
                                <div class="form-group row">
                                    
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="Nombre">Texto Predeterminado</label>
                                        <textarea class="form-control"  name="Nombre" id="Nombre" cols="30" rows="5"></textarea>
                                        <input hidden class="form-control" type="text" id="id_subcategoria" name="id_subcategoria" value="<?php echo $submen ?>" >
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Añadir Texto</button>
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
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Subdatos as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_prederterminado?></th>
                                    <td><?php echo  $key->descripcion?></td>
                                    <td><a href="#" class="btn btn-danger btn-sm">eliminar</a></td>
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
<script>
    $(document).ready(function(){
                $("#id_categoria").change(function () {
                    $("#id_categoria option:selected").each(function () {
                        id_categoria = $('#id_categoria').val();
                        $.post("<?php echo base_url() ?>/CajaController/subcategoria", {
                            id_categoria: id_categoria
                        }, function (data) {
                            $("#id_subcategoria").html(data);
                            console.log(data);
                        });
                    });
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

      

