<div class="container-div">
    <div class="background-image-div" style="background-image: url('./public/imgs/hardware.png')"></div>
    <div class="login-form-div">
        <div class="spacing"></div>
        <div class="login-form-inputs">
            <div>
                <h1>Login</h1>
                <?php if (isset($message)) { ?>
                    <a class="input-error">
                        <?= $message ?>
                    </a>
                <?php } ?>
                <form method="post" action="../../index.php?controller=utilizador&action=auth" style="margin-top: 10px">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password">
                    </div>

                    <div class="form-submit-btn">
                        <input class="btn-styled" type="submit" value="LOG IN">
                    </div>
                </form>
                <div style="margin-top: 20px">
                    <a class="btn-styled" id="general"
                        href="../../index.php?controller=utilizador&action=register">Registar</a>
                </div>
            </div>
        </div>
    </div>
</div>