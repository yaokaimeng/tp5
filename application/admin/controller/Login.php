<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
use think\Request;
use think\Session;
class Login extends Controller
{
	public function login()
	{
		dump(123);
		//die;
		return $this->fetch();
	}

	public function dologin()
	{
		$data = Db::name('auth_user')->where("admin_name='".input('admin_name')."' and admin_password='" .md5(input('admin_password'))."'")->find();
		// echo $data->getLastSql();
		//dump($data);die;
		if($data['enable']==1){
			return $this->error("改用户已被禁用");
		}
		if($data){
			session::set('user',$data);
			return $this->success("登录成功",'admin/admin/index',2);
		}else{
			return $this->error("登录失败");
		}
	}

	// public function check_error()
	// {
	// 	return $this->error("没有权限");
	// }
}
