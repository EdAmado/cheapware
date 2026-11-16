<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>
    <div class="edit-div">
        <div class="data-div">
            <div class="data">
                <form method="post" action="../../index.php?controller=utilizador&action=store">

                    <label>Nome de utilizador</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?= $registerUser->errors->on('nomeutilizador'); ?>
                        </a>
                        <input type="text" name="user[nomeutilizador]" value="<?= $post["user"]["nomeutilizador"] ?>" <?php if (!empty($registerUser->errors->on('nomeutilizador'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[nomeutilizador]" value="<?= $post["user"]["nomeutilizador"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[nomeutilizador]">
                        <?php }
                    } ?>


                    <label>Email</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?php if (is_array($registerUser->errors->on('email'))) {
                                echo $registerUser->errors->on('email')[0];
                            } else {
                                echo $registerUser->errors->on('email');
                            } ?>
                        </a>
                        <input type="text" name="user[email]" value="<?= $post["user"]["email"] ?>" <?php if (!empty($registerUser->errors->on('email'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[email]" value="<?= $post["user"]["email"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[email]">
                        <?php }
                    } ?>


                    <label>Password</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?= $registerUser->errors->on('password'); ?>
                        </a>
                        <input type="password" name="user[password]" value="<?= $post["user"]["password"] ?>" <?php if (!empty($registerUser->errors->on('password'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="password" name="user[password]" value="<?= $post["user"]["password"] ?>">
                        <?php } else { ?>
                            <input type="password" name="user[password]">
                        <?php }
                    } ?>


                    <label>Morada</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?= $registerUser->errors->on('endereco'); ?>
                        </a>
                        <input type="text" name="user[endereco]" value="<?= $post["user"]["endereco"] ?>" <?php if (!empty($registerUser->errors->on('endereco'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="user[endereco]" value="<?= $post["user"]["endereco"] ?>">
                        <?php } else { ?>
                            <input type="text" name="user[endereco]">
                        <?php }
                    } ?>


                    <label>Contacto</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?= $registerUser->errors->on('contacto'); ?>
                        </a>
                        <input type="number" name="user[contacto]" value="<?= $post["user"]["contacto"] ?>" <?php if (!empty($registerUser->errors->on('contacto'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="number" name="user[contacto]" value="<?= $post["user"]["contacto"] ?>">
                        <?php } else { ?>
                            <input type="number" name="user[contacto]">
                        <?php }
                    } ?>


                    <label>Código Postal</label>
                    <?php if (isset($registerPostal->errors)) { ?>
                        <a class="input-error">
                            <?php if (is_array($registerPostal->errors->on('codigo'))) {
                                echo $registerPostal->errors->on('codigo')[0];
                            } else {
                                echo $registerPostal->errors->on('codigo');
                            } ?>
                        </a>
                        <input type="text" name="postal[codigo]" value="<?= $post["postal"]["codigo"] ?>" <?php if (!empty($registerPostal->errors->on('codigo'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="postal[codigo]" value="<?= $post["postal"]["codigo"] ?>">
                        <?php } else { ?>
                            <input type="text" name="postal[codigo]">
                        <?php }
                    } ?>


                    <label>Localidade</label>
                    <?php if (isset($registerPostal->errors)) { ?>
                        <a class="input-error">
                            <?= $registerPostal->errors->on('localidade'); ?>
                        </a>
                        <input type="text" name="postal[localidade]" value="<?= $post["postal"]["localidade"] ?>" <?php if (!empty($registerPostal->errors->on('localidade'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else {
                        if (isset($post)) { ?>
                            <input type="text" name="postal[localidade]" value="<?= $post["postal"]["localidade"] ?>">
                        <?php } else { ?>
                            <input type="text" name="postal[localidade]">
                        <?php }
                    } ?>


                    <label>NIF</label>
                    <?php if (isset($registerUser->errors)) { ?>
                        <a class="input-error">
                            <?= $registerUser->errors->on('nif'); ?>
                        </a>
                        <input type="number" name="user[nif]" value="<?= $post["user"]["nif"] ?>" <?php if (!empty($registerUser->errors->on('nif'))) { ?> style="border-color: red" <?php } ?>>
                    <?php } else { ?>
                        <input type="number" name="user[nif]">
                    <?php } ?>


                    <?php
                    if (!empty($_SESSION)) { ?>
                        <label>Cargo</label>
                        <select name="user[cargo]" id="cargos">
                            <option value="cliente">Cliente</option>
                            <option value="funcionario">Funcionario</option>
                            <option value="admin">Admin</option>
                        </select>
                    <?php } ?>
                    <div>
                        <input class="btn-styled" type="submit" value="Registar" style="margin: 0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>