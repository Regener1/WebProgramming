<div id="wrap-body">
    <div class="chunk">
        <div id="sidebar">
            <div class="forumblock dark">
                <div class="header">Last posts</div>
                <ul class="forums">
                    <?php foreach ($data[1] as $lastPost): ?>
                        <li class="row">
                            <ul class="rowcontent inlinelist">
                                <li style="font-size: 1.3em; padding: 10px 0 10px 10px;">
                                <li class="lastpostpreview">
                                    Re:
                                    <a href="/viewtopic?id=<?php echo $lastPost[0]; ?>"><?php echo $lastPost[1] ?></a><br>by
                                    <?php echo $lastPost[2] ?> <?php echo $lastPost[3] ?>
                                </li>
                                </li>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </div>

        <div id="forumlist">
            <div id="forumlist-inner">
                <div class="forumblock blue">
                    <div class="header">Theme</div>
                    <ul class="forums ">

                        <?php foreach ($data[0] as $forums): ?>
                            <li class="row">
                                <ul class="rowcontent inlinelist">
                                    <li class="theme">
                                        <a href="/viewforums?id=<?php echo $forums[0]; ?>">
                                            <?php echo $forums[1]; ?>
                                        </a></li>
                                    <li class="posts">
                                        <?php echo $forums[2]; ?> topics<br>
                                        <?php echo $forums[3]; ?> posts
                                    </li>

                                    <li class="lastpost">Re: <a href="/viewtopic?id=<?php echo $forums[4] ?>">
                                            <?php echo $forums[5] ?></a><br>by
                                        <?php echo $forums[6] ?> <?php echo $forums[7] ?>
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

