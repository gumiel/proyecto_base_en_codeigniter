<?php 
$this->templateci->setTitlePage("Perfil");
$this->templateci->setDescriptionPage("Perfil");

$this->templateci->addJs("public/nucleo/NucUsuario/perfil.js?data=".date('YmdHis'));
 ?>

<?php $this->load->view('template/up'); ?>

	<!-- Main content -->	  
	<?php echo section_open("ctnBuscador", "Datos del usuario"); ?>

		<?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEditarUsuario']); ?>
			<div class="col-md-6">
			    
	              
                <?php echo form_input_ci("Cuenta", "usuario[cuenta]", $cuenta); ?>

                <?php echo form_input_ci("Email", "usuario[email]", $email); ?>              

                <?php echo form_password_ci("Contraseña", "usuario[clave]", ""); ?>

                <?php echo form_password_ci("Repetir Contraseña", "usuario[rep_clave]", ""); ?>

	             <button type="submit" class="btn btn-primary">Guardar</button>

			</div>
		<?php echo form_close(); ?>
	<?php echo section_close(); ?>


<?php $this->load->view('template/down'); ?>
