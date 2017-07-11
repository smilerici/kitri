<?php
print '{';
print '"num":'.$this->data->getNum().', "pwd":"'.$this->data->getPwd().
'", "writer":"'.$this->data->getWriter().'", "content":"'.
$this->data->getContent().'", "wdate":"'.$this->data->getWdate().'"';
print '}';
?>