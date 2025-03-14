<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerQuestion/ServiceAnswerQuestion.php';

if (isset($_POST['newAnswerQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAnswerQuestion::newAnswerQuestion($_GET['survey'], $_GET['surveyQuestion'], $_POST['respuesta'], $_POST['veracidad']);
}

if (isset($_POST['setAnswerQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAnswerQuestion::setAnswerQuestion($_GET['answerQuestion'], $_POST['respuesta'], $_POST['veracidad']);
}

if (isset($_POST['deleteAnswerQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceAnswerQuestion::deleteAnswerQuestion($_GET['answerQuestion']);
}

if (isset($_GET['answerQuestion'])) {
    $answerQuestion = ServiceAnswerQuestion::getAnswerQuestion($_GET['answerQuestion']);
}

if (isset($_GET['survey'])) {
    $cardQuestionUser = ServiceAnswerQuestion::getCardsQuetionAndAnwer($_GET['survey']);
    $survey = ServiceSurvey::getSurvey($_GET['survey']);
}

if (basename($_SERVER['PHP_SELF']) == 'surveyQuestion.php') {
    $tableAnswerQuestion = ServiceAnswerQuestion::getTableAnswerQuestion($_GET['surveyQuestion']);
}
