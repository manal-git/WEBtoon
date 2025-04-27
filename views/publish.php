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
    <div class="publish-wrapper">
        <div class="publish-body">
            <div class="publish-title">
                <h1>Publish Your Webtoon</h1>
            </div>
            <form action="../controllers/Webtoon.php" method="post" enctype="multipart/form-data">
                <div class="publish-fields">
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
                            <label for="cover_image" class="cover-label">
                                <div class="svg-icon">
                                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="200px" height="200px" viewBox="0 0 45.402 45.402"
                                        xml:space="preserve">
                                        <g>
                                            <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141
            c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27
            c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435
            c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z" />
                                        </g>
                                    </svg>
                                </div>
                                COVER IMAGE
                            </label>
                            <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="content-label">
                                <div class="svg-icon">
                                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="200px" height="200px" viewBox="0 0 45.402 45.402"
                                        xml:space="preserve">
                                        <g>
                                            <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141
            c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27
            c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435
            c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z" />
                                        </g>
                                    </svg>
                                </div>
                                CONTENT PDF
                            </label>
                            <input type="file" id="content" name="content" accept="application/pdf" required>
                        </div>
                    </div>
                </div>

                <div class="spacing-buttons">
                    <input class="hidden" type="hidden" name="action" value="upload">
                    <div class="navigation">
                        <a href="../index.html" class="link-purple">Back</a>
                    </div>
                    <button type="submit" class="button-pink">Publish</button>
                </div>
            </form>
        </div>
    </div>

    </div>
</body>

</html>