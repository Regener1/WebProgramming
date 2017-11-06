<?php


class Controller_Posting extends Controller
{
    function action_index()
    {
        $this->view->generate('posting.php','template_page.php');
    }
}