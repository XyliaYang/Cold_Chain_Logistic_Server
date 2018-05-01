<?php
/**
 * Created by LizYang.
 * Date: 2018/5/1
 * Time: 9:58
 * Description:save IMSI to table imsi and user_2_imsi table
 * http://192.168.56.1:8080/project/Cold_Chain_Logistic/save_imsi.php?imsi=123&account=123
 */

require_once('./response.php');
require_once('./db.php');

$account=$_GET['account'];
$imsi=$_GET['imsi'];

try{
    $connect=Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(402,'no internet');
}

$sql="SELECT *  FROM user_2_imsi WHERE user_account='{$account}'";
$result=mysql_query($sql,$connect);
$datas=array();

while ($data=mysql_fetch_assoc($result)){
    $datas[]=$data['imsi'];
}

$is_exit=false;
foreach ($datas as $data){
    if($data==$imsi){
        $is_exit=true;
        return Response::show(401,'duplicated IMSI');
    }
}


if(!$is_exit){
    $sql="INSERT INTO user_2_imsi (imsi,user_account)
VALUES ('{$imsi}','{$account}')";
    mysql_query($sql,$connect);

    $sql="INSERT INTO imsi (imsi)
VALUES ('{$imsi}')";
    mysql_query($sql,$connect);

    $sql="SELECT *  FROM user_2_imsi WHERE user_account='{$account}'";
    $result=mysql_query($sql,$connect);
    $arr=array();
    while ($data=mysql_fetch_assoc($result)){
        $arr[]=$data['imsi'];
    }

    Response::show(200,'save success',$arr);

}


