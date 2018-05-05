<?php 
$this->templateci->setTitlePage("Pagos");
$this->templateci->setDescriptionPage("Pagos");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>

<style type="text/css">
  
  .btn-app {

    border-radius: 3px;
    position: relative;
    padding: 5px 5px;
    margin: 0 0 0px 0px;
    min-width: 35px;
    height: 30px;
    text-align: center;
    color: #666;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;

  }
</style>
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
                    <?php echo form_input_ci('Cod. Usuario:', 'usuario[id]', 'value'); ?> 
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
                  <h3 class="box-title">Deudas por Pagar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class='text-center' style="width: 10px"></th>
                          <th class='text-center' style="width: 10px">#</th>
                          <th class='text-center'>Cod. Usuario</th>
                          <th colspan="2" class='text-center'>Nombre Completo</th>
                          <th class='text-center' style="width: 150px">Importe Total</th>
                          <th style="width:30px"></th>
                        </tr>                        
                      </thead>
                      <tbody>
                        <tr class='success'>
                          <td>
                            <a class="btn btn-app">                          
                              <i class="fa  fa-minus-square"></i>
                            </a>
                          </td>
                          <td>1.</td>
                          <td>2000021</td>
                          <td colspan="2">Juan Perez Perez</td>
                          
                          <td class="text-right">120,50</td>
                          <td  style="width: 95px">
                                                  
                            <a class="btn btn-app">
                              <span class="badge bg-red">4</span>
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center"><b>Vencimiento</b></td>
                          <td class="text-right"><b>Importe Mensual</b>   </td>
                          <td></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Ene/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Feb/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Mar/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Abr/2018</td>
                          <td class="text-right">78,00</td>
                          <td></td>
                        </tr>










                        <tr class='success'>
                          <td>
                            <a class="btn btn-app">                          
                              <i class="fa  fa-minus-square"></i>
                            </a>
                          </td>
                          <td>2.</td>
                          <td>220545</td>
                          <td colspan="2">Juan Perez Perez</td>
                          
                          <td class="text-right">120,50</td>
                          <td  style="width: 95px">
                                                  
                            <a class="btn btn-app">
                              <span class="badge bg-red">4</span>
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center"><b>Vencimiento</b></td>
                          <td class="text-right"><b>Importe Mensual</b>   </td>
                          <td></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Ene/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Feb/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Mar/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Abr/2018</td>
                          <td class="text-right">78,00</td>
                          <td></td>
                        </tr>





                        <tr class='success'>
                          <td>
                            <a class="btn btn-app">                          
                              <i class="fa  fa-minus-square"></i>
                            </a>
                          </td>
                          <td>3.</td>
                          <td>2000021</td>
                          <td colspan="2">Juan Perez Perez</td>
                          
                          <td class="text-right">120,50</td>
                          <td  style="width: 95px">
                                                  
                            <a class="btn btn-app">
                              <span class="badge bg-red">4</span>
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center"><b>Vencimiento</b></td>
                          <td class="text-right"><b>Importe Mensual</b>   </td>
                          <td></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Ene/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Feb/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Mar/2018</td>
                          <td class="text-right">78,00</td>
                          <td><span class="badge bg-red">Vencido</span></td>
                        </tr>
                        <tr class="info">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center">Abr/2018</td>
                          <td class="text-right">78,00</td>
                          <td></td>
                        </tr>






                     
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b><u>Importe Total a Pagar </u><b></td>
                        <td class="text-right"><b><u>350,00</u><b></td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
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
                <dt class='text-light-blue'>Codigo Usuario:</dt>
                <dd>10203040</dd>
                <dt class='text-light-blue'>Codigo Ubicación:</dt>
                <dd>018.005.272.001</dd> 
                <dt class='text-light-blue'>Nombres y Apellidos:</dt>
                <dd>Juan Perez Perez</dd>  
              </dl>         
            </div>
            <div class='col-md-6'>
              <dl class="dl-horizontal">
                <dt class='text-light-blue'>Categoria:</dt>
                <dd>Domicilio</dd>
                <dt class='text-light-blue'>Serie Medidor:</dt>
                <dd>130000005156</dd>   
                <dt class='text-light-blue'>Dirección:</dt>
                <dd>Ayacucho entre heroinas y junin</dd>
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




