<?php
$dirName="diary";
if(!is_dir($dirName)){
	mkdir($dirName);
	copy("test.txt","diary/test.txt");
	copy("test2.txt","diary/test2.txt");
}

$dirp = opendir($dirName);
while($file=readdir($dirp)){
	$fname = $file;
	print $fname."<br>";
}
closedir($dirp);
?>