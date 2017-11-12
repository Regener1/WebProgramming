<?php

class Model_ViewTopic extends Model
{

    private function GetTopicContent($idTopic)
    {
        $stmt = $this->link->prepare('select title, date, author, text, file_path from topics
              where id_topic = ' . $idTopic);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    private function GetPostsContent($idTopic)
    {
        $stmt = $this->link->prepare('select text, date, author from posts
              where topics_id_fk = ' . $idTopic);
        $stmt->execute();

        $fquery = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($fquery, $row);
        }
        return $fquery;
    }

    public function get_data()
    {
        $result = array();

        $id = $_GET['id'];
        array_push($result, $this->GetTopicContent($id));
        array_push($result, $this->GetPostsContent($id));

        return $result;
    }
}