<?php
require_once dirname(__DIR__) . '/controllers/WebtoonController.php';

$webtoonController = new WebtoonController();
$webtoons = $webtoonController->search();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
        
        <div class="search-bar">
            <form action="search.php" method="post">
                <input type="text" name="keyword" placeholder="Search webtoons..." value="<?php echo htmlspecialchars($_POST['keyword'] ?? ''); ?>">
                <button type="submit" class="button-pink">Search</button>
            </form>
        </div>

        <div class="webtoon-grid">
            <?php if ($webtoons && mysqli_num_rows($webtoons) > 0): ?>
                <?php while ($webtoon = mysqli_fetch_assoc($webtoons)): ?>
                    <div class="webtoon-card">
                        <img src="../uploads/<?php echo htmlspecialchars($webtoon['cover_image']); ?>" alt="<?php echo htmlspecialchars($webtoon['title']); ?>">
                        <h3><?php echo htmlspecialchars($webtoon['title']); ?></h3>
                        <p class="author">By <?php echo htmlspecialchars($webtoon['author_name']); ?></p>
                        <p class="genre"><?php echo htmlspecialchars($webtoon['genre']); ?></p>
                        <a href="view_webtoon.php?id=<?php echo $webtoon['id']; ?>" class="read-btn">Read Now</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-results">No webtoons found matching your search.</p>
            <?php endif; ?>
        </div>

        <div class="navigation">
            <a href="webtoons.php" class="link-purple">Back to Webtoons</a>
        </div>
    </div>
</body>
</html>