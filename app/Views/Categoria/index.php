<?= $this->extend('Layout/Dashboard')?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Categoria</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Categoria/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="Tipo" name="Tipo">
                                            <option value="Egreso">Egreso</option>
                                            <option value="Ingreso">Ingreso</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Cear Categoria</button>
                                </div>
                                
                               
                            </form>
                            <hr>
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th hidden scope="col">Editar</th>
                                    <th hidden scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($datos as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_categoria?></th>
                                    <td><?php echo  $key->nombre?></td>
                                    <td><?php echo $key->tipo?></td>
                                
                                    <td hidden><a href="<?php echo base_url().'/AgrupMenu/editar/'.$key->id_categoria?>" class="btn btn-info btn-sm">editar</a></td>
                                    <td hidden><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
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
<?= $this->endSection()?>