<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ServiceCommunity.php';

if (isset($_POST['newCommunity'])) {
    $response = ServiceCommunity::newCommunity($_POST['nombre']);
}

if (isset($_POST['deleteCommunity'])) {
    ServiceCommunity::deleteCommunity($_GET['Community']);
}

if (isset($_GET['community'])) {
    $Communitys = ServiceCommunity::getCommunity($_GET['community']);
}

if (isset($_GET)) {
    $tableCommunities = ServiceCommunity::getTableCommunity();
    $unitedCommunity = ServiceCommunity::getUnitedCommunity();
}
