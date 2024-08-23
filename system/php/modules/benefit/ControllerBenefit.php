<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefit/ServiceBenefit.php';

if (isset($_POST['newBenefit'])) {
    $response = ServiceBenefit::newBenefit($_POST['titulo'], $_POST['descripcion'], $_POST['puntos']);
}

if (isset($_POST['setBenefit'])) {
    $response = ServiceBenefit::setBenefit($_GET['benefit'], $_POST['titulo'], $_POST['descripcion'], $_POST['puntos']);
}

if (isset($_POST['setImageBenefit'])) {
    $response = ServiceBenefit::setImageBenefit($_GET['benefit']);
}

if (isset($_POST['deleteBenefit'])) {
    ServiceBenefit::deleteBenefit($_GET['benefit']);
}

if (isset($_GET['benefit'])) {
    $benefit = ServiceBenefit::getBenefit($_GET['benefit']);
}
if (isset($_GET['user'])) {
    $tableBenefitUser = ServiceBenefit::getTableBenefitByUser($_GET['user']);
}

if (isset($_GET)) {
    $tableBenefits = ServiceBenefit::getTableBenefit();
    $optionBenefit = ServiceBenefit::getOptionBenefit();
    $tableBenefitsUser = ServiceBenefit::getTableBenefitUserByUser();
    $cardBenefitUser = ServiceBenefit::getCardBenefitUserByUser();
}
