<?php
class Controller_ViewTopic extends Controller
{
    function action_index()
    {
        $this->view->generate('viewtopic.php','template_page.php');
    }
}