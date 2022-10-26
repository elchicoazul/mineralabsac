<?php $nombre=$Catego[0]['nombre'];?>
<?php $tipo=$Catego[0]['tipo'];?>

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
                                
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $nombre?>-<?php echo $tipo?></h1>
                            </div>
                            <form class="user" action="<?php echo base_url().'/Caja/insertar'?>" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                    <?php if($tipo=="Ingreso"){echo '<label for="">Recibido de :</label>';}else{ echo '<label for="">Entregado a :</label>';} ?>
                                    
                                    <input required type="Text"  name="Cliente" id="Cliente" class="form-control">
                                    <input required hidden type="Text" name="Id_Cliente" id="Id_Cliente" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Sub Categoria</label>
                                        <select class="form-control" id="id_subcategoria" name="id_subcategoria">
                                            <?php foreach ($subcaja as $key): ?>
                                                <option value="<?php echo $key->id_subcategoria ?>"><?php echo $key->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">por concepto de :</label>
                                    <textarea class="form-control" name="Descripcion" id="Descripcion" ></textarea>
                                        <input type="hidden" class="form-control form-control-user" value="<?php echo $idcat  ?>" id="Id_Categoria" name="Id_Categoria" placeholder="Id_Categoria">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Monto Soles :</label>
                                        <input type="text" class="form-control form-control-user" id="importes" name="importes" placeholder="importes">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Monto Dolares :</label>
                                        <input type="text" class="form-control form-control-user" id="imported" name="imported" placeholder="imported">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="">Programaciones</label>
                                        <input type="checkbox" id="progrmaciones" name="progrmaciones">
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-primary btn-user btn-block">Registar</button>

                                    </div>
                                        
                                </div>
                                
                               
                            </form>
                            <hr>
                            <table hidden class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Soles</th>
                                    <th scope="col">Dolares</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($caja as $key): ?>
                                    <tr>
                                    <th scope="row"><?php echo  $key->id_caja?></th>
                                    <td><?php echo  $key->id_categoria?></td>
                                    <td><?php echo  $key->fecha?></td>
                                    <td><?php echo  $key->importes?></td>
                                    <td><?php echo  $key->imported?></td>
                                    <td><?php echo $key->descripcion?></td>
                                
                                    <td><a href="<?php echo base_url().'/Cliente/editar/'.$key->id_caja?>" class="btn btn-info btn-sm">editar</a></td>
                                    <td><a href="<?php echo base_url().'/Caja/'.$key->id_caja?>" class="btn btn-success btn-sm">Detalles</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>

<script type="text/javascript">

	var Valores = {
		//url: "<?php echo base_url();?>js/countries.json",
		url: '<?php echo base_url('ClienteController/getClientes');?>',
		
		getValue: "nombre",
		
		theme:"blue-light",

		// template: {
		// 	type: "description",
		// 	fields: {
		// 		description: "cantHabit"
		// 	}
		// },

		// template: {
		// 	type: "custom",
		// 	method: function(value, item) {
		// 		return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
		// 	}
		// },

		template: {
		    type: "description",
		    fields: {
			    description: "dni"
		    }
	    },

		list: {
			maxNumberOfElements: 5,
			match: {
				enabled: true
			},
			// onClickEvent: function(value, item) {
			// 	alert('seleccionado');
			// },
            

            
			onClickEvent: function() {
				var value = $("#Cliente").getSelectedItemData().id_cliente;
                
				$("#Id_Cliente").val(value).trigger("change");
				
                
			},
			onKeyEnterEvent: function(){
				var value = $("#Id_Cliente").getSelectedItemData().idCiudad;

				$("#Id_Cliente").val(value).trigger("change");
			}
		}
	};

	$("#Cliente").easyAutocomplete(Valores);
</script>
<?= $this->endSection()?>