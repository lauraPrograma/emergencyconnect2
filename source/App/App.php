<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("home",[]);
    }

    public function profile ()
    {
        echo $this->view->render("profile",[]);
    }

    public function EmergencyForm (array $data)
    {
        echo $this->view->render("EmergencyForm", []);
    }
    public function ocorrencia (array $data)
    {
        echo $this->view->render("ocorrencia", []);
    }
    public function alteration()
    {
        echo "";
        echo $this ->view -> render ("alteration");
    }
 
}