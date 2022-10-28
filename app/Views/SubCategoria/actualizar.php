<?php
$id_subcategoria = $datos[0]['id_subcategoria'];
$nombre = $datos[0]['nombre'];
$id_categoria = $datos[0]['id_categoria'];
?>
<?= $this->extend('Layout/Dashboard')?>
<?= $this->section('contenido')?>
<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar SubCategoria</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/SubCategoria/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="Tipo">Categoria</label>
                                        
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="Nombre">Sub Categoria</label>
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $nombre?>">
                                        <input hidden type="text" class="form-control form-control-user" id="Tipo" name="Tipo" placeholder="Tipo" value="<?php echo $id_categoria?>">
                                        <input hidden type="text" class="form-control form-control-user" id="id_subcategoria" name="id_subcategoria" placeholder="id_subcategoria" value="<?php echo $id_subcategoria?>">
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Actualizar Sub Categoria</button>
                                </div>
                                
                               
                            </form>
                           
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