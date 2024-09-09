<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ServiceTypeComunity.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ServiceForum.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ServiceEventCalendar.php';

if (isset($_POST['newTypeComunity'])) {
    $response = ServiceTypeComunity::newTypeComunity($_POST['titulo'], $_POST['icono'], $_POST['subtitulo'], $_POST['contenido']);
}

if (isset($_POST['setTypeComunity'])) {
    $response = ServiceTypeComunity::setTypeComunity($_GET['typeComunity'], $_POST['titulo'], $_POST['icono'], $_POST['subtitulo'], $_POST['contenido']);
}

if (isset($_POST['setImageTypeComunity'])) {
    $response = ServiceTypeComunity::setImageTypeComunityPage($_GET['typeComunity']);
}

if (isset($_POST['deleteTypeComunity'])) {
    ServiceTypeComunity::deleteTypeComunity($_GET['typeComunity']);
}

if (isset($_GET['typeComunity'])) {
    $typeComunity = ServiceTypeComunity::getTypeComunity($_GET['typeComunity']);
}

if (isset($_GET['comunnity'])) {
    $typeComunnity = ServiceTypeComunity::getTypeComunity($_GET['comunnity']);
    $forumPage = ServiceForum::getCardForum($_GET['comunnity']);
}

if (isset($_GET['groupInterest'])) {
    $groupInterest          = ServiceTypeComunity::getTypeComunity($_GET['groupInterest']);
    $btonJoin               = ServiceTypeComunity::getButtonJoin($_GET['groupInterest']);
    $cardEventCalendarGroup = ServiceEventCalendar::getCardsEventsCalendarByGroup($_GET['groupInterest']);
}


if (basename($_SERVER['PHP_SELF']) == 'typeComunities.php') {
    $tableTypeComnuties = ServiceTypeComunity::getTableTypeComunity();
}

if (basename($_SERVER['PHP_SELF']) == 'community.php') {
    $cardGroupInterest  = ServiceTypeComunity::getCardGroupInterest();
}

if (basename($_SERVER['PHP_SELF']) == 'comunidad.php') {
    $typeComunityIndex  = ServiceTypeComunity::getCardTypeComunity();
}

if (basename($_SERVER['PHP_SELF']) == 'newEventCalendar.php') {
    $optionGroupInterest = ServiceTypeComunity::getOptionsGroupCommunity();
}
