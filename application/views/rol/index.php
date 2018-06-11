<?php 
$this->templateci->setTitlePage("Lista de Roles");
$this->templateci->setDescriptionPage("Lista de Roles");

$this->templateci->addJs("public/rol/index.js");
 ?>

<?php $this->load->view('template/up'); ?>


    <section class="content text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-info" id="btnCreate"><i class="glyphicon glyphicon-plus"></i><br>Crear</button>
      </div>      
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Buscador</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php echo form_open_multipart_ci('', ["id"=>"formSearch"]); ?>
            <div class="col-md-4">
              <?php echo form_dropdown_ci('Buscar' , 'usuario[label]', [ ''=>'Seleccione', 'nombres'=>'Nombre', 'paterno'=>'Ape. Paterno', 'materno'=>'Ape. Materno', 'cuenta'=>'Cuenta', 'email'=>'Email', 'ci'=>'CI',]); ?>
            </div>
            <div class="col-md-6">
              <?php echo form_input_ci(false, 'usuario[text]', '', ["id"=>"usuarion[usuario]"]); ?>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success">Buscar</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>

    <section class="content">


      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Usuarios</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <table id="tblList" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Denominación</th>
                <th>Descripcion</th>                
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          <!-- /.box-header -->
          <!-- form start -->
            
            
          

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  



  <div class="modal fade" id="modalCreate">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('rol/create', ["id"=>"formCreate"]); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Crear Rol</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <?php echo form_input_ci("Denominación", 'rol[denominacion]', ""); ?>
              
              <?php echo form_input_ci("Descripción", 'rol[descripcion]', ''); ?>

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
        <?php echo form_open_multipart_ci('rol/edit', ['id'=>'formEdit']); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Rol</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">

              <?php echo form_input_ci("Denominación", 'rol[denominacion]', ""); ?>
              
              <?php echo form_input_ci("Descripción", 'rol[descripcion]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <?php echo form_hidden('rol[id_rol]', ''); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalAsignarRuta">
    <div class="modal-dialog">
      <div class="modal-content">

        <?php echo form_open_multipart_ci('rol/asignarRuta', ["id"=>"formAsignarRuta"]); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Asignar Ruta</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <div class="col-md-4">
                <select name="origen" id="origen" multiple="multiple" size="8" class="form-control">
                  <option value="1">Opción 1</option>
                  <option value="2">Opción 2</option>
                  <option value="3">Opción 3</option>
                  <option value="4">Opción 4</option>
                  <option value="5">Opción 5</option>
                  <option value="6">Opción 6</option>
                  <option value="7">Opción 7</option>
                  <option value="8">Opción 8</option>
                </select>
              </div>
              <div  class="col-md-4">
                <input type="button" class="btn pasar izq" value="Pasar »">
                <input type="button" class="btn quitar der" value="« Quitar"><br />
                <input type="button" class="btn pasartodos izq" value="Todos »">
                <input type="button" class="btn quitartodos der" value="« Todos">
              </div>
              <div class="col-md-4">
                <select name="rutas[][id_ruta]" id="destino" multiple="multiple" size="8" class="form-control"></select>
              </div  class="col-md-4">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <input type="hidden" name="rol[id_rol]" value="">
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>



  
<?php $this->load->view('template/down'); ?>
