<?php
$id_tipocliente = $datos[0]['id_tipocliente'];
$nombre = $datos[0]['nombre'];
$descripcion = $datos[0]['descripcion'];
?>
<?= $this->extend('Layout/Dashboard')?>
<?= $this->section('contenido')?>

<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear Tipo Usuario</h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Tipocliente/actualizar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input hidden type="text" class="form-control form-control-user" id="id_tipocliente" name="id_tipocliente" value="<?php echo $id_tipocliente?>">
                                        <input type="text" class="form-control form-control-user" id="Nombre" name="Nombre" placeholder="Nombre" value="<?php echo $nombre?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php echo $descripcion?>">
                                    </div>
                                </div>
                                <div>
                                    <button class="btn-primary btn-user btn-block">Actualizar</button>
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