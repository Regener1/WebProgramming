<?php require('header.php'); ?>

<div id="wrap-body">
    <div class="chunk">
        <form id="register" method="post" action="./ucp.php?style=2&amp;mode=register">

            <div class="panel">
                <div class="inner">

                    <fieldset class="fields2">
                        <dl>
                            <dt><label for="username">Username:</label><br><span>Username must be between 6 characters and 20 characters long and use only alphanumeric characters.</span></dt>
                            <dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth" title="Username"></dd>
                        </dl>
                        <dl>
                            <dt><label for="email">Email address:</label></dt>
                            <dd><input type="email" tabindex="2" name="email" id="email" size="25" maxlength="100" value="" class="inputbox autowidth" title="Email address" autocomplete="off"></dd>
                        </dl>
                        <dl>
                            <dt><label for="new_password">Password:</label><br><span>Must be between 6 characters and 100 characters.</span></dt>
                            <dd><input type="password" tabindex="4" name="new_password" id="new_password" size="25" value="" class="inputbox autowidth" title="New password" autocomplete="off"></dd>
                        </dl>
                        <dl>
                            <dt><label for="password_confirm">Confirm password:</label></dt>
                            <dd><input type="password" tabindex="5" name="password_confirm" id="password_confirm" size="25" value="" class="inputbox autowidth" title="Confirm password" autocomplete="off"></dd>
                        </dl>

                    </fieldset>
                </div>
            </div>

            <div class="panel">
                <div class="inner">

                    <fieldset class="submit-buttons">
                        <input type="hidden" name="agreed" value="true">
                        <input type="hidden" name="change_lang" value="0">
                        <input type="hidden" name="confirm_id" value="dc28ffc6793217f500c27e2f74baaf79">

                        <input type="reset" value="Reset" name="reset" class="button2"><input type="submit" tabindex="9" name="submit" id="submit" value="Submit" class="button1 default-submit-action">
                        <input type="hidden" name="creation_time" value="1507632865">
                        <input type="hidden" name="form_token" value="632801947501070c595c2de8790847fe5dd0292e">

                    </fieldset>

                </div>
            </div>
        </form>
    </div>
</div>

<?php require('footer.php'); ?>