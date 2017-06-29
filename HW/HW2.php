<?php
/* 피보나치 수열  1 1 2 3 5 8 13 21 34
 1. 재귀함수 */

print "1.재귀함수이용===================================</br>";
function a($y){
static $x=1;
static $z;

if($x==1 && $y==1){
	print "1 1 ";
}
	 $z = $x+$y;//5    
	  
	 print $z."\t";
	$x = $y;
	 
	if($z>1000){
		return;
	}
	
	return a($z);
		
}

a(1);

print "</br></br>2.반복문이용=============================</br>";
/* 2.반복문 */
 function b($p) {
	$num = array();
	
	$num[0]=1;
	$num[1]=1;
	print $num[0]."\t";
	print $num[1];
	for($i=0;$i<=$p;$i++){
		$num[$i+2]=$num[$i]+$num[$i+1];
		print "\t".$num[$i+2];
	}
	
	
}

b(100); 

print "</br></br>선생님====================================";
$arr = array();
function fact($x){
	global $arr;
	if($x==1 || $x==2){
		$arr[$x]=1;
	} else {
		$arr[$x]=$arr[$x-2]+$arr[$x-1];
		
	}
}
$i=0;

for($i=1;$i<100;$i++){
	fact($i);
}

for($i=1;$i<100;$i++){
	print $arr[$i]."\t";
}
?>
