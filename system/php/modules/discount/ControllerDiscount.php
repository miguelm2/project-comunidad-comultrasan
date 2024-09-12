<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/discount/ServiceDiscount.php';

if (isset($_POST['newDiscount'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceDiscount::newDiscount($_POST['titulo'], $_POST['descuento'], $_POST['vigencia'], $_POST['acceso']);
}

if (isset($_POST['setDiscount'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceDiscount::setDiscount($_GET['discount'], $_POST['titulo'], $_POST['descuento'], $_POST['vigencia'], $_POST['acceso']);
}

if (isset($_POST['setImageDiscount'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceDiscount::setImageDiscount($_GET['discount']);
}

if (isset($_POST['setLogoDiscount'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceDiscount::setLogoDiscount($_GET['discount']);
}

if (isset($_POST['deleteDiscount'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceDiscount::deleteDiscount($_GET['discount']);
}

if (isset($_GET['discount'])) {
    $discount = ServiceDiscount::getDiscount($_GET['discount']);
}

if (basename($_SERVER['PHP_SELF']) == 'discounts.php') {
    $tableDiscount = ServiceDiscount::getTableDiscount();
}


if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
    $cardDiscount = ServiceDiscount::getCardDiscount();
}
