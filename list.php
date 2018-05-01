<?php

//http://app.com/list.php?page=1&pagesize=12
require_once('./response.php');
require_once('./db.php');
$page=isset($_GET['page'])?$_GET['page']:1;
$pagesize=isset($_GET['pagesize'])?$_GET['pagesize']:2;

if(!is_numeric($page) || !is_numeric($pagesize)){
	return Response::show(401,'数据不合法');
}

$offset=($page-1)*$pagesize;
$sql="select * from mytest where t1=1 order by t2 desc limit ".
$offset.",".$pagesize;

try{
	$connect=Db::getInstance()->connect();
}catch(Exception $e){
	return Response::show(403,'database link failed',$videos); 
	
}

$result=mysql_query($sql,$connect);

$videos=array();

while($video=mysql_fetch_assoc($result)){
    $videos[]=$video;
}

if($videos){
	return Response::show(200,'get data success',$videos);
	
}else{
	return Response::show(402,'get data failed',$videos); 
	
}


?>