<?php 
$this->templateci->setTitlePage("Permisos");
$this->templateci->setDescriptionPage("Permisos");

$this->templateci->addJs("public/nucleo/nuc_permiso/index.js");
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
      <button type="button" class="btn btn-default btn-sm text-center" id="btnAsignarRuta"> 
          <i class="glyphicon glyphicon-refresh"></i> <br>Asignar permisos
      </button>

    <?php echo buttons_close() ?>











    
    <!-- Main content -->
    <?php echo section_open("ctnBuscador", "Buscador"); ?>
          <?php echo form_open_multipart_ci('', ["id"=>"formBuscador"]); ?>
            <div class="col-md-4">
              <?php echo form_dropdown_ci('Buscar', 'permiso[label]', [ ''=>'Seleccione', 'denominacion'=>'Denominacion', 'descripcion'=>'Descripcion']); ?>
            </div>
            <div class="col-md-6">
              <?php echo form_input_ci(false, 'permiso[text]', '', ["id"=>"permiso[permiso]"]); ?>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success">Buscar</button>
            </div>
          <?php echo form_close(); ?>
    <?php echo section_close(); ?>









    <?php echo section_open("ctnTabla", "Lista de Permisos"); ?>

          <table id="tblList" class="table table-striped table-hover">
            <thead>
              <tr>
                <th data-priority="1" width="15"></th>
                <th data-priority="2" >Denominación</th>
                <th data-priority="3" >Descripcion</th>                                
              </tr>
            </thead>
            <tbody></tbody>
          </table>

    <?php echo section_close(); ?>
  









  <div class="modal fade" id="modalCreate">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('#', ["id"=>"formCreate"]); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Crear Permiso</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <?php echo form_input_ci("Denominación", 'permiso[denominacion]', ""); ?>
              
              <?php echo form_input_ci("Descripción", 'permiso[descripcion]', ''); ?>

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











  <div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('#', ['id'=>'formEdit']); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Permiso</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">

              <?php echo form_input_ci("Denominación", 'permiso[denominacion]', ""); ?>
              
              <?php echo form_input_ci("Descripción", 'permiso[descripcion]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <?php echo form_hidden('permiso[id_permiso]', ''); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>












  
<?php $this->load->view('template/down'); ?>
