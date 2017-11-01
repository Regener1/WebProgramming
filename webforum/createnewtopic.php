<?php

require_once 'connection.php';
include 'model.php';
$link = Connect($host, $user, $password, $database);

function clean($value = "")
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value = "", $min, $max)
{
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

function equal_password($new_password, $password_confirm){
    if($new_password == $password_confirm){
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploaddir = './files/';

    $username = $_POST['username'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

    $idForum = $_POST['idForum'];



    $username = clean($username);
    $new_password = clean($message);
    $title = clean($title);
    $idForum = clean($idForum);

    $valid_count = 0;

    if (!empty($username) && !empty($title) && !empty($message)) {
        if (check_length($username, 4, 30) && check_length($title, 4, 100)) {

            if($_FILES['uploadfile']['size'] != 0){
                if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
                {
                    echo "<h3>Файл успешно загружен на сервер</h3>";

                }
                else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }
            }


        } else {
            printMess("The entered data is incorrect");
        }
    } else {
        printMess("Fill in the empty fields");
    }
} else {
    header("Location: index.php");
}



Disconnect($link);