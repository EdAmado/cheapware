<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>
    <div class="edit-div">
        <div class="data-div">
            <div class="data">
                <form method="post"
                    action="../../index.php?controller=utilizador&action=update&id=<?= $profileUser->id_utilizador ?>">

                    <label>Nome de utilizador</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?= $profileUser->errors->on('nomeutilizador'); ?>
                        </a>
                        <input type="text" name="user[nomeutilizador]" value="<?= $post["user"]["nomeutilizador"] ?>" <?php if (!empty($profileUser->errors->on('nomeutilizador'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[nomeutilizador]" value="<?= $post["user"]["nomeutilizador"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[nomeutilizador]" value="<?= $profileUser->nomeutilizador ?>">
                        <?php }
                    } ?>


                    <label>Email</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?php if (is_array($profileUser->errors->on('email'))) {
                                echo $profileUser->errors->on('email')[0];
                            } else {
                                echo $profileUser->errors->on('email');
                            } ?>
                        </a>
                        <input type="text" name="user[email]" value="<?= $post["user"]["email"] ?>" <?php if (!empty($profileUser->errors->on('email'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[email]" value="<?= $post["user"]["email"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[email]" value="<?= $profileUser->email ?>">
                        <?php }
                    } ?>


                    <label>Password</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?= $profileUser->errors->on('password'); ?>
                        </a>
                        <input type="password" name="user[password]" value="<?= $post["user"]["password"] ?>" <?php if (!empty($profileUser->errors->on('password'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="password" name="user[password]" value="<?= $post["user"]["password"] ?>">
                        <?php } else { ?>
                            <input type="password" name="user[password]" value="987654">
                        <?php }
                    } ?>


                    <label>Morada</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?= $profileUser->errors->on('endereco'); ?>
                        </a>
                        <input type="text" name="user[endereco]" value="<?= $post["user"]["endereco"] ?>" <?php if (!empty($profileUser->errors->on('endereco'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[endereco]" value="<?= $post["user"]["endereco"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[endereco]" value="<?= $profileUser->endereco ?>">
                        <?php }
                    } ?>


                    <label>Contacto</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?= $profileUser->errors->on('contacto'); ?>
                        </a>
                        <input type="number" name="user[contacto]" value="<?= $post["user"]["contacto"] ?>" <?php if (!empty($profileUser->errors->on('contacto'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="number" name="user[contacto]" value="<?= $post["user"]["contacto"] ?>">
                        <?php } else { ?>
                            <input type="number" name="user[contacto]" value="<?= $profileUser->contacto ?>">
                        <?php }
                    } ?>


                    <label>Código Postal</label>
                    <?php if (isset($profilePostal->errors)) { ?>
                        <a class="input-error">
                            <?php if (is_array($profilePostal->errors->on('codigo'))) {
                                echo $profilePostal->errors->on('codigo')[0];
                            } else {
                                echo $profilePostal->errors->on('codigo');
                            } ?>
                        </a>
                        <input type="text" name="postal[codigo]" value="<?= $post["postal"]["codigo"] ?>" <?php if (!empty($profilePostal->errors->on('codigo'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="postal[codigo]" value="<?= $post["postal"]["codigo"] ?>">
                        <?php } else { ?>
                            <input type="text" name="postal[codigo]" value="<?= $profileUser->postal->codigo ?>">
                        <?php }
                    } ?>


                    <label>Localidade</label>
                    <?php if (isset($profilePostal->errors)) { ?>
                        <a class="input-error">
                            <?= $profilePostal->errors->on('localidade'); ?>
                        </a>
                        <input type="text" name="postal[localidade]" value="<?= $post["postal"]["localidade"] ?>" <?php if (!empty($profilePostal->errors->on('localidade'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="postal[localidade]" value="<?= $post["postal"]["localidade"] ?>">
                        <?php } else { ?>
                            <input type="text" name="postal[localidade]" value="<?= $profileUser->postal->localidade ?>">
                        <?php }
                    } ?>


                    <label>NIF</label>
                    <?php if (isset($profileUser->errors)) { ?>
                        <a class="input-error">
                            <?= $profileUser->errors->on('nif'); ?>
                        </a>
                        <input type="number" name="user[nif]" value="<?= $post["user"]["nif"] ?>" <?php if (!empty($profileUser->errors->on('nif'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else { ?>
                        <input type="number" name="user[nif]" value="<?= $profileUser->nif ?>">
                    <?php } ?>

                    <div>
                        <input class="btn-styled" type="submit" value="Editar" style="margin: 0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>