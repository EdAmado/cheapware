<div class="container-div" style="padding-top: 70px">
    <div class="headline-page">
        <h1 id="headline" class="display-4">Produtos</h1>
    </div>
    <div class="filter-div">
        <div>
            <form method="post" action="../../index.php?controller=produto&action=index">
                <div style="">
                    <label>Filtrar</label>
                </div>
                <div id="input">
                    <select name="filter" id="filter-tipoProdutos">
                        <option value="">Todas</option>
                        <?php foreach ($tipoProdutos as $tipo) { ?>

                            <option value=<?= $tipo->id_tipoproduto ?>><?= $tipo->tipo ?></option>
                        <?php } ?>
                    </select>
                    <div>
                        <input class="btn-styled" style="margin-left: 10px" type="submit" value="Filtrar">
                    </div>
                </div>
            </form>
        </div>
        <div>
            <form method="post" action="../../index.php?controller=produto&action=index">
                <div style="">
                    <label>Pesquisar</label>
                </div>
                <div id="input">
                    <input type="text" name="search" id="search-filter"></input>
                    <div>
                        <input class="btn-styled" style="margin-left: 10px" type="submit" value="Pesquisar">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <div class="list-div">
        <?php if (!empty($produtos)) { ?>
            <ul class="tilesWrap">
                <?php
                $produtoCounter = 0;
                foreach ($produtos as $produto) {
                    $produtoCounter++;
                    ?>

                    <li id="produto-child">
                        <h2>
                            <?= $produtoCounter ?>
                        </h2>
                        <h3>
                            <?= $produto->tipoproduto->tipo ?>
                        </h3>
                        <p>
                            <?php echo nl2br("Nome: " . $produto->nomeproduto . "\n"); ?>
                            <?php echo nl2br("Descrição: " . $produto->descricaoproduto . "\n"); ?>
                            <?php echo nl2br("Preço: " . $produto->precounitario . "€\n"); ?>
                        </p>


                        <?php if (isset($_SESSION['userID']) && !$produto->is_favorito()) { ?>
                            <button class="produto-button">
                                <a
                                    href="../../index.php?controller=favorito&action=adicionar&id=<?= $produto->id_produto ?>">&#9733</a>
                            </button>
                        <?php } ?>

                        <div id="produto-image">
                            <img src="./public/imgs/<?= $produto->imgproduto ?>">
                        </div>

                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <div style="display: flex; justify-content: center; align-items: center; height: 50vh">
                <img src="./public/imgs/confused-indian.gif" alt="empty products" style="max-width: 100%; height:auto;">
            </div>
        <?php } ?>
    </div>
</div>