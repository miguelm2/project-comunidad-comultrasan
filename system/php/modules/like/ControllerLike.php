<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/forum/ServiceForum.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/like/ServiceLike.php';

if (isset($_POST['newForum'])) {
    $meGustaDTO = ServiceLike::getLike($_POST['forum']);
    if($meGustaDTO){
        $response = ServiceLike::newLike($_POST['forum']);
    }else{
        $response = ServiceLike::deleteLike($_POST['forum']);
    }
}