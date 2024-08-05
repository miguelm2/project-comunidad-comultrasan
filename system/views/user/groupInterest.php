<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
   <!-- Nucleo Icons -->
   <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
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
      <div class="pagetitle p-1 mt-2 mp-0">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item"><a href="groupsInterest">Grupos de Interés</a></li>
               <li class="breadcrumb-item active">Grupo <?= $groupInterest->getTitulo() ?></li>
            </ol>
         </nav>
      </div><!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Grupo <?= $groupInterest->getTitulo() ?>
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="groupsInterest">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <form method="post">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card border-3">
                           <div class="card-header mp-0">
                              <h5 class="text-success"><i class="material-icons me-2">library_books</i><?= $groupInterest->getTitulo() ?></h5>
                           </div>
                           <div class="card-body pt-0">
                              <h6 class="card-text text-success">Descripción sobre el grupo</h6>
                              <p class="card-text text-black">
                                 <?= $groupInterest->getContenido() ?>
                              </p>
                              <div class="text-end">
                                 <form method="post">
                                    <button name="newUserGroupInterest" class="btn btn-success">¡Unirme Ahora!</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-2">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Foro de <?= $groupInterest->getTitulo() ?>
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newForo">
                        <i class="material-icons me-2">add</i> Nuevo Foro
                     </button>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-bod">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Título</th>
                           <th class="text-uppercase font-weight-bolder">Creado por</th>
                           <th class="text-uppercase font-weight-bolder">Me gusta</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </thead>
                     <tfoot class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Título</th>
                           <th class="text-uppercase font-weight-bolder">Creado por</th>
                           <th class="text-uppercase font-weight-bolder">Me gusta</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $tableForumGroupInterest ?>
                     </tbody>
                  </table>
               </div>
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
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
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
   <script src="/system/js/selectRepeat.js"></script>
   <?= $response ?>
</body>

</html>