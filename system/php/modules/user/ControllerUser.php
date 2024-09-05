<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ServiceUser.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ServicePoint.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ServiceUserCommunity.php';

if (isset($_POST['setProfileUser'])) {
    $response = ServiceUser::setProfile(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['telefono'],
        $_POST['cedula'],
        $_POST['tipo_documento'],
        $_POST['fecha_nacimiento'],
        $_POST['departamento'],
        $_POST['ciudad']
    );
}

if (isset($_POST['setPassProfileUser'])) {
    $response = ServiceUser::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newUser'])) {
    $response = ServiceUser::newUser(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['telefono'],
        $_POST['cedula'],
        $_POST['pass'],
        $_POST['tipo_documento'],
        $_POST['fecha_nacimiento'],
        1,
        $_POST['departamento'],
        $_POST['ciudad']
    );
}

if (isset($_POST['newUserUnete'])) {
    $response = ServiceUser::newUser(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['telefono'],
        $_POST['cedula'],
        $_POST['pass'],
        $_POST['tipo_documento'],
        $_POST['fecha_nacimiento'],
        2,
        $_POST['departamento'],
        $_POST['ciudad']
    );
}

if (isset($_POST['setUser'])) {
    $response = ServiceUser::setUser(
        $_GET['user'],
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['telefono'],
        $_POST['cedula'],
        $_POST['estado'],
        $_POST['tipo_documento'],
        $_POST['fecha_nacimiento'],
        $_POST['departamento'],
        $_POST['ciudad']
    );
}

if (isset($_POST['setPassUser'])) {
    $response = ServiceUser::setPassUser($_GET['user'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['setImageUser'])) {
    $response = ServiceUser::setImageUser($_GET['user']);
}

if (isset($_POST['setImageUserProfile'])) {
    $response = ServiceUser::setImageUserProfile();
}

if (isset($_GET['user'])) {
    $user = ServiceUser::getUsuario($_GET['user']);
    $tablePointsUser = ServicePoint::getTablePointByUser($_GET['user']);
    $infoCommunityAdmin = ServiceUserCommunity::tableUserCommunityByUser($_GET['user']);
}

if (isset($_POST['deleteUser'])) {
    ServiceUser::deleteUser($_GET['user']);
}
if (isset($_POST['getTableUserFilter'])) {
    $response = ServiceUser::getTablaUserByManagerFilter($_POST['codigo_user'], $_POST['nombre_user'], $_POST['documento']);
    echo $response;
}

if (isset($_GET)) {
    $tableUsuarios      = ServiceUser::getTablaUsuarios();
    $tableUserManager   = ServiceUser::getTablaUserByManager();
    $optionUser         = ServiceUser::getOptionUser();
    $optionUserWithoutCommunity = ServiceUser::getOptionUserWithoutCommunity();
}
