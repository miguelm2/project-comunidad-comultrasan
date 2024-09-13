<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/manager/ServiceManager.php';

if (isset($_POST['setProfileManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setProfile($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula']);
}

if (isset($_POST['setPassProfileManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::newManager($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['pass']);
}

if (isset($_POST['setManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setManager($_GET['manager'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['estado']);
}

if (isset($_POST['setImageManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setImageManager($_GET['manager']);
}

if (isset($_POST['setImgeManagerProfile'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setImageManagerProfile();
}

if (isset($_POST['setPassManager'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceManager::setPassManager($_GET['manager'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_GET['manager'])) {
    $manager = ServiceManager::getManager($_GET['manager']);
}

if (isset($_POST['deleteManager'])) {
    ServiceManager::deleteManager($_GET['manager']);
}


if (basename($_SERVER['PHP_SELF']) == 'managers.php') {
    $tableManagers = ServiceManager::getTableManager();
}
