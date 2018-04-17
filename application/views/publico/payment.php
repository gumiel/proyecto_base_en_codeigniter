<?php 
$this->templateci->setTitlePage("Pagos");
$this->templateci->setDescriptionPage("Pagos");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>
  <section class="content text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertPayment"><i class="glyphicon glyphicon-plus"></i> Pagar</button>
      </div>      
    </section>
  <section class="content">
    <div class="row">
            
      <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Buscador</a></li>
            <li><a href="#tab_2" data-toggle="tab">Buscador avanzado</a></li>                        
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              
              <div class="row">
                <?php echo form_open_ci('url', ''); ?>
                  <div class='col-md-10'>
                    <?php echo form_input_ci('Id Usuario:', 'usuario[id]', 'value'); ?> 
                  </div>
                  <div class='col-md-2'>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                      Buscar
                    </button>
                  </div>
                <?php echo form_close_ci(); ?>
              </div>
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <div class="row">
                <?php echo form_open_ci('url', ''); ?>
                  <div class='col-md-10'>
                    
                    <?php echo form_input_ci('Id Usuario:', 'usuario[id]', '445512'); ?> 

                    <?php echo form_input_ci('Nº de medidor', 'usuario[medidor]','1321654546545'); ?>
                    
                    <?php echo form_input_ci('Cod. Ubicacion', 'usuario[ubicacion]','4546545'); ?>

                  </div>
                  <div class='col-md-2'>
                    <button type='button' class="btn" >Buscar</button>
                  </div>
                <?php echo form_close_ci(); ?>
              </div>
            </div>
            
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- /.col -->
      
    </div>  
  </section>
  

  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Ingresar Pagos</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">                        

          
          </div>
        </div>
      </div>
    </div>
  </section>













  <div class="modal fade " id="insertPayment">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Datos de Usuario</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open_ci('url', ''); ?>
          <div class='row'>
            
            <div class='col-md-6'>
              <dl class="dl-horizontal">
                <dt class='text-light-blue'>Nombres y Apellidos:</dt>
                <dd>Juan Perez Perez</dd>
                <dt class='text-light-blue'>Nº de Medidor:</dt>
                <dd>987879848</dd>   
              </dl>         
            </div>
            <div class='col-md-6'>
              <dl class="dl-horizontal">
                <dt class='text-light-blue'>Dirección:</dt>
                <dd>Ayacucho entre heroinas y junin</dd>
                <dt class='text-light-blue'>Ciudad:</dt>
                <dd>Cochabamba</dd>   
              </dl>      

            </div>
          </div>
          <?php echo form_close_ci(); ?>
          
          
          

          <div class="box box-primary">            
            <div class="box-header">
              <h4 class="box-title">Cobros Pendientes</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th>Fecha Lectura</th>
                  <th>Fecha Vencimiento</th>
                  <th>Importe a Pagar</th>
                  <th>
                    <input type="checkbox" name="">
                  </th>
                  
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Agregar Cobro</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  
<?php $this->load->view('template/down'); ?>




