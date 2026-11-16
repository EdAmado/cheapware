<?php
require_once "BaseController.php";

class TipoprodutoController extends BaseController
{

    public function gestao()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $tipoProdutos = Tipoproduto::all();
                $this->render('tipoproduto/gestao', ["tipoProdutos" => $tipoProdutos]);
            }
        }
    }

    public function store()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);

            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $tipoProduto = new Tipoproduto($_POST);
                if ($tipoProduto->is_valid()) {
                    $tipoProduto->save();
                    $this->redirect('tipoproduto', 'gestao');
                } else {
                    $tipos = Tipoproduto::all();
                    $this->render('tipoproduto/gestao', ["tipoProdutos" => $tipos, "tipo" => $tipoProduto]);
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
                $this->redirect('mainView', 'index');
            } else {
                $updatedTipo = Tipoproduto::find([$id]);
                $updatedTipo->update_attributes($_POST);
                if ($updatedTipo->is_valid()) {
                    $updatedTipo->save();
                }
                $this->redirect('tipoproduto', 'gestao');

            }
        }
    }

    public function delete($id)
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);

            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $tipo = Tipoproduto::find([$id]);
                $produtos = Produto::find_all_by_id_tipoproduto($id);
                foreach ($produtos as $prod) {
                    $prod->delete();
                }
                $tipo->delete();
                $this->redirect('tipoproduto', 'gestao');

            }
        }
    }

}
?>