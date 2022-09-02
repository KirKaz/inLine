<?php
require_once 'connect.php';
$data = json_decode(file_get_contents("php://input"), true);
$count = 0;
if(isset($data['string']) and $data['string'] != ''){
    $count++;
    $query        = "SELECT * FROM `Comments` WHERE `body` LIKE '%$data[string]%'";
    $commentsData = $link->query($query);
    if($commentsData->num_rows > 0){
        while($objComment = $commentsData->fetch_object()){

            if(isset($objComment->postId)){

                $newsData = $link->query("SELECT * FROM `News` WHERE `id` = $objComment->postId");
                while($objNews = $newsData->fetch_object()){
                    echo "<div><b> $objNews->title</b> <br>$objComment->body</div>";
                }
            }
        }
    }else{
        echo "<div>Нет результатов</div>";
    }
}
