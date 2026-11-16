<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>
    <div class="edit-div">
        <div class="data-div">
            <div class="data">
                <form method="post"
                    action="../../index.php?controller=utilizador&action=update&id=<?= $editUser->id_utilizador ?>">

                    <label>Nome de utilizador</label>
                    <input type="text" name="user[nomeutilizador]" value="<?= $editUser->nomeutilizador ?>"
                        readonly=true>

                    <label>Email</label>
                    <input type="text" name="user[email]" value="<?= $editUser->email ?>" readonly=true>


                    <label>Morada</label>
                    <input type="text" name="user[endereco]" value="<?= $editUser->endereco ?>" readonly=true>


                    <label>Contacto</label>
                    <input type="number" name="user[contacto]" value="<?= $editUser->contacto ?>" readonly=true>


                    <label>Código Postal</label>
                    <input type="text" name="postal[codigo]" value="<?= $editUser->postal->codigo ?>" readonly=true>



                    <label>Localidade</label>
                    <input type="text" name="postal[localidade]" value="<?= $editUser->postal->localidade ?>"
                        readonly=true>


                    <label>NIF</label>
                    <input type="number" name="user[nif]" value="<?= $editUser->nif ?>" readonly=true>

                    <label>Cargo</label>
                    <select name="user[cargo]" id="cargos">
                        <?php if ($editUser->cargo == "cliente") { ?>
                            <option value="cliente">Cliente</option>
                            <option value="funcionario">Funcionario</option>
                            <option value="admin">Admin</option>
                        <?php } else if ($editUser->cargo == "funcionario") { ?>
                                <option value="funcionario">Funcionario</option>
                                <option value="cliente">Cliente</option>
                                <option value="admin">Admin</option>
                        <?php } else { ?>
                                <option value="admin">Admin</option>
                                <option value="cliente">Cliente</option>
                                <option value="funcionario">Funcionario</option>
                        <?php } ?>

                    </select>
                    <div>
                        <input class="btn-styled" type="submit" value="Editar" style="margin: 0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>