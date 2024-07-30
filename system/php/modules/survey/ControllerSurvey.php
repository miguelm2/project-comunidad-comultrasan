<?php

use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/survey/ServiceSurvey.php';

if (isset($_POST['newSurvey'])) {
    ServiceSurvey::newSurvey($_POST['nombre'], $_POST['descripcion'], $_POST['puntos']);
}

if (isset($_POST['setSurvey'])) {
    $response = ServiceSurvey::setSurvey($_GET['survey'], $_POST['descripcion'], $_POST['nombre'], $_POST['estado'], $_POST['puntos']);
}

if (isset($_POST['deleteSurvey'])) {
    ServiceSurvey::deleteSurvey($_GET['survey']);
}

if (isset($_GET['survey'])) {
    $survey = ServiceSurvey::getSurvey($_GET['survey']);
}

if (isset($_GET)) {
    $tableSurvey = ServiceSurvey::getTableSurvey();
    $tableSurveyUser = ServiceSurvey::getSurveyUser();
}