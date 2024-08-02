<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ServicePoint.php';

if (isset($_POST['newPoint'])) {
    $response = ServicePoint::newPoint($_POST['puntos'], $_POST['usuario'], $_SESSION['id'], $_POST['descripcion']);
}

if (isset($_POST['setPoint'])) {
    $response = ServicePoint::setPoint($_GET['point'], $_POST['puntos'], $_POST['descripcion']);
}

if (isset($_POST['deletePoint'])) {
    ServicePoint::deletePoint($_GET['point']);
}

if (isset($_GET['point'])) {
    $points = ServicePoint::getPoint($_GET['point']);
}

if (isset($_GET)) {
    $tablePoints = ServicePoint::getTablePoint();
}