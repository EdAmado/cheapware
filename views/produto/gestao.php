<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>

    <div class="filter-div" style="padding-top: 100px; padding-left:12%; margin: 0; width: 75%">
        <div>
            <form method="post" action="../../index.php?controller=produto&action=gestao">
                <div style="color: white">
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
            <form method="post" action="../../index.php?controller=produto&action=gestao">
                <div style="color: white">
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

    <div class="hypertext-div">
        <a class="btn-styled" id="general" href="../../index.php?controller=produto&action=create">Criar Produto</a>
        <a class="btn-styled" id="general" href="../../index.php?controller=tipoproduto&action=gestao">Ver Tipos</a>
    </div>

    <div class="table-div">
        <?php if (!empty($produtos)) { ?>
            <table id="info-table">
                <thead style="align-content: center">
                    <th>
                        <h3>Nome</h3>
                    </th>
                    <th>
                        <h3>Tipo</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Preço</h3>
                    </th>
                    <th>
                        <h3>Quantidade Stock</h3>
                    </th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td>
                                <?= $produto->nomeproduto ?>
                            </td>
                            <td>
                                <?= $produto->tipoproduto->tipo ?>
                            </td>
                            <td>
                                <?= $produto->descricaoproduto ?>
                            </td>
                            <td>
                                <?= $produto->precounitario . " €" ?>
                            </td>
                            <td>
                                <?= $produto->quantidadestock ?>
                            </td>
                            <td>
                                <button class="btn-styled">
                                    <a href="../../index.php?controller=produto&action=edit&id=<?= $produto->id_produto ?>">Editar
                                        Produto</a>
                                </button>
                                <?php if ($produto->imgproduto != "") { ?>
                                    <button class="btn-styled">
                                        <a href="http://localhost/cheapware/public/imgs/<?= $produto->imgproduto ?>"
                                            target=”_blank”><i class="fa fa-file-image-o"></i></a>
                                    </button>
                                <?php } ?>
                                <button class="btn-styled">
                                    <a href="../../index.php?controller=produto&action=delete&id=<?= $produto->id_produto ?>"><i
                                            class="fa fa-trash-o"></i></a>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div style="display: flex; justify-content: center; align-items: center; height: 50vh">
                <img src="./public/imgs/confused-indian.gif" alt="empty products" style="max-width: 100%; height:auto;">
            </div>
        <?php } ?>
    </div>
</div>