<!doctype html>
<html lang="en">

<head>
    <title>Ingresar</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/image/favicon_0.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
    <!-- Start Header -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
    <!-- End Header -->
    <section class="ftco-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index#index">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ingresar</li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <img src="assets/image/login.webp" class="img-fluid">
                    <p class="mt-3">
                        La Comunidad Familia Comultrasan representa el reconocimiento de
                        Financiera Comultrasan para honrar la lealtad y el compromiso de sus
                        asociados y sus familias. <br>
                        A través de un programa integral, ofrece beneficios y experiencias
                        inolvidables que buscan mejorar la calidad de vida y fortalecer los lazos
                        comunitarios, promoviendo el desarrollo social y el bienestar
                        económico.
                    </p>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="wrap d-md-flex ">
                        <div class="login-wrap p-1 p-md-2 bg-secondary rounded-3">
                            <form action="#" class="signin-form">
                                <div class="text-center section-header pb-1 text-black">
                                    <h5>Ingresa aquí</h5>
                                </div>
                                <div class="row p-1 text-black">
                                    <div class="col-4">
                                        <div class="form-group mb-4">
                                            <label class="label" for="name"> <i class="bi bi-person-workspace"></i> Usuario</label>
                                            <input type="text" class="form-control" placeholder="Usuario" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-4">
                                            <label class="label" for="password"> <i class="bi bi-pass"></i> Contraseña</label>
                                            <input type="password" class="form-control" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="from-control">
                                            <label for="ingresar"></label>
                                            <button type="submit" class="form-control btn btn-success rounded submit px-3" name="ingresar">
                                                <i class="bi bi-box-arrow-in-right"></i> Ingresar</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <p>
                                                <a href="forget_pass" style="color:black;">¿Haz olvidado tu contraseña?</a> |
                                                <a href="singup">Registrarse</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div style="border: 2px solid #006567; padding: 10px;" class="rounded-5 mt-4 m-5 p-3 bg-secondary">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-box" data-aos="fade-up" data-aos-delay="10">
                                    <div style="font-size: 45px; color: #006567;">
                                        <i class="bi bi-currency-exchange"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 rounded-5 text-center" style="border: 2px solid #006567;">
                                <strong>
                                    <a href="index#beneficios" style="color: #58A228; font-size:25px;">Conoce aquí tus beneficios</a>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <div class="row m-4">
                            <a href="/views/admin/" class="btn btn-primary mb-2">Ingresar como administrador</a>
                            <a href="/views/gestor/" class="btn btn-secondary mb-2">Ingresar como gestor</a>
                            <a href="/views/user/" class="btn btn-info mb-2">Ingresar como usuario</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Footer -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>