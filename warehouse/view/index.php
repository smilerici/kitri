<?php
require_once '../controller.php';
$cont = new ProductController($_GET['action']);
$cont->run();
exit;
?>