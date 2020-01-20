<?php 
$this->templateci->setTitlePage("Usuarios");
$this->templateci->setDescriptionPage("Usuarios");

$this->templateci->addJs("public/nucleo/NucUsuario/index.js?data=".date('YmdHis'));
 ?>

<?php $this->load->view('template/up'); ?>
    





    <?php echo buttons_open("ctnBotonera") ?>

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
      <button type="button" class="btn btn-default btn-sm text-center" id="btnAsignarRol"> 
          <i class="glyphicon glyphicon-list"></i> <br>Asignar Roles
      </button>

    <?php echo buttons_close() ?>






    <!-- Main content -->
    <?php echo section_open("ctnBuscador", "Buscador"); ?>

      <?php echo form_open_multipart_ci('', ["id"=>"formBuscador"]); ?>
        <div class="col-md-4">
          <?php echo form_dropdown_ci('Buscar' , 'usuario[label]', [ ''=>'Seleccione', 'email'=>'Email', 'cuenta'=>'Cuenta']); ?>
        </div>
        <div class="col-md-6">
          <?php echo form_input_ci(false, 'usuario[text]', '', ["id"=>"usuarion[usuario]"]); ?>
        </div>
        <div class="col-md-2">
          <button class="btn btn-success">Buscar</button>
        </div>
      <?php echo form_close(); ?>

  <?php echo section_close(); ?>









  <?php echo section_open("ctnTabla", "Lista de Usuarios"); ?>

    <table id="tblUsuario" class="table table-striped table-bordered" style="width:100%">
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

  <?php echo section_close(); ?>
          















    <div class="modal fade" id="modalCrearUsuario">
      <div class="modal-dialog">
        <div class="modal-content">
          <?php echo form_open_multipart_ci('usuario/createUsuario', ["id"=>"formCrearUsuario"]); ?>

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Crear Usuario</h4>
          </div>
          <div class="modal-body">
          
              <div class="box-body">
              
                <?php echo form_input_ci("Cuenta", "usuario[cuenta]", ""); ?>

                <?php echo form_input_ci("Email", "usuario[email]", ""); ?>              

                <?php echo form_password_ci("Contraseña", "usuario[clave]", ""); ?>

                <?php echo form_password_ci("Repetir Contraseña", "usuario[rep_clave]", ""); ?>

              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalEditarUsuario">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/editUsuario', ['id'=>'formEditarUsuario']); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">

              <?php echo form_input_ci("Cuenta", 'usuario[cuenta]', ''); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', ""); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[clave]', '', [ 'id'=>'clave']); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_clave]', ''); ?>
              
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



  <div class="modal fade" id="modalAsignarRol" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
          <h4 class="modal-title">Asignar Roles</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <p>
                <a href="#" class="btn btn-info" id="actualizarUsuarioRol">
                  <span class="glyphicon glyphicon-refresh"></span> Actualizar
                </a>
              </p>
                <table id="tblListRol" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th data-priority="1" width="15"></th>
                      <th data-priority="2" ></th>                                
                      <th data-priority="3" >Rol</th>                      
                      <th data-priority="4" >Descripcion</th>                                
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              <div>
                
              </div>

            </div>

        </div>
      </div>
    </div>
  </div>




    






    

    
  






  
<?php $this->load->view('template/down'); ?>
