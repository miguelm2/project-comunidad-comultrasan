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
                  <li class="breadcrumb-item text-sm"><a class="opcaity-5 text-dark" href="groups">Grupos</a></li>
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editar Grupo</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="card">
         <div class="card-head">
            <div class="col-10 m-4">
               <h4>
                  Editar Grupo
               </h4>
            </div>
         </div>
         <div class="card-body">
            <div>
               <div class="row">
                  <div class="col-md-3 text-center d-flex mx-auto mb-4">
                     <img src="../assets/img/bg-smart-home-2.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-9">
                     <form action="" method="post" class="row g-3">
                        <div class="row">
                           <div class="mb-3">
                              <div class="ms-md-auto pe-md-3 d-flex col-12">
                                 <div class="input-group input-group-outline">
                                    <label class="form-label">Nombre del grupo</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <div class="ms-md-auto pe-md-3 d-flex col-12">
                                 <div class="input-group input-group-outline">
                                    <select class="form-control">
                                       <option selected>Seleccione un líder</option>
                                       <option value="1">Lider 1</option>
                                       <option value="2">Líder 2</option>
                                       <option value="3">Líder 3</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="mb-3">
                              <div class="ms-md-auto pe-md-3 d-flex col-12">
                                 <div class="input-group input-group-outline">
                                    <label class="form-label">Fecha de registro</label>
                                    <input type="text" class="form-control" disabled>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="row ">
                     <button type="submit" class="col-6 btn btn-success">Editar Registro</button>
                     <button type="button" class="col-6 btn btn-info">Cambiar imagen</button>
                  </div>
               </div>

            </div>
         </div>
      </div>
      <div class="card mt-4">
         <div class="card-head">
            <div class="row">
               <div class="col-8 m-4">
                  <h4>
                     Usuarios en el grupo
                  </h4>
               </div>
               <div class="col-3 m-2">
                  <button class="btn btn-success">Agregar Usuario</button>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div>
               <table class="table">
                  <thead class="text-center">
                     <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Celular</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Correo</th>
                     <th>Celular</th>
                  </tfoot>
                  <tbody class="text-center">
                     <tr>
                        <td>1</td>
                        <td>Juan</td>
                        <td>juan@example.com</td>
                        <td>1234567890</td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>María</td>
                        <td>maria@example.com</td>
                        <td>9876543210</td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>Carlos</td>
                        <td>carlos@example.com</td>
                        <td>5555555555</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
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

   <!-- Github buttons -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>