<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <!-- Nucleo Icons -->
   <link href="/system/assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="/system/assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
   <!-- CSS Files -->
   <link id="pagestyle" href="/system/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
   <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
   <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="pagetitle p-1 mt-2 mp-0">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item active">Tipos de comunidades</li>
            </ol>
         </nav>
      </div>
      <div class="card">
         <div class="row m-0">
            <div class="col-md-9 m-4">
               <div class="card-head">
                  <h4 class="text-success">Tipos de comunidades</h4>
               </div>
            </div>
            <div class="col-md-2 m-2 mt-3">
               <div class="card-head text-right">
                  <a class="btn btn-success" href="newTypeComunity">
                     <i class="material-icons me-2">add</i>Agregar Tipo</a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover table-bordered align-items-center mb-0" id="">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           ID</th>
                        <th class="text-uppercase font-weight-bolder">
                           Título</th>
                        <th class="text-uppercase font-weight-bolder">
                           Icono</th>
                        <th class="text-uppercase font-weight-bolder">
                           Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           ID</th>
                        <th class="text-uppercase font-weight-bolder">
                           Título</th>
                        <th class="text-uppercase font-weight-bolder">
                           Icono</th>
                        <th class="text-uppercase font-weight-bolder">
                           Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <?= $tableTypeComnuties ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newQuestion" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Nuevo Tipo Comunidad</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-md-6 form-group">
                           <label for="titulo">Título</label>
                           <input type="text" class="form-control border p-1" name="titulo" required>
                        </div>
                        <div class="col-md-6 form-group">
                           <label for="icono">Icono</label>
                           <input type="text" class="form-control border p-1" name="icono" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="subtitulo">Subtítulo</label>
                           <input type="text" class="form-control border p-1" name="subtitulo" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="imageTypeComunity">Imagen</label>
                           <input type="file" class="form-control border p-1" name="imageTypeComunity" accept="image/*" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="contenido">Contenido</label>
                           <textarea name="contenido" id="contenido" class="form-control border p-1" rows="5" placeholder="Escribe el contenido aqui" required></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newTypeComunity" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo tipo comunidad</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
   <!--   Core JS Files   -->
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="/system/js/demo/datatables-demo.js"></script>
   <?= $response ?>
</body>

</html>