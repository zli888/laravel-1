<?php
	//打印
	function p($arr){
		echo '<pre>'.print_r($arr,true).'</pre>';	
		die();	
	}	
	//验证码
	function check_verify($code, $id = 1){
		$config =    array(   
			'reset'     =>  false,           // 验证成功后是否重置 
		);
		$verify = new \Think\Verify($config);
		return $verify->check($code, $id);
	}
	//截取字符串
	function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
	{
		if(function_exists("mb_substr"))
			return mb_substr($str, $start, $length, $charset);
		elseif(function_exists('iconv_substr')) {
			return iconv_substr($str,$start,$length,$charset);
		}
		$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
		if($suffix) return $slice."…";
		return $slice;
	}	
	
    //对象转数组  
    function objectToArray($array)
	{  
        if(is_object($array))
		{  
            $array = (array)$array;  
        }
		if(is_array($array))
		{  
			foreach($array as $key=>$value)
			{  
                 $array[$key] = objectToArray($value);  
            }  
         }  
         return $array;  
    }  
?>