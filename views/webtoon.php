<?php

require_once '../controllers/WebtoonController.php';
$webtoon_id = $_GET['id'];
$controller = new WebtoonController();
$webtoon = $controller->view($webtoon_id);
$comments = $controller->getComments($webtoon_id);
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $controller->changeStatus($webtoon_id, $status);
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Webtoon</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../style_op.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>
    <div class="header2">
        <div class="logo">
            <a href="../index.php">
                <img class="logo" src="../public/logo.png">
            </a>
        </div>
        <h1>WEBTOON</h1>
    </div>
    <div class="webtoon-wrapper">
        <div class="webtoon-container">
            <div class="webtoon-content">
                <div class="webtoon-header">
                    <div class="header-img">
                        <img src="<?php echo '../public/uploads/covers/' . $webtoon['cover']; ?>" alt="">
                        <span class="webtoon-status">
                            <?php
                            if ($webtoon['status'] == 'READ') {
                                echo '<span class="read">Read</span>';
                            } elseif ($webtoon['status'] == 'READING') {
                                echo '<span class="reading">Reading</span>';
                            } elseif ($webtoon['status'] == 'WANTS') {
                                echo '<span class="wants">Wants to Read</span>';
                            }
                            ?>
                        </span>
                    </div>
                    <div class="webtoon-info">
                        <div class="webtoon-info-line">
                            <span>Title :</span>
                            <h2><?php echo $webtoon['titre_bd']; ?></h2>
                        </div>
                        <div class="webtoon-info-line">
                            <span>Description :</span>
                            <p><?php echo $webtoon['description']; ?></p>
                        </div>
                        <div class="status-container">
                            <a class="status-pill read" href='<?php echo "./webtoon.php?id=" . $_GET['id'] . "&status=read"; ?>'>Read</a>
                            <a class="status-pill reading" href='<?php echo "./webtoon.php?id=" . $_GET['id'] . "&status=reading"; ?>'>Reading</a>
                            <a class="status-pill wants" href='<?php echo "./webtoon.php?id=" . $_GET['id'] . "&status=wants"; ?>'>Wants to Read</a>
                        </div>
                        <div>
                            <?php
                            if ($webtoon['average_rating'] == 0) {
                                echo '<h3>Rating : No ratings yet.</h3>';
                            } else {
                                echo '<span>Rating : </span>';
                                for ($i = 0; $i < $webtoon['average_rating']; $i++) {
                                    echo '<span class="star">&#9733;</span>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="webtoon-comic">
                    <object data="<?php echo "../public/uploads/contents/" . $webtoon['content'] . "#view=FitH"; ?>" type="application/pdf" width="100%" height="100%">
                    </object>
                </div>
            </div>
            <div class="purple-spacing">
                <a href="../index.php" class="link-purple">BACK</a>
            </div>
        </div>
        <div class="comment-section">
            <div class="comment-field">
                <form action="../controllers/Webtoon.php" method="POST">
                    <input class="hidden" type="hidden" name="action" value="comment">
                    <input type="hidden" name="webtoon_id" value="<?php echo $webtoon['id']; ?>">
                    <label for="rating">Rating* :</label>
                    <div class="rating-label">
                        <span>1&#9733;</span>
                        <span>2&#9733;</span>
                        <span>3&#9733;</span>
                        <span>4&#9733;</span>
                        <span>5&#9733;</span>
                    </div>
                    <input type="range" id="rating" name="rating" min="1" max="5" step="1">
                    <label for="comment">Comment :</label>
                    <textarea name="comment" placeholder="Write your comment here..."></textarea>
                    <button type="submit" class="button-pink">Submit</button>
                </form>
            </div>
            <hr />
            <h2>Comments</h2>
            <div class="comment-container">
                <?php
                if ($comments && mysqli_num_rows($comments) > 0) {
                    while ($comment = mysqli_fetch_assoc($comments)) {
                        echo '<div class="comment">';
                        echo '<div class="comment-header">';
                        echo '<span class="comment-author">' . $comment['author_name'] . '</span>';
                        echo '<span class="comment-date">' . $comment['comment_date'] . '</span>';
                        echo '</div>';
                        echo '<div class="comment-content">';
                        echo '<p>' . $comment['content'] . '</p>';
                        echo '</div>';
                        echo '<div class="comment-rating">';
                        echo '<h3>Rating : ';
                        for ($i = 0; $i < $comment['rating']; $i++) {
                            echo '<span class="star">&#9733;</span>';
                        }
                        echo '</h3></div>';
                        echo '</div>';
                    }
                } else {
                    echo '<h3>No comments yet.</h3>';
                }
                ?>
            </div>
        </div>
</body>

</html>