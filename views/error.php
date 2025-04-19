<?php
$message_erreur = isset($_GET['erreur']) ? $_GET['erreur'] : 'An unknown error occurred';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <h1>Error</h1>
        <p class="error-message"><?php echo htmlspecialchars($message_erreur); ?></p>
        <a href="../index.html" class="link-purple">Return to Home</a>
    </div>
</body>
</html>