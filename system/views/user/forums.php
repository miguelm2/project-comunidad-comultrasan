<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
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
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius">
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="groupsInterest" class="text-white">Grupos de Interés</a></li>
                  <li class="breadcrumb-item"><a href="groupInterest?groupInterest=<?= $_GET['comunnityForum'] ?>" class="text-white">Grupo de Interés</a></li>
                  <li class="breadcrumb-item active">Foro</a></li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header --></div>
      </nav><!-- End Page Title -->
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        Foro
                     </h5>
                  </div>
                  <div class="col-md-2">
                     <div class="text-right">
                        <a type="button" class="btn btn-secondary" href="groupInterest?groupInterest=<?= $_GET['comunnityForum'] ?>">
                           <i class="material-icons me-2">keyboard_return</i>atrás
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="p-3">
               <?= $buttonNewForum ?>
            </div>
            <div class="card mb-4">
               <div class="row">
                  <?= $tableForumGroupInterest ?>
               </div>
            </div>
         </div>
         <!-- ======= Basic Modal ======= -->
         <form id="uploadForm" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="newForo" tabindex="-1">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Nuevo Foro</h5>
                        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <div class="row g-3">
                           <div class="col-md-12 form-group">
                              <label for="titulo">Título</label>
                              <input type="text" class="form-control border p-1" name="titulo" placeholder="Título" maxlength="255" required>
                           </div>
                           <div class="col-md-12 form-group">
                              <label for="contenido">Contenido</label>
                              <textarea name="contenido" id="contenido" class="form-control border p-1" rows="4" placeholder="Contenido" required></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                        <button type="submit" name="newForum" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo Foro</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <!--Final Basic Modal-->
      </div>
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
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/viewPassword.js"></script>
   <script src="/system/js/functions.js"></script>
   <?= $response ?>
</body>

</html>