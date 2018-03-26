<?php

namespace app\index\model;
use think\Model;
use think\Db;

class Address extends Model
{

	public function addInfo()
	{
		$name = session('username');
	    $uid= model('user')->where("username = '$name'")
	                       ->field('uid')
	                       ->find()
	                       ->toArray();
	    $uid = $uid['uid'];
	    return Db::name('address')->where('u_uid',$uid)->select();
	}
}