<?php
session_start();
session_unset();
session_cache_expire(60);
session_destroy();


//if(!isset($_SESSION['login'])){
	header("Location:form.php");	
//}
?>