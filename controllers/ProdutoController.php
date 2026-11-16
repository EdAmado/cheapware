<?php
require_once "BaseController.php";

class ProdutoController extends BaseController
{

    public function index()
    {

        $produtos = "null";
        $tipoProdutos = Tipoproduto::all();

        if (isset($_POST['filter'])) {
            if ($_POST['filter'] != "") {
                $produtos = Produto::find_all_by_id_tipoproduto($_POST['filter']);
            }
        } else if (isset($_POST['search'])) {
            if ($_POST['search'] != "") {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cheapware";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                $query = $_POST['search'];

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM produto WHERE nomeproduto LIKE '%$query%' OR descricaoproduto LIKE '%$query%'";

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error executing query: " . mysqli_error($conn));
                } else {
                    $auxProduto = [];
                    foreach ($result as $res) {
                        $auxProduto[] = new Produto($res);
                    }
                    $produtos = $auxProduto;
                }
            }
        }

        if ($produtos == "null") {
            $produtos = Produto::all();
        }

        $this->render('produto/index', ['produtos' => $produtos, 'tipoProdutos' => $tipoProdutos]);
    }

    public function gestao()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $produtos = "null";
                $tipoProdutos = Tipoproduto::all();

                if (isset($_POST['filter'])) {
                    if ($_POST['filter'] != "") {
                        $produtos = Produto::find_all_by_id_tipoproduto($_POST['filter']);
                    }
                } else if (isset($_POST['search'])) {
                    if ($_POST['search'] != "") {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "cheapware";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        $query = $_POST['search'];

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM produto WHERE nomeproduto LIKE '%$query%' OR descricaoproduto LIKE '%$query%'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die("Error executing query: " . mysqli_error($conn));
                        } else {
                            $auxProduto = [];
                            foreach ($result as $res) {
                                $auxProduto[] = new Produto($res);
                            }
                            $produtos = $auxProduto;
                        }
                    }
                }

                if ($produtos == "null") {
                    $produtos = Produto::all();
                }
                $this->render('produto/gestao', ['produtos' => $produtos, 'tipoProdutos' => $tipoProdutos]);
            }
        }
    }

    public function create()
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $tipos = Tipoproduto::find("all");
                $this->render('produto/create', ['tipos' => $tipos]);
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
                $produtoPost = $_POST;
                if ($produtoPost['quantidadestock'] == '') {
                    $produtoPost['quantidadestock'] = intval($produtoPost['quantidadestock']);
                }

                $produto = new Produto($produtoPost);
                if ($produto->is_valid()) {
                    $image = $_FILES['imgproduto'];
                    if (!file_exists("./public/imgs/" . $image['name']) && $image['name'] != '') {
                        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
                        $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                        if (in_array($fileExtension, $validExtensions) && $image['size'] < 5000000) {
                            $filePath = ".\public\imgs\\" . $image['name'];
                            move_uploaded_file($image['tmp_name'], $filePath);
                        }
                        $produto->imgproduto = $image['name'];
                    }

                    $produto->save();
                    $this->redirect('produto', 'gestao');
                } else {

                    $tipos = Tipoproduto::find("all");
                    $post = $_POST;
                    $this->render('produto/create', ['produto' => $produto, 'tipos' => $tipos, 'post' => $post]);
                }
            }
        }
    }

    public function edit($id)
    {
        if ($_SESSION == null) {
            $this->redirect('mainView', 'login');
        } else {
            $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);
            if ($user->cargo == "cliente") {
                $this->redirect('mainView', 'index');
            } else {
                $produto = Produto::find_by_id_produto($id);
                $tipos = Tipoproduto::find_by_sql("select * from tipoproduto where id_tipoproduto <> '$produto->id_tipoproduto'");
                $this->render('produto/edit', ['produto' => $produto, 'tipos' => $tipos]);
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
                $produto = Produto::find([$id]);

                $produtoPost = $_POST;
                if ($produtoPost['quantidadestock'] == '') {
                    $produtoPost['quantidadestock'] = intval($produtoPost['quantidadestock']);
                }
                $produto->update_attributes($produtoPost);
                if ($produto->is_valid()) {
                    $image = $_FILES['imgproduto'];
                    if (!file_exists("./public/imgs/" . $image['name']) && $image['name'] != '') {
                        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
                        $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

                        if (in_array($fileExtension, $validExtensions) && $image['size'] < 5000000) {
                            $filePath = ".\public\imgs\\" . $image['name'];
                            move_uploaded_file($image['tmp_name'], $filePath);
                        }
                        $produto->imgproduto = $image['name'];
                    }
                    $produto->save();
                    $this->redirect('produto', 'gestao');
                } else {
                    $post = $_POST;
                    $tipos = Tipoproduto::find_by_sql("select * from tipoproduto where id_tipoproduto <> '$produto->id_tipoproduto'");
                    $this->render('produto/edit', ['produto' => $produto, 'tipos' => $tipos, 'post' => $post]);
                }
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
                $produto = Produto::find($id);
                $produto->delete();
                $this->redirect('produto', 'gestao');

            }
        }
    }

}
?>