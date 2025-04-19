<?php
require_once dirname(__DIR__) . '/controllers/WebtoonController.php';

if (!isset($_GET['id'])) {
    header('Location: webtoons.php');
    exit();
}

$webtoonController = new WebtoonController();
$webtoon = $webtoonController->view($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($webtoon['title']); ?></title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <div class="webtoon-details">
            <div class="webtoon-header">
                <img src="../uploads/<?php echo htmlspecialchars($webtoon['cover_image']); ?>" alt="<?php echo htmlspecialchars($webtoon['title']); ?>" class="cover-image">
                <div class="webtoon-info">
                    <h1><?php echo htmlspecialchars($webtoon['title']); ?></h1>
                    <p class="author">By <?php echo htmlspecialchars($webtoon['author_name']); ?></p>
                    <p class="genre"><?php echo htmlspecialchars($webtoon['genre']); ?></p>
                </div>
            </div>
            
            <div class="description">
                <h2>Description</h2>
                <p><?php echo nl2br(htmlspecialchars($webtoon['description'])); ?></p>
            </div>

            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $webtoon['author_id']): ?>
                <div class="author-controls">
                    <a href="edit_webtoon.php?id=<?php echo $webtoon['id']; ?>" class="btn">Edit Webtoon</a>
                    <a href="upload_chapter.php?webtoon_id=<?php echo $webtoon['id']; ?>" class="btn">Upload New Chapter</a>
                </div>
            <?php endif; ?>

            <div class="chapters-list">
                <h2>Chapters</h2>
                <!-- Chapter list will be implemented in the next phase -->
                <p>Chapters coming soon!</p>
            </div>
        </div>

        <div class="navigation">
            <a href="webtoons.php" class="link-purple">Back to Webtoons</a>
        </div>
    </div>
</body>
</html>