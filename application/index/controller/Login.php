<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Session;
use think\Validate;
use think\Controller;


class Login extends Controller
{
	
    public function Login()
    {
       return $this->fetch();
    }
   
   	//登录
	public function dologin()
	{
		//验证验证码
		$validate = new Validate([
			'captcha|验证码'=>'require|captcha'
		]);
		$data = [
			'captcha' => input('post.code')
		];
		if(!$validate->check($data)){
			dump($validate->getError());
			$this->error('', 'login/login');
		};


		if (request()->isPost()) {
			//接收数据
			$name= input('post.name');
			$password = md5(input('post.pwd'));
			
			if (empty($name)) {
				$this->error('用户名不能为空');
			}

			/*$sql = Db::name('user')->where("username = '$name'")->find();
			if ($name = $sql['username'] && $sql['enable']
				!=0) {
				$this->error('您已被禁用');
			}*/
			if (!empty($name) && !empty($password)) {
				$sql = Db::name('user')->where("username = '$name'")->find();
				

				$sqlpwd = Db::name('user')->where("password='$password'")->find();
				//dump($sqlpwd['password']);die;
				if ($password != $sqlpwd['password']) {
					$this->error('密码错误');
				} 
//------------------------新加的----------
				if ($name == $sql['username'] && $password == $sqlpwd['password']) {
					Session::set('username',$name);
					if (Session::get('backurl')) {
						$this->success('登录成功！',Session::get('backurl'));
						Session::set('backurl',null);
					}
					else {
						
						 Db::name('user')->where("username = '$name'")->setInc('grade',10);
						$this->success('登录成功','index/index');
					}
				}
				else {
					$this->error('登录失败！', 'login/login');
				}
			}
			
			
		}
	}

	//退出登录
	public function logout()
	{
		Session(null);
		$this->success('退出成功', 'index/index');
	}

}