<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../../assets/image/favicon_0.ico">
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <!-- Nucleo Icons -->
   <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
   <!-- CSS Files -->
   <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Usuarios</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="card">
         <div class="row mt-2 mp-2">
            <div class="col-8 m-4">
               <div class="card-head">
                  <h3>Usuarios</h3>
               </div>
            </div>
            <div class="col-3 m-2">
               <div class="card-head text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                  <a type="button" class="btn btn-success" href="newUser">Agregar Usuarios</a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table align-items-center mb-0">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                           ID</th>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                           Nombre</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Correo</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Teléfono</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Estado</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                           ID</th>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                           Nombre</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Correo</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Teléfono</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Estado</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <tr>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">1</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Usuario 1</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">usuario1@mail.com</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">1234567890</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Activo</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" onclick="confirmDelete(event)">
                              <i class="material-icons text-sm me-2">delete</i>Eliminar
                           </a>
                           <a class="btn btn-link text-dark px-3 mb-0" href="editUser">
                              <i class="material-icons text-sm me-2">edit</i>Editar
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">2</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Usuario 2</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">usuario2@mail.com</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">1234567890</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Activo</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" onclick="confirmDelete(event)">
                              <i class="material-icons text-sm me-2">delete</i>Eliminar
                           </a>
                           <a class="btn btn-link text-dark px-3 mb-0" href="editUser">
                              <i class="material-icons text-sm me-2">edit</i>Editar
                           </a>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">3</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Usuario 3</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">usuario3@mail.com</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">1234567890</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 text-sm">Activo</h6>
                              </div>
                           </div>
                        </td>
                        <td>
                           <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" onclick="confirmDelete(event)">
                              <i class="material-icons text-sm me-2">delete</i>Eliminar
                           </a>
                           <a class="btn btn-link text-dark px-3 mb-0" href="editUser">
                              <i class="material-icons text-sm me-2">edit</i>Editar
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- Modal Eliminar Registro-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="eliminar" tabindex="-1">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Eliminar Registro</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                     <button type="submit" name="deleteEmployee" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- Start footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/footer_admin.php'; ?>
      <!-- End fooeter -->
   </main>
   <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
         <i class="material-icons py-2">settings</i>
      </a>
      <div class="card shadow-lg">
         <div class="card-header pb-0 pt-3">
            <div class="float-start">
               <h5 class="mt-3 mb-0">Material UI Configurator</h5>
               <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
               <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                  <i class="material-icons">clear</i>
               </button>
            </div>
            <!-- End Toggle Button -->
         </div>
         <hr class="horizontal dark my-1">
         <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
               <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
               <div class="badge-colors my-2 text-start">
                  <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
               </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
               <h6 class="mb-0">Sidenav Type</h6>
               <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
               <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
               <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
               <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
               <h6 class="mb-0">Navbar Fixed</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
               </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
               <h6 class="mb-0">Light / Dark</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--   Core JS Files   -->
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/chartjs.min.js"></script>
   <!-- Control ../Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>