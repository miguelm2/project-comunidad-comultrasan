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
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
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
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.snow.css">
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.bubble.css">
   <link rel="stylesheet" href="/system/assets/vendor/simple-datatables/style.css">
   <link rel="stylesheet" href="/system/assets/vendor/datatables/dataTables.bootstrap4.min.css">
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <div class="card mt-2">
         <div class="row m-0">
            <div class="col-md-8 m-4">
               <div class="card-head">
                  <h4 class="text-success">Encuestas</h4>
               </div>
            </div>
            <div class="col-md-3 m-2 mt-3">
               <div class="card-head text-right">
                  <!--<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newBenefit">
                     <i class="material-icons me-2">add</i> Agregar Encuesta
                  </button>-->
               </div>
            </div>
         </div>
         <div class="card-body m-0">
            <div class="table-responsive">
               <table class="table table-bordered table-hover align-items-center mb-0" id="tableSurvey">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           ID</th>
                        <th class="text-uppercase font-weight-bolder">
                           Nombre</th>
                        <th class="text-uppercase font-weight-bolder">
                           Corazones</th>
                        <th class="text-uppercase font-weight-bolder">
                           Estado</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           ID</th>
                        <th class="text-uppercase font-weight-bolder">
                           Actividad</th>
                        <th class="text-uppercase font-weight-bolder">
                           Corazones</th>
                        <th class="text-uppercase font-weight-bolder">
                           Estado</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <?= $tableSurvey ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newBenefit" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Nueva Encuesta</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-md-12 form-group">
                           <label for="nombre">Nombre <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" class="form-control border p-1" name="nombre" placeholder="Nombre" maxlength="255" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="puntos">Corazones</label>
                           <input type="number" class="form-control border p-1" name="puntos" placeholder="Corazones" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="descripcion">Descripción <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <textarea name="descripcion" id="descripcion" rows="4" required class="form-control border p-1" maxlength="255" placeholder="Agrege una descripción"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="mensaje">Mensaje <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <textarea name="mensaje" id="mensaje" rows="4" required class="form-control border p-1" maxlength="255" placeholder="Coloque un mensaje motivacional"></textarea>
                        </div>
                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newSurvey" class="btn btn-success"><i class="material-icons me-2">add</i> Guardar Encuesta</button>
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
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!--   Core JS Files   -->
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control ../Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/assets/vendor/quill/quill.core.js"></script>
   <script src="/system/assets/vendor/quill/quill.min.js"></script>
   <script src="/system/assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="/system/assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/system/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="/system/js/demo/datatables-demo.js"></script>
   <?= $response ?>
</body>

</html>