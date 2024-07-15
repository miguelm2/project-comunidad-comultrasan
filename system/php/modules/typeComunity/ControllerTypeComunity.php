<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ServiceTypeComunity.php';

if (isset($_POST['newTypeComunity'])) {
    $response = ServiceTypeComunity::newTypeComunity($_POST['titulo'], $_POST['icono'], $_POST['subtitulo'], $_POST['contenido']);
}

if (isset($_POST['setTypeComunity'])) {
    $response = ServiceTypeComunity::setTypeComunity($_GET['typeComunity'], $_POST['titulo'], $_POST['icono'], $_POST['subtitulo'], $_POST['contenido']);
}

if (isset($_POST['setImageTypeComunity'])) {
    $response = ServiceTypeComunity::setImageTypeComunityPage($_GET['typeComunity']);
}

if (isset($_POST['deleteTypeComunity'])) {
    ServiceTypeComunity::deleteTypeComunity($_GET['typeComunity']);
}

if (isset($_GET['typeComunity'])) {
    $typeComunity = ServiceTypeComunity::getTypeComunity($_GET['typeComunity']);
}

if (isset($_GET['comunnity'])) {
    $typeComunnity = ServiceTypeComunity::getTypeComunity($_GET['comunnity']);
}

if (isset($_GET)) {
    $tableTypeComnuties = ServiceTypeComunity::getTableTypeComunity();
    $typeComunityIndex  = ServiceTypeComunity::getCardTypeComunity();
}
