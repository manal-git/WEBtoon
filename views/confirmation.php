<?php
$nb_lignes = isset($_GET['nb']) ? $_GET['nb'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../style_op.css">
</head>
<body>
    <div class="container">
        <h1>Success!</h1>
        <p>Operation completed successfully. <?php echo $nb_lignes; ?> record(s) affected.</p>
        <a href="../index.php" class="link-purple">Return to Home</a>
    </div>
</body>
</html>