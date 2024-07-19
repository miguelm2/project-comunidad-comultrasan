<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/AnswerQuestion/ServiceAnswerQuestion.php';

if (isset($_POST['newAnswerQuestion'])) {
    $response = ServiceAnswerQuestion::newAnswerQuestion($_GET['survey'], $_GET['surveyQuestion'], $_POST['respuesta'], $_POST['veracidad']);
}

if (isset($_POST['setAnswerQuestion'])) {
    $response = ServiceAnswerQuestion::setAnswerQuestion($_GET['answerQuestion'], $_POST['respuesta'], $_POST['veracidad']);
}

if (isset($_POST['deleteAnswerQuestion'])) {
    ServiceAnswerQuestion::deleteAnswerQuestion($_GET['answerQuestion']);
}

if (isset($_GET['answerQuestion'])) {
    $answerQuestion = ServiceAnswerQuestion::getAnswerQuestion($_GET['answerQuestion']);
}

if (basename($_SERVER['PHP_SELF']) == 'surveyQuestion.php') {
    $tableAnswerQuestion = ServiceAnswerQuestion::getTableAnswerQuestion($_GET['surveyQuestion']);
}
