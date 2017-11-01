<?php require('header.php'); ?>

<?php

require_once 'connection.php';
include 'model.php';
$link = Connect($host, $user, $password, $database);

function printMess($mess){
    echo
    "<div id=\"wrap-body\">
        <div class=\"chunk\">
            <div class=\"panel\">
            <h3>".$mess."</h3>
            </div>
            
            <form action=\"register.php\">
                <div class=\"panel\">
                    <div class=\"inner\">
    
                        <fieldset class=\"submit-buttons\">
    
                            <input type=\"submit\" tabindex=\"9\" name=\"submit\" id=\"submit\" value=\"Back\" class=\"button1 default-submit-action\">
    
                        </fieldset>
    
                    </div>
                </div>
            </form>
        </div>
    </div>";
}

function clean($value = "")
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value = "", $min, $max)
{
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

function equal_password($new_password, $password_confirm){
    if($new_password == $password_confirm){
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $email = $_POST['email'];
    $password_confirm = $_POST['password_confirm'];

    $username = clean($username);
    $new_password = clean($new_password);
    $email = clean($email);
    $password_confirm = clean($password_confirm);

    $valid_count = 0;

    if (!empty($username) && !empty($new_password) && !empty($email) && !empty($password_confirm)) {
        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (check_length($username, 4, 30) && check_length($new_password, 4, 16) &&
            check_length($password_confirm, 4, 16) && $email_validate) {

            if(equal_password($new_password, $password_confirm)){
                if(IsSingleName($link, $username)){
                    $valid_count++;
                }
                else{
                    printMess('such username already exists');
                }
                if(IsSingleName($link, $username)){
                    $valid_count++;
                }
                else{
                    printMess('such password already exists');
                }

                if($valid_count == 2){
                    AddUser($link, $username, $email, $new_password);
                    printMess('You have successfully registered');
                }
            }
            else{
                printMess("Passwords do not match");
            }
        } else {
            printMess("The entered data is incorrect");
        }
    } else {
        printMess("Fill in the empty fields");
    }
} else {
    header("Location: index.php");
}

Disconnect($link);
?>




<?php require('footer.php'); ?>