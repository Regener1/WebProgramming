<?php
class Controller_CheckRegister extends Controller
{
    function __construct()
    {
        $this->model = new Model_CheckRegister();
        $this->view = new View();
    }


    function action_index()
    {
        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('checkregister.php','template_page.php', $data);
    }
}