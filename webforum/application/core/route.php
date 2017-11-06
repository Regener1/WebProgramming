<?php
    class Route{

        static function start(){

            $controller_name = 'Main';
            $action_name = 'index';
            $key_id = null;

            if(isset($_GET['id'])){
                $key_id = $_GET['id'];
            }

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            if(!empty($routes[1])){
                $page_name = explode('?', $routes[1]);
                $controller_name = $page_name[0];
            }

            $controller_name = 'Controller_'.$controller_name;
            $action_name = 'action_'.$action_name;

            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "application/controllers/".$controller_file;
            if(file_exists($controller_path))
            {
                include "application/controllers/".$controller_file;
            }
            else
            {
                /*
                правильно было бы кинуть здесь исключение,
                но для упрощения сразу сделаем редирект на страницу 404
                */
                echo 'file dont exist '.$controller_path;
            }

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;

            if(method_exists($controller, $action))
            {
                // вызываем действие контроллера
                $controller->$action();
            }
            else
            {
                // здесь также разумнее было бы кинуть исключение
                echo 'method dont exist';

            }
        }
    }
