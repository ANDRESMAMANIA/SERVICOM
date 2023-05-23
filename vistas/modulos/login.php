<div class="hold-transition login-page">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
         <div class="card-header text-center">
            <a class="h1"><b>Servi</b>COM</a>
         </div>
         <div class="card-body">
            <p class="login-box-msg">INICIAR SESIÓN</p>

            <form method="post">
               <div class="input-group mb-3">
                  <div class="input-group">
                     <strong>USUARIO</strong>
                  </div>
                  <input type="text" class="form-control" placeholder="Ingresar Usuario" name="ingUsuario" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group">
                     <strong>CONTRASEÑA</strong>
                  </div>
                  <input type="password" class="form-control" placeholder="Ingresar Password" name="ingPassword" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- /.col -->
                  <div class="col-4">
                     <button type="submit" class=" btn btn-primary btn-block ">INICIAR</button>
                  </div>
                  <!-- /.col -->
               </div>

               <?php

               $login = new ControladorUsuarios();
               $login->ctrIngresoUsuario();

               ?>
            </form>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.login-box -->
</div>