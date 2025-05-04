<?php
require_once '../controllers/UserController.php';

$userController = new UserController();
$library = $userController->getMyLibrary();

if (empty($library)) {
    echo '<p>No webtoons found in your library.</p>';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>

<head>
	<title>Library</title>
	<meta NAME="Author" CONTENT="M">
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	<link href="../style_op.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>

	<div class="header2">
		<div class="logo">
			<a href="../index.php">
				<img class="logo" src="../public/logo.png">
			</a>
		</div>
		<h1>LIBRARY</h1>
	</div>

	<div class=container-lib>
		<h4 class="lib">WANT TO READ</h4>
		<div class="carousel">
			<?php
			foreach ($library as $webtoon) {
				if ($webtoon['status'] == 'WANTS') {
					echo '
          <div class="carousel-item">
            <img class="home-covers" src="../public/uploads/covers/' . $webtoon['cover'] . '" alt="' . $webtoon['titre_bd'] . '">
            <div class="carousel-caption">
              <h3>' . $webtoon['titre_bd'] . '</h3>
              <p>' . $webtoon['genre_bd'] . '</p>
              <div class="carousel-link">
                <a href="webtoon.php?id=' . $webtoon['webtoon_id'] . '" class="button-pink">READ</a>
              </div>
            </div>
          </div>
        ';
				}
			}
			?>
		</div>
	</div>

	<div class=container-lib>
		<h4 class="lib">READING</h4>
		<div class="carousel">
			<?php
			foreach ($library as $webtoon) {
				if ($webtoon['status'] == 'READING') {
					echo '
          <div class="carousel-item">
            <img class="home-covers" src="../public/uploads/covers/' . $webtoon['cover'] . '" alt="' . $webtoon['titre_bd'] . '">
            <div class="carousel-caption">
              <h3>' . $webtoon['titre_bd'] . '</h3>
              <p>' . $webtoon['genre_bd'] . '</p>
              <div class="carousel-link">
                <a href="webtoon.php?id=' . $webtoon['webtoon_id'] . '" class="button-pink">READ</a>
              </div>
            </div>
          </div>
        ';
				}
			}
			?>
		</div>
	</div>

	<div class=container-lib>
		<h4 class="lib">ALREADY READ</h4>
		<div class="carousel">
			<?php
			foreach ($library as $webtoon) {
				if ($webtoon['status'] == 'READ') {
					echo '
          <div class="carousel-item">
            <img class="home-covers" src="../public/uploads/covers/' . $webtoon['cover'] . '" alt="' . $webtoon['titre_bd'] . '">
            <div class="carousel-caption">
              <h3>' . $webtoon['titre_bd'] . '</h3>
              <p>' . $webtoon['genre_bd'] . '</p>
              <div class="carousel-link">
                <a href="webtoon.php?id=' . $webtoon['webtoon_id'] . '" class="button-pink">READ</a>
              </div>
            </div>
          </div>
        ';
				}
			}
			?>
		</div>
	</div>

	<div class=purple-spacing>
		<a href='../index.php' class="link-purple">retour accueil</a>
	</div>
</body>

</html>