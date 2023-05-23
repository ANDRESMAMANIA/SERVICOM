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
                  <li class="breadcrumb-item active">MATERIALES</li>
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

               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaterial">
                  AGREGAR MATERIALES
               </button>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Registro y modificación de materiales</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table class="table table-bordered table-striped tablas dt-responsive">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>DETALLE</th>
                              <th>CANTIDAD</th>
                              <th>PRECIO</th>


                           </tr>
                        </thead>
                        <tbody>
                           <?php

                           $item = null;
                           $valor = null;

                           $materiales = ControladorMateriales::ctrMostrarMaterial($item, $valor);

                           foreach ($materiales as $key => $value) {

                              echo ' <tr>
      <td>' . ($key + 1) . '</td>
      <td>' . $value["descripcion"] . '</td>
      <td>' . $value["cantidad"] . '</td>
      <td>' . $value["precio"] . '</td>';

                              echo '<td>

<div class="btn-group">

<button class="btn btn-warning btnEditarMaterial" idDescripcion="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarMaterial"><i class="fas fa-pencil-alt"></i></button>

<button class="btn btn-danger btnEliminarMaterial" idDescripcion="' . $value["id"] . '"><i class="fa fa-times"></i></button>
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
MODAL EDITAR CLIENTES
======================================-->

<div class="modal fade" id="modalEditarMaterial">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" method="post" enctype="multipart/form-data">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header">
               <h4 class="modal-title">Editar Cliente</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

               <div class="box-body">

                  <div class="form-group">

                     <div class="input-group">
                        <strong>DETALLAR DESCRIPCION DEL PRODUCTO</strong>
                     </div>
                     <div class="input-group">
                        <textarea class="form-control" name="editarDescripciondMaterial" id="editarDescripciondMaterial" value="" required></textarea>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="input-group">
                        <strong>DIGITAR LA CANTIDAD DE UNIDAD</strong>
                     </div>
                     <div class=" input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="far fa-id-badge"></i>
                           </div>
                        </div>
                        <div class=" col-5">
                           <input type="number" class="form-control" name="editarCantidadMaterial" id="editarCantidadMaterial" value="" required>
                        </div>
                     </div>
                  </div>


                  <div class="form-group">
                     <div class="input-group">
                        <strong>DIGITAR EL PRECIO DEL PRODUCTO</strong>
                     </div>
                     <div class=" input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="fas fa-money-bill-wave"></i>
                           </div>
                        </div>
                        <div class=" col-5">
                           <input type="number" class="form-control" name="editarPrecioMaterial" id="editarPrecioMaterial" value="" required>
                        </div>
                     </div>
                  </div>

               </div>

            </div>

            <!--=====================================
        PIE DEL MODAL
        ======================================-->




            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Modificar material</button>

            </div>

            <?php

            $editarUsuario = new ControladorMateriales();
            $editarUsuario->ctrEditarMaterial();

            ?>

         </form>

      </div>

   </div>

</div>

<?php
$borrarUsuario = new ControladorMateriales();
$borrarUsuario->ctrBorrarMaterial();
?>







<!-- Agregar modal Cliente -->
<div class="modal fade" id="modalAgregarMaterial">
   <div class="modal-dialog">
      <div class="modal-content">

         <form role="form" method="post" enctype="multipart/form-data">
            <!--=================================================
               =                  CABEZA DEL MODA                  =
               ==================================================-->
            <div class="modal-header">

               <h5 class="modal-title">AGREGAR MATERIAL</h5>
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
                     <strong>DETALLAR DESCRIPCION DEL PRODUCTO</strong>
                  </div>
                  <div class="input-group">
                     <textarea class="form-control" name="nuevoDescripciondMaterial" placeholder="Enter...." id="nuevaDescripcionMaterial" required></textarea>
                  </div>
               </div>

               <div class="form-group">
                  <div class="input-group">
                     <strong>DIGITAR LA CANTIDAD DE UNIDAD</strong>
                  </div>
                  <div class=" input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="far fa-id-badge"></i>
                        </div>
                     </div>
                     <div class=" col-5">
                        <input type="number" class="form-control" name="nuevaCantidadMaterial" placeholder="Enter...." id="nuevaCantidadMaterial" required>
                     </div>
                  </div>
               </div>


               <div class="form-group">
                  <div class="input-group">
                     <strong>DIGITAR EL PRECIO DEL DEL PRODUCTO</strong>
                  </div>
                  <div class=" input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="fas fa-money-bill-wave"></i>
                        </div>
                     </div>
                     <div class=" col-5">
                        <input type="number" class="form-control" name="nuevoPrecioMaterial" placeholder="Enter..." id="nuevoPrecioMaterial" required>
                     </div>
                  </div>
               </div>


               <!--=================================================
            =                   PIE DEL MODAL                   =
            ==================================================-->
               <div class="modal-footer">

                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                  <button type="submit" class="btn btn-primary">Guardar Cliente</button>

               </div>

               <?php
               $crearMaterial = new ControladorMateriales();
               $crearMaterial->ctrCrearMaterial();
               ?>

         </form>
      </div>
   </div>

</div>