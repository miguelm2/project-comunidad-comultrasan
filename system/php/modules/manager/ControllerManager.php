<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/manager/ServiceManager.php';

if (isset($_POST['setProfileManager'])) {
    $response = ServiceManager::setProfile($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula']);
}

if (isset($_POST['setPassProfileManager'])) {
    $response = ServiceManager::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newManager'])) {
    $response = ServiceManager::newManager($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['pass']);
}

if (isset($_POST['setManager'])) {
    $response = ServiceManager::setManager($_GET['manager'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['estado']);
}

if (isset($_POST['setImageManager'])) {
    $response = ServiceManager::setImageManager($_GET['manager']);
}

if (isset($_POST['setPassManager'])) {
    $response = ServiceManager::setPassManager($_GET['manager'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_GET['manager'])) {
    $manager = ServiceManager::getManager($_GET['manager']);
}

if (isset($_POST['deleteManager'])) {
    ServiceManager::deleteManager($_GET['manager']);
}

if (isset($_GET)) {
    $tableManagers = ServiceManager::getTableManager();
}
