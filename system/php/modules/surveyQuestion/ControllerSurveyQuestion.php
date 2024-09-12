<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/surveyQuestion/ServiceSurveyQuestion.php';

if (isset($_POST['newSurveyQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceSurveyQuestion::newSurveyQuestion($_GET['survey'], $_POST['pregunta'], $_POST['tipo_pregunta']);
}

if (isset($_POST['setSurveyQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceSurveyQuestion::setSurveyQuestion($_GET['surveyQuestion'], $_POST['pregunta'], $_POST['estado'], $_POST['tipo_pregunta']);
}

if (isset($_POST['deleteSurveyQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceSurveyQuestion::deleteSurveyQuestion($_GET['surveyQuestion']);
}

if (isset($_GET['surveyQuestion'])) {
    $surveyQuestion = ServiceSurveyQuestion::getSurveyQuestion($_GET['surveyQuestion']);
}

if (isset($_GET['survey'])) {
    $tableSurveyQuestion  = ServiceSurveyQuestion::getTableSurveyQuestion($_GET['survey']);
}
