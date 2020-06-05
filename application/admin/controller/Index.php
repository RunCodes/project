<?php

namespace app\admin\controller;

use app\admin\Controller;
use think\Config;
use think\Db;
use think\Model;

class Index extends Controller{
	

	 /*  
     * url:访问路径  
     * array:要传递的数组  
     * */  
    public static function index(){  
  	
    	$url = "http://www.tp.com/index.php/admin/index/ps";
    	$insert = ['name'=>'15914510579','pwd'=>'123456'];
    	Db::name('user')->insert($insert);

        $array = ['name'=>Db::name('user')->getLastSql()];

        $curl = curl_init();  
        //设置提交的url  
        curl_setopt($curl, CURLOPT_URL, $url);  
        //设置头文件的信息作为数据流输出  
        curl_setopt($curl, CURLOPT_HEADER, 0);  
        //设置获取的信息以文件流的形式返回，而不是直接输出。  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
        //设置post方式提交  
        curl_setopt($curl, CURLOPT_POST, 1);  
        //设置post数据  
        $post_data = $array;  
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);  
        //执行命令  
        $data = curl_exec($curl);  
        //关闭URL请求  
        curl_close($curl);  
       //获得数据并返回  
       echo json_encode($data);die;
    }  





    public function ps(){


    	$redis = new \Redis();

    	if($_POST){
    		
			$res = Db::execute($_POST['name']);

			if($res){
    			echo json_encode(['code'=>0]);

		    }else{
    			echo json_encode(['code'=>1]);

		    }
    	}

    	exit;
    }







}