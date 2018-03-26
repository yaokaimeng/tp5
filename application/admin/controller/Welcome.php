<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
class welcome extends Controller
{
	/**
	 * [welcome description]
	 * @return [type] [description]
	 */
	public function welcome()
	{
		return $this->fetch();
	}

}