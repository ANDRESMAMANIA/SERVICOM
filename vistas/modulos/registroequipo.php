<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>REGISTRO DE EQUIPOS</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="inicio">INICIO</a></li>
                  <li class="breadcrumb-item active">REGISTRO EQUIPOS</li>
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
                  REGISTRAR EQUIPOS
               </button>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Registro y modificación de usuarios</h3>
                  </div>
                  <!-- /.card-header -->

                  //crear enlace que conecte con 3 bases de datos


                  <div class="card-body">
                     <table class="table table-bordered table-striped tablas dt-responsive">


                        <thead>
                           <tr>
                              <th>#</th>
                              <th>FOTO</th>
                              <th>DESCRIPCION</th>
                              <th>MARCA</th>
                              <th>TIPO EQUIPO</th>
                              <th>ESTADO EQUIPO</th>
                              <th>CLIENTE</th>
                              <th>PERFIL</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $item = null;
                           $valor = null;

                           // Obtener la lista de usuarios utilizando el controlador "ControladorUsuarios"
                           $usuarios = ControladorIngresoEquipo::ctrMostrarIngresoEquipos($item, $valor);

                           // Recorrer la lista de usuarios y mostrar los detalles de cada usuario en una tabla
                           foreach ($usuarios as $key => $value) {

                              echo ' <tr>
      <td>' . ($key + 1) . '</td>
      <td>' . mb_strtoupper($value["nombre"]) . '</td>
      <td>' . mb_strtoupper($value["apellido"]) . '</td>
      <td>' . ($value["telefono"]) . '</td>
      <td>' . $value["usuario"] . '</td>';

                              // Verificar si el usuario tiene una foto asignada
                              if ($value["foto"] != "") {

                                 echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                              } else {

                                 echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                              }

                              echo '<td>' . $value["perfil"] . '<td>
        <div class="btn-group">
          <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id_usuario"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
          <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id_usuario"] . '"fotoUsuario="' . $value["foto"] . '"usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>
        </div>  
      </td>
    </tr>';
                           }
                           ?>
                        </tbody>
                     </table>

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