<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userGroupInterest/ServiceUserGroupInterest.php';

if (isset($_POST['newUserCommunity'])) {
    $response = ServiceUserGroupInterest::newUserGroupInterest($_SESSION['id'], $_GET['community']);
}
