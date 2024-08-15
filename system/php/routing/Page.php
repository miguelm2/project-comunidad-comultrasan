<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota'); // CDT

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/question/ControllerQuestion.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ControllerTypeComunity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefitPage/ControllerBenefitPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/discount/ControllerDiscount.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ControllerEventCalendar.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ControllerForum.php';
