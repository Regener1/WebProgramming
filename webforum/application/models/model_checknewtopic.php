<?php

class Model_CheckNewTopic extends Model
{
    private function translit($str)
    {
        $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        return str_replace($rus, $lat, $str);
    }

    private function AddTopicWithoutFile($title, $text, $username, $forumId)
    {
        $stmt = $this->link->prepare('insert into topics(title, text, date, file_path, author, forums_id_fk)
              values(\'' . $title . '\',\'' . $text . '\', now(),\'null\',\'' . $username . '\',\'' . $forumId . '\')');
        $stmt->execute();

//        print_r($stmt->errorInfo());
    }

    private function AddTopicWithFile($title, $text, $filepath, $username, $forumId)
    {
        $stmt = $this->link->prepare('insert into topics(title, text, date, file_path, author, forums_id_fk)
              values(\'' . $title . '\',\'' . $text . '\', \'now()\',\'' . $filepath . '\',\'' . $username . '\',\'' . $forumId . '\')');
        $stmt->execute();
//        print_r($stmt->errorInfo());
    }

    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function check_length($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    public function get_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            @mkdir("uploads", 0777);
            $uploaddir = 'uploads/';

            $username = $_POST['username'];
            $title = $_POST['title'];
            $message = $_POST['message'];
            $idForum = $_POST['idForum'];

            $username = $this->clean($username);
            $message = $this->clean($message);
            $title = $this->clean($title);
            $idForum = $this->clean($idForum);

            $valid_count = 0;

            if (!empty($username) && !empty($title) && !empty($message)) {
                if ($this->check_length($username, 4, 30) && $this->check_length($title, 1, 100)) {
//                    if ($_FILES['userfile']['error'] !== UPLOAD_ERR_OK) {
//                        die("File upload error: {$_FILES['userfile']['error']}");
//                    }

                    if ($_FILES["userfile"]["size"] == 0) {
                        $this->AddTopicWithoutFile($title, $message, $username, $idForum);
                        return "Complete!";
                    }

                    if ($_FILES["userfile"]["size"] > 3 * 1024 * 1024) {
                        return "The file size exceeds three megabytes";
                    }
                    // Проверяем загружен ли файл
                    if (is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
                        // Если файл загружен успешно, перемещаем его
                        // из временной директории в конечную
                        $filepath = $uploaddir . $this->translit($_FILES["userfile"]["name"]);
                        copy($_FILES["userfile"]["tmp_name"], $filepath);

                        $this->AddTopicWithFile($title, $message, $filepath, $username, $idForum);
                        return "Complete!";
                    } else {
                        return "Error loading file";
                    }

                } else {
                    return "The entered data is incorrect";
                }
            } else {
                return "Fill in the empty fields";
            }
        } else {
            header("Location: /index");
        }

    }
}