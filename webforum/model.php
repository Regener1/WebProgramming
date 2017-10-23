<?php


function Connect($host, $user, $password, $database){
    $link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    return $link;
}

function Disconnect($link){
    mysqli_close($link);
}

function GetForumsTitles($link){
    $query = 'select title from forums';
    $rows = mysqli_query($link,$query)
        or die("Ошибка " . mysqli_error($link));

    $index = 0;
    $fquery = array();
    if($rows)
    {
        while($row = mysqli_fetch_array($rows)){
            $fquery[$index] = $row['title'];
            $index++;
        }
    }

    return $fquery;
}

function GetTopicCount($link, $forumTitle){
    $query = 'select count(*) as c from topics
              join forums 
              where forums.id_forum = topics.forums_id_fk &&
               forums.title = \''. $forumTitle.'\'';
    $count = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($count);
    return $result['c'];
}

function GetPostCount($link){
    $query = 'select count(*) as c from posts
                join topics
                join forums 
                where forums.id_forum = topics.forums_id_fk && 
                      topics.id_topick = posts.topics_id_fk';

    $count = mysqli_query($link, $query)
    or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($count);
    return $result['c'];
}