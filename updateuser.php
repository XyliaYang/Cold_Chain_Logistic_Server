<?php
/**
 * Created by LizYang.
 * Date: 2018/5/5
 * Time: 11:10
 * Description:update user pwd if it exits or new a user account
 * url:http://192.168.56.1:8080/project/Cold_Chain_Logistic/updateuser.php?account=123&pwd=123
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


$sql="select conut(*) from user where account='{$account}'";

if(mysql_query($sql)>0){
    $sql="update user set pwd='{$pwd}' where account='{$account}'";

    if(mysql_query($sql)){
        return Response::show(200,'update success1');
    }
}else{
    $sql="INSERT INTO user (account,pwd)
VALUES ('{$account}','{$pwd}')";

    if(mysql_query($sql)){
        return Response::show(200,'update success2');
    }
}

return   Response::show(401,'update failed');



$sql="update user set pwd='{$pwd}' where account='{$account}'";
$result=mysql_query($sql);


