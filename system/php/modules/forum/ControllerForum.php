<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ServiceForum.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ServiceTypeComunity.php';

if (isset($_POST['newForum'])) {
    ServiceForum::newForum($_GET['comunnityForum'], $_SESSION['id'], $_POST['contenido'], 0, $_POST['titulo']);
}

if (isset($_POST['deleteForum'])) {
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
