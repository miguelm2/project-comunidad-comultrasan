<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="icon" href="assets/image/favicon_0.ico">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

    <!-- Start Header -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
    <!-- End Header -->

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">¿Olvidaste tu contraseña?</h3>
                            <p class="card-text text-center mb-4">
                                Te enviaremos instrucciones sobre cómo restablecer tu contraseña a
                                la dirección de correo electrónico asociada a tu cuenta.
                            </p>
                            <form class="row g-3">
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" required autofocus>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Footer -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
    <!-- End Footer -->

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
