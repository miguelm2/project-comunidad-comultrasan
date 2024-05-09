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
         <div class="card-head">
            <div class="col-10 m-4">
               <h4>
                  Editar Comunidad
               </h4>
            </div>
         </div>
         <div class="card-body">
            <div>
               <div class="row">
                  <div class="col-md-3 text-center d-flex mx-auto m-4">
                     <img src="../assets/img/bg-smart-home-1.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-9">
                     <form action="" method="post" class="row g-3">
                        <div class="row">
                           <div class="mb-3">
                              <div class="ms-md-auto pe-md-3 d-flex col-12">
                                 <div class="input-group input-group-outline">
                                    <label class="form-label">Nombre comunidad</label>
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
                     Usuarios en la comunidad
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
                        <th>Grupo</th>
                        <th>Líder</th>
                        <th>Cantidad de usuarios</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Líder</th>
                        <th>Cantidad de usuarios</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <tr>
                        <td>1</td>
                        <td>Grupo A</td>
                        <td>Líder 1</td>
                        <td>23</td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>Grupo B</td>
                        <td>Líder 2</td>
                        <td>17</td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>Grupo C</td>
                        <td>Líder 3</td>
                        <td>35</td>
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

   <!-- Github buttons -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>