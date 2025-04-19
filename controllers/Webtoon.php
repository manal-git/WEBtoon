<?php require_once 'WebtoonController.php';

$controller = new WebtoonController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->upload();
} else {
    echo "No action specified.";
}
