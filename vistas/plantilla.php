<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>ServiCom</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
   <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="vistas/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="vistas/plugins/datatables.net-bs/css/responsive.bootstrap.min.css">


   <!-- sweetalert2 -->
   <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>



   <!-- Font Awesome iconos -->
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/solid.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/brands.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/fontawesome.css">


   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/js/all.min.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/js/solid.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/js/all.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/js/brands.css">
   <link rel="stylesheet" href="vistas/plugins/fontawesome-free/js/fontawesome.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">





   <!-- DataTables -->
   <!-- <script src="vistas/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
   <script src="vistas/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

   <script src="vistas/plugins/datatables.net-bs/js/dataTables.responsive.min.js"></script>
   <script src="vistas/plugins/datatables.net-bs/js/responsive.bootstrap.min.js"></script> -->







   <!-- jQuery -->
   <script src="vistas/plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="vistas/plugins/chart.js/Chart.min.js"></script>
   <!-- Sparkline -->
   <script src="vistas/plugins/sparklines/sparkline.js"></script>
   <!-- JQVMap -->
   <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
   <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="vistas/plugins/moment/moment.min.js"></script>
   <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="vistas/dist/js/adminlte.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="vistas/dist/js/demo.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="vistas/dist/js/pages/dashboard.js"></script>






   <!-- DataTables  & Plugins -->
   <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <!-- sweetalert2 -->
   <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>


   <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="vistas/plugins/jszip/jszip.min.js"></script>
   <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
   <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
   <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition sidebar-mini">


   <?php
   if (isset($_SESSION['IniciarSesion']) && $_SESSION['IniciarSesion'] == "ok") {
      echo '<div class="wrapper">';
      include "modulos/cabezote.php";
      include "modulos/menu.php";

      if (isset($_GET["ruta"])) {
         $ruta = $_GET["ruta"]; // Almacenar la ruta en una variable para evitar repetición de código

         // Utilizar la estructura switch en lugar de múltiples if para una mejor legibilidad
         switch ($ruta) {
            case "inicio":
            case "usuarios":
            case "clientes":
               include "modulos/" . $ruta . ".php";
               break;

            case "ingresoequipo":
            case "marca":
            case "tipoequipo":
               include "modulos/equipos/" . $ruta . ".php";
               break;

            case "repuesto":
            case "repuestoventa":
               include "modulos/repuestos/" . $ruta . ".php";
               break;

            case "servicio":
            case "servicioventa":
               include "modulos/servicios/" . $ruta . ".php";
               break;

            case "salir":
               // Manejar "salir" de manera diferente si es necesario
               // Puedes agregar el código correspondiente aquí
               break;

            default:
               include "modulos/404.php";
               break;
         }
      } else {
         include "modulos/inicio.php";
      }

      echo '</div>';
   } else {
      include "modulos/login.php";
   }
   ?>


   <!-- ./wrapper -->

   <script src="vistas/js/plantilla.js"></script>
   <script src="vistas/js/usuario.js"></script>
   <script src="vistas/js/cliente.js"></script>
   <script src="vistas/js/material.js"></script>
</body>

</html>