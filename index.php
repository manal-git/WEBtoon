<?php
require_once './controllers/WebtoonController.php';
$controller = new WebtoonController();
$webtoons = $controller->getAll();
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
    </div>

    <div class="button2">
      <a href="library.php" class="button-pink">LIBRARY</a>
      <a href="./views/genre.php" class="button-pink">GENRES</a>
    </div>

    <div class="button1">
      <a href="views/signup.php" class="button-pink">SIGN UP</a>
      <a href="login.html" class="button-pink">LOG IN</a>
    </div>
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

  <div class="publish-link">
    <a href="views/publish.php" class="button-pink">PUBLISH</a>
  </div>



</body>

</html>