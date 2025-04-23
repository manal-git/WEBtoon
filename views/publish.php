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
<div class="header1">
		<div class="logo">
			<a href="../index.html">
				<img class="logo" src="../public/logo.png">
			</a>
		</div>
    <h1>Hello <?php echo $user_pseudo; ?> !</h1>
</div>
        <h1>Publish Your Webtoon</h1>
        <form action="../controllers/Webtoon.php" method="post" enctype="multipart/form-data">
            <div class=left-field>
            <div class="form-group">
                <label for="title">WEBTOON NAME:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">DESCRIPTION:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="genre">GENRE:</label>
                <select id="genre" name="genre" required>
                    <option value="" default>SELECT A GENRE</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo htmlspecialchars($genre['id']); ?>"><?php echo htmlspecialchars($genre['genre_bd']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nb_chapitres">CHAPTER NUMBER:</label>
                <input type="number" id="nb_chapitres" name="nb_chapitres" min="0" required>
            </div>
            </div>
          
            <div class="right-field">
            <div class="form-group">
                <label for="statut">STATUS:</label>
                <select id="statut" name="statut" required>
                    <option value="" default>SELECT A STATUS</option>
                    <option value="Ongoing">ONGOING</option>
                    <option value="Completed">COMPLETED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cover_image">COVER IMAGE:</label>
                <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="content">CONTENT PDF :</label>
                <input type="file" id="content" name="content" accept="application/pdf" required>
            </div>
            </div>
         
            <div class="spacing-buttons">
                <input type="hidden" name="action" value="upload">
                <button type="submit" class="button-pink">Publish</button>
                <div class="navigation">
                    <a href="../index.html" class="link-purple">Back</a>
                </div>
            </div>
        </form>

    </div>
</body>

</html>