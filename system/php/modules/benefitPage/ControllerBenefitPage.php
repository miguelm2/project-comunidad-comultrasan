<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefitPage/ServiceBenefitPage.php';

if (isset($_POST['newBenefitPage'])) {
    $response = ServiceBenefitPage::newBenefitPage($_POST['titulo'], $_POST['subtitulo'], $_POST['contenido'], $_POST['requisitos']);
}

if (isset($_POST['setBenefitPage'])) {
    $response = ServiceBenefitPage::setBenefitPage($_GET['benefitPage'], $_POST['titulo'], $_POST['subtitulo'], $_POST['contenido'], $_POST['requisitos']);
}

if (isset($_POST['setImageBenefitPage'])) {
    $response = ServiceBenefitPage::setImageBenefitPage($_GET['benefitPage']);
}

if (isset($_POST['deleteBenefitPage'])) {
    ServiceBenefitPage::deleteBenefitPage($_GET['benefitPage']);
}

if (isset($_GET['benefitPage'])) {
    $benefitPage = ServiceBenefitPage::getBenefitPage($_GET['benefitPage']);
}

if (isset($_GET['benefit_page'])) {
    $benefitsPage = ServiceBenefitPage::getBenefitPage($_GET['benefit_page']);
}

if (basename($_SERVER['PHP_SELF']) == 'benefitsPage.php') {
    $tableBenfitPage  = ServiceBenefitPage::getTableBenefitPage();
}
if (basename($_SERVER['PHP_SELF']) == 'benefits.php') {
    $benefitPageIndex = ServiceBenefitPage::getCardBenefitsPage();
}
