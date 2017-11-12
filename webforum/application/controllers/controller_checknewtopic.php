<?php
class Controller_CheckNewTopic extends Controller
{
    function __construct()
    {
        $this->model = new Model_CheckNewTopic();
        $this->view = new View();
    }


    function action_index()
    {
        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('checknewtopic.php','template_page.php', $data);
    }
}