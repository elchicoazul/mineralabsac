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
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>        
<?= $this->endSection()?>