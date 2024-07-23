<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/dashboard/ControllerDashboard.php';

System::validarSession();

System::validarManager();

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/manager/ControllerManager.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';