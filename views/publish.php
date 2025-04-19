<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.html');
    exit();
}

require_once dirname(__DIR__) . '/models/Genre.php';
$genreModel = new Genre();
$genres = $genreModel->getAllGenres();

$user_pseudo = $_SESSION['pseudo'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Publish Your Webtoon</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>

<body>
    <div class="container">
        <div class="logo-publish">
            <a href="../index.html">
                <img src="../public/logo.png" alt="logo" class="logo">
            </a>
            <h3>Hello <?php echo $user_pseudo; ?> !</h3>
        </div>
        <h1>Publish Your Webtoon</h1>
        <form action="../controllers/Webtoon.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select id="genre" name="genre" required>
                    <option value="" default>Select a genre</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo htmlspecialchars($genre['id']); ?>"><?php echo htmlspecialchars($genre['genre_bd']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nb_chapitres">Nombre de chapitres:</label>
                <input type="number" id="nb_chapitres" name="nb_chapitres" min="0" required>
            </div>
            <div class="form-group">
                <label for="statut">Statut:</label>
                <select id="statut" name="statut" required>
                    <option value="" default>Select a statut</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image:</label>
                <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="content">Content PDF :</label>
                <input type="file" id="content" name="content" accept="application/pdf" required>
            </div>
            <div class="">
                <input type="hidden" name="action" value="upload">
                <button type="submit" class="button-pink">Publish Webtoon</button>
                <div class="navigation">
                    <a href="../index.html" class="link-purple">Back to Webtoons</a>
                </div>
            </div>
        </form>

    </div>
</body>

</html>