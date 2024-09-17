<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefit/ServiceBenefit.php';

if (isset($_POST['newBenefit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceBenefit::newBenefit($_POST['titulo'], $_POST['definicion'], $_POST['condiciones'], $_POST['puntos']);
}

if (isset($_POST['setBenefit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceBenefit::setBenefit($_GET['benefit'], $_POST['titulo'], $_POST['definicion'], $_POST['condiciones'], $_POST['puntos']);
}

if (isset($_POST['setImageBenefit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceBenefit::setImageBenefit($_GET['benefit']);
}

if (isset($_POST['deleteBenefit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceBenefit::deleteBenefit($_GET['benefit']);
}

if (isset($_GET['benefit'])) {
    $benefit = ServiceBenefit::getBenefit($_GET['benefit']);
}

if (isset($_GET['user'])) {
    $tableBenefitUser = ServiceBenefit::getTableBenefitByUser($_GET['user']);
}

if (isset($_GET['community'])) {
    $benefitByCommunity = ServiceBenefit::getTableBenefitUserByCommunity($_GET['community']);
}

if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
    $tableBenefits = ServiceBenefit::getTableBenefit();
    $tableBenefitsUser = ServiceBenefit::getTableBenefitUserByUser();
    $cardBenefitUser = ServiceBenefit::getCardBenefitUserByUser();
}

if (basename($_SERVER['PHP_SELF']) == 'user.php' || basename($_SERVER['PHP_SELF']) == 'community.php') {
    $optionBenefit = ServiceBenefit::getOptionBenefit();
}
