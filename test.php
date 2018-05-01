<?php

require_once('./response.php');
require_once('./file.php');
$arr=array(
"id"=>1,
"name"=>"singma",
"version"=>array(1,2,3=>array(2,3,4))
);


//Response::json(200,'success_json',$arr);
//Response::xmlEncode(200,'success_xml',$arr); 
// Response::show(200,"success",$arr,'json');

$file=new File();
if($file->CacheData('index_mk_cache',null)){
	echo "success";
}else{
	echo "error";
}

?> 