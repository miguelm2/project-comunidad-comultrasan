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
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="groupsInterest">Grupos de Interés</a></li>
                  <li class="breadcrumb-item"><a href="forums?communityForums=<?= $_GET['comunnityForum'] ?>">Foro</a></li>
                  <li class="breadcrumb-item active">Nuevo Foro</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Nuevo Foro
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="forums?communityForums=<?= $_GET['comunnityForum'] ?>">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body pt-0">
               <form method="post">
                  <div class="row g-3">
                     <div class="col-md-12 form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control border p-1" name="titulo" placeholder="Título" maxlength="255" required>
                     </div>
                     <div class="col-md-12 form-group">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" id="texto_foro" class="form-control border p-1" rows="4">Escriba contenido para el foro</textarea>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" name="newForum" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo Foro</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
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
   <script src="/system/js/CkEditor/confCkeditor_foro.js"></script>
   <?= $response ?>
</body>

</html>