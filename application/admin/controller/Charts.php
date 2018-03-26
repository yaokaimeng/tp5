<?php
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Db;
class Charts extends Common
{
	public function charts_1()
	{
		return $this->fetch();
	}

	public function charts_2()
	{
		return $this->fetch();
	}

	
}