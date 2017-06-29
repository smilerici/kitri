<?php
$fname = $_GET ['fname'];
$str = file_get_contents("content/".$fname);
$arr = explode ("img=", $str);
$img = $arr[1];
$str = $arr[0];
?>
<html>
<body>
   <h3><?php print $fname; ?></h3>
   <img src="img/<?php print $img; ?>" style="width: 200; height: 150">
   <br>
   <textarea rows="10" cols="30">
<?php print $str; ?>
</textarea>
</body>
</html>