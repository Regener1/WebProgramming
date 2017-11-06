<?php
class Controller_ViewForums extends Controller
{
    function action_index()
    {
        $this->view->generate('viewforums.php','template_page.php');
    }
}