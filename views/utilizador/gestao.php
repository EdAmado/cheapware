<div class="container-div" style="padding-top: 70px">
    <div class="background-image-div" style="background-image: url('./public/imgs/backoffice-wallpaper.jpg')"></div>

    <div class="hypertext-div">
        <a class="btn-styled" id="general" href="../../index.php?controller=utilizador&action=register">Registar
            Utilizador</a>
    </div>

    <div class="table-div">
        <table id="info-table">
            <thead style="align-content: center">
                <th>
                    <h3>Nome</h3>
                </th>
                <th>
                    <h3>Email</h3>
                </th>
                <th>
                    <h3>Endereço</h3>
                </th>
                <th>
                    <h3>Contacto</h3>
                </th>
                <th>
                    <h3>Codigo Postal</h3>
                </th>
                <th>
                    <h3>Localidade</h3>
                </th>
                <th>
                    <h3>NIF</h3>
                </th>
                <th>
                    <h3>Cargo</h3>
                </th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td>
                            <?= $user->nomeutilizador ?>
                        </td>
                        <td>
                            <?= $user->email ?>
                        </td>
                        <td>
                            <?= $user->endereco ?>
                        </td>
                        <td>
                            <?= $user->contacto ?>
                        </td>
                        <td>
                            <?= $user->postal->codigo ?>
                        </td>
                        <td>
                            <?= $user->postal->localidade ?>
                        </td>
                        <td>
                            <?= $user->nif ?>
                        </td>
                        <td>
                            <?= $user->cargo ?>
                        </td>
                        <td>
                            <button class="btn-styled">
                                <a href="../../index.php?controller=utilizador&action=edit&id=<?= $user->id_utilizador ?>">Ver
                                    Utilizador</a>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
</div>