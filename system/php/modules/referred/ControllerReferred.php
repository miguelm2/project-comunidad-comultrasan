<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/referred/ServiceReferred.php';

if (isset($_POST['referred_page'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceReferred::newReferredPage(
        $_POST['nombre_referido'],
        $_POST['cedula_referido'],
        $_POST['tipo_documento_referido'],
        $_POST['celular'],
        $_POST['nombre_referir'],
        $_POST['tipo_documento_referir'],
        $_POST['cedula_referir']
    );
}

if (isset($_POST['setReferred'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
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
    $infoExtra = ServiceReferred::getReferredInfoExtra($_GET['referred']);
}

if (isset($_POST['deleteReferred'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceReferred::deleteReferred($_GET['referred']);
}

if (basename($_SERVER['PHP_SELF']) == 'referrals.php') {
    $tableReferred = ServiceReferred::getTableReferred();
}
