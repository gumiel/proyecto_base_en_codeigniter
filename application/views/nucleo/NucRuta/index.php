<?php 
$this->templateci->setTitlePage("Ruta");
$this->templateci->setDescriptionPage("Ruta");

$this->templateci->addJs("public/nucleo/NucRuta/index.js");
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
    <?php echo section_open("ctnBuscador", "Buscador Avanzado"); ?>
          <?php echo form_open_multipart_ci('', ["id"=>"formBuscador"]); ?>
            <div class="col-md-4">
              <?php echo form_dropdown_ci('Buscar', 'ruta[label]', [ ''=>'Seleccione', 'denominacion'=>'Denominacion', 'descripcion'=>'Descripcion']); ?>
            </div>
            <div class="col-md-6">
              <?php echo form_input_ci(false, 'ruta[text]', '', ["id"=>"ruta[ruta]"]); ?>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success">Buscar</button>
            </div>
          <?php echo form_close(); ?>
    <?php echo section_close(); ?>









    <?php echo section_open("ctnTabla", "Lista de Rutas"); ?>

          <table id="tblList" class="table table-striped table-hover">
            <thead>
              <tr>
                <th data-priority="1" width="15"></th>
                <th data-priority="2" >Denominación</th>
                <th data-priority="3" >Url</th>
                <th data-priority="4" >Descripcion</th>                                
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
          <h4 class="modal-title">Crear Ruta</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <?php echo form_input_ci("Denominación", 'ruta[denominacion]', ""); ?>

              <?php echo form_input_ci("Ruta", 'ruta[url]', ''); ?>
              
              <?php echo form_input_ci("Descripción", 'ruta[descripcion]', ''); ?>

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
          <h4 class="modal-title">Editar Ruta</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">

              <?php echo form_input_ci("Denominación", 'ruta[denominacion]', ""); ?>

              <?php echo form_input_ci("Ruta", 'ruta[url]', ''); ?>
              
              <?php echo form_input_ci("Descripción", 'ruta[descripcion]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <?php echo form_hidden('ruta[id_ruta]', ''); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>












  
<?php $this->load->view('template/down'); ?>
