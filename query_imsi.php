<?php
/**
 * Created by PhpStorm.
 * User: LizYang
 * Date: 2018/5/1
 * Time: 9:34
 * description:query the IMSI list by given account
 * url:http://192.168.56.1:8080/project/Cold_Chain_Logistic/query_imsi.php?account=liz
 */


require_once('./response.php');
require_once('./db.php');

$account=$_GET['account'];

try{
    $connect=Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(402,'no internet');
}

$sql="SELECT *  FROM user_2_imsi WHERE user_account='{$account}'";
$result=mysql_query($sql,$connect);
$datas=array();


while ($data=mysql_fetch_assoc($result)){
    $datas[]=json_encode($data['imsi']);
}

if(count($datas)==0){
return Response::show(401,'no data');
}else{
	return Response::show(200,'query success',$datas);
}

