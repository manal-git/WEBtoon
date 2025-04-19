<?php
require_once dirname(__DIR__) . '/controllers/WebtoonController.php';

$webtoonController = new WebtoonController();
$webtoons = $webtoonController->view();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webtoons</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <h1>Webtoons</h1>
        
        <div class="search-bar">
            <form action="search.php" method="post">
                <input type="text" name="keyword" placeholder="Search webtoons...">
                <button type="submit" class="button-pink">Search</button>
            </form>
        </div>

        <div class="genre-filter">
            <a href="webtoons.php?genre=Action">Action</a>
            <a href="webtoons.php?genre=Romance">Romance</a>
            <a href="webtoons.php?genre=Comedy">Comedy</a>
            <a href="webtoons.php?genre=Fantasy">Fantasy</a>
        </div>

        <div class="webtoon-grid">
            <?php while ($webtoon = mysqli_fetch_assoc($webtoons)): ?>
                <div class="webtoon-card">
                    <img src="../uploads/<?php echo htmlspecialchars($webtoon['cover_image']); ?>" alt="<?php echo htmlspecialchars($webtoon['title']); ?>">
                    <h3><?php echo htmlspecialchars($webtoon['title']); ?></h3>
                    <p class="author">By <?php echo htmlspecialchars($webtoon['author_name']); ?></p>
                    <p class="genre"><?php echo htmlspecialchars($webtoon['genre']); ?></p>
                    <a href="view_webtoon.php?id=<?php echo $webtoon['id']; ?>" class="read-btn">Read Now</a>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="upload-btn">
                <a href="publish.php" class="btn">Upload Your Webtoon</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>