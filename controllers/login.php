<?php
require_once dirname(__DIR__) . '/controllers/LoginController.php';

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->login();
} else {
    header('Location: ../login.html');
    exit();
}
?>