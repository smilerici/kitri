<?php
$dirName = [ 
		"content",
		"img" 
];
for($i = 0; $i < count ( $dirName ); $i ++) {
	if (! is_dir ( $dirName[$i] )) {
		mkdir ( $dirName[$i]);
	}
}

$dirp = opendir($dirName[0]);
print "<h3>그림일기</h3>";
print "<a href=write.php>일기쓰기</a><br><br><br>";
while($file=readdir($dirp)){
	$fname = $file;
	if($fname!="." && $fname!=".."){
		print "<a href=read.php?fname=".$fname.">".$fname."</a><br>";
	}
}
closedir($dirp);
?>