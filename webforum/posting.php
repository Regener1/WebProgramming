<?php require('header.php'); ?>

<div id="wrap-body">
    <div class="chunk">
        <div class="forumpost">
            <div id="p1" class="post bg">
                <div class="inner">

                    <div class="userinfo">
                        <label>User name</label><br>

                        <input type="text" tabindex="1"
                               name="username" id="username"
                               size="25" value=""
                               class="inputbox">
                    </div>

                    <div class="topicinfo">
                        <label>Title</label><br>
                        <input type="text" tabindex="1"
                               name="title" id="title"
                               size="25" value=""
                               class="inputbox" style="margin-bottom: 10px">

                        <br>

                        <label>Message</label><br>
                        <input type="text" tabindex="1"
                               name="message" id="message"
                               size="255" value=""
                               class="inputbox-message">

                        <br>

                        <label>Files</label><br>
                    </div>

                    <div class="buttons" style="margin-top: 30px">
                        <a href="posting.php"
                           class="button font-icon"
                           title="Post a new topic">Post to forum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php'); ?>
