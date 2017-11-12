<?php

class Model_Main extends Model
{
    private function GetForumsTitles()
    {
        try {
            $stmt = $this->link->prepare('select id_forum, title from forums');
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

    private function GetTopicCount($forumTitle)
    {
        try {
            $stmt = $this->link->prepare('select count(*) as topiccount from topics
              join forums on forums.id_forum = topics.forums_id_fk
              where forums.title = \'' . $forumTitle . '\'');

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['topiccount'];
        } catch (Exception $e) {
            echo 'Выброшено исключение: ', $e->getMessage(), "\n";
        }
    }

    private function GetPostCount($forumTitle)
    {

        try {
            $stmt = $this->link->prepare('select count(*) as postcount from posts
                join topics on topics.id_topic = posts.topics_id_fk
                join forums on forums.id_forum = topics.forums_id_fk
                where forums.title = \'' . $forumTitle . '\'');
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['postcount'];
        } catch (Exception $e) {
            echo 'Выброшено исключение: ', $e->getMessage(), "\n";
        }
    }

    private function GetLastPost($forumTitle)
    {
        try {
            $stmt = $this->link->prepare('select topics.id_topic as lastpostid,
                                                 topics.title as lastposttitle,
                                                 posts.author as lastpostauthor, 
                                                 posts.date as lastpostdate from posts
                join topics on topics.id_topic = posts.topics_id_fk
                join forums on forums.id_forum = topics.forums_id_fk
                where posts.id_post = (select max(posts.id_post) from posts 
                                                                   join topics on topics.id_topic = posts.topics_id_fk
                                                                   join forums on forums.id_forum = topics.forums_id_fk
                                                                   where forums.title = \'' . $forumTitle . '\')');

            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo 'Выброшено исключение: ', $e->getMessage(), "\n";
        }

    }

    public function get_data()
    {
        $resdata = array();
        $forumsData = array();
        $lastpostsData = array();

        $lastpostsrow = null;
        $forums = $this->GetForumsTitles();

        foreach ($forums as $row) {
            $lastpostsrow = $this->GetLastPost($row['title']);
            $topicCount = $this->GetTopicCount($row['title']);
            $postCount = $this->GetPostCount($row['title']);

            array_push($forumsData, array(
                    $row['id_forum'],
                    $row['title'],
                    $topicCount,
                    $postCount,
                    $lastpostsrow['lastpostid'],
                    $lastpostsrow['lastposttitle'],
                    $lastpostsrow['lastpostauthor'],
                    $lastpostsrow['lastpostdate'])
            );

            array_push($lastpostsData, array(
                    $lastpostsrow['lastpostid'],
                    $lastpostsrow['lastposttitle'],
                    $lastpostsrow['lastpostauthor'],
                    $lastpostsrow['lastpostdate'])
            );
        }

        array_push($resdata, $forumsData, $lastpostsData);

        return $resdata;
    }
}