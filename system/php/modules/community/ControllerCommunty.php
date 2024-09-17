<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ServiceCommunity.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ServiceUserCommunity.php';

if (isset($_POST['newCommunity'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceCommunity::newCommunity($_POST['nombre'], $_POST['cedula'], $_POST['nombre_user'], $_POST['correo'], $_POST['celular']);
}

if (isset($_POST['editCommunity'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceCommunity::setCommunity($_GET['community'], $_POST['nombre'], $_POST['estado']);
}

if (isset($_POST['deleteCommunity'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceCommunity::deleteCommunity($_GET['community']);
}

if (isset(($_POST['leaveLeaderCommunity']))) {
    $response = ServiceCommunity::leaveLeaderCommunity();
}

if (isset($_POST['deleteUserLeader'])) {
    $response = ServiceCommunity::removeLeaderCommunity($_GET['community']);
}

if (isset($_GET['community'])) {
    $comunidad = ServiceCommunity::getCommunity($_GET['community']);
    $usuarioComunidad = ServiceUserCommunity::getUserCommunityByComummnity($_GET['community']);
    $infoCommunity = ServiceCommunity::getInformationByCommunity($_GET['community']);
    $tableCommunityManager = ServicePoint::listTablePointsUserByManager($_GET['community']);
}

if (isset($_POST['getTableCommunityFilter'])) {
    $response = ServiceCommunity::getTableCommunityFilter($_POST['codigo'], $_POST['nombre'], $_POST['lider'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
    echo $response;
}

if (basename($_SERVER['PHP_SELF']) == 'communities.php') {
    $tableCommunities = ServiceCommunity::getTableCommunity();
}

if (basename($_SERVER['PHP_SELF']) == 'community.php') {
    $unitedCommunity = ServiceCommunity::getUnitedCommunity();
    $cardRest = ServiceCommunity::getRestHmtl();
    $optionRequest = ServiceCommunity::getOptionRequest();
    $btnJoinUser = ServiceCommunity::getButtonUnitUser();
}

if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
    $tableCommunitiesIndex = ServiceCommunity::getTableCommunityIndex();
}
