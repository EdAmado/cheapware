<div class="container-div">
    <div class="background-image-div"
        style="background-image: url('./public/imgs/backoffice-wallpaper.jpg'); opacity: 0.9"></div>
    <div class="list-div">
        <ul class="tilesWrap">
            <?php if ($user->cargo != "funcionario") { ?>
                <a href="../../index.php?controller=utilizador&action=gestao">
                    <li id="section-child">
                        <h2>
                            <img src="./public/imgs/users.png">
                        </h2>
                        <h3>UTILIZADORES</h3>
                    </li>
                </a>
            <?php } ?>
            <a href="../../index.php?controller=produto&action=gestao">
                <li id="section-child">
                    <h2>
                        <img src="./public/imgs/products.png">
                    </h2>
                    <h3>PRODUTOS</h3>
                </li>
            </a>
        </ul>

    </div>
</div>