<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ServiceCommunity.php';

if (isset($_POST['newCommunity'])) {
    $response = ServiceCommunity::newCommunity($_POST['nombre']);
}

if (isset($_POST['editCommunity'])) {
    $response = ServiceCommunity::setCommunity($_GET['community'], $_POST['nombre']);
}

if (isset($_POST['deleteCommunity'])) {
    ServiceCommunity::deleteCommunity($_GET['community']);
}

if (isset($_GET['community'])) {
    $comunidad = ServiceCommunity::getCommunity($_GET['community']);
    //$usuarioComunidad = ServiceUserCommunity::get
}

if (isset($_GET)) {
    $tableCommunities = ServiceCommunity::getTableCommunity();
    $unitedCommunity = ServiceCommunity::getUnitedCommunity();
    $btnJoinUser = ServiceCommunity::getButtonUnitUser();
    $cardsCommunity = ServiceCommunity::getCardsCommunity();
}
