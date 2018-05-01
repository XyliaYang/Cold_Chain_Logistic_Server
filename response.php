<?php

class Response{
	
   /**
	*按综合方式输出通信数据
	*@param integer $code 状态码
	*@param string $message 提示信息
	*@param array $data 数据
	*@param string $type 数据类型
	* return string 
	*/
	public static function show($code,$message='',$data=array(),$type='json'){
		if(!is_numeric($code)){
			return "";
		}
		
		$type=isset($_GET['format'])?$_GET['format']:$type;
		
		$result=array(
		"code"=>$code,
		"message"=>$message,
		"data"=>$data
		);
		
		if($type=='json'){
			self::json($code,$message,$data);
		}elseif($type=='array'){
			var_dump($result);
		}elseif($type=='xml'){
			self::xmlEncode($code,$message,$data);
		}else{
			
		}
		
		 
		
	}
	
	/**
	*按json方式输出通信数据
	*@param integer $code 状态码
	*@param string $message 提示信息
	*@param array $data 数据
	* return string 
	*/
	public static function json($code,$message='',$data =array()){
		if(!is_numeric($code)){
			return "";
		}
		
		$result=array(
		"code"=>$code,
		"message"=>$message,
		"data"=>$data
		);
		
		
		echo json_encode($result);
		
	}
	
	/**
	* 按xml方式输出通信数据
	* @param integer $code 状态码
	* @param string $message 提示信息
	* @param array $data 数据
	* return string
	*/
	public static function xmlEncode($code,$message='',$data=array()){
		if(!is_numeric($code)){
			return "";
		}
		
		$result=array(
		"code"=>$code,
		"message"=>$message,
		"data"=>$data
		);
		
	
		header("Content-Type:text/xml");  //该头实现数据以xml形式显示
		$xml="<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml.="<root>\n";
		$xml.=self::xmlToEncode($result);
		$xml.="\n</root>\n";
		
		echo $xml;
		
	}
	
	/**
	* 将数组转换成xml形式
	*/
	public static function xmlToEncode($data){
		//<0>4</0>  <item id="0">4</item>
		
		$xml=$attr="";
		
		foreach($data as $key=>$value){
			if(is_numeric($key)){
				$attr=" id='{$key}'";
				$key="item";     
			}
			
			$xml.="\n<{$key}{$attr}>";
		    $xml.=is_array($value)?self::xmlToEncode($value):$value;
			$xml.="</{$key}>\n";
		}
		
		return $xml;
	} 
}







function json($arr){
	echo json_encode($arr);
	exit;
}


function xml($arr){
	header("Content-type:text/xml");
	$result="<?xml version='1.0' encoding='UTF-8'?>\n";
	$result .="<item>\n";
	$result .="<title>singwa</title>\n<test id='1'>\n";
	$result .="<address>beijing</address>";
	$result .="</item>\n";
	echo $resul;
	exit;
}

// $data="input json";
// $new_data=iconv('UTF-8','GBK',$data);
// echo $newData;
// echo json_encode($data);

// if($_GET['format']=='json'){
	// json($arr);
// }else if($_GET['format']=='xml'){
	// xml($arr);
// }else{
	 // var_dump($arr);
// }


?>