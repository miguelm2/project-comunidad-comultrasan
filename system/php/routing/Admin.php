<?php 
session_start(); 
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/dashboard/ControllerDashboard.php';

System::validarSession();

System::validarAdmin();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/administrator/ControllerAdmin.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/information/ControllerInformation.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/page/ControllerPage.php';
?>