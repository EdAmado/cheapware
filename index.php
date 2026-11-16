<?php
require_once "startup/boot.php";
require_once "controllers/CarrinhoController.php";
require_once "controllers/CompraController.php";
require_once "controllers/FavoritoController.php";
require_once "controllers/NovidadeController.php";
require_once "controllers/PostalController.php";
require_once "controllers/ProdutoController.php";
require_once "controllers/TipoprodutoController.php";
require_once "controllers/UtilizadorController.php";
require_once "controllers/MainViewController.php";

$carrinhoController = new CarrinhoController();
$compraController = new CompraController();
$favoritoController = new FavoritoController();
$novidadeController = new NovidadeController();
$postalController = new PostalController();
$produtoController = new ProdutoController();
$tipoprodutoController = new TipoprodutoController();
$utilizadorController = new UtilizadorController();
$mainViewController = new MainViewController();

if (isset($_GET['controller']) == false && isset($_GET['action']) == false) {
    $mainViewController->login();
} else {
    $controller = $_GET['controller'];
    $action = $_GET['action'];

    switch ($controller) {
        case 'favorito':
            switch ($action) {
                case 'index':
                    $favoritoController->index();
                    break;
                case 'adicionar':
                    $favoritoController->adicionar($_GET['id']);
                    break;
                case 'remover':
                    $favoritoController->remover($_GET['id']);
                    break;

            }
            break;
        case 'produto':
            switch ($action) {
                case 'index':
                    $produtoController->index();
                    break;
                case 'gestao':
                    $produtoController->gestao();
                    break;
                case 'create':
                    $produtoController->create();
                    break;
                case 'store':
                    $produtoController->store();
                    break;
                case 'edit':
                    $produtoController->edit($_GET['id']);
                    break;
                case 'update':
                    $produtoController->update($_GET['id']);
                    break;
                case 'delete':
                    $produtoController->delete($_GET['id']);
                    break;
            }
            break;
        case 'tipoproduto':
            switch ($action) {
                case 'gestao':
                    $tipoprodutoController->gestao();
                    break;
                case 'store':
                    $tipoprodutoController->store();
                    break;
                case 'update':
                    $tipoprodutoController->update($_GET['id']);
                    break;
                case 'delete':
                    $tipoprodutoController->delete($_GET['id']);
                    break;
            }
            break;
        case 'utilizador':
            switch ($action) {
                case 'gestao':
                    $utilizadorController->gestao();
                    break;
                case 'register':
                    $utilizadorController->register();
                    break;
                case 'edit':
                    $utilizadorController->edit($_GET['id']);
                    break;
                case 'auth':
                    $utilizadorController->auth($_POST['username'], $_POST['password']);
                    break;
                case 'logout':
                    $utilizadorController->logout();
                    break;
                case 'store':
                    $utilizadorController->store();
                    break;
                case 'update':
                    $utilizadorController->update($_GET['id']);
                    break;
                case 'profile':
                    $utilizadorController->profile();
                    break;
            }
            break;
        case 'mainView':
            switch ($action) {
                case 'index':
                    $mainViewController->index();
                    break;
                case 'login':
                    $mainViewController->login();
                    break;
            }
            break;
    }
}
?>