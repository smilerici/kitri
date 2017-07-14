<?php 
require_once 'controller.php';
$imgsController = new ImgsController($_GET['action']);
$imgsController->run();
exit;
?>