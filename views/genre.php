<?php
require_once dirname(__DIR__) . '/models/Genre.php';
require_once dirname(__DIR__) . '/controllers/WebtoonController.php';

$controller = new WebtoonController();
$webtoons_count = 0;
if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
    $webtoons = $controller->getByGenre($genre);
    $webtoons_count = mysqli_num_rows($webtoons);
} else {
    $webtoons = $controller->getAll();
    $webtoons_count = mysqli_num_rows($webtoons);
}
$genreModel = new Genre();
$genres = $genreModel->getAllGenres();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
        <h1>GENRES</h1>
    </div>
    <div class="header3">
        <?php foreach ($genres as $genre): ?>
            <a class="bloc" href="<?php echo "./genre.php?genre=" . $genre['id'] ?>"><?php echo htmlspecialchars($genre['genre_bd']); ?></a>
        <?php endforeach; ?>
    </div>
    <div class="carousel-genre">
        <?php
        if ($webtoons_count == 0) {
            echo '<p class="error-genre">No Webtoon found in the selected genre.</p>';
        } else {
            foreach ($webtoons as $webtoon) {
                echo '
          <div class="carousel-item-genre">
            <img class="genre-covers" src="../public/uploads/covers/' . $webtoon['cover'] . '" alt="' . $webtoon['titre_bd'] . '">
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
    <ul>
        <a href='../index.php' class="link-purple">retour accueil</a>
    </ul>
</body>

</html>