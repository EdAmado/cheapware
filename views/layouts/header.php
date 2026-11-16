<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./public/imgs/logo.ico">
  <title>CheapWare</title>
  <link rel="stylesheet" href="./public/css/styles.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
  $user = null;
  if (!empty($_SESSION) && $_SESSION != null) {
    $user = Utilizador::find_by_id_utilizador($_SESSION["userID"]);
  }
  ?>

  <div class="header-div">
    <a href="../../index.php?controller=mainView&action=index"><img class="header-logo" src="./public/imgs/cheapware.png"
        alt="logo" /></a>
    <div class="header-right-div">
      <?php if ($user == null) { ?>
        <a class="btn-styled" href="../../index.php">Sign In</a>
      <?php } else if ($user->cargo == "cliente") { ?>
        <?php if ($user->has_favoritos()) { ?>
            <a class="btn-styled" href="../../index.php?controller=favorito&action=index">Favoritos</a>
        <?php } ?>
          <a class="btn-styled" href="../../index.php?controller=utilizador&action=logout">Logout</a>
      <?php } else { ?>
          <a class="btn-styled" href="../../index.php?controller=utilizador&action=profile">Ver
            Informações</a>
          <a class="btn-styled" href="../../index.php?controller=utilizador&action=logout">Logout</a>
      <?php } ?>
    </div>
  </div>
  <div class="animated-div"></div>
  </div>
</body>

</html>