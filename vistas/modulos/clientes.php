<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Registro de Cliente</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
                  <li class="breadcrumb-item active">CLIENTES</li>
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

               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClientes">
                  Registro Cliente
               </button>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">DataTable with default features</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table class="table table-bordered table-striped tablas dt-responsive">


                        <thead>
                           <tr>
                              <th>#</th>
                              <th>C.I</th>
                              <th>NOMBRE</th>
                              <th>APELLIDO</th>
                              <th>EMAIL</th>
                              <th>ESTADO</th>
                              <th>FECHA</th>
                              <th>ACCION</th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php

                           $item = null;
                           $valor = null;

                           $clientes = ControladorClientes::ctrMostrarCliente($item, $valor);

                           foreach ($clientes as $key => $value) {

                              echo ' <tr>
                                 <td>' . ($key + 1) . '</td>
                                 <td>' . $value["ci"] . '</td>
                                 <td>' . mb_strtoupper($value["nombre"]) . '</td>
                                 <td>' . mb_strtoupper($value["apellido"]) . '</td>
                                 <td>' . $value["email"] . '</td>';


                              if ($value["estado"] != 0) {

                                 echo '<td><button class="btn btn-success btn-xs btnActivar" idCi="' . $value["id_cliente"] . '" estadoCliente="0">Activado</button></td>';
                              } else {

                                 echo '<td><button class="btn btn-danger btn-xs btnActivar" idCi="' . $value["id_cliente"] . '" estadoCliente="1">Desactivado</button></td>';
                              }
                              echo '<td>' . $value["fecha_registro"] . '</td>
      <td>

         <div class="btn-group">

            <button class="btn btn-warning btnEditarCliente" idCi="' . $value["id_cliente"] . '" data-toggle="modal" data-target="#modalEditarCliente"><i class="fas fa-pencil-alt"></i></button>

            <button class="btn btn-danger btnEliminarCliente" idCi="' . $value["id_cliente"] . '"><i class="fa fa-times"></i></button>
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

<div class="modal fade" id="modalEditarCliente">

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
                        <strong>Celula de identidad</strong>
                     </div>
                     <div class=" input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="far fa-id-badge"></i>
                           </div>
                        </div>
                        <div class=" col-5">
                           <input type="number" class="form-control input-lg" id="editarCiCliente" name="editarCiCliente"  value="" readonly>
                        </div>
                     </div>
                  </div>



                  <!-- ENTRADA PARA EL NOMBRE -->

                  <div class="form-group">

                     <div class="input-group">
                        <strong>NOMBRE Y APELLIDO</strong>
                     </div>
                     <div class="input-group">
                        <div class="input-group-append">
                           <div class="input-group-text ">
                              <span class="fas fa-user"></span>
                           </div>
                        </div>
                        <input type="text" class="form-control input-lg" id="editarNombreCliente" name="editarNombreCliente" value="" required>
                        <input type="text" " class=" form-control input-lg" id="editarApellidoCliente" name="editarApellidoCliente" value="" required>
                     </div>
                  </div>


                  <!-- Entrega de Email -->
                  <div class="form-group">
                     <div class="input-group">
                        <strong>CORREO ELECTRONICO</strong>
                     </div>
                     <div class="input-group">
                        <div class="input-group-append">
                           <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                           </div>
                        </div>

                        <input type="email" class="form-control" name="editarEmailCliente" id="editarEmailCliente">
                     </div>
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

            $editarUsuario = new ControladorClientes();
            $editarUsuario->ctrEditarCliente();

            ?>

         </form>

      </div>

   </div>

</div>

<?php
$borrarUsuario = new ControladorClientes();
$borrarUsuario->ctrBorrarClientes();
?>







<!-- Agregar modal Cliente -->
<div class="modal fade" id="modalAgregarClientes">
   <div class="modal-dialog">
      <div class="modal-content">

         <form role="form" method="post" enctype="multipart/form-data">
            <!--=================================================
               =                  CABEZA DEL MODA                  =
               ==================================================-->
            <div class="modal-header">

               <h5 class="modal-title">AGREGAR CLIENTE</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <!--=================================================
               =                  CUERPO DEL MODA                  =
               ==================================================-->

            <div class="modal-body">


               <!-- Entrega de ci celula de identidad -->
               <div class="form-group">
                  <div class="input-group">
                     <strong>Celula de identidad</strong>
                  </div>
                  <div class=" input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="far fa-id-badge"></i>
                        </div>
                     </div>
                     <div class=" col-5">
                        <input type="number" class="form-control" name="nuevoCi" placeholder="Ingresar C.I" id="nuevoCi" required>
                     </div>
                  </div>
               </div>


               <!-- Entrega para el nombre -->
               <div class="form-group">

                  <div class="input-group">
                     <strong>NOMBRE Y APELLIDO</strong>
                  </div>
                  <div class="input-group">
                     <div class="input-group-append">
                        <div class="input-group-text ">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                     <input type="text" class="form-control text-uppercase" name="nombreCliente" placeholder="INGRESAR NOMBRE" id="nombreCliente" required>
                     <input type="text" class="form-control text-uppercase" name="apellidoCliente" placeholder="INGRESAR APELLIDO" id="apellidoCliente" required>
                  </div>
               </div>

               <!-- Entrega de Email -->
               <div class="form-group">
                  <div class="input-group">
                     <strong>CORREO ELECTRONICO</strong>
                  </div>
                  <div class="input-group">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="fas fa-envelope"></i>
                        </div>
                     </div>

                     <input type="email" class="form-control" name="nuevoEmail" placeholder="Ingresar Correo Electronico" id="nuevoEmail" required>
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
               $crearCliente = new ControladorClientes();
               $crearCliente->ctrCrearCliente();
               ?>

         </form>
      </div>
   </div>

</div>