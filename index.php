<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Comunidad Comultrasan - Inicio</title>
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
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
   <!-- Template Main CSS File -->
   <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->

   <!-- ======= Hero Section ======= -->
   <section id="index" class="hero bg-light">
      <div class="container">
         <img src="assets/image/slider_family.jpg" class="img-fluid rounded-4" alt="Inicio">
         <div class="text-overlay">
            <h4><strong>¡Bienvenido a la Comunidad Financiera Comultrasan!</strong></h4>
            <div class="row justify-content-center">
               <div class="col-md-2 mt-2">
                  <a href="singup" class="btn btn-verde btn1 rounded-3">Únete</a>
               </div>
               <div class="col-md-3 mt-2">
                  <a href="refer" class="btn btn-verde btn1 rounded-3">Referir amigo</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Hero Section -->

   <main id="main">
      <!-- ======= Stats Counter Section ======= -->
      <div>
         <section id="comunidad">
            <div class="container" data-aos="fade-up">
               <div class="row gy-2 align-items-center">
                  <div class="col-lg-3">
                     <img src="assets/image/joven.png" alt="" class="img-fluid rounded-4 img-young">
                  </div>
                  <div class="col-lg-9">
                     <div class="position-relative">
                        <h2 class="text-pri text-start"><strong>¡Imagina un lugar donde tus pasiones se recompensan y tus intereses te conectan con otros!</strong></h2>
                        <p class="text-black text-start" style="font-size: 20px;">
                           La Comunidad Comultrasan es un espacio lleno de oportunidades para aprender y crecer
                           junto a personas que comparten tus mismos gustos, donde cada interacción te acerca a
                           recompensas exclusivas y descuentos tentadores, haciendo que cada logro sea una celebración compartida.
                           <br><br>
                           Aquí Financiera Comultrasan te ofrece una experiencia enriquecedora con beneficios
                           diseñandos para mejorar tu calidad de vida y la de las personas que más amas. <br>
                           ¡Es un mundo de posibilidades esperando ser descubiertos por ti!
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- ======= Our Services Section ======= -->
      <section class="services sections-bg bg-light">
         <div class="container mt-2 p-2">
            <div class="row">
               <div class="section-header pb-0">
                  <h2 class="text-pri">Novedades de nuestra comunidad</h2>
                  <p class="card-text text-center text-pri">¡Hola! Queremos compartir contigo algunas de las actividades más destacadas que hemos vivido recientemente en nuestra comunidad</p>
               </div>
            </div>
            <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active mr-0">
                     <div class="row" style="margin-right: 0">
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">El pasado 16 de noviembre, mas de cuatro mil miembros de nuestra comunidad se reunieron para celebrar la primera edición del Dia de la Familia. Fue un espacio lleno de integración y alegría creado para decirle a todos nuestros miembros ¡Gracias por ser parte de nuestra comunidad</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top  img-fluid" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Feria de mascotas</h5>
                                 <p class="card-text text-start">Los integrantes de "Patitas Traviesas" participaron como expositores en la feria "BGAPets", distrutando de este beneficio por ser parte de nuestra comunidad. Aqui piedes revivir alguno de los momentos más emocionantes de nuestras mascotas</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top img-fluid" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Auxilios Economicos</h5>
                                 <p class="card-text text-start">Conscientes de la importancia de la educación para el desarrollo del país, nuestra coperativa apoya a los asociados y a sus hijos en su educación formal y no formal a través del beneficio de Auxilios Educativos. Te invitamos a revisar los requisitos e inscribirte aqui</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row" style="margin-right: 0">
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">El pasado 16 de noviembre, mas de cuatro mil miembros de nuestra comunidad se reunieron para celebrar la primera edición del Dia de la Familia. Fue un espacio lleno de integración y alegría creado para decirle a todos nuestros miembros ¡Gracias por ser parte de nuestra comunidad</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top  img-fluid" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Feria de mascotas</h5>
                                 <p class="card-text text-start">Los integrantes de "Patitas Traviesas" participaron como expositores en la feria "BGAPets", distrutando de este beneficio por ser parte de nuestra comunidad. Aqui piedes revivir alguno de los momentos más emocionantes de nuestras mascotas</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top img-fluid" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Auxilios Economicos</h5>
                                 <p class="card-text text-start">Conscientes de la importancia de la educación para el desarrollo del país, nuestra coperativa apoya a los asociados y a sus hijos en su educación formal y no formal a través del beneficio de Auxilios Educativos. Te invitamos a revisar los requisitos e inscribirte aqui</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
               </button>
            </div>
         </div>
      </section><!-- End Our Services Section -->
      <!-- ======= Frequently Asked Questions Section ======= -->
      <section class="faq sections-bg">
         <div class="container" data-aos="fade-up">
            <div class="row gy-4">
               <div class="col-lg-4">
                  <div class="content px-xl-5">
                     <h3 class="text-pri">Preguntas Frecuentes</h3>
                     <p class="text-black text-start">
                        En Comultrasan, entendemos que cada paso en tu camino financiero puede venir acompañado de preguntas
                        y dudas. Por eso, hemos reunido esta sección para ofrecerte respuestas claras y concisas a las consultas más comunes
                        que nuestros clientes suelen tener.
                     </p>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                     <?= $questionIndex ?>

                  </div>
               </div>
            </div>
         </div>
      </section><!-- End Frequently Asked Questions Section -->
      <section class="services sections-bg bg-light">
         <div class="container">
            <div class="row">
               <div class="section-header pb-0">
                  <h2 class="text-pri">Eventos del mes</h2>
               </div>
               <div class="row">
                  <?= $cardEventCalendar ?>
               </div>
            </div>
         </div>
      </section>
      <section class="services">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-12">
                  <p style="font-size: 20px;" class="text-black">
                     Te invitamos a ser parte de un programa único diseñado especialmente para tí, tu familia y tus seres queridos.
                     Al registrarse podras disfrutar de sistema de recompensas, descuentos exclusivos, espacios de capacitación y formación
                     y la oportunidad de interactuar con perosnas que compraten tus mismos intereses. ¡No te pierdas la oportunidad de transformar
                     tu experiencia financiera y personal con nosotros!
                  </p>
               </div>
            </div>
         </div>
      </section>

      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
      <!-- End Footer -->

   </main><!-- End #main -->
   <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>

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