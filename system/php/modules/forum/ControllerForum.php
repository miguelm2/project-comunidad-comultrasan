<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ServiceForum.php';

if (isset($_POST['newForum'])) {
    $response = ServiceForum::newForum($_GET['groupInterest'], $_SESSION['id'], $_POST['contenido'], 0, $_POST['titulo']);
}

if (isset($_POST['setForum'])) {
    $response = ServiceForum::setForum($_GET['forum'], $_POST['contenido'], $_POST['titulo']);
}

if (isset($_POST['deleteForum'])) {
    ServiceForum::deleteForum($_GET['forum']);
}

if (isset($_GET['forum'])) {
    $foroDTO = ServiceForum::getForum($_GET['forum']);
}

if (isset($_GET['groupInterest'])) {
    $tableForumGroupInterest = ServiceForum::listForumByTypeCommunity($_GET['groupInterest']);
}
