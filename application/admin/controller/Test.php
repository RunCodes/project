<?php

namespace app\admin\controller;

use app\admin\Controller;
use think\Config;
use think\Db;
use think\Model;


class Test extends Controller{
	public function index(){
		 $data = Db::table('personnel')->where('id = 1')->find();
		 halt($data);
	}




}