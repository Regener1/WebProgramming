<?php


class Controller_Register extends Controller
{
    function action_index()
    {
        $this->view->generate('register.php','template_page.php');
    }
}