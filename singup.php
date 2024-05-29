<!doctype html>
<html lang="en">

<head>
    <title>Unete</title>
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
    <section class="ftco-section" id="unete">
        <div class="container">
            <div class="text-center section-header pb-4">
                <h2>¡Unete a nuestra comunidad!</h2>
                <p style="color: black;">
                    Unete a nuestra comunidad, en la cual podras encontras muchos Beneficios. <br>
                    Rellena este formulario y alguien se pondrá en contacto contigo para que pertenescas a
                    la comunidad de Comultrasan
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8 mx-auto">
                    <div class="wrap d-md-flex">
                        <div class="img order-sm-2">
                            <img src="assets/image/unete.webp" alt="" style="max-height: 600px;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <a href="index" class="logo d-flex align-items-center">
                                        <img src="/assets/image/logo_principal.png" alt="Logo" style="max-width: 300px;">
                                    </a>
                                    <br><br>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <form action="#" class="signin-form">
                                    <div class="form-group mb-4">
                                        <label class="label" for="name"> <i class="bi bi-person-bounding-box"></i> Nombre</label>
                                        <input type="text" class="form-control" placeholder="Nombre" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="label" for="mail"> <i class="bi bi-envelope-at"></i> Correo</label>
                                        <input type="email" class="form-control" placeholder="Correo" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="label" for="cellphone"> <i class="bi bi-telephone"></i> Celular</label>
                                        <input type="number" class="form-control" placeholder="Celular" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="city"> <i class="bi bi-geo-alt"></i> Ciudad</label>
                                        <input type="text" class="form-control" placeholder="Ciudad" required>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="text-center">
                                            <br>
                                            <a href="index" style="color:black; font-size: 17px;">Volver a inicio <i class="bi bi-arrow-return-left"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <button type="submit" class="form-control btn btn-success rounded submit px-3"> <i class="bi bi-send"></i> Enviar</button>
                                    </div>
                                    
                                </form>
                            </div>
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