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
                        <?php $lastPost = GetLastPostForForumView($link, $forumTitles[0]['title']); ?>
                        <li class="rowcontent row">
                            Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                            <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
                        </li>
                        <?php $lastPost = GetLastPostForForumView($link, $forumTitles[1]['title']); ?>
                        <li class="rowcontent row">
                            Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                            <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
                        </li>
                        <?php $lastPost = GetLastPostForForumView($link, $forumTitles[2]['title']); ?>
                        <li class="rowcontent row">
                            Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                            <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
                        </li>

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
                                    <li class="theme">
                                        <a href="forums.php?fid=<?php echo $forumTitles[0]['id_forum'];?>">
                                            <?php echo $forumTitles[0]['title']; ?>
                                        </a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[0]['title']);?> topics<br>
                                        <?php echo GetPostCount($link, $forumTitles[0]['title']);?> posts
                                    </li>

                                    <?php $lastPost = GetLastPostForForumView($link, $forumTitles[0]['title']); ?>
                                    <li class="lastpost">Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                                        <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
                                    </li>
                                </ul>
                            </li>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme">
                                        <a href="forums.php?fid=<?php echo $forumTitles[1]['id_forum'];?>">
                                            <?php echo $forumTitles[1]['title']; ?>
                                        </a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[1]['title']); ?> topics<br>
                                        <?php echo GetPostCount($link, $forumTitles[1]['title']); ?> posts
                                    </li>

                                    <?php $lastPost = GetLastPostForForumView($link, $forumTitles[1]['title']); ?>
                                    <li class="lastpost">Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                                        <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
                                    </li>
                                </ul>
                            </li>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme">
                                        <a href="forums.php?fid=<?php echo $forumTitles[2]['id_forum'];?>">
                                            <?php echo $forumTitles[2]['title']; ?>
                                        </a></li>
                                    <li class="posts">
                                        <?php echo GetTopicCount($link, $forumTitles[2]['title']); ?> topics<br>
                                        <?php echo GetPostCount($link, $forumTitles[2]['title']); ?> posts
                                    </li>

                                    <?php $lastPost = GetLastPostForForumView($link, $forumTitles[2]['title']); ?>
                                    <li class="lastpost">Re: <a href="#"><?php echo $lastPost['title']?></a><br>by
                                        <?php echo $lastPost['author']?> <?php echo $lastPost['date']?>
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