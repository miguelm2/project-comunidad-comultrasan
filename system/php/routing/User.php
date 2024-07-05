<?php 
session_start(); 
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/dashboard/ControllerDashboard.php';

System::validarSession();

System::validarUser();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/blog/ControllerBlog.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/message/ControllerMessage.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/client/ControllerClient.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/testimonial/ControllerTestimonial.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/page/ControllerPage.php';
?>