<?php
class Controller_ViewForums extends Controller
{
    function __construct()
    {
        $this->model = new Model_ViewForums();
        $this->view = new View();
    }

    function action_index()
    {

        $this->model->connect();
        $data = $this->model->get_data();
        $this->model->close();
        $this->view->generate('viewforums.php','template_page.php', $data);
    }
}