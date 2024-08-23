<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/sectionTypeCommunity/ServiceSectionTypeCommunity.php';

if (isset($_POST['newSectionTypeCommunity'])) {
    $response = ServiceSectionTypeCommunity::newSectionTypeCommunity($_GET['typeComunity'], $_POST['nombre'], $_POST['descripcion']);
}

if (isset($_POST['setSectionTypeCommunity'])) {
    $response = ServiceSectionTypeCommunity::setSectionTypeCommunity($_GET['sectionTypeCommunity'], $_POST['nombre'], $_POST['descripcion']);
}

if (isset($_POST['setImageSectionTypeCommunity'])) {
    $response = ServiceSectionTypeCommunity::setImageSectionTypeCommunity($_GET['sectionTypeCommunity']);
}

if (isset($_POST['deleteSectionTypeCommunity'])) {
    ServiceSectionTypeCommunity::deleteSectionTypeCommunity($_GET['sectionTypeCommunity']);
}

if (isset($_GET['sectionTypeCommunity'])) {
    $sectionTypeComunity = ServiceSectionTypeCommunity::getSectionTypeCommunity($_GET['sectionTypeCommunity']);
}

if(isset($_GET['groupInterest'])){
    $cardMiniSection = ServiceSectionTypeCommunity::getCardMiniSectionByTypeCommunity($_GET['groupInterest']);
    $cardSection = ServiceSectionTypeCommunity::getCardSectionByTypeCommunity($_GET['groupInterest']);
}

if (isset($_GET['typeComunity'])) {
    $tableSectionTypeCommunities = ServiceSectionTypeCommunity::getSectionTableTypeComunity($_GET['typeComunity']);
}
