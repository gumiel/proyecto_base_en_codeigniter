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
    <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_11" data-toggle="tab">Pagar</a></li>
            <li><a href="#tab_21" data-toggle="tab">Ingresar Pago</a></li>                        
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_11">
              
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuario por Pagar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-yellow">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-green">90%</span></td>
                    </tr>
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>





              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Deudas por Pagar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-yellow">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-green">90%</span></td>
                    </tr>
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_21">
              <?php echo form_open_ci('url', ''); ?>
          <div class='row'>
            <div class='col-md-12'><h4 class="modal-title text-light-blue"><u>Datos de Usuario</u></h4><br></div>
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
                <tbody>
                  <tr>
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
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
                <tr>
                  <td>01/04/2018</td>
                  <td>01/05/2018</td>
                  <td>50,00</td>
                  <td>
                    <input type="checkbox" name="">
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>                
                  <td colspan="4" class="text-right text-muted">
                    <b>Total.- 500,00 Bs</b>
                  </td>
                </tr>
              </tfoot>
              </table>

            </div>
            <div class="box-footer text-right">
              <?php echo form_submit_ci('name', 'Agregar'); ?>
            </div>
            <!-- /.box-body -->
          </div>
            </div>
            
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
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




