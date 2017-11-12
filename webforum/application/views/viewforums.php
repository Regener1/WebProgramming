<div id="wrap-body">
    <div class="chunk">

        <form action="/posting" method="POST">
            <input type="hidden" name="idForum" value="<?php echo $data[0] ?>">
            <input style="margin-left: 0px; margin-bottom: 20px"
                   type="submit" name="submit" id="submit"
                   value="New Topic" class="button1 default-submit-action">
        </form>

        <div id="forumlist">
            <div id="forumlist-inner">
                <div class="forumblock blue">
                    <div class="header">Topics</div>
                    <ul class="forums">

                        <?php foreach ($data[1] as $topic): ?>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme">
                                        <a href="/viewtopic?id=<?php echo $topic['id_topic'] ?>">
                                            <?php echo $topic['title'] ?></a><br>
                                        by <?php echo $topic['author'] ?> <?php echo $topic['date'] ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



