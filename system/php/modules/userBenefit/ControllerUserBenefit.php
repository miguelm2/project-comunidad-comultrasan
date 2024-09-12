<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userBenefit/ServiceUserBenefit.php';

if (isset($_POST['newUserBenefits'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUserBenefit::newUserBenefit($_GET['user'], $_POST['userBenefit']);
}

if (isset($_POST['deleteUserBenefit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceUserBenefit::deleteUserBenefit($_POST['usuarioBeneficio']);
}
