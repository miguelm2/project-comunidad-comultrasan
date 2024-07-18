<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/discount/ServiceDiscount.php';

if (isset($_POST['newDiscount'])) {
    $response = ServiceDiscount::newDiscount($_POST['titulo'], $_POST['descuento'], $_POST['vigencia'], $_POST['acceso']);
}

if (isset($_POST['setDiscount'])) {
    $response = ServiceDiscount::setDiscount($_GET['discount'], $_POST['titulo'], $_POST['descuento'], $_POST['vigencia'], $_POST['acceso']);
}

if (isset($_POST['setImageDiscount'])) {
    $response = ServiceDiscount::setImageDiscount($_GET['discount']);
}

if (isset($_POST['setLogoDiscount'])) {
    $response = ServiceDiscount::setLogoDiscount($_GET['discount']);
}

if (isset($_POST['deleteDiscount'])) {
    ServiceDiscount::deleteDiscount($_GET['discount']);
}

if (isset($_GET['discount'])) {
    $discount = ServiceDiscount::getDiscount($_GET['discount']);
}

if (isset($_GET)) {
    $tableDiscount = ServiceDiscount::getTableDiscount();
    $cardDiscount = ServiceDiscount::getCardDiscount();
}