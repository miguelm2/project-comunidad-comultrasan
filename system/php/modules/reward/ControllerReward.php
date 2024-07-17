<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/Reward/ServiceReward.php';

if (isset($_POST['newReward'])) {
    $response = ServiceReward::newReward($_POST['titulo'], $_POST['descripcion'], $_POST['puntos']);
}

if (isset($_POST['setReward'])) {
    $response = ServiceReward::setReward($_GET['reward'], $_POST['titulo'], $_POST['descripcion'], $_POST['puntos']);
}

if (isset($_POST['deleteReward'])) {
    ServiceReward::deleteReward($_GET['reward']);
}

if (isset($_GET['reward'])) {
    $reward = ServiceReward::getReward($_GET['reward']);
}

if (isset($_GET)) {
    $tableReward = ServiceReward::getTableReward();
}