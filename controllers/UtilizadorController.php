<?php

class UtilizadorController extends BaseController
{
    public function __construct()
    {
        session_start();
    }


    public function gestao()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente" || $user->cargo == "funcionario") {
                $this->redirect('mainView', 'index');
            } else {
                $users = Utilizador::find_by_sql("select * from utilizador where id_utilizador <> '$_SESSION[userID]'");
                $this->render('utilizador/gestao', ["users" => $users]);
            }
        }
    }

    public function register()
    {

        if ($_SESSION != null) {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else if ($user->cargo == "funcionario") {
                $this->redirect('mainView', 'index');
            }
        }
        $this->render('utilizador/register');
    }

    public function store()
    {

        if ($_SESSION != null) {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else if ($user->cargo == "funcionario") {
                $this->redirect('mainView', 'index');
            }
        }
        $postal = $_POST['postal'];
        $newPostal = new Postal($postal);

        $user = $_POST['user'];
        if ($user['contacto'] == '') {
            $user['contacto'] = intval($user['contacto']);
        }
        if ($user['nif'] == '') {
            $user['nif'] = intval($user['nif']);
        }
        $newUser = new Utilizador($user);

        if (empty($_SESSION)) {
            $newUser->cargo = "cliente";
        }

        if ($newUser->is_valid() && $newPostal->is_valid() && $newPostal->save()) {
            $newPostal = Postal::last();
            $newUser->id_postal = $newPostal->id_postal;
            $newUser->password = md5($newUser->password);
            if ($newUser->save()) {
                if (empty($_SESSION)) {
                    $this->redirect("mainView", "login");
                } else {
                    $this->redirect("utilizador", "gestao");
                }
            }
        }
        $post = $_POST;
        $this->render("utilizador/register", ["registerUser" => $newUser, "registerPostal" => $newPostal, 'post' => $post]);

    }

    public function edit($id)
    {

        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else {
                $user = Utilizador::find_by_id_utilizador($id);
                if ($user->id_utilizador != $_SESSION['userID']) {
                    $this->render('utilizador/edit', ['editUser' => $user]);
                } else {
                    $this->redirect("utilizador", "profile");
                }
            }
        }

    }

    public function update($id)
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else {
                $user = Utilizador::find_by_id_utilizador($id);
                if ($user->id_utilizador != $_SESSION['userID']) {
                    $user->update_attributes($_POST['user']);
                    $user->save();
                    $this->redirect("utilizador", "gestao");
                } else {
                    $postal = Postal::find_by_id_postal($user->id_postal);
                    $postal->update_attributes($_POST['postal']);
                    if ($postal->is_valid()) {
                        $postal->save();
                        if ($_POST['user']['password'] == "987654") {
                            $_POST['user']['password'] = $user->password;
                        } else if ($_POST['user']['password'] != "") {
                            $_POST['user']['password'] = md5($_POST['user']['password']);
                        }
                        if ($_POST['user']['contacto'] == '') {
                            $_POST['user']['contacto'] = intval($_POST['user']['contacto']);
                        }
                        if ($_POST['user']['nif'] == '') {
                            $_POST['user']['nif'] = intval($_POST['user']['nif']);
                        }
                        $user->update_attributes($_POST['user']);
                        if ($user->is_valid()) {
                            $user->save();
                            $this->redirect("mainView", "index");
                        } else {
                            if ($_POST['user']['password'] != "") {
                                $_POST['user']['password'] = "987654";
                            }
                        }
                    }
                    $post = $_POST;
                    $this->render("utilizador/profile", ["profileUser" => $user, "profilePostal" => $postal, 'post' => $post]);
                }
            }
        }
    }

    public function profile()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('produto', 'index');
            } else {
                $this->render("utilizador/profile", ["profileUser" => $user]);
            }
        }
    }


    public function auth($username, $password)
    {
        $hashPassword = md5($password);

        $user = Utilizador::find_by_nomeutilizador_and_password($username, $hashPassword);

        if ($user != null) {
            $_SESSION["userID"] = $user->id_utilizador;
            if ($user->cargo == "funcionario" || $user->cargo == "admin") {
                $this->redirect('mainView', 'index');
            } else {
                $this->redirect('produto', 'index');
            }
        } else {
            $this->render('mainView/login', ['message' => 'Username ou Password incorreto']);
        }

    }

    public function logout()
    {
        if (session_destroy()) {
            $this->redirect('mainView', 'login');
        }
    }
}
?>