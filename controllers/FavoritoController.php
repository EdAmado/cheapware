<?php
require_once "BaseController.php";

class FavoritoController extends BaseController
{

    public function index()
    {
        $favoritos = Favorito::find_all_by_id_utilizador($_SESSION['userID']);

        if (!empty($favoritos)) {
            $produtos = [];
            foreach ($favoritos as $favorito) {
                $produtos[] = Produto::find_by_id_produto($favorito->id_produto);
            }
            $this->render('favorito/index', ['produtos' => $produtos]);
        } else {

            $this->redirect('produto', 'index');
        }
    }

    public function adicionar($id)
    {

        $produto = Produto::find_by_id_produto($id);

        if ($produto != null) {

            $favorito = new Favorito();
            $favorito->id_utilizador = $_SESSION['userID'];
            $favorito->id_produto = $produto->id_produto;
            $favorito->save();
            $this->redirect('favorito', 'index');
        } else {
            $this->redirect('produto', 'index');
        }
    }

    public function remover($id)
    {

        $favorito = Favorito::find_by_id_produto_and_id_utilizador($id, $_SESSION['userID']);

        if ($favorito != null) {
            $favorito->delete();
            $this->redirect('favorito', 'index');
        } else {
            $this->redirect('produto', 'index');
        }
    }

}
?>