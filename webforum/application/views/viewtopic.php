<div id="wrap-body">
    <div class="chunk">

        <div class="forumpost">
            <div id="p1" class="post bg">
                <div class="inner">

                    <div class="postprofile"><?php echo $data[0]['author'] ?></div>

                    <div class="postbody">
                        <h3 class="posttitle"><?php echo $data[0]['title'] ?></h3>
                        <div class="posttime"><?php echo $data[0]['date'] ?></div>
                        <div class="postcontent">
                            <?php echo $data[0]['text'] ?>
                        </div>
                        <?php if ($data[0]['file_path'] != 'null'): ?>
                            <div class="postfile">
                                <a href="http://webforum/<?php echo $data[0]['file_path'] ?>"
                                   download><b><?php echo explode('/', $data[0]['file_path'])[1]; ?></b></a>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>

        <?php foreach ($data[1] as $row): ?>
            <div class="forumpost">
                <div id="p1" class="post bg">
                    <div class="inner">

                        <div class="postprofile"><?php echo $row['author'] ?></div>

                        <div class="postbody">
                            <h3 class="posttitle">Re: <?php echo $data[0]['title'] ?></h3>
                            <div class="posttime"><?php echo $row['date'] ?></div>
                            <div class="postcontent"><?php echo $row['text'] ?></div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div id="toTop"><img src="js/up-arrow.png" ></div>
    </div>
</div>
