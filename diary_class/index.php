<?php
require_once 'controll.php';
$cont = new Controller($_GET['action']);
$cont->run();
exit;
?>