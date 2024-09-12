<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/administrator/ServiceAdmin.php';

// EndPoint Expuestos

if (isset($_POST['setProfile'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setProfile($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula']);
}

if(isset($_POST['setImageProfile'])){
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setImageProfile();
}

if (isset($_POST['setPassProfile'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newAdministrator'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::newAdministrator($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['pass']);
}

if (isset($_POST['setAdministrator'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setAdministrator($_GET['administrator'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['estado']);
}

if(isset($_POST['setImageAdministrator'])){
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setImageAdministrator($_GET['administrator']);
}

if (isset($_POST['setPassword'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceAdmin::setPassAdministrator($_GET['administrator'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_GET['administrator'])) {
    $administrator = ServiceAdmin::getAdministrator($_GET['administrator']);
}

if (isset($_POST['deleteAdministrator'])) {
    ServiceAdmin::deleteAdministrator($_GET['administrator']);
}

if (basename($_SERVER['PHP_SELF']) == 'administrators.php') {
    $tableAdministradores = ServiceAdmin::getTablaAdministradores();
}
