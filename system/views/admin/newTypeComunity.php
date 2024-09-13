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
   <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
   <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <div class="card mt-2">
         <div class="row">
            <div class="col-md-9 mt-4 m-4">
               <div class="card-head">
                  <h4 class="text-success">Nuevo Tipo de comunidad</h4>
               </div>
            </div>
            <div class="col-md-2 mt-4">
               <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                  <a type="button" class="btn btn-secondary" href="typeComunities">
                     <i class="material-icons me-2">keyboard_return</i>atrás</a>
               </div>
            </div>
         </div>
         <div class="dark horizontal my-0 border-1 m-3"></div>
         <div class="card-body mt-0 m-0">
            <form method="post" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                        <label class="form-label" for="titulo">Título <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                        <input type="text" class="form-control border p-1" name="titulo" maxlength="255" required>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <label class="form-label" for="icono">Icono <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                        <input type="text" class="form-control border p-1" name="icono" maxlength="255" required>
                     </div>
                  </div>
                  <div class="col-md-12 form-group">
                     <label for="imageTypeComunity">Imagen <small class="text-secondary">(png, jpeg, jpg, gif)</small></label>
                     <input type="file" class="form-control border p-1" name="imageTypeComunity" accept="image/*" required>
                     <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <label class="form-label" for="subtitulo">Subtítulo <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                        <input type="text" class="form-control border p-1" name="subtitulo" maxlength="255" required>
                     </div>
                  </div>
                  <div class="col-md-12 mt-3">
                     <label for="contendio">Contenido <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 800)</small></label>
                     <textarea name="contenido" id="texto" class="form-control border p-1" rows="5" maxlength="800"></textarea>
                  </div>
                  <div>
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                  </div>
                  <div class="dark horizontal my-0 border-1 mt-3"></div>
                  <div class="col-md-12 d-grid mt-4">
                     <button type="submit" class="btn btn-success" name="newTypeComunity">
                        <i class="material-icons me-2">edit</i> Guardar Tipo
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->

      <!--Final Basic Modal-->
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
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
   <!-- Ck Editor -->
   <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration"></script>
   <script src="https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html"></script>
   <script src=" https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html"></script>


   <!-- Uncomment to load the Spanish translation -->
   <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/translations/es.js"></script>
   <script src="/system/js/CkEditor/confCkeditor.js"></script>
   <script src="/system/js/valideImage.js"></script>
   <?= $response ?>
</body>

</html>