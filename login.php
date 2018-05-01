<?php
/**
 * Created by PhpStorm.
 * User: LizYang
 * Date: 2018/5/1
 * Time: 8:14
 * Description:confirm  whether or not exist a user and match the password
 * url:http://192.168.56.1:8080/project/Cold_Chain_Logistic/login.php?account=liz&pwd=123
 */

require_once('./response.php');
require_once('./db.php');

$account=$_GET['account'];
$pwd=$_GET['pwd'];

try{
    $connect=Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(402,'no internet');
}

$sql="select * from user where account='{$account}'";

$result=mysql_query($sql,$connect);

if($user=mysql_fetch_assoc($result)){

    if($pwd==$user['pwd']){
        return Response::show(200,'login success');
    }else{
        return Response::show(403,'pwd not match');
    }

}else{
    return Response::show(401,'no account');
}