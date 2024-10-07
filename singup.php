<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
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

<body class="d-flex flex-column min-vh-100">
   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->
   <section class="ftco-section p-3" id="unete">
      <div class="container">
         <div class="text-center section-header pb-1">
            <h2 class="text-pri">¡Únete!</h2>
         </div>
         <div class="row">
            <div class="col-md-4 col-lg-4">
               <img src="assets/image/unete.webp" alt="" class="img-fluid">
               <div class="container bg-primary pb-4">
                  <div>
                     <br>
                     <h5>
                        ¡Únete a Nuestra Comunidad!
                     </h5>
                     <br>
                     <h5>
                        Aquí encontrarás un mundo de oportunidades para crecer, aprender y disfrutar. <br>
                     </h5>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-lg-8">
               <div class="login-wrap">
                  <form method="post" class="signin-form">
                     <div class="row text-start">

                        <div class="col-md-12 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="nombre">Nombre(s) y Apellidos <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control" name="nombre" placeholder="Nombres completos" maxlength="255" required>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="tipo_documento">Tipo de Documento</label>
                              <select name="tipo_documento" id="tipo_documento" class="form-select">
                                 <option value="1">Cédula de Ciudadanía</option>
                                 <option value="2">Tarjeta de identidad</option>
                                 <option value="3">Cédula de extranjería</option>
                                 <option value="4">Pasaporte</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="cedula">Documento de identidad <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 20)</small>
                                 </label>
                                    <input type="text" class="form-control" name="cedula" placeholder="Documento de identidad" maxlength="20" required>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="correo">Correo <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="valideCorreo">Valide Correo <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="email" class="form-control" name="valideCorreo" id="valideCorreo" placeholder="Valide Correo" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="pass">Contraseña <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 20)</small>
                                 </label>
                                    <input type="password" class="form-control" name="pass" placeholder="Contraseña" maxlength="20" required>
                           </div>
                        </div>
                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="form-check">
                              <label for="tratamiento" class="text-black">
                                 <input type="checkbox" name="tratamiento" id="tratamiento" required>
                                 <a class="btn-link" data-bs-toggle="modal" data-bs-target="#terminosCondiciones">
                                    Autorizo el tratamiento de datos personales, consulta y reporte
                                    de información crediticia</a>
                              </label>
                           </div>
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="form-check">
                              <label for="terminos" class="text-black">
                                 <input type="checkbox" name="terminos" id="terminos" required>
                                 <a class="btn-link" data-bs-toggle="modal" data-bs-target="#terminosCondiciones">Confirmo que he leído los terminos y condiciones</a>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <br>
                        <button type="submit" name="newUserUnete" class="btn btn-verde btn1 rounded"> <i class="bi bi-send"></i> Enviar</button>
                     </div>
                     <div class="form-group mt-2">
                        <br>
                        <p class="text-black">
                           La información que estás suministrando en este formulario es para uso exclusivo de Financiera
                           Comultrasan. Ten presente que no debes de compartir con otras personas el código de verificación
                           en tu proceso de autoinscripción.
                        </p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="modal fade" id="terminosCondiciones" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-pri"><i>AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES</i></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <p>
                  <i>
                     Autorizo a la COOPERATIVA DE AHORRO Y CREDITO DE SANTANDER LIMITADA (en adelante FINANCIERA COMULTRASAN),
                     identificada con NIT número 804.009.752-8, en calidad de responsable del tratamiento y, en tal virtud, podrá recolectar,
                     almacenar, procesar, actualizar, modificar, usar, trasferir, transmitir y/o eliminar los datos personales suministrados
                     de conformidad con las siguientes finalidades: <br>
                     <ol type="1">
                        <li>
                           Efectuar las gestiones pertinentes para el correcto funcionamiento de la Plataforma Comunidad Comultrasan y del cumplimiento
                           del objeto social de la entidad.
                        </li>
                        <li>
                           Realizar invitaciones a eventos, actividades, cursos, programas, campañas y beneficios a través de la Plataforma Comunidad Comultrasan.
                           Gestionar trámites: solicitudes, quejas, reclamos y/o felicitaciones referentes a la Plataforma Comunidad Comultrasan.
                        </li>
                        <li>
                           Realizar invitaciones a eventos, actividades, cursos, programas, campañas y beneficios a través de la Plataforma Comunidad Comultrasan.
                        </li>
                        <li>
                           Gestionar trámites: solicitudes, quejas, reclamos y/o felicitaciones referentes a la Plataforma Comunidad Comultrasan.
                        </li>
                        <li>
                           Efectuar encuestas referentes al funcionamiento, beneficios y/o sugerencias referentes a la Plataforma Comunidad Comultrasan.
                        </li>
                        <li>
                           Conocer sus preferencias e intereses en la Plataforma Comunidad Comultrasan para ofrecer nuevos productos o servicios
                        </li>
                        <li>
                           Contactar al Titular a través de medios telefónicos, electrónicos (SMS, chat, correo electrónico) para él envió de información
                           y/o noticias relacionadas con la Plataforma Comunidad Comultrasan.
                        </li>
                        <li>
                           Transferir datos personales a terceros con los cuales la cooperativa tenga un vínculo contractual y/o comercial que sean
                           necesarias para el funcionamiento de la Plataforma Comunidad Comultrasan.
                        </li>
                     </ol><br>
                     De conformidad con la Constitución política de Colombia y especialmente la Ley 1581 de 2012, tengo conocimiento que tengo derecho a:<br>
                     <ol type="a">
                        <li>
                           Acceder en forma gratuita a los datos proporcionados que hayan sido objeto de tratamiento.
                        </li>
                        <li>
                           Solicitar la actualización y rectificación de su información frente a datos parciales, inexactos, incompletos, fraccionados, que
                           induzcan a error, o a aquellos cuyo tratamiento esté prohibido o no haya sido autorizado.
                        </li>
                        <li>
                           Solicitar prueba de la autorización otorgada.
                        </li>
                        <li>
                           Presentar ante la Superintendencia de Industria y Comercio (SIC) quejas por infracciones a lo dispuesto en la normatividad vigente.
                        </li>
                        <li>
                           Revocar la autorización y/o solicitar la supresión del dato, a menos que exista un deber legal o contractual que haga imperativo
                           conservar la información.
                        </li>
                        <li>
                           Abstenerse de responder las preguntas sobre datos sensibles.
                        </li>
                     </ol><br>
                     Estos derechos los podré ejercer a través de los canales o medios dispuestos por la cooperativa para la atención al público a 
                     través de la radicación de consultas y/o reclamos relacionados con el tratamiento de mis datos personales en la línea de atención 
                     nacional 01 8000 938 088, el correo electrónico: servicioalcliente@comultrasan.com.co y las oficinas de atención al cliente a nivel 
                     nacional, cuya información puedo consultar en: https://www.financieracomultrasan.com.co/es<br><br>
                     Por todo lo anterior, he otorgado mi consentimiento la cooperativa trate mi información personal de acuerdo con la Política de 
                     Tratamiento de Datos Personales dispuesta en: https://www.financieracomultrasan.com.co/es/seguridad-financiera/proteccion-de-datos-personales 
                     y que me dio a conocer antes de recolectar mis datos personales. Manifiesto que la presente autorización me fue solicitada y puesta de presente 
                     antes de entregar mis datos y que la suscribo de forma libre y voluntaria una vez leída en su totalidad.
                  </i>
               </p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
            </div>
         </div>
      </div>
   </div>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!-- Start Footer -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
   <!-- End Footer -->

   <!-- Vendor JS Files -->
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets/vendor/aos/aos.js"></script>
   <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
   <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="assets/vendor/php-email-form/validate.js"></script>

   <!-- Template Main JS File -->
   <script src="assets/js/main.js"></script>
   <script src="system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="system/js/valideImage.js"></script>
   <?= $response ?>
</body>

</html>