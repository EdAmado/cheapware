<?php

class BaseController
{
    public function redirect($controller, $action)
    {
        header('Location: http://localhost/cheapware/index.php?controller=' . $controller . '&action=' . $action);
    }

    public function render($view, $params = [])
    {
        extract($params);

        require_once "./views/layouts/header.php";
        require_once "./views/" . $view . ".php";
    }

}

?>