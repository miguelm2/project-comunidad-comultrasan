<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/question/ServiceQuestion.php';

if (isset($_POST['newQuestion'])) {
    $response = ServiceQuestion::newQuestion($_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_POST['setQuestion'])) {
    $response = ServiceQuestion::setQuestion($_GET['question'], $_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_GET['question'])) {
    $question = ServiceQuestion::getQuestion($_GET['question']);
}

if (isset($_POST['deleteQuestion'])) {
    $response = ServiceQuestion::deleteQuestion($_GET['question']);
}

if (isset($_GET)) {
    $tableQuestion = ServiceQuestion::getTableQuestion();
    $questionIndex = ServiceQuestion::getQuestionIndex();
}
