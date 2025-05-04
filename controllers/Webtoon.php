<?php require_once 'WebtoonController.php';

$controller = new WebtoonController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'upload':
            $controller->upload();
            break;

        case 'comment':
            $controller->comment();
            break;

        default:
            echo "Unknown action: " . htmlspecialchars($action);
            break;
    }
} else {
    echo "No POST data received.";
}
?>