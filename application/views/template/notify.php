<?php if ($this->session->flashdata('message')): ?>
	
	<?php if ( isset($this->session->flashdata('message')["error"]) ): ?>
			
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Error!</strong> <?php echo $this->session->flashdata('message')["error"]; ?>
		</div>
	
	<?php endif ?>

	<?php if ( isset($this->session->flashdata('message')["success"]) ): ?>
			
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>Correcto!</strong> <?php echo $this->session->flashdata('message')["success"]; ?>
		</div>
	
	<?php endif ?>	

<?php endif ?>