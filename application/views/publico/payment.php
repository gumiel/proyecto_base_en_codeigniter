<?php 
$this->templateci->setTitlePage("Pagos");
$this->templateci->setDescriptionPage("Pagos");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>
  
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
                <div class='col-md-10'>
                  <?php echo form_input_ci('Id Usuario:', 'usuario[]', 'value'); ?> 
                </div>
                <div class='col-md-2'>
                  <button class="btn" >Buscar</button>
                </div>
              </div>
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              It has survived not only five centuries, but also the leap into electronic typesetting,
              remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
              sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
              like Aldus PageMaker including versions of Lorem Ipsum.
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
  
<?php $this->load->view('template/down'); ?>




