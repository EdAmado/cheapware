<div class="container-div">
    <div class="list-div" style="padding-top: 100px">
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

                    <button class="produto-button" id="danger" style="right: 40%; top: 4%;">
                        <a href="../../index.php?controller=favorito&action=remover&id=<?= $produto->id_produto ?>">Remover
                            Favorito</a>
                    </button>

                    <div id="produto-image">
                        <img src="./public/imgs/<?= $produto->imgproduto ?>">
                    </div>

                </li>
            <?php } ?>
        </ul>
    </div>
</div>