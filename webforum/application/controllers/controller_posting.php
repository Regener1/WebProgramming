<?php


class Controller_Posting extends Controller
{
    function __construct()
    {
        $this->model = new Model_Posting();
        $this->view = new View();
    }

    function action_index()
    {
        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('posting.php','template_page.php', $data);
    }
}