<?php


class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }


    function action_index()
    {
        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('main.php','template_page.php', $data);
    }
}