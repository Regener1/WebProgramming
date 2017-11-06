
<?php
require_once 'connection.php';
include 'model.php';
$link = Connect($host, $user, $password, $database);

$idForum = null;
if (isset($_GET['fid'])) {
    $idForum = $_GET['fid'];
}

$topicsArr = GetAllTopicsById($link, $idForum);


?>

    <div id="wrap-body">
        <div class="chunk">

            <form action="posting.php">
                <input type="hidden" name="idForum" value="<?php echo $idForum?>">
                <input style="margin-left: 0px; margin-bottom: 20px"
                       type="submit" name="submit" id="submit"
                       value="New Topic" class="button1 default-submit-action">
            </form>
<!--            <div class="buttons">-->
<!--                <a href="posting.php"-->
<!--                   class="button font-icon"-->
<!--                   title="Post a new topic">New Topic</a>-->
<!--            </div>-->

            <div id="forumlist">
                <div id="forumlist-inner">
                    <div class="forumblock blue">
                        <div class="header">Topics</div>
                        <ul class="forums">

                            <?php
                            foreach ($topicsArr as $value) {
                                echo
                                "<li class=\"row\">
                                        <ul class=\"rowcontent inlinelist\">
                                            <li class=\"theme\">
                                                <a href=\"viewtopic.php?tid=".$value['id_topick']."\">".$value['title']."</a><br>
                                                by ".$value['author']." ".$value['date']."
                                            </li>
                                            <li class=\"lastpost\">Re: <a href=\"#\">Post Sample</a><br>by
                                                <a href=\"#\">User123</a> 07 Dec 2015, 20:20
                                            </li>
                                        </ul>
                                    </li>";
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    Disconnect($link);
?>

