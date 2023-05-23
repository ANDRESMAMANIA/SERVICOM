<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Registro de usuario</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
                  <li class="breadcrumb-item active">USUARIOS</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">

               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                  AGREGAR USUARIO
               </button>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Registro y modificación de usuarios</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table class="table table-bordered table-striped tablas dt-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>NOMBRE</th>
                              <th>USUARIOS</th>
                              <th>FOTO</th>
                              <th>PERFIL</th>
                              <th>ESTADO</th>
                              <th>ULTIMO LOGIN</th>
                              <th>ACCIONES</th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php

                           $item = null;
                           $valor = null;

                           $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                           foreach ($usuarios as $key => $value) {

                              echo ' <tr>
      <td>' . ($key + 1) . '</td>
      <td>' . mb_strtoupper($value["nombre"]) . '</td>
      <td>' . $value["usuario"] . '</td>';

                              if ($value["foto"] != "") {

                                 echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                              } else {

                                 echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                              }

                              echo '<td>' . $value["perfil"] . '</td>';

                              if ($value["estado"] != 0) {

                                 echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                              } else {

                                 echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                              }

                              echo '<td>' . $value["ultimo_login"] . '</td>
      <td>

        <div class="btn-group">

          <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

          <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '"fotoUsuario="' . $value["foto"] . '"usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

        </div>  

      </td>

    </tr>';
                           }


                           ?>

                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="modalEditarUsuario">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" method="post" enctype="multipart/form-data">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header">
               <h4 class="modal-title">Editar usuario</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

               <div class="box-body">

                  <!-- ENTRADA PARA EL NOMBRE -->

                  <div class="form-group">

                     <div class="input-group">

                        <div class="input-group-append">
                           <div class="input-group-text">
                              <span class="fas fa-user"></span>
                           </div>
                        </div>
                        <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                     </div>

                  </div>

                  <!-- ENTRADA PARA EL USUARIO -->


                  <div class="form-group">

                     <div class="input-group">

                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="fas fa-user-circle"></i>
                           </div>
                        </div>
                        <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                     </div>

                  </div>

                  <!-- ENTRADA PARA LA CONTRASEÑA -->

                  <div class="form-group">

                     <div class="input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="fa fa-lock"></i>
                           </div>
                        </div>

                        <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                        <input type="hidden" id="passwordActual" name="passwordActual">

                     </div>

                  </div>

                  <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                  <div class="form-group">

                     <div class="input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="fa fa-users"></i>
                           </div>
                        </div>

                        <select class="form-control input-lg" name="editarPerfil">

                           <option value="" id="editarPerfil"></option>

                           <option value="Secretaria">Secretaria</option>
                           <option value="Encargado">Encargado</option>
                           <option value="Tecnico">Tecnico</option>
                           <option value="Limpiesa">Limpiesa</option>

                        </select>

                     </div>

                  </div>

                  <!-- ENTRADA PARA SUBIR FOTO -->

                  <div class="form-group">

                     <div class="panel">SUBIR FOTO</div>

                     <input type="file" class="nuevaFoto" name="editarFoto">

                     <p class="help-block">Peso máximo de la foto 2MB</p>

                     <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                     <input type="hidden" name="fotoActual" id="fotoActual">

                  </div>

               </div>

            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->




            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Modificar usuario</button>

            </div>

            <?php

            $editarUsuario = new ControladorUsuarios();
            $editarUsuario->ctrEditarUsuario();

            ?>

         </form>

      </div>

   </div>

</div>

<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();
?>






<!-- Agregar modal usuario -->
<div class="modal fade" id="modalAgregarUsuario">
   <div class="modal-dialog">
      <div class="modal-content">

         <form role="form" method="post" enctype="multipart/form-data">
            <!--=================================================
               =                  CABEZA DEL MODA                  =
               ==================================================-->
            <div class="modal-header">

               <h5 class="modal-title">AGREGAR USUARIO</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <!--=================================================
               =                  CUERPO DEL MODA                  =
               ==================================================-->

            <div class="modal-body">

               <!-- Entrega para el nombre -->
               <div class="form-group">
                  <div class="input-group">

                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                     <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required>


                  </div>
               </div>

               <!-- Entrega para el usuario -->
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class=" fas fa-user-circle"></i>
                        </div>
                     </div>
                     <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                  </div>
               </div>
               <!-- Entrega para el password -->
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="fa fa-lock"></i>
                        </div>
                     </div>
                     <input type="password" class="form-control" name="nuevoPassword" placeholder="INGRESAR CONTRASEÑA" id="nuevoPassword" required>
                  </div>
               </div>

               <!-- Entrega  para el perfil de usuario-->
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="fa fa-users"></i>
                        </div>
                     </div>
                     <select class="form-control" name="nuevoPerfil">
                        <option value="">Seleccionar perfil</option>
                        <option value="Secretaria">Secretaria</option>
                        <option value="Encargado">Encargado</option>
                        <option value="Tecnico">Tecnico</option>
                        <option value="Limpiesa">Limpiesa</option>
                     </select>
                  </div>
               </div>

               <div class="form-group">
                  <div for="panel"> SUBIR FOTOS </div>
                  <input type="file" class="nuevaFoto" name="nuevaFoto">
                  <p class="help-block">Peso máximo de la foto 2MB</p>
                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
               </div>



               <!--=================================================
            =                   PIE DEL MODAL                   =
            ==================================================-->
               <div class="modal-footer">

                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary">Guardar usuario</button>

               </div>

               <?php
               $crearUsuario = new ControladorUsuarios();
               $crearUsuario->ctrCrearUsuario();
               ?>

         </form>
      </div>
   </div>

</div>