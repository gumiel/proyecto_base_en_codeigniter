<?php if ($this->session->flashdata('message')): ?>
	
	<?php if ( isset($this->session->flashdata('message')["error"]) ): ?>
			
		<div class="alert alert-danger alert-dismissible notifyDanger" role="alert" style="display: none">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong class="notifyDangerTitle">Error!</strong> 
		  <span class="notifyDangerMessage"><?php echo $this->session->flashdata('message')["error"]; ?></span>
		</div>
	
	<?php endif ?>

	<?php if ( isset($this->session->flashdata('message')["success"]) ): ?>
			
		<div class="alert alert-success alert-dismissible notifySuccess" role="alert" style="display: none">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong class="notifySuccessTitle">Correcto!</strong> 
		  <span class="notifySuccessMessage">	<?php echo $this->session->flashdata('message')["success"]; ?></span>
		</div>
	
	<?php endif ?>	

	<?php if ( isset($this->session->flashdata('message')["warning"]) ): ?>
			
		<div class="alert alert-warning alert-dismissible notifyWarning" role="alert" style="display: none">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong class="notifyWarningTitle">Correcto!</strong> 
		  <span class="notifyWarningMessage">	<?php echo $this->session->flashdata('message')["warning"]; ?></span>
		</div>
	
	<?php endif ?>	

<?php endif ?>