<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ServiceUser.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ServicePoint.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ServiceUserCommunity.php';

if (isset($_POST['setProfileUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::setProfile(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['cedula'],
        $_POST['tipo_documento'],
        $_POST['tipo_imagen']
    );
}

if (isset($_POST['setPassProfileUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::newUser(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['cedula'],
        $_POST['pass'],
        $_POST['tipo_documento']
    );
}

if (isset($_POST['newUserUnete'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::newUser(
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['cedula'],
        $_POST['pass'],
        $_POST['tipo_documento']
    );
}

if (isset($_POST['setUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::setUser(
        $_GET['user'],
        $_POST['nombre'],
        $_POST['correo'],
        $_POST['cedula'],
        $_POST['estado'],
        $_POST['tipo_documento'],
    );
}

if (isset($_POST['setPassUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::setPassUser($_GET['user'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_GET['user'])) {
    $user = ServiceUser::getUsuario($_GET['user']);
    $tablePointsUser = ServicePoint::getTablePointByUser($_GET['user']);
    $infoCommunityAdmin = ServiceUserCommunity::tableUserCommunityByUser($_GET['user']);
}

if (isset($_POST['deleteUser'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUser::deleteUser($_GET['user']);
}

if (isset($_POST['getTableUserFilter'])) {
    $response = ServiceUser::getTablaUserByManagerFilter($_POST['codigo_user'], $_POST['nombre_user'], $_POST['documento']);
    echo $response;
}

if (isset($_GET['community'])) {
    $activityMissing    = ServiceUser::getTableMisingActivityByCommunity($_GET['community']);
    $activityRealized   = ServiceUser::getTableRealizedActivityByCommunity($_GET['community']);
    $showAll            = ServiceUser::getShowAllActivityByCommunity($_GET['community']);
}

if (basename($_SERVER['PHP_SELF']) == 'users.php') {
    $tableUserManager   = ServiceUser::getTablaUserByManager();
}

if (basename($_SERVER['PHP_SELF']) == 'points.php') {
    $optionUser         = ServiceUser::getOptionUser();
}

if (basename($_SERVER['PHP_SELF']) == 'community.php') {
    $optionUserWithoutCommunity = ServiceUser::getOptionUserWithoutCommunity();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generar token
}

if (isset($_SESSION['show_modalOTP']) && $_SESSION['show_modalOTP']) {
    $response = ServiceUser::getScriptModalOTP();
}

if(isset($_POST['generarOTP'])){
    ServiceUser::setCodeOTP();
}

if(isset($_POST['validateOtpBtn'])){
    ServiceUser::valideOTP($_POST['otp']);
}
