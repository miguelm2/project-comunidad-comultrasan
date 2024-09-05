<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/dashboard/ControllerDashboard.php';

System::validarSession();

System::validarAdmin();

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/administrator/ControllerAdmin.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/information/ControllerInformation.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefitPage/ControllerBenefitPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/manager/ControllerManager.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/question/ControllerQuestion.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ControllerTypeComunity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/discount/ControllerDiscount.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/survey/ControllerSurvey.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/surveyQuestion/ControllerSurveyQuestion.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerQuestion/ControllerAnswerQuestion.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ControllerEventCalendar.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userBenefit/ControllerUserBenefit.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/sectionTypeCommunity/ControllerSectionTypeCommunity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ControllerForum.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ControllerForumComment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefit/ControllerBenefit.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/referred/ControllerReferred.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ControllerUserComunnity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ControllerCommunty.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ControllerPoint.php';
