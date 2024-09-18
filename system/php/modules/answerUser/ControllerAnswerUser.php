<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerUser/ServiceAnswerUser.php';

if (isset($_POST['sendAnswerSurvey'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $encuestaDTO = ServiceSurvey::getSurvey($_GET['survey']);
    $listRespuestas = (isset($_POST['listRespuestas'])) ? $_POST['listRespuestas'] : '';
    $listRespuestasAbiertas = (isset($_POST['listRespuestasAbiertas'])) ? $_POST['listRespuestasAbiertas'] : '';
    $response = ServiceAnswerUser::newAnswerUser($_GET['survey'], $listRespuestas, $listRespuestasAbiertas);
}
