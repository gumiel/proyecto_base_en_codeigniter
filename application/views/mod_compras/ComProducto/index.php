<?php 
$this->templateci->setTitlePage("Productos");
$this->templateci->setDescriptionPage("Productos");

$this->templateci->addJs("public/mod_compras/ComProducto/index.js?data=".date('YmdHis'));
 ?>

<?php $this->load->view('template/up'); ?>
    





  <?php echo buttons_open("ctnBotonera") ?>

    <button type="button" class="btn btn-default btn-sm text-center" id="btnCrear">
        <i class="glyphicon glyphicon-plus"></i> <br>Crear
    </button>
    <button type="button" class="btn btn-default btn-sm text-center" id="btnEditar">
        <i class="glyphicon glyphicon-pencil"></i> <br>Editar
    </button>
    <button type="button" class="btn btn-default btn-sm text-center" id="btnEliminar">
        <i class="glyphicon glyphicon-remove"></i> <br>Eliminar
    </button>
    <button type="button" class="btn btn-default btn-sm text-center" id="btnActualizar"> 
        <i class="glyphicon glyphicon-refresh"></i> <br>Actualizar
    </button>

  <?php echo buttons_close() ?>






    <!-- Main content -->
    <?php echo section_open("ctnBuscador", "Buscador"); ?>

      <?php echo form_open_multipart_ci('', ["id"=>"formBuscador"]); ?>
        <div class="col-md-4">
          <?php echo form_dropdown_ci('Buscar' , 'usuario[label]', [ ''=>'Seleccione', 'email'=>'Email', 'cuenta'=>'Cuenta']); ?>
        </div>
        <div class="col-md-6">
          <?php echo form_input_ci(false, 'usuario[text]', '', ["id"=>"usuarion[usuario]"]); ?>
        </div>
        <div class="col-md-2">
          <button class="btn btn-success">Buscar</button>
        </div>
      <?php echo form_close(); ?>

  <?php echo section_close(); ?>









  <?php echo section_open("ctnTabla", "Lista de Productos"); ?>

    <table id="tblList" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th data-priority="1" width="15"></th>
              <th data-priority="2">Codigo</th>
              <th data-priority="3">Nombre</th>
              <th data-priority="4">Fecha creación</th>
              <th data-priority="5">Fecha modificación</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  <?php echo section_close(); ?>
          















    <div class="modal fade" id="modalCrear">
      <div class="modal-dialog">
        <div class="modal-content">
          <?php echo form_open_multipart_ci('usuario/createUsuario', ["id"=>"formCrear"]); ?>

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Crear Producto</h4>
          </div>
          <div class="modal-body">
          
              <div class="box-body">
              
                <?php echo form_input_ci("Codigo", "com_producto[codigo]", ""); ?>

                <?php echo form_input_ci("Nombre", "com_producto[nombre]", ""); ?>              
                
                <?php echo form_input_ci("Descripcion", "com_producto[descripcion]", ""); ?>



                <div class="form-group">
                	
                	<label class="col-sm-4 control-label">
                		
                	</label>

                	<div class="col-sm-8">
                		
                		<div class="well">
										  <div class="panel-body" id="panelAtributos">
										    <!-- Inputs de atributos -->
										  </div>
										</div>

										<div class="input-group">
											<span class="input-group-btn">
								        <button class="btn btn-info" type="button" id="btnActualizarAtributo" >
								        	<span class="glyphicon glyphicon-repeat"></span>
								        </button>
								      </span>
								      <select name="" id="listaAtributos" class="form-control" required="required">
								      </select>
								      <span class="input-group-btn">
								        <button class="btn btn-info" type="button" id="btnAgregarAtributo" >Agregar</button>
								      </span>
								    </div>

									</div>
               	</div>      	 				 

              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>










    

    
  






  
<?php $this->load->view('template/down'); ?>
