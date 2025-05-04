<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['webtoon_id'])) {
    header('Location: webtoons.php');
    exit();
}

$webtoon_id = $_GET['webtoon_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Chapter</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <h1>Upload New Chapter</h1>
        <form action="../controllers/ChapterController.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="chapter_number">Chapter Number:</label>
                <input type="number" id="chapter_number" name="chapter_number" required>
            </div>
            <div class="form-group">
                <label for="title">Chapter Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content_file">Chapter Content (PDF):</label>
                <input type="file" id="content_file" name="content_file" accept=".pdf" required>
            </div>
            <input type="hidden" name="webtoon_id" value="<?php echo $webtoon_id; ?>">
            <input type="hidden" name="action" value="upload">
            <button type="submit" class="button-pink">Upload Chapter</button>
        </form>
        <div class="navigation">
            <a href="view_webtoon.php?id=<?php echo $webtoon_id; ?>" class="link-purple">Back to Webtoon</a>
        </div>
    </div>
</body>
</html>