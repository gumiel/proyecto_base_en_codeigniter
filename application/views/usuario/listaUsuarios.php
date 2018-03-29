<?php $this->load->view('template/up'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php $this->load->view('template/notify'); ?>
    
    
    
    <?php $this->load->view('template/breadcrumb'); ?>

    <!-- Main content -->
    <section class="content">


      <!-- Default box -->
      <div class="box">
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

          <a class="btn btn-primary" href='#' id="btnCreate">Crear</a>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombres y Apellidos</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>CI</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($usuarios as $usuario): ?>
                <tr>
                  <td><?php echo $usuario["nombres"].' '.$usuario["paterno"].' '.$usuario["materno"] ?></td>
                  <td><?php echo $usuario["email"] ?></td>
                  <td><?php echo $usuario["usuario"] ?></td>
                  <td><?php echo $usuario["ci"] ?></td>
                  <td>
                    <a href="#" class="btn btn-default btnEditar" data-id="<?php echo $usuario["id_usuario"] ?>">Editar</a>
                    <a href="#" class="btn btn-default" data-id="<?php echo $usuario["id_usuario"] ?>">Eliminar</a>
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
  </div>
  <!-- /.content-wrapper -->



  <div class="modal fade" id="create">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open_multipart_ci('usuario/createUsuario'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Crear Usuario</h4>
        </div>
        <div class="modal-body">
        
            <div class="box-body">
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', "",["id"=> "nombre"]); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', '', ["id"=> "paterno"]); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', '', ["id"=> "materno"]); ?>
              
              <?php echo form_input_ci("Usuario", 'usuario[usuario]', '', ["id"=> "usuario"]); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', "", ["id"=> "email"]); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', '', ["id"=> "ci"]); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', '', ["id"=> "password"]); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', '', ["id"=> "password"]); ?>

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
              <?php echo form_input_ci("Nombres", 'usuario[nombres]', "",["id"=> "nombre"]); ?>
              
              <?php echo form_input_ci("Apellido Paterno", 'usuario[paterno]', '', ["id"=> "paterno"]); ?>
              
              <?php echo form_input_ci("Apellido Materno", 'usuario[materno]', '', ["id"=> "materno"]); ?>
              
              <?php echo form_input_ci("Usuario", 'usuario[usuario]', '', ["id"=> "usuario"]); ?>

              <?php echo form_input_ci("Email", 'usuario[email]', "", ["id"=> "email"]); ?>

              <?php echo form_input_ci("CI", 'usuario[ci]', '', ["id"=> "ci"]); ?>

              <?php echo form_password_ci("Contraseña", 'usuario[password]', '', ["id"=> "password"]); ?>

              <?php echo form_password_ci("Repetir Contraseña", 'usuario[rep_password]', '', ["id"=> "password"]); ?>

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
<script type="text/javascript">
  
  jQuery(document).ready(function($) 
  {
  
    $("#btnCreate").click(function(event) {
      $("#create").modal("show");
    });
  
    $(".btnEditar").click(function()
    {

      var id_usuario = $(this).data("id");
      var form = $("#formEdit");
      form.trigger('reset')
      form.find("input[name='usuario[id_usuario]']").val("");

      $.ajax({
        url: '<?=site_url("usuario/getUsuarioAjax")?>',
        type: 'POST',
        dataType: 'json',
        data: {"usuario[id_usuario]": id_usuario},
      })
      .done(function(data) {

        form.find("input[name='usuario[nombres]']").val(data.usuario.nombres);
        form.find("input[name='usuario[paterno]']").val(data.usuario.paterno);
        form.find("input[name='usuario[materno]']").val(data.usuario.materno);
        form.find("input[name='usuario[usuario]']").val(data.usuario.usuario);
        form.find("input[name='usuario[email]']").val(data.usuario.email);
        form.find("input[name='usuario[ci]']").val(data.usuario.ci);
        form.find("input[name='usuario[id_usuario]']").val(data.usuario.id_usuario);

        $("#modalEdit").modal("show");

      });
      

    });

  });

</script>
