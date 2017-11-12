<?php
class Model {

    private $host = 'localhost';
    private $database = 'forum';
    private $user = 'root';
    private $password = '';

    protected $link = null;

    public function connect(){
        $this->link =  new PDO('mysql:host='.$this->host.'; dbname='.$this->database,
            $this->user, $this->password);
    }

    public function close(){
        $this->link = null;
    }

    public function get_data()
    {

    }
}