<?php
/**
 * Created by PhpStorm.
 * User: LizYang
 * Date: 2018/5/1
 * Time: 8:33
 * Description:check if exist duplicated account and save new account
 * url:http://192.168.56.1:8080/project/Cold_Chain_Logistic/register.php?
 *       account=liz&pwd=123&signature=123&nickname=123
 */

require_once('./response.php');
require_once('./db.php');

$acount=$_GET['account'];
$pwd=$_GET['pwd'];
$signature=$_GET['signature'];
$nickname=$_GET['nickname'];


try{
    $connect=Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(402,'no internet');
}

    $sql="INSERT INTO user (account,pwd,signature,nickname)
VALUES ('{$acount}','{$pwd}','{$signature}','{$nickname}')";

    if (mysql_query($sql,$connect)) {
        return Response::show(200,'register success');
    } else {
        return Response::show(401,'duplicated account');
    }



