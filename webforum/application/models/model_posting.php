<?php

class Model_Posting extends Model
{
    public function get_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $_POST['idForum'];
        }


    }
}