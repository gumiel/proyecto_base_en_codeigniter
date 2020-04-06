<?php 
$this->templateci->setTitlePage("Perfil");
$this->templateci->setDescriptionPage("Perfil");

$this->templateci->addJs("public/nucleo/NucUsuario/perfil.js?data=".date('YmdHis'));
 ?>

<?php $this->load->view('template/up'); ?>

	<!-- Main content -->	
	<div class="col-md-6">  
		<?php echo section_open("ctnBuscador", "Cambiar datos del usuario"); ?>
			<?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEditarUsuario']); ?>
				<?php echo form_input_ci("Cuenta", "usuario[cuenta]", $cuenta); ?>
				<?php echo form_input_ci("Email", "usuario[email]", $email); ?>              
				<button type="button" class="btn btn-primary">Guardar</button>
			<?php echo form_close(); ?>
		<?php echo section_close(); ?>
	</div>

	<!-- Main content -->	
	<div class="col-md-6">  
		<?php echo section_open("ctnBuscador", "Cambiar contraseña"); ?>
			<?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEditarUsuario']); ?>                
				<?php echo form_password_ci("Nueva contraseña", 'usuario[clave]', '', [ 'id'=>'clave']); ?>
				<?php echo form_password_ci("Repetir nueva contraseña", 'usuario[rep_clave]', ''); ?>             
				<button type="button" class="btn btn-primary">Guardar</button>
			<?php echo form_close(); ?>
		<?php echo section_close(); ?>
	</div>









	<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEdit']); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', ""); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', ''); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', ''); ?>
              
              <?php echo form_input_ci("Cuenta", 'usuario[cuenta]', ''); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', ""); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', ''); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', ''); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', ''); ?>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <?php echo form_hidden('usuario[id_usuario]', ''); ?>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>


<?php $this->load->view('template/down'); ?>
