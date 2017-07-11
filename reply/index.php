<?php
require_once 'controller.php';
$rController = new ReplyController($_GET['action']);
$rController->run();
exit;
?>