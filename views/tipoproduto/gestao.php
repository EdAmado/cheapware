<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>


    <div class="hypertext-div">
        <button class="btn-styled" id="general" onclick="showForm()">Criar Tipo</button>
    </div>

    <div class="form-div" <?php if (!isset($tipo->errors)) { ?> style="display: none" <?php } else { ?>
            style="display: inline-block" <?php } ?>>
        <h1>Novo Tipo de Produto</h1>
        <form method="post" action="../../index.php?controller=tipoproduto&action=store">
            <div style="display: grid">
                <label>Tipo</label>
                <?php if (isset($tipo->errors)) { ?>
                    <a class="input-error">
                        <?= $tipo->errors->on('tipo'); ?>
                    </a>
                    <input type="text" name="tipo" <?php if (!empty($tipo->errors->on('tipo'))) { ?>
                            style="border-color: red" <?php } ?>>
                <?php } else { ?>

                    <input type="text" name="tipo">

                <?php } ?>
            </div>

            <div class="form-submit-btn">
                <input class="btn-styled" type="submit" value="Criar">
            </div>
        </form>
    </div>

    <script>
        function showForm() {
            const x = document.querySelector(".form-div");
            if (x.style.display === "none") {
                x.style.display = "inline-block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <div class="drawer-div">
        <div id="drawer">
            <ul class="tilesDrawer">
                <?php
                $tipoCounter = 0;
                foreach ($tipoProdutos as $tipo) {
                    $tipoCounter++;
                    $produtos = $tipo->get_products()
                        ?>
                    <div style="display: flex; justify-content: center; border: 3px solid #252727;">
                        <?php if ($tipo->has_products()) { ?>


                            <li id="tipo-drawer">
                                <h2>
                                    <?= $tipoCounter ?>
                                </h2>
                                <div class="form-div-<?= $tipoCounter ?>" style="display: none">
                                    <form method="post"
                                        action="../../index.php?controller=tipoproduto&action=update&id=<?= $tipo->id_tipoproduto ?>">
                                        <div style="display: grid">
                                            <label>Tipo</label>
                                            <input type="text" name="tipo" style="margin: 5px">
                                        </div>

                                        <div class="form-submit-btn">
                                            <input class="btn-styled" type="submit" value="Editar"
                                                style="padding: 10px 20px; margin: 0; font-size: revert; line-height: unset">
                                        </div>
                                    </form>
                                </div>
                                <h3 id="tipo-title-<?= $tipoCounter ?>" style="display:block">
                                    <?= $tipo->tipo ?>
                                </h3>

                                <button class="produto-button" id="edit" onclick="editForm(<?= $tipoCounter ?>)"
                                    style="color: #ffffff; margin-bottom: 5px">Editar
                                    Tipo</button>
                                    <?php if(!$tipo->has_products()){ ?>
                                <button class="produto-button" id="danger">
                                    <a href="../../index.php?controller=tipoproduto&action=delete&id=<?= $tipo->id_tipoproduto ?>">Eliminar
                                        Tipo</a>
                                </button>
                                   <?php } ?>
                            </li>
                            <div id="produto-drawer">
                                <table id="info-table">
                                    <thead style="align-content: center">
                                        <th>
                                            <h3>Nome</h3>
                                        </th>
                                        <th>
                                            <h3>Descrição</h3>
                                        </th>
                                        <th>
                                            <h3>Preço</h3>
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
                                                    <?= $produto->descricaoproduto ?>
                                                </td>
                                                <td>
                                                    <?= $produto->precounitario . " €" ?>
                                                </td>
                                                <td>
                                                    <button class="btn-styled">
                                                        <a
                                                            href="../../index.php?controller=produto&action=edit&id=<?= $produto->id_produto ?>">Editar
                                                            Produto</a>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>


                        <?php } else { ?>
                            <li id="tipo-drawer">
                                <h2>
                                    <?= $tipoCounter ?>
                                </h2>
                                <div class="form-div-<?= $tipoCounter ?>" style="display: none">
                                    <form method="post"
                                        action="../../index.php?controller=tipoproduto&action=update&id=<?= $tipo->id_tipoproduto ?>">
                                        <div style="display: grid">
                                            <label>Tipo</label>
                                            <input type="text" name="tipo" style="margin: 5px">
                                        </div>

                                        <div class="form-submit-btn">
                                            <input class="btn-styled" type="submit" value="Editar"
                                                style="padding: 10px 20px; margin: 0; font-size: revert; line-height: unset">
                                        </div>
                                    </form>
                                </div>
                                <h3 id="tipo-title-<?= $tipoCounter ?>" style="display:block">
                                    <?= $tipo->tipo ?>
                                </h3>

                                <button class="produto-button" id="edit" onclick="editForm(<?= $tipoCounter ?>)"
                                    style="color: #ffffff; margin-bottom: 5px">Editar
                                    Tipo</button>
                                <button class="produto-button" id="danger">
                                    <a href="../../index.php?controller=tipoproduto&action=delete&id=<?= $tipo->id_tipoproduto ?>">Eliminar
                                        Tipo</a>
                                </button>
                            </li>
                        <?php } ?>
                    </div>
                    <script>
                        function editForm(counter) {
                            const title = document.querySelector("#tipo-title-" + counter);
                            const form = document.querySelector(".form-div-" + counter);
                            if (title.style.display === "none") {
                                title.style.display = "block";
                                form.style.display = "none"
                            } else {
                                title.style.display = "none";
                                form.style.display = "block"
                            }
                        }
                    </script>
                <?php } ?>

            </ul>
        </div>
    </div>
</div>