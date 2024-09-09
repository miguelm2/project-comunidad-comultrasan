<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/dashboard/ServiceDashboard.php';

if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
    $listCountsAdmin = ServiceDashboard::getCountsCardsAdmin();
}

if (isset($_POST['getChartViews'])) {
    $response = ServiceDashboard::getCountVisitas();
    echo $response;
}

if (isset($_POST['getChartPoints'])) {
    $response = ServiceDashboard::getCountPoints();
    echo $response;
}

