<?php
$filename = "test.txt";
if(is_readable($filename)){
	$content = file_get_contents($filename);
	print $content;
}else{
	print $filename."는 일겅 들일 수 었씁니다.";
}

$content = "하냥ㄴ하냥냔얀얀이";
file_put_contents($filename, $content);
print "기록함";

$filename = "test.txt";
if(is_readable($filename)){
	$content = file_get_contents($filename);
	print $content;
}else{
	print $filename."는 일겅 들일 수 었씁니다.";
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
?>