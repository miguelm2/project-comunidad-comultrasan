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
                  <li class="breadcrumb-item"><a href="groupInterest?groupInterest=<?= $foroDTO->getTipoComunidadDTO()->getId_tipo_comunidad() ?>" class="text-white">Grupo de Interés</a></li>
                  <li class="breadcrumb-item"><a href="forums?comunnityForum=<?= $foroDTO->getTipoComunidadDTO()->getId_tipo_comunidad() ?>" class="text-white">Foro</a></li>
                  <li class="breadcrumb-item active">Ver Foro</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <!-- End Page Title -->
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        <?= $foroDTO->getTitulo() ?>
                     </h5>
                  </div>
                  <div class="col-md-2">
                     <div class="text-right">
                        <a type="button" class="btn btn-secondary" href="forums?comunnityForum=<?= $foroDTO->getTipoComunidadDTO()->getId_tipo_comunidad() ?>">
                           <i class="material-icons me-2">keyboard_return</i>atrás
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body">
               <div class="card border-2">
                  <div class="card-head mt-4 ms-2">
                     <div class="row">
                        <div class="col-md-7">
                           <h4>
                              <?= $foroDTO->getTitulo() ?>
                           </h4>
                        </div>
                        <div class="col-md-5">
                           <div class="row">
                              <div class="col-md-12">
                                 <small>
                                    <i class="material-icons me-2">schedule</i>Publicado: <strong><?= $tiempo ?></strong>
                                 </small>
                              </div>
                              <div>
                                 <small>
                                    <i class="material-icons me-2">person</i>Por: <strong><?= $foroDTO->getUsuarioDTO()->getNombre() ?></strong>
                                 </small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <?= $foroDTO->getContenido() ?>
                     <div class="mt-4">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#newForumComment" <?= $disabledButton ?>>
                           <i class="material-icons me-2">chat</i>(<?= $contadorComment ?>) Comentar
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" <?= $disabledButton ?>>
                           <i class="material-icons me-2">favorite</i>(0) <?= $textbutton ?>
                        </button>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         <div class="mt-3">
            <h5><?= $contadorComment ?> comentarios</h5>
            <?= $comentarioForum ?>
         </div>
      </div>

      <!-- ======= Basic Modal ======= -->
      <form method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newForumComment" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Comentar</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="comentario">Comentario</label>
                        <textarea name="comentario" class="form-control border p-1" placeholder="Esciba su comentario...." rows="4" required></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newForumComment" class="btn btn-info"><i class="material-icons me-2">chat</i> Comentar</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->

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
   <script src="/system/js/viewPassword.js"></script>
   <script src="/system/js/functions.js"></script>
   <?= $response ?>
</body>

</html>