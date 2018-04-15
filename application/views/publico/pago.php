<?php 
$this->templateci->setTitlePage("Lista de Usuarios");
$this->templateci->setDescriptionPage("Lista de Usuarios");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>


  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Formulario</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            
            <h5>Examples of "form_ci_helper" implementation </h5>

            <?php echo form_open_ci('url', ''); ?>

              <?php echo form_input_ci('Field Input Text', 'nameField', 'value of field'); ?>

              <?php echo form_upload_ci('Field Input Upload file', 'nameFieldUploadFile'); ?>
        
              <?php echo form_dropdown_ci('Field DropDown', 'nameDropdown', [ ''=>'Select', '1'=>'value1','2'=>'value2','3'=>'value3' ], 3); ?>

              <?php echo form_textarea_ci('Field Text Area', 'nameTextArea', 'It is field a text area', 'attributs'); ?>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Group CheckBox</label>
                <div class="col-sm-10">
                  <?php echo form_checkbox_ci('Field Check Box 1', 'nameCheckBox', 'box1', true); ?>
                  <?php echo form_checkbox_ci('Field Check Box 2', 'nameCheckBox', 'box2', false); ?>
                  <?php echo form_checkbox_ci('Field Check Box 3', 'nameCheckBox', 'box3', true); ?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Group CheckBox</label>
                <div class="col-sm-10">
                  <?php echo form_radio_ci('Field Radio Button 1' , 'nameRadio1', 'radio1', FALSE) ?>
                  <?php echo form_radio_ci('Field Radio Button 2' , 'nameRadio1', 'radio2', true) ?>
                  <?php echo form_radio_ci('Field Radio Button 3' , 'nameRadio1', 'radio3', FALSE) ?>            
                </div>
              </div>

              <?php echo form_submit_ci('nameButtonSubmit', 'Button Submit'); ?>

              <?php echo form_reset_ci('nameButtonReset', 'Button Reset'); ?>

              <?php echo form_button_ci('nameButton', 'Only Button'); ?>

            <?php echo form_close_ci(); ?>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php $this->load->view('template/down'); ?>




