<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerUser/ServiceAnswerUser.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/surveyQuestion/ServiceSurveyQuestion.php';

if (isset($_POST['sendAnswerSurvey'])) {
    $pregunta = ServiceSurveyQuestion::getSurveyQuestionBySurvey($_GET['survey']);
    foreach ($pregunta as $valor) {
        $id_pregunta = '' . $valor->getId_pregunta();
        $response = ServiceAnswerUser::newAnswerUser($_GET['survey'], $valor->getId_pregunta(), $_POST[$id_pregunta]);
    }
    $encuestaDTO = ServiceSurvey::getSurvey($_GET['survey']);
    ServicePoint::newPoint($encuestaDTO->getPuntos(), $_SESSION['id'], 1, "Resolvió la encuesta: ".$encuestaDTO->getNombre());
}
