<?php

namespace app\admin\Model;
use think\Controller;
use think\Model;
use think\Db;
class ProductModel extends Model
{


	public function User()
	{
		return $this->name('category')->select();
		//return $this->name('category')->field('path')->select();
	}

		protected $rule = [
			'uname' => 'require|max:5',
			'email' => 'email',
			];
		protected $message = [
			'uname.require' => '用户名必须',
			'email' => '邮箱格式错误',
			];
		
}




