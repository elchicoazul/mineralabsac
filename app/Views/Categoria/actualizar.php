<?php
$id_categoria = $datos[0]['id_categoria'];
$nombre = $datos[0]['nombre'];
$tipo = $datos[0]['tipo'];
?>
<?php foreach (session('Cliente')as $key): ?>
<?php $dash=$key->rol;?>
<?php endforeach; ?>
<?= $this->extend('Layout/'.$dash)?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Categoria</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Categoria/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input hidden required type="text" class="form-control form-control-user" id="id_categoria" name="id_categoria" placeholder="Nombre" value="<?php echo $id_categoria?>">
                                        <input required type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $nombre?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="Tipo" name="Tipo">
                                            <option value="Egreso">Egreso</option>
                                            <option value="Ingreso">Ingreso</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Actualizar Categoria</button>
                                </div>
                                
                               
                            </form>
                            <hr>
                            
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