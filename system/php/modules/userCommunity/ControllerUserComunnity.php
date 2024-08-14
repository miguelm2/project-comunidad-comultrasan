<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ServiceUserCommunity.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ServiceCommunity.php';

if (isset($_POST['newUserCommunity'])) {
    $comunidadDTO = ServiceCommunity::getCommunityByUser($_SESSION['id']);
    $response = ServiceUserCommunity::newUserCommunity($_POST['usuario'], $comunidadDTO->getId_comunidad());
}

if (isset($_POST['newUserCommunityJoin'])) {
    ServiceUserCommunity::newUserCommunityJoin($_SESSION['id'], $_POST['comunidad']);
}

if (isset($_POST['leaveCommunity'])) {
    $response = ServiceUserCommunity::deleteUserOfCommunity();
}

if (isset($_POST['deleteUserCommunity'])) {
    $response = ServiceUserCommunity::deleteUserOfCommunityByUser($_POST['usuario']);
}
