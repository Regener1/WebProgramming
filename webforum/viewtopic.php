<?php require('header.php'); ?>


<?php
require_once 'connection.php';
include 'model.php';
$link = Connect($host, $user, $password, $database);

$idTopic = null;

if (isset($_GET['tid'])) {
    $idTopic = $_GET['tid'];
}

$topicContent = GetTopicContent($link, $idTopic);
$postsContent  = GetPostsContent($link, $idTopic);

?>

<div id="wrap-body">
    <div class="chunk">

<!--        <div class="buttons">-->
<!--            <a href="#"-->
<!--               class="button font-icon"-->
<!--               title="Post a new topic">Post Reply</a>-->
<!--        </div>-->

        <div class="forumpost">
            <div id="p1" class="post bg">
                <div class="inner">

                    <div class="postprofile"><?php echo $topicContent['author'] ?></div>

                    <div class="postbody">
                        <h3 class="posttitle"><?php echo $topicContent['title'] ?></h3>
                        <div class="posttime"><?php echo $topicContent['date'] ?></div>
                        <div class="postcontent">
                            <?php echo $topicContent['text'] ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        foreach ($postsContent as $value){
            echo "<div class=\"forumpost\">
            <div id=\"p1\" class=\"post bg\">
                <div class=\"inner\">

                    <div class=\"postprofile\">".$value['author']."</div>

                    <div class=\"postbody\">
                        <h3 class=\"posttitle\">Re: ".$topicContent['title']."</h3>
                        <div class=\"posttime\">".$value['date']."</div>
                        <div class=\"postcontent\">".$value['text']."</div>
                    </div>

                </div>
            </div>
        </div>";
        }
        ?>

    </div>
</div>

<?php
Disconnect($link);
?>

<?php require('footer.php'); ?>
