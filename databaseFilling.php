<?php
require_once 'connect.php';
$jsonNews     = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$jsonComments = file_get_contents('https://jsonplaceholder.typicode.com/comments');

if(!empty($jsonNews)){
    $idInDb     = "";
    $idArr      = [];
    $allNews    = json_decode($jsonNews, true);
    $newsCount  = 0;
    $newsIdList = $link->query("SELECT `id` FROM `News`");
    if($newsIdList){
        while($obj = $newsIdList->fetch_object()){
            $idArr[] = $obj->id;
        }
    }
    foreach($allNews as $news){
        if(!in_array($news['id'], $idArr)){
            $title = mysqli_escape_string($link, $news['title']);
            $body  = mysqli_escape_string($link, $news['body']);
            $query = "INSERT INTO `News` (`id`, `userId`, `title`, `body`) VALUES ( $news[id],$news[userId], '$title', '$body')";
            $link->query($query);
            $newsCount++;
        }
    }
}

if(!empty($jsonComments)){
    $idInDb         = "";
    $idArr          = [];
    $allComments    = json_decode($jsonComments, true);
    $commentsCount  = 0;
    $commentsIdList = $link->query("SELECT `id` FROM `Comments`");
    if($commentsIdList){
        while($obj = $commentsIdList->fetch_object()){
            $idArr[] = $obj->id;
        }
    }
    foreach($allComments as $comments){
        if(!in_array($comments['id'], $idArr)){
            $name  = mysqli_escape_string($link, $comments['name']);
            $email = mysqli_escape_string($link, $comments['email']);
            $title = mysqli_escape_string($link, $comments['title']);
            $body  = mysqli_escape_string($link, $comments['body']);
            $query = "INSERT INTO `Comments` (`id`, `postId`, `name`, `email`,`body`) VALUES ( $comments[id],$comments[postId], '$name', '$email','$body')";
            $link->query($query);
            $commentsCount++;
        }
    }
}

echo "Загружено $newsCount записей и $commentsCount комментариев";
