<?php

print '[';
for($i=0;$i<count($this->data);$i++){
	if($i>0){
		print ",";
	}
	print '{"num":'.$this->data[$i]->getNum().', "pwd":"'.
	$this->data[$i]->getPwd().'", "writer":"'.
	$this->data[$i]->getWriter().'", "content":"'.
	$this->data[$i]->getContent().'", "wdate":"'.
	$this->data[$i]->getWdate().'"}';
}
print ']';
?>