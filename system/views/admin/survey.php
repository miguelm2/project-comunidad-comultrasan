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
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.snow.css">
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.bubble.css">
   <link rel="stylesheet" href="/system/assets/vendor/simple-datatables/style.css">
   <link rel="stylesheet" href="/system/assets/vendor/datatables/dataTables.bootstrap4.min.css">
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
                        Editar Encuesta
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="surveys">
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
                           <label class="form-label" for="nombre">Nombre</label>
                           <input type="text" class="form-control border p-1" name="nombre" value="<?= $survey->getNombre() ?>" maxlength="255" required>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label" for="puntos">Puntos</label>
                           <input type="number" class="form-control border p-1" name="puntos" value="<?= $survey->getPuntos() ?>" required>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label" for="estado">Estado</label>
                           <select name="estado" id="estado" class="form-select border p-1">
                              <option value="<?= $survey->getEstado()[0] ?>"><?= $survey->getEstado()[1] ?></option>
                              <option value="0">Inactivo</option>
                              <option value="1">Activo</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="descripcion">Descripción</label>
                           <textarea name="descripcion" id="descripcion" class="form-control border p-1" rows="4" maxlength="255" required><?= $survey->getDescripcion() ?></textarea>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="mensaje">Mensaje</label>
                           <textarea name="mensaje" id="mensaje" class="form-control border p-1" rows="4" maxlength="255" required><?= $survey->getMensaje() ?></textarea>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="col-md-6 d-grid mt-4">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                           <i class="material-icons me-2">delete</i> Eliminar Registro</button>
                     </div>
                     <div class="col-md-6 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="setSurvey">
                           <i class="material-icons me-2">save</i> Guardar Información
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-9">
                     <h5 class="text-success">
                        Preguntas
                     </h5>
                  </div>
                  <div class="col-md-3 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newQuestion">
                           <i class="material-icons me-2">add</i> Agregar Pregunta
                        </button>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-bordered table-hover align-items-center mb-0" id="tableQuestionSurvey">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">
                              ID</th>
                           <th class="text-uppercase font-weight-bolder">
                              Pregunta</th>
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
                              Pregunta</th>
                           <th class="text-uppercase font-weight-bolder">
                              Estado</th>
                           <th class="text-uppercase font-weight-bolder">
                              Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $tableSurveyQuestion ?>
                     </tbody>
                  </table>
               </div>
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
                     <h5 class="modal-title">Eliminar Encuesta</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteSurvey" class="btn btn-danger"><i class="material-icons me-2">delete</i> Eliminar Encuesta</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newQuestion" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Nueva Pregunta</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-md-12 form-group">
                           <label for="pregunta">Pregunta</label>
                           <input type="text" class="form-control border p-1" name="pregunta" placeholder="Pregunta" maxlength="255" required>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="tipo_pregunta">Tipo de pregunta</label>
                           <select name="tipo_pregunta" id="tipo_pregunta" class="form-select border p-1">
                              <option value="">Seleccione una opción</option>
                              <option value="1">Opción Múltiple</option>
                              <option value="2">Respuesta Abierta</option>
                              <option value="3">Múltiples Respuestas</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newSurveyQuestion" class="btn btn-success"><i class="material-icons me-2">add</i> Guardar Pregunta</button>
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
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/selectRepeat.js"></script>
   <script src="/system/assets/vendor/quill/quill.core.js"></script>
   <script src="/system/assets/vendor/quill/quill.min.js"></script>
   <script src="/system/assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="/system/assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/system/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="/system/js/demo/datatables-demo.js"></script>
   <?= $response ?>
</body>

</html>