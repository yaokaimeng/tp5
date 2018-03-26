<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use think\Session;
class Admin extends Controller
{
	public function index()
	 {//$id = session::get('id');
 //       var_dump($id);//die;
		 
		// if (empty($id)) {
		// 	dump(123);
  //         // $this->error('没有登录','/admin/login/login');
  //        }
		
		return $this->fetch();
	}

	public function welcome()
	{
		
		
		return $this->fetch();
	}

	
}


