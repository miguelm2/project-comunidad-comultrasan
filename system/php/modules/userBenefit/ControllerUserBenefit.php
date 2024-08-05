<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userBenefit/ServiceUserBenefit.php';

if (isset($_POST['newUserBenefits'])) {
    $response = ServiceUserBenefit::newUserBenefit($_GET['user'], $_POST['userBenefit']);
}
