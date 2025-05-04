<?php
require_once './controllers/WebtoonController.php';
$controller = new WebtoonController();
$webtoons = $controller->getAll();
if (isset($_SESSION['pseudo'])) {
  $user_pseudo = $_SESSION['pseudo'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Webtoon</title>
  <meta NAME="Author" CONTENT="M">
  <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
  <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>

  <div class="header">
    <div class="logo">
      <img class="logo" src="./public/logo.png" alt="logo">
      <div class="user-name">
        <?php
        if (isset($_SESSION['pseudo'])) {
          echo '<h1>Hello ' . $_SESSION['pseudo'] . ' !</h1>';
        } ?>
      </div>
    </div>

    <div class="button2">
      <?php
      if (isset($_SESSION['pseudo'])) {
        echo '
        <a href="./views/logout.php" class="button-pink">LOG OUT</a>
        ';
      } ?>
      <?php
      if (isset($_SESSION['pseudo'])) {
        echo '
        <a href="./views/library.php" class="button-pink">LIBRARY</a>
        ';
      } ?>
      <a href="./views/genre.php" class="button-pink">GENRES</a>
    </div>

    <?php
    if (!isset($_SESSION['pseudo'])) {
      echo '
      <div class="button1">
        <a href="views/signup.php" class="button-pink">SIGN UP</a>
        <a href="login.php" class="button-pink">LOG IN</a>
      </div>
      ';
    } ?>
  </div>

  <div class="carousel">
    <?php
    foreach ($webtoons as $webtoon) {
      echo '
      <div class="carousel-item">
        <img class="home-covers" src="./public/uploads/covers/' . $webtoon['cover'] . '" alt="' . $webtoon['titre_bd'] . '">
        <div class="carousel-caption">
          <h3>' . $webtoon['titre_bd'] . '</h3>
          <p>' . $webtoon['genre_bd'] . '</p>
          <div class="carousel-link">
            <a href="views/webtoon.php?id=' . $webtoon['id'] . '" class="button-pink">READ</a>
          </div>
        </div>
        </div>
      ';
    }
    ?>
  </div>

  <a class="publish-button-fancy" href="views/publish.php">
    <div class="svg-wrapper-1">
      <div class="svg-wrapper">
        <svg fill="#000000" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11.2,6.4 C11.5733333,5.90222222 12.2951111,5.86903704 12.7149037,6.30044444 L12.8,6.4 L18.8,14.4 C19.2719532,15.029271 18.8648139,15.9150577 18.1101203,15.9942836 L18,16 L15,16 L15,21 C15,21.4733869 14.6710663,21.8699473 14.2292908,21.9735893 L14.1166211,21.9932723 L14,22 L10,22 C9.48716416,22 9.06449284,21.6139598 9.00672773,21.1166211 L9,21 L9,16 L6,16 C5.25274072,16 4.79630569,15.2263919 5.08642254,14.5906309 L5.13850094,14.4915261 L5.2,14.4 L11.2,6.4 Z M12,8.667 L8,14 L10,14 C10.4733869,14 10.8699473,14.3289337 10.9735893,14.7707092 L10.9932723,14.8833789 L11,15 L11,20 L13,20 L13,15 C13,14.5266131 13.3289337,14.1300527 13.7707092,14.0264107 L13.8833789,14.0067277 L14,14 L16,14 L12,8.667 Z M21,2 C21.5522847,2 22,2.44771525 22,3 C22,3.55228475 21.5522847,4 21,4 L3,4 C2.44771525,4 2,3.55228475 2,3 C2,2.44771525 2.44771525,2 3,2 L21,2 Z" />
        </svg>
      </div>
    </div>
    <span>PUBLISH</span>
  </a>
</body>

</html>