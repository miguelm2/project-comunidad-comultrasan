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

<body class="g-sidenav-show bg-gray-200 align-content-center d-flex justify-content-center">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius container">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_user.php'; ?>
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
                        <button type="button" class="btn btn-primary btn-sm" id="like" <?= $disabledButton ?>>
                           <?= $textbutton ?>
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
                        <textarea name="comentario" class="form-control border p-1" placeholder="Esciba su comentario...." id="publicacionForo" rows="4" maxlength="500" required></textarea>
                        <small>Caracteres restantes: <span id="contadorPublicacion">500</span></small>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newForumComment" class="btn btn-info"><i class="material-icons me-2">chat</i> Enviar</button>
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
   <script src="/system/assets/js/material-dashboard.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/viewPassword.js"></script>
   <script src="/system/js/functions.js"></script>
   <script src="/system/js/like.js"></script>
   <script src="/system/js/caracteres/caracteres_comentario.js"></script>
   <?= $response ?>
</body>

</html>