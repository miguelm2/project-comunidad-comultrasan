<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ServiceEventCalendar.php';

if (isset($_POST['newEventCalendar'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceEventCalendar::newEventCalendar($_POST['titulo'], $_POST['fecha'], $_POST['lugar'], $_POST['hora'], $_POST['groupInterest'], $_POST['persona_cargo']);
}

if (isset($_POST['setEventCalendar'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceEventCalendar::setEventCalendar($_GET['eventCalendar'], $_POST['titulo'], $_POST['fecha'], $_POST['lugar'], $_POST['hora']);
}

if (isset($_POST['setImageEventCalendar'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceEventCalendar::setImageEventCalendar($_GET['eventCalendar']);
}

if (isset($_POST['deleteEventCalendar'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceEventCalendar::deleteEventCalendar($_GET['eventCalendar']);
}

if (isset($_GET['eventCalendar'])) {
    $eventCalendar = ServiceEventCalendar::getEventCalendar($_GET['eventCalendar']);
}

if (basename($_SERVER['PHP_SELF']) == 'eventsCalendar.php') {
    $tableEventCalendar = ServiceEventCalendar::getTableEventCalendar();
}

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $cardEventCalendar = ServiceEventCalendar::getCardEventCalendar();
}
