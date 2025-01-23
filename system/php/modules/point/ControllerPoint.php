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
    $response = ServicePoint::loadCSVPoints();
}

if (isset($_POST['descagarPlantilla'])) {
    ServicePoint::descargarPlantilla('PUNTOS.csv');
}

if (isset($_POST['getTablePointsFilter'])) {
    $response = ServicePoint::listTablePointsUserByManagerFilter($_POST['comunidad'], $_POST['cedula'], $_POST['nombre'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
    echo $response;
}
if (isset($_GET['user'])) {
    $total_puntos = ServicePoint::getPointsUserByUser($_GET['user']);
}


if (basename($_SERVER['PHP_SELF']) == 'points.php') {
    $tablePoints = ServicePoint::getTablePoint();
}

if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
    $cardRest = ServiceCommunity::getRestHmtl();
    $tablePointsByUserLider = ServicePoint::listTablePointsUserByUserLider();
    $tablePointsByUser = ServicePoint::listTablePointsUserByUser();
}

if (isset($_POST['getTableHistorialCorazonesLider'])) {
    $tablePointsByUserLider = ServicePoint::listTablePointsUserByUserLider($_POST['nombre'], $_POST['fecha_inicio']);
    echo $tablePointsByUserLider;
}
if (isset($_POST['getTableHistorialCorazonesuser'])) {
    $tablePointsByUserLider = ServicePoint::listTablePointsUserByUser($_POST['nombre'], $_POST['fecha_inicio']);
    echo $tablePointsByUserLider;
}

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $countPoints = ServicePoint::getPointsByUser();
}
