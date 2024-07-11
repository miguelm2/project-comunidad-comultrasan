<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/question/ServiceQuestion.php';

if (isset($_POST['newQuestionAnswer'])) {
    $response = ServiceQuestion::newQuestion($_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_POST['setQuestionAnswer'])) {
    $response = ServiceQuestion::setQuestion($_GET['editQuestionAnswer'], $_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_GET['editQuestionAnswer'])) {
    $questionsAnswer = ServiceQuestion::getQuestion($_GET['editQuestionAnswer']);
}

if (isset($_POST['deleteQuestionAnswer'])) {
    $response = ServiceQuestion::deleteQuestion($_GET['editQuestionAnswer']);
}

if (isset($_GET)) {
    $tableQuestionAnswer = ServiceQuestion::getTableQuestion();
    $questionIndex = ServiceQuestion::getQuestionIndex();
}
