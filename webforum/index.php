<?php require('header.php'); ?>

<?php
    require_once 'connection.php';
    include 'model.php';
    $link = Connect($host, $user, $password, $database);

    $forumTitles = GetForumsTitles($link);
?>

    <div id="wrap-body">
        <div class="chunk">
            <div id="sidebar">
                <div class="forumblock dark">
                    <div class="header">Last posts</div>
                    <ul class="forums inlinelist">
                        <li class="rowcontent row">
                            Re: <a href="#">Post Sample</a><br>by
                            <a href="#">User123</a> 07 Dec 2015, 20:20

                        </li>
                    </ul>
                </div>
            </div>

            <div id="forumlist">
                <div id="forumlist-inner">
                    <div class="forumblock blue">
                        <div class="header">Theme</div>
                        <ul class="forums">
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme"><a href="forums.php"><?php echo $forumTitles[0] ?></a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[0])?> topics<br>
                                        <?php echo GetPostCount($link)?> posts
                                    </li>
                                    <li class="lastpost">Re: <a href="#">Post Sample</a><br>by
                                        <a href="#">User123</a> 07 Dec 2015, 20:20
                                    </li>
                                </ul>
                            </li>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme"><a href="#"><?php echo $forumTitles[1] ?></a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[1])?> topics<br>
                                        <?php echo GetPostCount($link)?> posts
                                    </li>
                                    <li class="lastpost">Re: <a href="#">Post Sample</a><br>by
                                        <a href="#">User123</a> 07 Dec 2015, 20:20
                                    </li>
                                </ul>
                            </li>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme"><a href="#"><?php echo $forumTitles[2] ?></a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[2])?> topics<br>
                                        <?php echo GetPostCount($link)?> posts
                                    </li>
                                    <li class="lastpost">Re: <a href="#">Post Sample</a><br>by
                                        <a href="#">User123</a> 07 Dec 2015, 20:20
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    Disconnect($link);
?>

<?php require('footer.php'); ?>