<?php
require_once dirname(__DIR__) . '/controllers/UserController.php';

$controller = new UserController();
$controller->register();
?>