<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ServicePoint.php';

if (isset($_POST['newPoint'])) {
    $response = ServicePoint::newPoint($_POST['puntos'], $_POST['usuario'], $_SESSION['id'], $_POST['descripcion']);
}

if (isset($_POST['newPointUser'])) {
    $response = ServicePoint::newPoint($_POST['puntos'], $_GET['user'], $_SESSION['id'], $_POST['descripcion']);
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

if (isset($_POST['loadExcelPoint'])) {
    $response = ServicePoint::loadExcelPoints();
}

if (isset($_POST['getTablePointsFilter'])) {
    $response = ServicePoint::listTablePointsUserByManagerFilter($_POST['comunidad'], $_POST['nombre']);
    echo $response;
}

if (isset($_GET)) {
    $tablePoints = ServicePoint::getTablePoint();
    $countPoints = ServicePoint::getPointsByUser();
    $tablePointsByUser = ServicePoint::listTablePointsUserByUser();
}
