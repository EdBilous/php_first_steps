<?php
function array_merge_retain($array_a=array() ,$array_b=array()){
 
$array_merge= array();
 
 
if(!empty($array_a)&& !empty($array_b)){
 
foreach($array_a as $field=>$value){
 
$array_merge[$field]= $value;
 
}
 
 
foreach($array_b as $field=>$value){
 
if(!empty($value)){
 
$array_merge[$field]= $value;
 
} elseif(!array_key_exists($field,$array_a)){
 
$array_merge[$field]= $value;
 
}
 
}
 
}
 
 
return $array_merge
 
}
$array_a= array('имя', 'почта', 'телефон')
$$array_b= array("a" => "green", "red", "b" => "green", "blue", "red");
print_r(rray_merge_retain($array_a ,$array_b));