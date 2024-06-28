<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aplicacion Web - Kondory Tecnologia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <?php include '../../assets/html/header.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include '../../assets/html/sidebar-user.php'; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">


        <section class="section dashboard">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Clientes</h5>
                            </div>
                            <div class="col-md-3 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newClient"><i class="bi bi-journal-plus"></i> Nuevo Cliente</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Identificación</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Departamento</th>
                                        <th>Ciudad</th>
                                        <th>Estado</th>
                                        <th>Fecha de registro</th>
                                        <th width="65px">Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>#</th>
                                        <th>Nombre</th>
                                        <th>Identificación</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Departamento</th>
                                        <th>Ciudad</th>
                                        <th>Estado</th>
                                        <th>Fecha de registro</th>
                                        <th width="65px">Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?= $tablaClientesUsuario; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>



        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="POST">
            <div class="modal fade" id="newClient" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Numero de identificacion</label>
                                    <input type="text" name="identificacion" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Correo electronico</label>
                                    <input type="mail" name="correo" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Departamento</label>
                                    <input type="text" name="departamento" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ciudad</label>
                                    <input type="text" name="ciudad" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="newCliente" class="btn btn-success"><i class="bi bi-journal-plus"></i> Nuevo Cliente</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="POST">
            <div class="modal fade" id="updateCliente" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="hidden" name="id_cliente" class="form-control id_cliente" readonly>

                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Numero de identificacion</label>
                                    <input type="text" name="identificacion" id="identificacion" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Correo electronico</label>
                                    <input type="mail" name="correo" id="correo" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Telefono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Departamento</label>
                                    <input type="text" name="departamento" id="departamento" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="nombre">Estado</label>
                                    <select class="form-select" name="estado" id="estado" required>
                                        <option value="" hidden>Seleccione una opción</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="setCliente" class="btn btn-success"><i class="bi bi-journal-plus"></i> Actualizar Cliente</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="post">
            <div class="modal fade" id="deleteCliente" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="nombre">¿Esta seguro que desea eliminar este Cliente?</label>
                                </div>
                                <input type="hidden" name="id_cliente" class="form-control id_cliente">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="deleteCliente" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Cliente</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->




    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once '../../assets/html/footer.html'; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>

    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="../../js/page/client.js"></script>
      <script src="../../assets/vendor/swal/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>