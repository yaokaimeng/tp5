<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;
use think\Db;

class User extends Model
{	
	use SoftDelete;
	//查询地址数据
	public function sele()
	{
		//return Db::name('address')->where('isdel=0')->select();
	}

	//查询个人信息
	/*public function selectInfo()
	{
		$name = session('username');
      	
      return $this->where("username = '$name'")->field('uid')->find();
      
	}*/

	//
	/*public function info()
	{
		$info = Db::table('shop_address')
		    ->field('shop_address.consignee, shop_address.address, shop_address.phone, shop_address.email')
		    ->view('shop_user','username', 'shop_address.u_uid = shop_user.uid')
		    ->select();
		    dump($info);
	}*/
	
}