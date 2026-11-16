<?php

class MainViewController extends BaseController
{

    public function login()
    {
        $this->render('mainView/login');
    }

    public function index()
    {
        if ($_SESSION == null) {
            $this->redirect('produto', 'index');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION["userID"]);

            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else {
                $this->render('mainView/index', ["user" => $user]);
            }
        }
    }

}
?>