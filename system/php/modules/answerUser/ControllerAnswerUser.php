<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerUser/ServiceAnswerUser.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/surveyQuestion/ServiceSurveyQuestion.php';

if (isset($_POST['sendAnswerSurvey'])) {
    $encuestaDTO = ServiceSurvey::getSurvey($_GET['survey']);
    ServicePoint::newPoint($encuestaDTO->getPuntos(), $_SESSION['id'], 1, "Resolvió la encuesta: " . $encuestaDTO->getNombre());
    $listRespuestas = (isset($_POST['listRespuestas'])) ? $_POST['listRespuestas'] : '';
    $listRespuestasAbiertas = (isset($_POST['listRespuestasAbiertas'])) ? $_POST['listRespuestasAbiertas'] : '';
    ServiceAnswerUser::newAnswerUser($_GET['survey'], $listRespuestas, $listRespuestasAbiertas);
}
