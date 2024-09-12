<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ServiceForum.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ServiceTypeComunity.php';

if (isset($_POST['newForum'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceForum::newForum($_GET['comunnityForum'], $_SESSION['id'], $_POST['contenido'], $_POST['titulo']);
}

if (isset($_POST['editForum'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceForum::setForum($_GET['forum'], $_POST['contenido'], $_POST['titulo']);
}

if (isset($_POST['deleteForum'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceForum::deleteForum($_GET['forum']);
}

if (isset($_GET['forum'])) {
    $foroDTO = ServiceForum::getForum($_GET['forum']);
    $tiempo = ServiceForum::getTimePublicate($foroDTO->getFecha_registro());
    $disabledButton = ServiceTypeComunity::getDisabledComment($_GET['forum']);
}

if (isset($_GET['comunnityForum'])) {
    $tableForumGroupInterest = ServiceForum::listForumByTypeCommunity($_GET['comunnityForum']);
    $buttonNewForum = ServiceTypeComunity::getButonNewForum($_GET['comunnityForum']);
}

if (isset($_GET['typeComunity'])) {
    $tableForum = ServiceForum::getTableForumByTypeCommunity($_GET['typeComunity']);
}
