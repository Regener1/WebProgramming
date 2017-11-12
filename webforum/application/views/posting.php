<div id="wrap-body">
    <div class="chunk">
        <form enctype="multipart/form-data" action="/checknewtopic" method="POST">
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
                            <textarea type="text" tabindex="1"
                                      name="message" id="message"
                                      size="255" value=""
                                      cols="80" rows="10"
                                      class="inputbox-message" style="resize: none"></textarea>

                            <br>

                            <label>Files</label><br>

                            <input type="hidden" name="idForum" value="<?php echo $data ?>">
                            <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="3000000000"/>
                            <!-- Название элемента input определяет имя в массиве $_FILES -->
                            Send this file. File size must < 3 MB: <input name="userfile" type="file"/>
                        </div>

                        <input style="margin-left: 0px"
                               type="submit" name="submit" id="submit"
                               value="Post to forum" class="button1 default-submit-action">
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

