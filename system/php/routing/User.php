<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/dashboard/ControllerDashboard.php';

System::validarSession();

System::validarUser();

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userCommunity/ControllerUserComunnity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/point/ControllerPoint.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/survey/ControllerSurvey.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerQuestion/ControllerAnswerQuestion.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/answerUser/ControllerAnswerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/community/ControllerCommunty.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ControllerForum.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ControllerForumComment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/benefit/ControllerBenefit.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/eventCalendar/ControllerEventCalendar.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/like/ControllerLike.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/sectionTypeCommunity/ControllerSectionTypeCommunity.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/userGroupInterest/ControllerUserGroupInterest.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/typeComunity/ControllerTypeComunity.php';
