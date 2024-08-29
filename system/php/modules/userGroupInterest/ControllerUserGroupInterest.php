<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userGroupInterest/ServiceUserGroupInterest.php';

if (isset($_POST['newUserGroupInterest'])) {
    $response = ServiceUserGroupInterest::newUserGroupInterest($_SESSION['id'], $_GET['groupInterest']);
}