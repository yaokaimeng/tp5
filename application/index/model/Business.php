<?php

namespace app\index\model;

use think\Model;
use think\Db;

class Business extends Model
{
	public function selectInfo()
	{
		$id = input('param.id');
		//dump($id);
		return Db::Table('shop_collection')->where("id = '$id'")->select();
	}
	
}