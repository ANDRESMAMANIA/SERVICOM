



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
                           <i class="fa-solid fa-key"></i>
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
                        <option value="Administrador">Administrador</option>
                        <option value="Vendedor">Vendedor</option>
                        <option value="Encargador de compras">Especial</option>
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

               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Editar usuario</h4>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

               <div class="box-body">

                  <!-- ENTRADA PARA EL NOMBRE -->

                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                     </div>

                  </div>

                  <!-- ENTRADA PARA EL USUARIO -->


                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                     </div>

                  </div>

                  <!-- ENTRADA PARA LA CONTRASEÑA -->

                  <div class="form-group">

                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                        <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                        <input type="hidden" id="passwordActual" name="passwordActual">

                     </div>

                  </div>

                  <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control input-lg" name="editarPerfil">

                           <option value="" id="editarPerfil"></option>

                           <option value="Administrador">Administrador</option>

                           <option value="Especial">Especial</option>

                           <option value="Vendedor">Vendedor</option>

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