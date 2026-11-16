<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>

    <div class="edit-div">
        <div class="data-div">
            <div class="data">
                <form method="post"
                    action="../../index.php?controller=produto&action=update&id=<?= $produto->id_produto ?>"
                    enctype="multipart/form-data">
                    <label>Tipo de Produto</label>
                    <select name="id_tipoproduto" id="tipos">
                        <?php $produtoTipo = Tipoproduto::find_by_id_tipoproduto($produto->id_tipoproduto) ?>
                        <option value="<?= $produto->id_tipoproduto ?>"><?= $produtoTipo->tipo ?></option>
                        <?php foreach ($tipos as $tipo) { ?>
                            <option value="<?= $tipo->id_tipoproduto ?>"><?= $tipo->tipo ?></option>
                        <?php } ?>
                    </select>


                    <label>Nome de Produto</label>
                    <?php if (isset($produto->errors)) { ?>
                        <a class="input-error">
                            <?= $produto->errors->on('nomeproduto'); ?>
                        </a>
                        <input type="text" name="nomeproduto" value="<?= $post["nomeproduto"] ?>" <?php if (!empty($produto->errors->on('nomeproduto'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="nomeproduto" value="<?= $post["nomeproduto"] ?>">
                        <?php } else { ?>
                            <input type="text" name="nomeproduto" value="<?= $produto->nomeproduto ?>">
                        <?php }
                    } ?>

                    <label>Descrição de Produto</label>
                    <?php if (isset($produto->errors)) { ?>
                        <a class="input-error">
                            <?= $produto->errors->on('descricaoproduto'); ?>
                        </a>
                        <input type="text" name="descricaoproduto" value="<?= $post["descricaoproduto"] ?>" <?php if (!empty($produto->errors->on('descricaoproduto'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="descricaoproduto" value="<?= $post["descricaoproduto"] ?>">
                        <?php } else { ?>
                            <input type="text" name="descricaoproduto" value="<?= $produto->descricaoproduto ?>">
                        <?php }
                    } ?>

                    <label>Preço de Produto</label>
                    <?php if (isset($produto->errors)) { ?>
                        <a class="input-error">
                            <?php if (is_array($produto->errors->on('precounitario'))) {
                                echo $produto->errors->on('precounitario')[0];
                            } else {
                                echo $produto->errors->on('precounitario');
                            } ?>
                        </a>
                        <input type="text" name="precounitario" value="<?= $post["precounitario"] ?>" <?php if (!empty($produto->errors->on('precounitario'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="precounitario" value="<?= $post["precounitario"] ?>">
                        <?php } else { ?>
                            <input type="text" name="precounitario" value="<?= $produto->precounitario ?>">
                        <?php }
                    } ?>

                    <label>Quantidade Stock</label>
                    <?php if (isset($produto->errors)) { ?>
                        <a class="input-error">
                            <?= $produto->errors->on('quantidadestock'); ?>
                        </a>
                        <input type="number" name="quantidadestock" value="<?= $post["quantidadestock"] ?>" <?php if (!empty($produto->errors->on('quantidadestock'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="number" name="quantidadestock" value="<?= $post["quantidadestock"] ?>">
                        <?php } else { ?>
                            <input type="number" name="quantidadestock" value="<?= $produto->quantidadestock ?>">
                        <?php }
                    } ?>

                    <label>Imagem (
                        <?= $produto->imgproduto ?>
                        )
                    </label>
                    <input type="file" name="imgproduto">

                    <div>
                        <input class="btn-styled" type="submit" value="Editar" style="margin: 0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>