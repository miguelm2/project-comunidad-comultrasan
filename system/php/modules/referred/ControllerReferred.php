<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/referred/ServiceReferred.php';

if (isset($_POST['referred_page'])) {
    $response = ServiceReferred::newReferredPage(
        $_POST['nombre_referido'],
        $_POST['cedula_referido'],
        $_POST['tipo_documento_referido'],
        $_POST['departamento'],
        $_POST['ciudad'],
        $_POST['correo'],
        $_POST['celular'],
        $_POST['nombre_referir'],
        $_POST['tipo_documento_referir'],
        $_POST['cedula_referir']
    );
}

if (isset($_POST['setReferred'])) {
    $response = ServiceReferred::setReferred(
        $_POST['nombre_referido'],
        $_POST['cedula_referido'],
        $_POST['tipo_documento_referido'],
        $_POST['departamento'],
        $_POST['ciudad'],
        $_POST['correo'],
        $_POST['celular'],
        $_POST['nombre_referir'],
        $_POST['tipo_documento_referir'],
        $_POST['cedula_referir'],
        $_POST['estado'],
        $_GET['referred']
    );
}

if (isset($_GET['referred'])) {
    $referred = ServiceReferred::getReferred($_GET['referred']);
}

if (isset($_POST['deleteReferred'])) {
    ServiceReferred::deleteReferred($_GET['refered']);
}

if (isset($_GET)) {
    $tableReferred = ServiceReferred::getTableReferred();
}
