<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
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
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius">
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav><!-- End Page Title -->
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Editar Tipo de Comunidad
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="typeComunities">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <form method="post">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <label class="form-label" for="titulo">Título <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" class="form-control border p-1" name="titulo" value="<?= $foroDTO->getTitulo() ?>" maxlength="255" required>
                        </div>
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="contendio">Contenido <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 1500)</small></label>
                        <textarea name="contenido" id="texto_foro" class="form-control border p-1" rows="5" required maxlength="1500"><?= html_entity_decode($foroDTO->getContenido()) ?></textarea>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="col-md-6 d-grid mt-4">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                           <i class="material-icons me-2">delete</i> Eliminar Registro</button>
                     </div>
                     <div class="col-md-6 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="editForum">
                           <i class="material-icons me-2">save</i> Guardar Información
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="card mt-3">
            <div class="row m-0">
               <div class="col-md-9 mt-3">
                  <div class="card-head">
                     <h4 class="text-success">Comentarios</h4>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover table-bordered align-items-center mb-0" id="tableTypeCommunity">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Usuario</th>
                           <th class="text-uppercase font-weight-bolder">Comentario</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </thead>
                     <tfoot class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Usuario</th>
                           <th class="text-uppercase font-weight-bolder">Comentario</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody class="text-center">
                        <?= $tableForumComment ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- Modal Eliminar Registro-->
         <!-- ======= Basic Modal ======= -->
         <form method="post">
            <div class="modal fade" id="eliminar" tabindex="-1">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Eliminar Foro</h5>
                        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <label class="form-label">¿Esta seguro que desea eliminar el foro?</label>
                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                        <button type="submit" name="deleteForum" class="btn btn-danger"><i class="material-icons me-2">delete</i> Eliminar Foro</button>
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
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>

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