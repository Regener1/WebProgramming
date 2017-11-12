<?php

class Model_CheckRegister extends Model
{
    private function IsSingleName($username){
        $stmt = $this->link->prepare('select count(user_name) as user_name from user
              where user_name = \''.$username.'\'');
        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['user_name'] > 0){
            return false;
        }
        return true;
    }

    private function IsSingleEmail($email){
        $stmt = $this->link->prepare('select count(email) as email from user
              where user_name = \''.$email.'\'');
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['email'] > 0){
            return false;
        }
        return true;
    }

    private function AddUser($username, $email, $password){
        $stmt = $this->link->prepare('insert into user(user_name, email, password)
              values(\''.$username.'\',\''.$email.'\',\''.$password.'\')');
        $stmt->execute();

    }

    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function check_length($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    private function equal_password($new_password, $password_confirm)
    {
        if ($new_password == $password_confirm) {
            return true;
        }
        return false;
    }


    public function get_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $new_password = $_POST['new_password'];
            $email = $_POST['email'];
            $password_confirm = $_POST['password_confirm'];

            $username = $this->clean($username);
            $new_password = $this->clean($new_password);
            $email = $this->clean($email);
            $password_confirm = $this->clean($password_confirm);

            $valid_count = 0;

            if (!empty($username) && !empty($new_password) && !empty($email) && !empty($password_confirm)) {
                $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
                if ($this->check_length($username, 4, 30) && $this->check_length($new_password, 4, 16) &&
                    $this->check_length($password_confirm, 4, 16) && $email_validate
                ) {

                    if ($this->equal_password($new_password, $password_confirm)) {
                        if ($this->IsSingleName($username)) {
                            $valid_count++;
                        } else {
                            return 'such username already exists';
                        }
                        if ($this->IsSingleEmail($email)) {
                            $valid_count++;
                        } else {
                            return 'such password already exists';
                        }

                        if ($valid_count == 2) {
                            $this->AddUser($username, $email, $new_password);
                            return 'You have successfully registered';
                        }
                    } else {
                        return 'Passwords do not match';
                    }
                } else {
                    return 'The entered data is incorrect';
                }
            } else {
                return 'Fill in the empty fields';
            }
        } else {
            header("Location: /index");
        }

    }
}