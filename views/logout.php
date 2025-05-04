<?php
session_start();

echo "<script>alert('LOG OUT');</script>";

session_destroy();
header('Location: ../index.php');
exit();
?>