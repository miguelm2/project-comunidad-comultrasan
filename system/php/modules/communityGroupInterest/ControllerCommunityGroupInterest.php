<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/communityGroupInterest/ServiceCommunityGroupInterest.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ServiceCommunity.php';

if (isset($_POST['newCommunityGroupInterest'])) {
    $comunidad = ServiceCommunity::getCommunityByUser($_SESSION['id']);
    if (!$comunidad) {
        $comunidadUsuario = ServiceUserCommunity::getUserCommunityByUser($_SESSION['id']);
        if ($comunidadUsuario) {
            $comunidad = $comunidadUsuario->getComunidadDTO();
        }
    }
    $response = ServiceCommunityGroupInterest::newCommunityGroupInterest($comunidad->getId_comunidad(), $_GET['groupInterest']);
}
