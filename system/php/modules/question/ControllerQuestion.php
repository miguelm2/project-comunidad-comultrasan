<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/question/ServiceQuestion.php';

if (isset($_POST['newQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceQuestion::newQuestion($_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_POST['setQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceQuestion::setQuestion($_GET['question'], $_POST['pregunta'], $_POST['respuesta']);
}

if (isset($_GET['question'])) {
    $question = ServiceQuestion::getQuestion($_GET['question']);
}

if (isset($_POST['deleteQuestion'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceQuestion::deleteQuestion($_GET['question']);
}

if (basename($_SERVER['PHP_SELF']) == 'questions.php') {
    $tableQuestion = ServiceQuestion::getTableQuestion();
}

$questionIndex = ServiceQuestion::getQuestionIndex();

