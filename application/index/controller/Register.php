<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use app\index\model\User;
use think\Request;
use think\Session;
use Org\Lib\Ucpaas;

use app\index\model\Register as RegisterModel;
session_start();

class Register extends Controller
{
	
    public function register()
    {
       return $this->fetch();
    }
   
    //用户注册
	public function doreg()
	{
		
		if (request()->isPost()) {
			//接收数据
			$code = input('post.phonecode');
			//dump($code);die;
			$username= input('post.username');
			$password = md5(input('post.password'));
			$email = input('post.email');
			$lasttime = time();
			$regip = $_SERVER['REMOTE_ADDR'];
			$grade = 10;
			//dump($grade);die;
			//校验验证码
			if ($code != $_SESSION['phonecode']) {
				$this->error('您输入的验证码有误');
			}
			//查询数据库中信息与接收数据对比
			$sqlname = Db::name('user')->where("username='$username'")->select();
			if (!empty($sqlname)) {
				$this->error('用户名已存在');
			}
			//插入数据库
			$data = [
				'username' =>$username,
				'password' =>$password,
				'email'    =>$email,
				'Lasttime' =>$lasttime,
				'grade'	   =>$grade
			];
			//dump($data);die;
			$res = Db::name('user')->insert($data);
			
				if ($data) {
					Session::set('username',$data['username']);
					$this->success('注册成功','index/index');
				} else {
					$this->error('注册失败');
				}

		}

		
		
	}
	
	
}