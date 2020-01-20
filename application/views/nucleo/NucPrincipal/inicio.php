<?php 
$this->templateci->setTitlePage("Inicio");
$this->templateci->setDescriptionPage("Paguina de inicio");

 ?>
<?php $this->load->view('template/up'); ?>    
    
  <!-- Main content -->
  <section class="content">


    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Titualo</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        Para crear una copia automatica de bd ingresar aqui <?php echo anchor('/mod_control_panel/CpAdminBackup/index', 'Crear BD', ''); ?>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Pie
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
  
<?php $this->load->view('template/down'); ?>
