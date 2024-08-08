<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ServiceForumComment.php';

if (isset($_POST['newForumComment'])) {
    $response = ServiceForumComment::newForumComment($_GET['forum'], $_SESSION['id'], $_POST['comentario']);
}

if (isset($_POST['deleteForumComment'])) {
    ServiceForumComment::deleteForumComment($_POST['comment']);
}

if (isset($_GET['forum'])) {
    $contadorComment = ServiceForumComment::getCountForumComment($_GET['forum']);
    $comentarioForum = ServiceForumComment::getCardCommentForumByForum($_GET['forum']);
}
