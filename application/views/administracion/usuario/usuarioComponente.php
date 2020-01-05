<?php 
$this->templateci->setTitlePage("Lista de Usuarios");
$this->templateci->setDescriptionPage("Lista de Usuarios");

$this->templateci->addJs("public/administracion/js/UsuarioComponente.js?data=".date('YmdHis'));
 ?>

<?php $this->load->view('template/up'); ?>
    

    <div class="container-fluid" id="ctnBotonera"  >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-left">
                        <div class="btn-group" role="group" aria-label="...">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 






    <div class="container-fluid" id="ctnTabla">        
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="panel panel-primary">
                  <div class="panel-body">
                      <table id="tblActor" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th data-priority="1" width="15"></th>
                                  <th data-priority="2">Email</th>
                                  <th data-priority="3">Cuenta</th>
                                  <th data-priority="4">Fecha creación</th>
                                  <th data-priority="5">Fecha modificación</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div><!-- /.container -->





    <section class="content text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-info" id="btnCreate"><i class="glyphicon glyphicon-plus"></i><br>Crear</button>
        <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-file"></i><br>PDF</button>
        <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-file"></i><br>EXCEL</button>
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

    <section class="content" id="ctnUsuarios">


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

          <table id="tblUsuarios" class="table table-striped table-hover">
            <thead>
              <tr>                
                <th>Email</th>
                <th>Cuenta</th>                
                <th>Fecha creación</th>                
                <th>Fecha modifición</th>                
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
  






  
<?php $this->load->view('template/down'); ?>
