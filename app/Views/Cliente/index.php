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
                                <h1 class="h4 text-gray-900 mb-4">Registrar Usuario</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Cliente/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select class="form-control" id="TipoCliente" name="TipoCliente">
                                            <?php foreach ($Tipo as $key): ?>
                                            <option value=<?php echo  $key->id_tipocliente?>><?php echo  $key->nombre?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="DNI" name="DNI" placeholder="DNI">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Direccion" name="Direccion" placeholder="Direccion">
                                    </div>
                                    
                                </div>
                                <div hidden class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Rol" name="Rol" placeholder="Rol">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" placeholder="Descripcion">
                                    </div>
                                    
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Ingresar</button>
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
                                    
                                    
                                    <th scope="col">Rol</th>
                                   
                                    <th scope="col">Editar</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($datos as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_cliente?></th>
                                    
                                    <td><?php echo  $key->nombre?></td>
                                    
                                    <td><?php echo  $key->rol?></td>
                                    
                                
                                    <td><a href="<?php echo base_url().'/Cliente/'.$key->id_cliente?>" class="btn btn-info btn-sm">editar</a></td>
                                    <td><a href="<?php echo base_url().'/Caja/'.$key->id_cliente?>" class="btn btn-success btn-sm">Detalles</a></td>
                                    <td ><a href="<?php echo base_url().'/Clientes/estado/'.$key->id_cliente.'/'.$key->estado?>" class="btn btn-danger btn-sm">
                                    <?php if($key->estado==1){echo "Deshabilitar";}else{echo "habilitar";}?></a></td>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
let mensaje = '<?php echo $mensaje ?>';

if (mensaje == '1') {
    swal(':D', 'Creado con ??xito', 'success');
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
<?= $this->endSection()?>