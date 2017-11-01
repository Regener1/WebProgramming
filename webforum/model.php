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
    $query = 'select * from forums';
    $rows = mysqli_query($link,$query)
        or die("Ошибка " . mysqli_error($link));

    $index = 0;
    $fquery = array();
    if($rows)
    {
        while($row = mysqli_fetch_array($rows)){
            $fquery[$index] = $row;
            $index++;
        }
    }

    return $fquery;
}

function GetTopicCount($link, $forumTitle){
    $query = 'select count(*) as c from topics
              join forums on forums.id_forum = topics.forums_id_fk
              where forums.title = \''. $forumTitle.'\'';
    $count = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($count);
    return $result['c'];
}

function GetPostCount($link, $forumTitle){
    $query = 'select count(*) as c from posts
                join topics on topics.id_topick = posts.topics_id_fk
                join forums on forums.id_forum = topics.forums_id_fk
                where forums.title = \''. $forumTitle.'\'';

    $count = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($count);
    return $result['c'];
}

function GetLastPostForForumView($link, $forumTitle){
    $query = 'select topics.title as title,posts.author as author ,posts.date as date from posts
                join topics on topics.id_topick = posts.topics_id_fk
                join forums on forums.id_forum = topics.forums_id_fk
                where posts.id_posts = (select max(posts.id_posts) from posts 
                                                                   join topics on topics.id_topick = posts.topics_id_fk
                                                                   join forums on forums.id_forum = topics.forums_id_fk
                                                                   where forums.title = \''. $forumTitle.'\')';
    $row = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($row);
    return $result;
}

function GetAllTopicsById($link, $idForum){
    $query = 'select id_topick, title, author, date from topics
              where forums_id_fk = '.$idForum;
    $rows = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));

    $index = 0;
    $fquery = array();
    if($rows)
    {
        while($row = mysqli_fetch_array($rows)){
            $fquery[$index] = $row;
            $index++;
        }
    }

    return $fquery;
}

function GetTopicContent($link, $idTopic){
    $query = 'select title, date, author, text from topics
              where id_topick = '.$idTopic;
    $row = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $result = mysqli_fetch_array($row);
    return $result;
}

function GetPostsContent($link, $idTopic){
    $query = 'select * from posts
              where topics_id_fk = '.$idTopic;
    $rows = mysqli_query($link, $query)
    or die("Ошибка " . mysqli_error($link));

    $index = 0;
    $fquery = array();
    if($rows)
    {
        while($row = mysqli_fetch_array($rows)){
            $fquery[$index] = $row;
            $index++;
        }
    }

    return $fquery;
}

//function for validate user registration
function IsSingleName($link, $username){
    $query = 'select count(user_name) as user_name from user
              where user_name = \''.$username.'\'';
    $rows = mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($rows);
    if($row['user_name'] > 0){
        return false;
    }
    return true;
}

function IsSingleEmail($link, $email){
    $query = 'select count(email) as email from user
              where user_name = \''.$email.'\'';
    $rows = mysqli_query($link, $query)
    or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_array($rows);
    if($row['email'] > 0){
        return false;
    }
    return true;
}

function AddUser($link, $username, $email, $password){
    $query = 'insert into user(user_name, email, password)
              values(\''.$username.'\',\''.$email.'\',\''.$password.'\')';
    mysqli_query($link, $query)
    or die("Ошибка " . mysqli_error($link));;
}

function AddTopic($link, $title, $text, $filepath, $username, $forumId){
    $query = 'insert into topics(title, text, date, file_path, author, forums_id_fk)
              values(\''.$title.'\',\''.$text.'\', \'now()\',\''.$filepath.'\',\''.$username.'\',\''.$forumId.'\',)';
    mysqli_query($link, $query)
        or die("Ошибка " . mysqli_error($link));;
}

function AddTopic1($link, $title, $text, $filepath, $username){
    $query = 'insert into topics(title, text, date, file_path, author, forums_id_fk)
              values(\''.$title.'\',\''.$text.'\', \'now()\',\''.$filepath.'\',\''.$username.'\',\'null\',)';
    mysqli_query($link, $query)
    or die("Ошибка " . mysqli_error($link));;
}