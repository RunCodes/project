<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Config;

/**
 * 生成文件
 * @param $fileName  文件名称
 * @param $content   写入文件的内容
 * @param $extension 文件扩展名
 */
function  logData($fileName,$content,$extension='txt'){
	empty($fileName)?$fileName = date('Y-m-d',time()):'';
	$dir = ROOT_PATH.DS.'log'.DS;
	if(!file_exists($dir)) @mkdir($dir,0777);
	$myfile  = fopen($dir.$fileName.'.'.$extension, 'a+') or die("Unable to open file!");
	fwrite($myfile,$content);
	fclose($myfile);

}

/**
 * 下载文件
 * @param $fileName  文件地址
 */
function download($filename){
    //检测是否设置文件名和文件是否存在 
    if ((isset($filename))&&(file_exists($filename))){ 
      header("Content-length: ".filesize($filename)); 
      header('Content-Type: application/octet-stream'); 
      header('Content-Disposition: attachment; filename="' . $filename . '"'); 
      readfile("$filename"); 
    } 
}

/**
 * 返回redis实例
 */
function getRedis(){
  static $redis;
  if($redis){
    return $redis;
  }else{
    $redis = new \Redis();
    $redis->connect(Config::get('redis.host'),Config::get('redis.port') );
    return $redis;
  }
}