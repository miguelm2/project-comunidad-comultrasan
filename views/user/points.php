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
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item "><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                  <li class="breadcrumb-item  text-dark active" aria-current="page">Puntos</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="card">
         <div class="row mt-2 mp-2">
            <div class="col-10 m-4">
               <div class="card-head">
                  <h3>Historial de Puntos</h3>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-bordered">
               <table class="table">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Puntos
                        </th>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Descripción
                        </th>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Fecha de cargo
                        </th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Puntos
                        </th>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Descripción
                        </th>
                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                           Fecha de cargo
                        </th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <tr>
                        <td>
                           <div>
                              <h6>10</h6>
                           </div>
                        </td>
                        <td class="align-middle text-center">
                           <span class=" font-weight-bold">Restados</span>
                        </td>
                        <td>
                           <div>
                              <h6>2024/08/08</h6>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div>
                              <h6>4</h6>
                           </div>
                        </td>
                        <td class="align-middle text-center">
                           <span class=" font-weight-bold">Sumados</span>
                        </td>
                        <td>
                           <div>
                              <h6>2024/08/08</h6>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div>
                              <h6>3</h6>
                           </div>
                        </td>
                        <td class="align-middle text-center">
                           <span class=" font-weight-bold">Sumados</span>
                        </td>
                        <td>
                           <div>
                              <h6>2024/08/08</h6>
                           </div>
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
   </main>
   <!--   Core JS Files   -->
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>