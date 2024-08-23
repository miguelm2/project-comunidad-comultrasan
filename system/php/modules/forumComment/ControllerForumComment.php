<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ServiceForumComment.php';

if (isset($_POST['newForumComment'])) {
    $response = ServiceForumComment::newForumComment($_GET['forum'], $_SESSION['id'], $_POST['comentario']);
}

if (isset($_POST['editForumComment'])) {
    $response = ServiceForumComment::setForumComment($_GET['forumComment'], $_POST['comentario']);
}

if (isset($_POST['deleteForumComment'])) {
    ServiceForumComment::deleteForumComment($_POST['comment']);
}

if (isset($_POST['deleteForumCommentAdmin'])) {
    ServiceForumComment::deleteForumComment($_GET['forumComment']);
}

if (isset($_GET['forumComment'])) {
    $forumComment = ServiceForumComment::getForumComment($_GET['forumComment']);
}

if (isset($_GET['forum'])) {
    $contadorComment = ServiceForumComment::getCountForumComment($_GET['forum']);
    $comentarioForum = ServiceForumComment::getCardCommentForumByForum($_GET['forum']);
    $tableForumComment = ServiceForumComment::listForumCommentByForum($_GET['forum']);
}
