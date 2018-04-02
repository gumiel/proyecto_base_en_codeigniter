<?php 
$this->templateci->setTitlePage("Lista de Permisos");
$this->templateci->setDescriptionPage("Lista de Permisos");

$this->templateci->addJs("public/usuario/listaUsuarios.js");
 ?>

<?php $this->load->view('template/up'); ?>


    <section class="content text-right">
      <div class="btn-group">
        <button type="button" class="btn btn-info" id="btnCreate"><i class="glyphicon glyphicon-plus"></i> Crear</button>
      </div>      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Buscador</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-10">
            <?php echo form_input_ci('Usuario', 'usuarion[usuario]', '', ["id"=>"usuarion[usuario]"]); ?>            
          </div>
          <div class="col-md-2">
            <button class="btn btn-success">Buscar</button>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Pemisos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombre de Permiso</th>
                <th>Rutas</th>                
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($permisos as $permiso): ?>
                <tr>
                  <td><?php echo $permiso["nombre_permiso"]; ?></td>
                  <td><?php echo $permiso["nombre_ruta"] ?></td>                  
                  <td>
                    <a href="#" class="btn btn-info btnEditar" data-id="<?php echo $usuario["id_usuario"] ?>">Editar</a>
                    <a href="#" class="btn btn-info btnEliminar" data-id="<?php echo $usuario["id_usuario"] ?>">Eliminar</a>
                  </td>
                </tr>                
              <?php endforeach ?>
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
  



  <div class="modal fade" id="create">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/createUsuario', ["id"=>"formCreate"]); ?>

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Crear Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', "",["class"=> "nombre"]); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', '', ["class"=> "paterno"]); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', '', ["class"=> "materno"]); ?>
              
              <?php echo form_input_ci("Usuario", 'usuario[usuario]', '', ["class"=> "usuario"]); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', "", ["classd"=> "email"]); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', '', ["class"=> "ci"]); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', '', ["class"=> "password"]); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', '', ["class"=> "password"]); ?>

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
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', "",["class"=> "nombre"]); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', '', ["class"=> "paterno"]); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', '', ["class"=> "materno"]); ?>
              
              <?php echo form_input_ci("Usuario", 'usuario[usuario]', '', ["class"=> "usuario"]); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', "", ["class"=> "email"]); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', '', ["class"=> "ci"]); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', '', ["class"=> "password"]); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', '', ["class"=> "password"]); ?>

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