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
   </main>
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