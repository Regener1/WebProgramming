<?php
class Controller_ViewTopic extends Controller
{
    function __construct()
    {
        $this->model = new Model_ViewTopic();
        $this->view = new View();
    }

    function action_index()
    {
        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('viewtopic.php','template_page.php', $data);
    }
}