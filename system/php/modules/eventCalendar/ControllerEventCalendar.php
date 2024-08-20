<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ServiceEventCalendar.php';

if (isset($_POST['newEventCalendar'])) {
    $response = ServiceEventCalendar::newEventCalendar($_POST['titulo'], $_POST['fecha'], $_POST['lugar'], $_POST['hora'], $_POST['groupInterest'], $_POST['persona_cargo']);
}

if (isset($_POST['setEventCalendar'])) {
    $response = ServiceEventCalendar::setEventCalendar($_GET['eventCalendar'], $_POST['titulo'], $_POST['fecha'], $_POST['lugar'], $_POST['hora']);
}

if (isset($_POST['setImageEventCalendar'])) {
    $response = ServiceEventCalendar::setImageEventCalendar($_GET['eventCalendar']);
}

if (isset($_POST['deleteEventCalendar'])) {
    ServiceEventCalendar::deleteEventCalendar($_GET['eventCalendar']);
}

if (isset($_GET['eventCalendar'])) {
    $eventCalendar = ServiceEventCalendar::getEventCalendar($_GET['eventCalendar']);
}

if (isset($_GET)) {
    $tableEventCalendar = ServiceEventCalendar::getTableEventCalendar();
    $cardEventCalendar = ServiceEventCalendar::getCardEventCalendar();
}