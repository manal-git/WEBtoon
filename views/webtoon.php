<?php

require_once '../controllers/WebtoonController.php';
$webtoon_id = $_GET['id'];
$controller = new WebtoonController();
$webtoon = $controller->view($webtoon_id)
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Webtoon</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>Webtoon</h1>
        </div>
        <div id="content">
            <h2><?php echo $webtoon['titre_bd']; ?></h2>
            <p><?php echo $webtoon['description']; ?></p>
        </div>

        <object data="<?php echo "../public/uploads/contents/" . $webtoon['content']; ?>" type="application/pdf" width="100%" height="100%">
        </object>

    </div>
</body>

</html>