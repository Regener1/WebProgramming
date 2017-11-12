<?php

class Model_ViewForums extends Model
{

    private function GetAllTopicsById($idForum)
    {
        try {
            $stmt = $this->link->prepare('select id_topic, title, author, date from topics
              where forums_id_fk = ' . $idForum);
            $stmt->execute();

            $fquery = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($fquery, $row);
            }

            return $fquery;
        } catch (Exception $e) {
            echo 'Выброшено исключение: ', $e->getMessage(), "\n";
        }
    }

    public function get_data()
    {
        $resdata = array();

        $id = $_GET['id'];
        $topics = $this->GetAllTopicsById($id);
        array_push($resdata, $id);
        array_push($resdata, $topics);

        return $resdata;
    }
}