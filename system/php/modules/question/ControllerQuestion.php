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


if (basename($_SERVER['PHP_SELF']) == 'questions.php') {
    $tableQuestion = ServiceQuestion::getTableQuestion();
}

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $questionIndex = ServiceQuestion::getQuestionIndex();
}
