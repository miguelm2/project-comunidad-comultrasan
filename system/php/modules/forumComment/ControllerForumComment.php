<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forumComment/ServiceForumComment.php';

if (isset($_POST['newForumComment'])) {
    $response = ServiceForumComment::newForumComment($_GET['forum'], $_SESSION['id'], $_POST['comentario']);
}

if (isset($_POST['setForum'])) {
    $response = ServiceForum::setForum($_GET['forum'], $_POST['contenido'], $_POST['titulo']);
}

if (isset($_POST['deleteForum'])) {
    ServiceForum::deleteForum($_GET['forum']);
}


