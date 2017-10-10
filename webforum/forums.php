<?php require('header.php'); ?>

<div id="wrap-body">
    <div class="chunk">

        <div class="buttons">
            <a href="posting.php"
               class="button font-icon"
               title="Post a new topic">New Topic</a>
        </div>

        <div id="forumlist">
            <div id="forumlist-inner">
                <div class="forumblock blue">
                    <div class="header">Topics</div>
                    <ul class="forums">
                        <li class="row">
                            <ul class="rowcontent inlinelist">
                                <li class="theme">
                                    <a href="viewtopic.php">Sample</a><br>
                                    by <a href="#">User123</a> 07 Dec 2015, 20:20
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

<?php require('footer.php'); ?>