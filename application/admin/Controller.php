<?php

namespace app\admin;


use think\View;
use think\Db;
use think\Config;

class Controller{


	protected $view;


	public function __construct(){

		if(null == $this->view){
  			$this->view = View::instance();
		}



	}


}