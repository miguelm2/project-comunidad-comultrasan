<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ServiceForumComment.php';

if (isset($_POST['newForumComment'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceForumComment::newForumComment($_GET['forum'], $_SESSION['id'], $_POST['comentario']);
}

if (isset($_POST['editForumComment'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    $response = ServiceForumComment::setForumComment($_GET['forumComment'], $_POST['comentario']);
}

if (isset($_POST['deleteForumComment'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
    ServiceForumComment::deleteForumComment($_POST['comment']);
}

if (isset($_POST['deleteForumCommentAdmin'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token inválido.");
    }
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
